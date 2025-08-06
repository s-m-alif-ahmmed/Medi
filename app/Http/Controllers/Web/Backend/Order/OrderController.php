<?php

namespace App\Http\Controllers\Web\Backend\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index(Request $request): View | JsonResponse
    {
        if ($request->ajax()) {
            $data = Order::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($data) {
                    $created_at = $data->created_at->format('d M, Y, h:i a') ?? '';
                    return $created_at;
                })
                ->addColumn('email', function ($data) {
                    $email = $data->email ?? '';
                    return $email;
                })
                ->addColumn('sku', function ($data) {
                    return $data->sku ?? 'N/A';
                })
                ->addColumn('status', function ($data) {
                    $statusOptions = [
                        'Pending' => 'Pending',
                        'Completed' => 'Completed',
                        'Cancelled' => 'Cancelled',
                    ];

                    $status = '<select class="form-select status-dropdown"
                                       data-id="' . $data->id . '"
                                       onchange="showStatusChangeAlert(' . $data->id . ', this.value)"
                                       style="width: 150px;">';

                    foreach ($statusOptions as $key => $value) {
                        $selected = $data->status == $key ? 'selected' : '';
                        $status .= '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                    }

                    $status .= '</select>';

                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('order.show', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white eye-icn" title="View">
                                    <i class="fe fe-eye"></i>
                                </a>
                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['created_at', 'sku', 'email', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.order.index');
    }

    /**
     * Change the status of the specified city content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(Request $request, $id)
    {
        $data = Order::findOrFail($id);

        return view('backend.layouts.order.view', compact('data'));
    }

    /**
     * Change the status of the specified city content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(Request $request, $id)
    {
        $status = $request->input('status');

        // Validate the status
        if (!in_array($status, ['Pending', 'Completed', 'Cancelled'])) {
            return response()->json(['t-error' => false, 't-success' => 'Invalid status']);
        }

        // Update the status in the database
        $data = Order::find($id);
        if ($data) {
            $data->status = $status;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }

        return response()->json(['t-error' => false, 'message' => 'Record not found']);
    }

    /**
     * Remove the specified city content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $data = Order::findOrFail($id);
            $data->delete();

            return response()->json([
                't-success' => true,
                'message' => 'Data deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                't-success' => false,
                'message' => 'Failed to delete the data.',
            ]);
        }
    }

}
