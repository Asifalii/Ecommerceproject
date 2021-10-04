@extends('layouts.admin_master')

@section('Shipping')
    active show-sub
@endsection

@section('district')
    active
@endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">District</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">District List</div>
                    <div class="card-body">
                        <div class="card pd-20 pd-sm-40">
                            <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>                                
                                        <th class="wd-30p">Division-Name</th>                 
                                        <th class="wd-30p">District-Name</th>                 
                                        <th class="wd-30p">Action</th>                 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($districts as $d)
                                        <tr>                                   
                                            <td>{{ $d->division->division_name }}</td>
                                            <td>{{ $d->district_name }}</td>
                                            <td>
                                                <a href="{{ url('admin/district-edit/'.$d->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ url('admin/district-delete/'.$d->id) }}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                      
                                    @endforeach
                                </tbody>
                            </table>
                            </div><!-- table-wrapper -->
                        </div><!-- card -->District
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add New District </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('district-store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Select Division<span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="division_id">
                              <option label="chose one"></option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ (ucwords($division->division_name)) }}</option>
                                @endforeach
                              </select> 
                            @error('division_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">district_name<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="district_name"  placeholder="district_name">
                            @error('district_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">District Add</button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection