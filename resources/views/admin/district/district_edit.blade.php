@extends('layouts.admin_master')

@section('Shipping') active show-sub @endsection
@section('district') active @endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">Update District</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">update  District </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('district-update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $district->id }}">
                        <div class="form-group">
                            <label class="form-control-label">Select Division<span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="division_id">
                              <option label="chose one"></option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}" {{ $division->id==$district->division_id ? 'selected' : ''}}>{{ (ucwords($division->division_name)) }}</option>
                                @endforeach
                              </select> 
                            @error('division_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">district_name<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" value="{{ $district->district_name }}" name="district_name"  placeholder="district_name">
                            @error('district_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update District</button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection