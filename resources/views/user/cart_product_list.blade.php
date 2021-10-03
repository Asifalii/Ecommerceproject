@extends('layouts.frontend_master')

@section('content')
@section('title') Wish List @endsection
<div class="breadcrumb">
<div class="container">
    <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
            <li><a href="home.html">Home</a></li>
            <li class='active'>My Cart</li>
        </ul>
    </div><!-- /.breadcrumb-inner -->
</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
<div class="container">
    <div class="row">
        <div class="shopping-cart">
            <div class="shopping-cart-table ">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="cart-description item">Image</th>
                                <th class="cart-product-name item">Name</th>
                                <th class="cart-romove item">Color</th>
                                <th class="cart-edit item">Size</th>
                                <th class="cart-qty item">Quantity</th>
                                <th class="cart-sub-total item">Subtotal</th>
                                <th class="cart-total last-item">Remove</th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody id="mycartlist">
                        
                        </tbody>
                    </table> 
                </div>
            </div>			
     </div><!-- /.row -->
    </div><!-- /.sigin-in-->     
</div><!-- /.body-content -->
</div>
@endsection