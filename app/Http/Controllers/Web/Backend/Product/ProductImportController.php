<?php

namespace App\Http\Controllers\Web\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductImport;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\SimpleExcel\SimpleExcelReader;
use Yajra\DataTables\DataTables;

class ProductImportController extends Controller
{
    public function index(Request $request): JsonResponse | View {
        if ($request->ajax()) {
            $data = ProductImport::latest()
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('sku', function ($data) {
                    return $data->sku ?? 'N/A';
                })
                ->addColumn('description', function ($data) {
                    return $data->description ?? 'N/A';
                })
                ->addColumn('product_length', function ($data) {
                    return $data->product_length ?? 'N/A';
                })
                ->addColumn('side', function ($data) {
                    return $data->side ?? 'N/A';
                })
                ->addColumn('color_desc', function ($data) {
                    return $data->color_desc ?? 'N/A';
                })
                ->addColumn('product_size', function ($data) {
                    return $data->product_size ?? 'N/A';
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('products.import.show', ['id' => $data->id]) . '" type="button" class="btn btn-secondary fs-14 text-white eye-icn" title="View">
                                    <i class="fe fe-eye"></i>
                                </a>
                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('backend.layouts.product-import.index');
    }

    public function importFile()
    {
        return view('backend.layouts.product-import.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,csv,xls',
        ]);

        // Store the file with original name to avoid unreadable path issues
        $file = $request->file('excel_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('imports', $fileName);

        // Get the full file path
        $fullPath = storage_path('app/private/' . $filePath);

        $newCount = 0;

        SimpleExcelReader::create($fullPath)
            ->getRows()
            ->each(function (array $row) use (&$newCount) {
                $sku = $row['SKU'] ?? null;

                if (!$sku || ProductImport::where('sku', $sku)->exists()) {
                    return; // Skip if SKU is empty or already exists
                }

                ProductImport::create([
                    'sku' => $sku,
                    'description' => $row['Description'] ?? null,
                    'product_length' => $row['Product Length (Sizing)'] ?? null,
                    'side' => $row['SIDE'] ?? null,
                    'color_desc' => $row['COLOR_DESC'] ?? null,
                    'product_size' => $row['Product Size'] ?? null,
                    'cC' => $row['cC'] ?? null,
                    'cB1' => $row['cB1'] ?? null,
                    'cB' => $row['cB'] ?? null,
                    'lmall_D1' => $row['lmall-D1'] ?? null,
                    'cG' => $row['cG'] ?? null,
                    'cE1' => $row['cE1'] ?? null,
                    'cD' => $row['cD'] ?? null,
                    'lE_G' => $row['lE-G'] ?? null,
                ]);

                $newCount++;
            });

        return redirect()
            ->route('products.import.index')
            ->with('t-success', "{$newCount} new product(s) imported successfully.");
    }

    public function show(int $id): JsonResponse | View
    {
        $data = ProductImport::findOrFail($id);

        return view('backend.layouts.product-import.view', compact('data') );
    }

    public function destroy(int $id): JsonResponse
    {
        $data = ProductImport::findOrFail($id);
        $data->delete();
        return response()->json([
            't-success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }

}
