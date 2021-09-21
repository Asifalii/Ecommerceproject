@extends('layouts.admin_master')
@section('sliders')
    active
@endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">Sliders</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sliders list</div>
                    <div class="card-body">
                        <div class="card pd-20 pd-sm-40">
                            <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                <tr>
                                    <th class="wd-20p">Sliders-Image</th>
                                    <th class="wd-20p">Title</th>
                                    <th class="wd-20p">Description</th>
                                    <th class="wd-20p">Status</th>
                                    <th class="wd-20p">Action</th>                                 
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slider as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset($item->image) }}" alt="" style="width: 80px;">
                                    </td>

                                    <td>
                                        @if ($item->title_en == NULL)
                                            <span class="badge bdge-pill badge-danger"> No title found </span>
                                        @else
                                            {{ $item->title_en }}
                                        @endif
                                    </td>  

                                    <td>
                                         @if ($item->description_en == NULL)
                                            <span class="badge bdge-pill badge-danger"> No Description found </span>
                                        @else
                                            {{ $item->description_en }}
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->status==1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>    
                                        <a href="{{ url('admin/slider_edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ url('admin/slider_delet/'.$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
                                        @if ($item->status==1)
                                        <a href="{{ url('admin/slider_inactive/'.$item->id) }}" class="btn btn-sm btn-danger" title="inactive"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                        <a href="{{ url('admin/slider_active/'.$item->id) }}" class="btn btn-sm btn-success" title="active now data"><i class="fa fa-arrow-up"></i></a>
                                        @endif 
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
                    <div class="card-header">Add New Slider</div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('slider-store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Product Title English<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="title_en" value="{{ old('title_en') }}" placeholder="Product Title English">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Product Title Bangla<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="title_bn" value="{{ old('title_bn') }}" placeholder="Product Title Bangla">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Description English<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="description_en" value="{{ old('description_en') }}" placeholder="Description English">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Description Bangla<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="description_bn" value="{{ old('description_bn') }}" placeholder="Description Bangla">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Slider Image<span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="image" placeholder="Image">
                            @error('image')
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