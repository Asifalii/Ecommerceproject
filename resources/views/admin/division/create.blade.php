@extends('layouts.admin_master')

@section('Shipping')
    active show-sub
@endsection

@section('division')
    active
@endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">Division</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Division List</div>
                    <div class="card-body">
                        <div class="card pd-20 pd-sm-40">
                            <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>                                
                                        <th class="wd-30p">Division-Name</th>                 
                                        <th class="wd-20p">Action</th>                 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($division as $d)
                                        <tr>                                   
                                            <td>{{ $d->division_name }}</td>
                                            <td>
                                                <a href="{{ url('admin/division-edit/'.$d->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ url('admin/division-delete/'.$d->id) }}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
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
                    <div class="card-header">Add New Division </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('division-store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">division_name<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="division_name"  placeholder="division_name">
                            @error('division_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Division Add</button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection