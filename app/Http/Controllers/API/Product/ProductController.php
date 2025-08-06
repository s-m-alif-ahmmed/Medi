<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $data = Product::where('status', 'Active')->get();

        return $this->success('Data Retrieve Successfully!', $data, 200);
    }

    public function show($id)
    {
        $data = Product::where('status', 'Active')->find($id);

        if (!$data)
        {
            return $this->error('Data not found', 404);
        }

        return $this->success('Data Retrieve Successfully!', $data, 200);
    }

}
