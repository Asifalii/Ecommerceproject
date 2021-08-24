@extends('layouts.admin_master')
@section('categories') active show-sub @endsection
@section('sub_sub_categori')active @endsection

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
                    <div class="card-header">Sub Sub category edit</div>
                        <div class="card-body">
                            <div class="card pd-20 pd-sm-40">
                              <form method="POST" action="{{ route('update_subsub_category') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $subsubcat->id }}">
                                    <div class="table-wrapper">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Sub-sub Category Name English<span class="tx-danger">*</span></label>
                                                        <input class="form-control" type="text" name="subsubcategory_name_en" value="{{ $subsubcat->subsubcategory_name_en }}" placeholder="Sub category Name English">
                                                        @error('subsubcategory_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Sub-sub Category Name Bangla<span class="tx-danger">*</span></label>
                                                        <input class="form-control" type="text" name="subsubcategory_name_bn" value="{{ $subsubcat->subsubcategory_name_bn }}" placeholder="Sub category Name English">
                                                        @error('subsubcategory_name_bn')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
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