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
                    <div class="card-header">Brand list</div>
                    <div class="card-body">
                        <div class="card pd-20 pd-sm-40">
                            <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                <tr>
                                    <th class="wd-15p">Brand-Image</th>
                                    <th class="wd-15p">Brand-Name-English</th>
                                    <th class="wd-15p">Brand-Name-Bangla</th>
                                    <th class="wd-20p">Action</th>                                 
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset($item->brand_image) }}" alt="" style="width: 80px;">
                                    </td>
                                    <td>{{ $item->brand_name_en }}</td>
                                    <td>{{ $item->brand_name_bn }}</td>
                                    <td>
                                        <a href="{{ url('admin/edit_brand/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ url('admin/delet_item/'.$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
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
                    <form method="POST" action="{{ route('brand-store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Brand Name English<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="brand_name_en" value="{{ old('brand_name_en') }}" placeholder="Brand Name English">
                            @error('brand_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Brand Name Bangla<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="brand_name_bn" value="{{ old('brand_name_bn') }}" placeholder="Brand Name Bangla">
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
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection