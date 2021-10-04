@extends('layouts.admin_master')

@section('Shipping')
    active show-sub
@endsection

@section('division')
    active
@endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">Division Update</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <div class="card-header">Update  Division </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('division-update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $division->id }}">
                        <div class="form-group">
                            <label class="form-control-label">division_name<span class="tx-danger">*</span></label>
                            <input class="form-control" value="{{ $division->division_name }}" type="text" name="division_name"  placeholder="division_name">
                            @error('division_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Division Add</button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection