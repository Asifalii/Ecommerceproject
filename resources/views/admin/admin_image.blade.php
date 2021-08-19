@extends('layouts.admin_master')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>
    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="sl-pagebody">
                    <div class="breadcrumb">
                        <div class="container">
                                    <div class="sign-in-page">
                                        <div class="row">
                                            <div class="col-md-4">
                                                @include('admin.inc.s')
                                            </div>
                                            <div class="col-md-8 mt-1">
                                                <div class="card">
                                                    <div class="card-body">
                                                         <form action="{{ route('admin_image_update') }}" method="post" enctype="multipart/form-data">
                                                                @csrf   
                                                                <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                                                            
                                                                <div class="form-group">
                                                                    <label for="examplEimputEmail1">Image</label>
                                                                    <input type="file" name="image" class="form-control" id="image"
                                                                        aria-describedby="image">
                                                                        @error('image')
                                                                        <span class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                    </div>
                </div><!-- sl-mainpanel -->
            </div>
        </div>
    </div>
</div>
    @endsection