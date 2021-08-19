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
                                                        <form action="{{ route('update-pass') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="examplEimputEmail1">Old Password</label>
                                                                <input type="text" name="old_password" class="form-control" id="old_password"
                                                                    aria-describedby="password" placeholder="Old password">
                                                                    @error('old_password')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                            </div>
                                                    
                                                            <div class="form-group">
                                                                <label for="examplEimputEmail1">New-Password</label>
                                                                <input type="text" name="new_password" class="form-control" id="new_password"
                                                                    aria-describedby="new_password" placeholder="New-password">
                                                                    @error('new_password')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                            </div>
                            
                                                            <div class="form-group">
                                                                <label for="examplEimputEmail1">Confirm Password</label>
                                                                <input type="text" name="confirm_pass" class="form-control" id="confirm_pass"
                                                                    aria-describedby="confirm_pass" placeholder="Confirm-password">
                                                                    @error('confirm_pass')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                            </div>
                            
                                                           <div class="form-group">
                                                                <button type="submit" class="btn btn-danger">Update </button>
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