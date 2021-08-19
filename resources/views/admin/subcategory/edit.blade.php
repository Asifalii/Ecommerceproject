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
                    <div class="card-header">Sub category list</div>
                        <div class="card-body">
                            <div class="card pd-20 pd-sm-40">
                              <form method="POST" action="{{ route('update_sub_cat')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $subcategory->id }}">
                                    <div class="table-wrapper">
                                            <div class="form-group">
                                                <label class="form-control-label">Select category<span class="tx-danger">*</span></label>
                                                <select class="form-control select2-show-search" data-placeholder="Select One" name="category_id">
                                                <option label="chose one"></option>
                                                    @foreach ($category as $catt)
                                                    <option value="{{ $catt->id }}" {{ $catt->id==$subcategory->category_id ? 'selected':'' }}>{{ (ucwords($catt->category_name_en)) }}</option>
                                                    @endforeach
                                                </select> 
                                                @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-control-label">SubCategory Name English<span class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="subcategory_name_en" value="{{ $subcategory->subcategory_name_en }}" placeholder="Sub category Name English">
                                                @error('subcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Subcategory Name Bangla<span class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="subcategory_name_bn" value="{{  $subcategory->subcategory_name_bn}}" placeholder="Sub category Name Bangla">
                                                @error('subcategory_name_bn')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                    </div>   
                                    <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info mg-r-5">Category Update</button>
                                    </div><!-- form-layout-footer -->
                            </form>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection