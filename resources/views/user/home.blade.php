@extends('layouts.frontend_master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-4">
                        @include('user.inc.sidebar')
                    </div>
                    <div class="col-md-8 mt-1">
                        <div class="card">
                            <h3 class="text-center"><span class="text-danger">hi...</span><strong class="text-warning">
                                    {{ auth::user()->name }}</strong>Update Your profile</h3>
                            <div class="card-body">
                                <form action="{{ route('update-profile') }}" method="POST">
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
@endsection
