@extends('layouts.admin_master')
@section('categories') active show-sub @endsection
@section('sub_categori_1')active @endsection

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
                            <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                <tr>
                                    <th class="wd-15p">Category-Name</th>
                                    <th class="wd-15p">Sub-Category-Name-English</th>
                                    <th class="wd-15p">Sub-Category-Name-Bangla</th>
                                    <th class="wd-20p">Action</th>                                 
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($subcategories as $item)
                                <tr>
                                    <td>{{ $item->category->category_name_en }}</td>
                                    <td>{{ $item->subcategory_name_en }}</td>
                                    <td>{{ $item->subcategory_name_bn }}</td>
                                    <td>
                                        <a href="{{ url('admin/sub-category-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ url('admin/sub-category-delete/'.$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div><!-- table-wrapper -->
                        </div><!-- card -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add New Brand</div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('subcategory_store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Select category<span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="category_id">
                              <option label="chose one"></option>
                                @foreach ($categories as $c)
                                <option value="{{ $c->id }}">{{ (ucwords($c->category_name_en)) }}</option>
                                @endforeach
                              </select> 
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-control-label">Category Name English<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="subcategory_name_en" value="{{ old('subcategory_name_en') }}" placeholder="Sub category Name English">
                            @error('subcategory_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">bangla Name Bangla<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="subcategory_name_bn" value="{{ old('subcategory_name_bn') }}" placeholder="Sub category Name Bangla">
                            @error('subcategory_name_bn')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5"> Add subcategori </button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection