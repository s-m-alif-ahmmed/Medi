@extends('backend.app')

@section('title', 'Order Details')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Details</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">

                    <div class="row mb-4">
                        <label for="created_at" class="col-md-3 form-label">Order At</label>
                        <div class="col-md-9">
                            <input class="form-control" id="created_at"
                                name="created_at" placeholder="Order At" type="text"
                                value="{{ $data->created_at->format('d M, Y, h:i a') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="mail_host" class="col-md-3 form-label">SKU</label>
                        <div class="col-md-9">
                            <input class="form-control" id="created_at"
                                   name="created_at" placeholder="Order At" type="text"
                                   value="{{ $data->sku }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="email" class="col-md-3 form-label">Email</label>
                        <div class="col-md-9">
                            <input class="form-control" id="email"
                                   name="email" placeholder="Email" type="text"
                                   value="{{ $data->email }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="additional_note" class="col-md-3 form-label">Additional Note</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="additional_note"
                                   name="additional_note" placeholder="Additional Note" type="text" >{{ $data->additional_note }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="leg" class="col-md-3 form-label">LEG</label>
                        <div class="col-md-9">
                            <input class="form-control" id="leg"
                                   name="leg" placeholder="LEG" type="text"
                                   value="{{ ucfirst(strtolower($data->leg)) }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="side" class="col-md-3 form-label">Side</label>
                        <div class="col-md-9">
                            <input class="form-control" id="side"
                                   name="side" placeholder="Side" type="text"
                                   value="{{ ucfirst(strtolower($data->side)) }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="color_desc" class="col-md-3 form-label">Color</label>
                        <div class="col-md-9">
                            <input class="form-control" id="color_desc"
                                   name="color_desc" placeholder="Color" type="text"
                                   value="{{ $data->color_desc }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="cc" class="col-md-3 form-label">CC</label>
                        <div class="col-md-9">
                            <input class="form-control" id="cc"
                                   name="cc" placeholder="CC" type="text"
                                   value="{{ $data->cc }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="cb1" class="col-md-3 form-label">CB1</label>
                        <div class="col-md-9">
                            <input class="form-control" id="cb1"
                                   name="cb1" placeholder="CB1" type="text"
                                   value="{{ $data->cb1 }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="cb" class="col-md-3 form-label">CB</label>
                        <div class="col-md-9">
                            <input class="form-control" id="cb"
                                   name="cb" placeholder="CB" type="text"
                                   value="{{ $data->cb }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="lower_length" class="col-md-3 form-label">Lower Length</label>
                        <div class="col-md-9">
                            <input class="form-control" id="lower_length"
                                   name="lower_length" placeholder="Lower Length" type="text"
                                   value="{{ $data->lower_length }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="cg" class="col-md-3 form-label">CG</label>
                        <div class="col-md-9">
                            <input class="form-control" id="cg"
                                   name="cg" placeholder="CG" type="text"
                                   value="{{ $data->cg }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="ce1" class="col-md-3 form-label">CE1</label>
                        <div class="col-md-9">
                            <input class="form-control" id="ce1"
                                   name="ce1" placeholder="CE1" type="text"
                                   value="{{ $data->ce1 }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="cd" class="col-md-3 form-label">CD</label>
                        <div class="col-md-9">
                            <input class="form-control" id="cd"
                                   name="cd" placeholder="CD" type="text"
                                   value="{{ $data->cd }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="upper_length" class="col-md-3 form-label">Upper Length</label>
                        <div class="col-md-9">
                            <input class="form-control" id="upper_length"
                                   name="upper_length" placeholder="Upper Length" type="text"
                                   value="{{ $data->upper_length }}">
                        </div>
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
                                <a href="{{ route('order.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
