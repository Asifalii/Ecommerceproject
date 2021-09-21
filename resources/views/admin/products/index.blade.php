@extends('layouts.admin_master')
@section('products') active show-sub @endsection
@section('product_view')active @endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">E-com</a>
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product list</div>
                    <div class="card-body">
                        <div class="card pd-20 pd-sm-40">
                            <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                <tr>
                                    <th class="wd-20">Product-Image</th>
                                    <th class="wd-20p">Product-Name-English</th>
                                    <th class="wd-10p">price</th>
                                    <th class="wd-15p">Product-Quantity</th>
                                    <th class="wd-1p">After Discount price</th>
                                    <th class="wd-15p">Status</th>
                                    <th class="wd-15p">Action</th>                                 
                                </tr>
                                </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($product->product_thambnail) }}" alt="" style="width: 80px;">
                                        </td>
                                        <td>{{ $product->product_name_en }}</td>
                                        <td>{{ $product->selling_price }}$</td>
                                        <td>{{ $product->product_qty }}</td>
                                        <td>
                                            @if ($product->discount_price==Null)
                                            <span class="badge badge-pill badge-success">No Dis</span>
                                            @else
                                            @php                                           
                                                $amount=$product->selling_price-$product->discount_price;
                                                $dis=($amount/$product->selling_price)*100;                                                                                       
                                            @endphp
                                               <span class="badge badge-pill badge-success">{{ round($dis) }}% </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->status==1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-eye"></i></a>
                                            <a href="{{ url('admin/edit-product/'.$product->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>                              
                                            <a href="{{ url('admin/delet-product/'.$product->id) }}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
                                            {{-- to check product active of inactive use below if con --}}
                                            @if ($product->status==1)
                                            <a href="{{ url('admin/product_inactive/'.$product->id) }}" class="btn btn-sm btn-danger" title="inactive"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a href="{{ url('admin/product_active/'.$product->id) }}" class="btn btn-sm btn-success" title="active now data"><i class="fa fa-arrow-up"></i></a>
                                            @endif
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
           
        </div>
    </div>
</div>
@endsection