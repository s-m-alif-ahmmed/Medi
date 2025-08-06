<?php

namespace App\Http\Controllers\Web\Backend;

use ALifAhmmed\HelperPackage\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UserController extends Controller {
    /**
     * Display a listing of all users.
     *
     * @param Request $request
     * @return JsonResponse|View
     */
    public function index(Request $request): JsonResponse | View {
        if ($request->ajax()) {
            $data = User::latest()
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('avatar', function ($data) {
                    $defaultImage = asset('frontend/default-avatar-profile.jpg');
                    $url = $data->avatar ? asset('storage/' . $data->avatar) : $defaultImage;

                    return '<img src="' . $url . '" alt="Avatar" width="50" height="50" style="object-fit:cover; border-radius:50%;">';
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('user.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>
                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['avatar', 'action'])
                ->make();
        }
        return view('backend.layouts.user.index');
    }

    public function create()
    {
        return view('backend.layouts.user.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'   => 'required|string|max:100',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Handle avatar upload
            $avatarPath = null;
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarName = time() . '_' . $avatar->getClientOriginalName();
                $avatarPath = $avatar->storeAs('uploads/avatar', $avatarName, 'public');
            }

            $data               = new User();
            $data->name   = $request->name;
            $data->email   = $request->email;
            $data->email_verified_at   = now();
            $data->password   = Hash::make($request->password);
            $data->avatar = $avatarPath ?? null;
            $data->role = 'Admin';
            $data->save();

            return redirect()->route('user.index')->with('t-success', 'User create successfully');
        } catch (Exception) {
            return redirect()->route('user.index')->with('t-success', 'User failed created.');
        }
    }

    public function edit(int $id): View {
        $data = User::findOrFail($id);
        return view('backend.layouts.user.edit', compact('data'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        try {

            $data = User::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'name'   => 'nullable|string|max:100',
                'email' => 'nullable|string|email|unique:users,email',
                'password' => 'nullable|string',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Handle avatar upload
            $avatarPath = null;
            if ($request->hasFile('avatar')) {
                // Delete old avatar if it exists
                if ($data->avatar && Storage::disk('public')->exists($data->avatar)) {
                    Storage::disk('public')->delete($data->avatar);
                }

                $avatar = $request->file('avatar');
                $avatarName = time() . '_' . $avatar->getClientOriginalName();
                $avatarPath = $avatar->storeAs('uploads/avatar', $avatarName, 'public');
                $data->avatar = $avatarPath;
            }

            $data->name   = $request->name ?? $data->name;
            $data->email   = $request->email ?? $data->email;
            $data->password   = Hash::make($request->password) ?? $data->password;
            $data->update();

            return redirect()->route('user.index')->with('t-success', 'User info Updated Successfully.');

        } catch (Exception) {
            return redirect()->route('user.index')->with('t-success', 'User info failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            't-success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }
}
