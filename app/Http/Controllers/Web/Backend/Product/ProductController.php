<?php

namespace App\Http\Controllers\Web\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of product content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('title', function ($data) {
                    $title = $data->title;
                    return $title;
                })
                ->addColumn('thumbnail', function ($data) {
                    $defaultImage = asset('frontend/no-image.jpg');
                    $url = $data->thumbnail ? asset('storage/' . $data->thumbnail) : $defaultImage;

                    return '<img src="' . $url . '" alt="Thumbnail" width="100" height="100" style="object-fit:cover; ">';
                })
                ->addColumn('status', function ($data) {
                    $backgroundColor  = $data->status == "Active" ? '#EF0088' : '#ccc';
                    $sliderTranslateX = $data->status == "Active" ? '26px' : '2px';
                    $sliderStyles     = "position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background-color: white; border-radius: 50%; transition: transform 0.3s ease; transform: translateX($sliderTranslateX);";

                    $status = '<div class="form-check form-switch" style="margin-left:40px; position: relative; width: 50px; height: 24px; background-color: ' . $backgroundColor . '; border-radius: 12px; transition: background-color 0.3s ease; cursor: pointer;">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status" style="position: absolute; width: 100%; height: 100%; opacity: 0; z-index: 2; cursor: pointer;">';
                    $status .= '<span style="' . $sliderStyles . '"></span>';
                    $status .= '<label for="customSwitch' . $data->id . '" class="form-check-label" style="margin-left: 10px;"></label>';
                    $status .= '</div>';

                    return $status;
                })

                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('product.show', ['id' => $data->id]) . '" type="button" class="btn btn-secondary fs-14 text-white eye-icn" title="View">
                                    <i class="fe fe-eye"></i>
                                </a>
                                <a href="' . route('product.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>
                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['title', 'thumbnail', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layouts.product.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(int $id): View
    {
        $data = Product::findOrFail($id);

        return view('backend.layouts.product.view', compact('data') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title'   => 'required|string',
                'description' => 'required|string',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $thumbnailPath = null;
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
                $thumbnailPath = $thumbnail->storeAs('uploads/product', $thumbnailName, 'public');
            }

            $data  = new Product();
            $data->title = $validatedData['title'];
            $data->description = $validatedData['description'];
            $data->thumbnail = $thumbnailPath;
            $data->save();

            return redirect()->route('product.index')->with('t-success', 'Product created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('t-error', 'Product create failed!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $data = Product::find($id);
        return view('backend.layouts.product.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): RedirectResponse {
        try {
            $validatedData = $request->validate([
                'title'   => 'nullable|string',
                'description' => 'nullable|string',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $data  = Product::findOrFail($id);

            // Handle thumbnail
            if ($request->hasFile('thumbnail')) {
                // Delete old thumbnail if exists
                if ($data->thumbnail && file_exists(storage_path('app/public/' . $data->thumbnail))) {
                    unlink(storage_path('app/public/' . $data->thumbnail));
                }

                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
                $thumbnailPath = $thumbnail->storeAs('uploads/product', $thumbnailName, 'public');
                $data->thumbnail = $thumbnailPath ?? null;
            }

            // Update fields
            $data->title = $validatedData['title'] ?? $data->title;
            $data->description = $validatedData['description'] ?? $data->description;
            $data->save();

            return redirect()->route('product.index')->with('t-success', 'Product Updated Successfully.');

        } catch (\Exception) {
            return redirect()->route('product.index')->with('t-success', 'Product failed to update');
        }
    }

    /**
     * Change the status of the specified product content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse {
        $data = Product::findOrFail($id);
        if ($data->status == 'Active') {
            $data->status = 'Inactive';
            $data->save();

            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data'    => $data,
            ]);
        } else {
            $data->status = 'Active';
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data'    => $data,
            ]);
        }
    }

    /**
     * Remove the specified product content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse {
        try {
            $data = Product::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Product.',
            ]);
        }
    }

}
