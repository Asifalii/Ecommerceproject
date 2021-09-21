@extends('layouts.admin_master')
@section('sliders')
    active
@endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">Slider</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Slider list</div>
                    <div class="card-body">

                        <div class="card pd-20 pd-sm-40">
            <form action="{{ route('slider_update') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="old_image" value="{{ $slider->image }}">
                        <input type="hidden" name="id" value="{{ $slider->id }}">
                        @if ($slider->title_en==NULL)
                        @else
                        
                        <div class="form-group">
                            <label class="form-control-label">Product Title English<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="title_en" value="{{ $slider->title_en }}" placeholder="Product Title English">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Product Title Bangla<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="title_bn" value="{{ $slider->title_bn }}" placeholder="Product Title Bangla">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description English<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="description_en" value="{{ $slider->description_en }}" placeholder="Description English">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Description English<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="description_bn" value="{{ $slider->description_bn }}" placeholder="Description English">
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="form-control-label">Slider Image<span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="image" placeholder="Image">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Slider Image :<br> <br><span class="tx-danger"><img src="{{ asset($slider->image) }}" height="60px", width="150px"></span></label>
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