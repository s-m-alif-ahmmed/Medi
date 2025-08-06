@extends('backend.app')

@section('title', 'Product Query Details')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Details</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Query</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Query Details</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="created_at" class="form-label">Product Query Created At</label>
                            <div class="">
                                <input class="form-control" id="created_at"
                                       name="created_at" placeholder="Product At" type="text"
                                       value="{{ $data->created_at->format('d M, Y, h:i a') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="sku" class="form-label">SKU</label>
                            <div class="">
                                <input class="form-control" id="sku" name="sku" placeholder="SKU" type="text" value="{{ $data->sku }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <div class="">
                                <input class="form-control" id="description" name="description" placeholder="Description" type="text" value="{{ $data->description }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="product_length" class="form-label">Product Length</label>
                            <div class="">
                                <input class="form-control" id="product_length" name="product_length" placeholder="Product Length" type="text" value="{{ $data->product_length }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="side" class="form-label">Side</label>
                            <div class="">
                                <input class="form-control" id="side" name="side" placeholder="Side" type="text" value="{{ $data->side }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="color_desc" class="form-label">Color Desc</label>
                            <div class="">
                                <input class="form-control" id="sku" name="color_desc" placeholder="Color Desc" type="text" value="{{ $data->color_desc }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="product_size" class="form-label">Product Size</label>
                            <div class="">
                                <input class="form-control" id="product_size" name="Product Size" placeholder="product_size" type="text" value="{{ $data->product_size }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cC" class="form-label">cC</label>
                            <div class="">
                                <input class="form-control" id="cC" name="cC" placeholder="cC" type="text" value="{{ $data->cC }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cB1" class="form-label">cB1</label>
                            <div class="">
                                <input class="form-control" id="sku" name="cB1" placeholder="cB1" type="text" value="{{ $data->cB1 }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cB" class="form-label">cB</label>
                            <div class="">
                                <input class="form-control" id="cB" name="cB" placeholder="cB" type="text" value="{{ $data->cB }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="lmall_D1" class="form-label">lmall-D1</label>
                            <div class="">
                                <input class="form-control" id="lmall_D1" name="lmall_D1" placeholder="lmall-D1" type="text" value="{{ $data->lmall_D1 }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cG" class="form-label">cG</label>
                            <div class="">
                                <input class="form-control" id="sku" name="cB1" placeholder="cG" type="text" value="{{ $data->cG }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cE1" class="form-label">cE1</label>
                            <div class="">
                                <input class="form-control" id="cE1" name="cE1" placeholder="cE1" type="text" value="{{ $data->cE1 }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cD" class="form-label">cD</label>
                            <div class="">
                                <input class="form-control" id="cD" name="cD" placeholder="cD" type="text" value="{{ $data->cD }}" disabled readonly >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="lE_G" class="form-label">lE-G</label>
                            <div class="">
                                <input class="form-control" id="lE_G" name="lE_G" placeholder="lE-G" type="text" value="{{ $data->lE_G }}" disabled readonly >
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-end">
                        <div class="">
                            <div class="text-start">
                                <a href="{{ route('products.import.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
