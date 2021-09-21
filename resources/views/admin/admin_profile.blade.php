@extends('layouts.admin_master')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
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
                                                        <form action="{{ route('data_update') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="examplEimputEmail1">Name</label>
                                                                <input type="text" name="name" class="form-control" id="examplEimputEmail1"
                                                                    aria-describedby="email" value="{{ Auth::user()->name }}">
                                                                    @error('name')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                            </div>
                        
                                                            <div class="form-group">
                                                                <label for="examplEimputEmail1">email</label>
                                                                <input type="email" name="email" class="form-control" id="examplEimputEmail1"
                                                                    aria-describedby="email" value="{{ Auth::user()->email }}">
                                                                    @error('email')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                            </div>
                        
                                                            <div class="form-group">
                                                                <label for="examplEimputEmail1">Phone</label>
                                                                <input type="phone" name="phone" class="form-control" id="examplEimputEmail1"
                                                                    aria-describedby="email" value="{{ Auth::user()->phone }}">
                                                                    @error('phone')
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
                    </div>
                </div><!-- sl-mainpanel -->
            </div>
        </div>
    </div>
</div>
@endsection