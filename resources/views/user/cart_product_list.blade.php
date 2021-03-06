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
            <div class="col-md-6 col-sm-12 estimate-ship-tax">
                @if(session()->has('cupon'))

                @else
                <table class="table" id="cuponfield">
                    <thead>
                        <tr>
                            <th>
                                <span class="estimate-title">Discount Code</span>
                                <p>Enter your coupon code if you have one..</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="cupon_name" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary" onclick="applycuppon()">APPLY COUPON</button>
                                    </div>
                                </td>
                            </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
                @endif
               
            </div><!-- /.estimate-ship-tax -->
            
            <div class="col-md-6 col-sm-12 cart-shopping-total">
                <table class="table">
                    <thead id="cuponcalfield">
                        <tr>
                            <th>
                                <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">$600.00</span>
                                </div>

                                <div class="cart-sub-total">
                                    Cupon Name<span class="inner-left-md">$600.00</span>
                                </div>

                                <div class="cart-sub-total">
                                    Cupon discount<span class="inner-left-md">$600.00</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">$600.00</span>
                                </div>
                            </th>
                        </tr>
                    </thead><!-- /thead -->
                    <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                                        <span class="">Checkout with multiples address!</span>
                                    </div>
                                </td>
                            </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
            </div><!-- /.cart-shopping-total -->			
     </div><!-- /.row -->
    </div><!-- /.sigin-in-->     
</div><!-- /.body-content -->
</div>
@endsection