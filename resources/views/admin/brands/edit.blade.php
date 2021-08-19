@extends('layouts.admin_master')
@section('brands')
    active
@endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sub category list</div>
                    <div class="card-body">
                        <div class="card pd-20 pd-sm-40">
                          <form action="{{ route('update-brand') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                        <input type="hidden" name="id" value="{{ $brand->id }}">
                        
                        <div class="form-group">
                            <label class="form-control-label">Brand Name English<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="brand_name_en" value="{{ $brand->brand_name_en }}" placeholder="Brand Name English">
                            @error('brand_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="form-control-label">Brand Name Bangla<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="brand_name_bn" value="{{ $brand->brand_name_bn }}" placeholder="Brand Name Bangla">
                            @error('brand_name_bn')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="form-control-label">Brand Image<span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="brand_image"  placeholder="Image">
                            @error('brand_image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Submit</button>
                        </div><!-- form-layout-footer -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection