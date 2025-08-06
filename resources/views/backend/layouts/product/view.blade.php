@extends('backend.app')

@section('title', 'Product Details')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Details</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">

                    <div class="row mb-4">
                        <label for="created_at" class="col-md-3 form-label">Product Created At</label>
                        <div class="col-md-9">
                            <input class="form-control" id="created_at"
                                name="created_at" placeholder="Product At" type="text"
                                value="{{ $data->created_at->format('d M, Y, h:i a') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="mail_host" class="col-md-3 form-label">SKU</label>
                        <div class="col-md-9">
                            <input class="form-control" id="created_at"
                                   name="created_at" placeholder="Product At" type="text"
                                   value="{{ $data->sku }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="thumbnail" class="col-md-3 form-label">Thumbnail</label>
                        <img class="img" src="{{ $data->thumbnail }}" alt="Thumbnail" id="thumbnail" />
                    </div>

                    <div class="row mb-4">
                        <label for="status" class="col-md-3 form-label">Status</label>
                        <div class="col-md-9">
                            <input class="form-control" id="status"
                                   name="status" placeholder="Status" type="text"
                                   value="{{ $data->status }}">
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-md-9">
                            <div class="text-start">
                                <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
