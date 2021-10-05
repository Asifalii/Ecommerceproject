@extends('layouts.admin_master')

@section('Shipping')
    active show-sub
@endsection

@section('state')
    active
@endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">state</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm ">

            <div class="col-md-4 m-auto">
                <div class="card">
                    <div class="card-header">Update state </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('state_update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $state->id }}">
                        <div class="form-group">
                            <label class="form-control-label">Select Division<span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="division_id">
                              <option label="chose one"></option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}" {{ $division->id==$state->division_id ? 'selected' : ''}}>{{ (ucwords($division->division_name)) }}</option>
                                @endforeach
                              </select> 
                            @error('division_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Select district<span class="tx-danger">*</span></label>
                            <input class="form-control" value="{{ $state->district->district_name }}" type="text" name="state_name"  placeholder="state_name">
                            @error('district_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">state_name<span class="tx-danger">*</span></label>
                            <input class="form-control" value="{{ $state->state_name }}" type="text" name="state_name"  placeholder="state_name">
                            @error('state_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">state Add</button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  
@endsection