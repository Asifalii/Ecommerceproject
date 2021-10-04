@extends('layouts.admin_master')
@section('cupon')
    active
@endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">Cupon</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">Update coupone</div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('cupon_update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $cupons->id }}">
                        <div class="form-group">
                            <label class="form-control-label">cupone Name <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="cupon_name" value="{{ $cupons->cupon_name }}" placeholder="Cupone Name">
                            @error('cupon_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">coupne discount<span class="tx-danger">%</span></label>
                            <input class="form-control" type="text" name="cupon_discount" value="{{ $cupons->cupon_discount }}" placeholder="Cupone discount">
                            @error('cupon_discount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Cupone Validaty date<span class="tx-danger">*</span></label>
                            <input class="form-control" type="date" value="{{ $cupons->cupon_validity }}" name="cupon_validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"  placeholder="Cupone Validaty date">
                            @error('cupon_validity')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Submit</button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection