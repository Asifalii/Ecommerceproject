@extends('layouts.admin_master')
@section('cupon')
    active
@endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">Cupon</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cupon list</div>
                    <div class="card-body">
                        <div class="card pd-20 pd-sm-40">
                            <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>      
                                        <tr>
                                            <th class="wd-15p">Cupon Name</th>
                                            <th class="wd-15p">Cupon Discount</th>
                                            <th class="wd-15p">Validity</th>
                                            <th class="wd-20p">Status</th>                                 
                                            <th class="wd-20p">Action</th>                                 
                                        </tr>            
                                </thead>
                                <tbody>
                                    @foreach ($cupons as $item)  
                                <tr>
                                    <td>{{ $item->cupon_name }}</td>
                                    <td>{{ $item->cupon_discount }}</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($item->cupon_validity)->format('D, d F y') }}
                                    </td>
                                    <td>
                                        @if ($item->cupon_validity >=Carbon\Carbon::now()->format('Y-m-d'))
                                        <span class="badge badge-pill badge-success">Valid</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">Invalid</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/cupon_edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ url('admin/delet_cupon/'.$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
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
                    <div class="card-header">Add New coupone</div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('cupone-store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">cupone Name <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="cupon_name" value="{{ old('cupon_name') }}" placeholder="Cupone Name">
                            @error('cupon_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">coupne discount<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="cupon_discount" value="{{ old('cupon_discount') }}" placeholder="Cupone discount">
                            @error('cupon_discount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Cupone Validaty date<span class="tx-danger">*</span></label>
                            <input class="form-control" type="date" name="cupon_validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"  placeholder="Cupone Validaty date">
                            @error('cupon_validity')
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