@extends('backend.app')

@section('title', 'Import Products from Excel')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Import Products from Excel</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Import Products from Excel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Import Products from Excel</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER END --}}

    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                        @csrf

                        <div class="form-group">
                            <label for="excel_file" class="form-label">Name:</label>
                            <input type="file" class="form-control @error('name') is-invalid @enderror"
                                name="excel_file" placeholder="Enter " id="excel_file" value="{{ old('excel_file') }}">
                            @error('excel_file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('user.index') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
