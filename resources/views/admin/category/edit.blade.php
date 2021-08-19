@extends('layouts.admin_master')
@section('cat')
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
                    <div class="card-header">category Update </div>
                    <div class="card-body">
                        <div class="card pd-20 pd-sm-40">
                               <form method="POST" action="{{ route('category_update')}}" >
                        @csrf                       
                       <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="table-wrapper">

                        <div class="form-group">
                            <label class="form-control-label">Category Icon<span class="tx-danger">*</span></label>
                            <input class="form-control" value="{{ $category->category_icon }}" type="text" name="category_icon"  placeholder="category_icon">
                            @error('category_icon')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-control-label">Category Name English<span class="tx-danger">*</span></label>
                            <input class="form-control" value="{{ $category->category_name_en }}" type="text" name="category_name_en" value="{{ old('category_name_en') }}" placeholder="Brand Name English">
                            @error('category_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">bangla Name Bangla<span class="tx-danger">*</span></label>
                            <input class="form-control" value="{{ $category->category_name_bn }}" type="text" name="category_name_bn" value="{{ old('category_name_bn') }}" placeholder="Brand Name Bangla">
                            @error('category_name_bn')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Category Update</button>
                        </div><!-- form-layout-footer -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection