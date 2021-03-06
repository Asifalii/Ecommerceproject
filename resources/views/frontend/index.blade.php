@extends('layouts.frontend_master')

@section('content')
@section('title') Home @endsection
 @php
     function bn_price($str){
     $en=array(1,2,3,4,5,6,7,8,9,0);
     $bn=array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
     $str=str_replace($en,$bn,$str);
     return $str;
 }
 @endphp

<div class="row">
	<!-- ============================================== SIDEBAR ============================================== -->	
		<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
			
	<!-- ================================== TOP NAVIGATION ================================== -->
			@include('frontend.inc.cat')
	<!-- ================================== TOP NAVIGATION : END ================================== -->

	<!-- ============================================== HOT DEALS ============================================== -->  
		@include('frontend.inc.hot_deals')      
	
            <!-- ============================================== HOT DEALS: END ============================================== -->


			<!-- ============================================== SPECIAL OFFER ============================================== -->

<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">@if(session()->get('language')=='bangla')বিশেষ অফার @else Special Offer @endif</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
	        <div class="item">
	        	<div class="products special-product">
					@foreach ($special_offer as $product)
                    <div class="product">
						<div class="product-micro">
							<div class="row product-micro-row">
								<div class="col col-xs-5">
									<div class="product-image">
										<div class="image">
											<a href="#">
												<a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thambnail) }}" alt=""></a>
											</a>					
										</div><!-- /.image -->                                                   
									</div><!-- /.product-image -->
								</div><!-- /.col -->
								<div class="col col-xs-7">
									<div class="product-info">
										<h3 class="name"><a href="#">
													@if(session()->get('language')=='bangla')
														{{ $product->product_name_bn }}
													@else 
														{{ $product->product_name_en }}t
													@endif
										</a></h3>
										<div class="rating rateit-small"></div>
										<div class="product-price">								
											@if(session()->get('language')=='bangla')
											<span class="price">{{ bn_price($product->selling_price) }}৳</span>
											@else 
											<span class="price">{{ $product->selling_price }}tk</span>
											@endif											                                             
										</div><!-- /.product-price -->                                                
									</div>
								</div><!-- /.col -->
							</div><!-- /.product-micro-row -->
						</div><!-- /.product-micro --> 
					</div>
					@endforeach  
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ============================================== SPECIAL OFFER : END ============================================== -->
<!-- ============================================== PRODUCT TAGS ============================================== -->
@include('frontend.inc.product_tags')
<!-- ============================================== PRODUCT TAGS : END ============================================== -->
			<!-- ============================================== SPECIAL DEALS ============================================== -->

<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">@if(session()->get('language')=='bangla')বিশেষ কিছু প্রোডাক্ট @else Special Deals @endif</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
			<div class="item">
				<div class="products special-product">
					@foreach ($special_deals as $product)
					<div class="product">
						<div class="product-micro">
							<div class="row product-micro-row">
								<div class="col col-xs-5">
									<div class="product-image">
										<div class="image">
											<a href="#">
												<a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thambnail) }}" alt=""></a>
											</a>					
										</div><!-- /.image -->                                                   
									</div><!-- /.product-image -->
								</div><!-- /.col -->
								<div class="col col-xs-7">
									<div class="product-info">
										<h3 class="name"><a href="#">
													@if(session()->get('language')=='bangla')
														{{ $product->product_name_bn }}
													@else 
														{{ $product->product_name_en }}t
													@endif
										</a></h3>
										<div class="rating rateit-small"></div>
										<div class="product-price">								
											@if(session()->get('language')=='bangla')
											<span class="price">{{ bn_price($product->selling_price) }}৳</span>
											@else 
											<span class="price">{{ $product->selling_price }}tk</span>
											@endif											                                             
										</div><!-- /.product-price -->                                                
									</div>
								</div><!-- /.col -->
							</div><!-- /.product-micro-row -->
						</div><!-- /.product-micro --> 
					</div>
					@endforeach					
				</div>
	        </div>
		</div>
	</div>
</div>

			<!-- ============================================== SPECIAL DEALS : END ============================================== -->
			<!-- ============================================== NEWSLETTER ============================================== -->
		<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
			<h3 class="section-title">Newsletters</h3>
			<div class="sidebar-widget-body outer-top-xs">
				<p>Sign Up for Our Newsletter!</p>
				<form role="form">
					<div class="form-group">
						<label class="sr-only" for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
					</div>
					<button class="btn btn-primary">Subscribe</button>
				</form>
			</div><!-- /.sidebar-widget-body -->
		</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->
		
<!-- ============================================== Testimonials============================================== -->
	@include('frontend.inc.testimonials')
    
<!-- ============================================== Testimonials: END ============================================== -->

		<div class="home-banner">
		<img src="{{asset('f')}}/assets/images/banners/LHS-banner.jpg" alt="Image">
		</div> 




		</div><!-- /.sidemenu-holder -->
		<!-- ============================================== SIDEBAR : END ============================================== -->

		<!-- ============================================== CONTENT ============================================== -->
		<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
			<!-- ========================================== SECTION – HERO ========================================= -->
			
			<div id="hero">
				<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
					@foreach ($sliders as $slider)
						<div class="item" style="background-image: url({{ asset($slider->image) }});">
							<div class="container-fluid">
								<div class="caption bg-color vertical-center text-left">
									<div class="slider-header fadeInDown-1">@if (session()->get('language')=='bangla') টপ-ব্রান্ড @else Top Brands @endif</div>
									<div class="big-text fadeInDown-1">
										@if(session()->get('language')=='bangla') ই-কম @else E-com @endif
									</div>
									<div class="excerpt fadeInDown-2 hidden-xs">
										@if(session()->get('language')=='bangla')
										<span>{{ $slider->title_bn }}</span>
										@else
										<span>{{ $slider->title_en }}</span>
										@endif
									</div>
									<div class="button-holder fadeInDown-3">
										<a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">
											@if(session()->get('language')=='bangla')
											<span>{{ $slider->description_bn }}</span>
											@else
											<span>{{ $slider->description_en }}</span>
											@endif</a>
									</div>
								</div><!-- /.caption -->
							</div><!-- /.container-fluid -->
						</div><!-- /.item -->	
					@endforeach

				</div><!-- /.owl-carousel -->
			</div>
						
<!-- ========================================= SECTION – HERO : END ========================================= -->	

			<!-- ============================================== INFO BOXES ============================================== -->
			<div class="info-boxes wow fadeInUp">
				<div class="info-boxes-inner">
					<div class="row">
						<div class="col-md-6 col-sm-4 col-lg-4">
							<div class="info-box">
								<div class="row">
									
									<div class="col-xs-12">
										<h4 class="info-box-heading green">money back</h4>
									</div>
								</div>	
								<h6 class="text">30 Days Money Back Guarantee</h6>
							</div>
						</div><!-- .col -->

						<div class="hidden-md col-sm-4 col-lg-4">
							<div class="info-box">
								<div class="row">
									
									<div class="col-xs-12">
										<h4 class="info-box-heading green">free shipping</h4>
									</div>
								</div>
								<h6 class="text">Shipping on orders over $99</h6>	
							</div>
						</div><!-- .col -->

						<div class="col-md-6 col-sm-4 col-lg-4">
							<div class="info-box">
								<div class="row">
									
									<div class="col-xs-12">
										<h4 class="info-box-heading green">Special Sale</h4>
									</div>
								</div>
								<h6 class="text">Extra $5 off on all items </h6>	
							</div>
						</div><!-- .col -->
					</div><!-- /.row -->
				</div><!-- /.info-boxes-inner -->
				
			</div><!-- /.info-boxes -->
			<!-- ============================================== INFO BOXES : END ============================================== -->
			<!-- ============================================== SCROLL TABS ============================================== -->
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">@if(session()->get('language')=='bangla')নতুন পন্নসমুহ @else New Products @endif</h3>
	   <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
		   <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab"> @if(session()->get('language')=='bangla') সকল @else All @endif</a></li>{{-- aikhny #all acy nicy hash cara all dawa lagby naily kaj korbe na  --}}
		   @foreach ($categories as $categorie)
		   		<li><a data-transition-type="backSlide" href="#categorie{{ $categorie->id }}" data-toggle="tab">@if(session()->get('language')=='bangla'){{ $categorie->category_name_bn }} @else {{ $categorie->category_name_en }} @endif</a></li>{{--  #categorie{{ $categorie->id }} aita dara category wise product show korty id nilam , ataw all ar moto kahini --}}
		   @endforeach
		</ul><!-- /.nav-tabs -->
	</div>
	<div class="tab-content outer-top-xs">
		<div class="tab-pane in active" id="all">			
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
					@foreach ($products as $product)
						<div class="item item-carousel">
							<div class="products">				
								<div class="product">		
									<div class="product-image">
										<div class="image">
											<a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thambnail) }}" alt=""></a>
										</div><!-- /.image -->
										@php                                           
										$amount=$product->selling_price-$product->discount_price;
										$dis=($amount/$product->selling_price)*100;                                                                                       
										@endphp
										<div class="tag new">
											@if($product->discount_price==null)
													@if(session()->get('language')=='bangla')
													<span>ণতুন</span>
													@else 
													<span>new</span>
													@endif
												@else 
													@if(session()->get('language')=='bangla')
													<span>{{ bn_price(round($dis)) }}৳</span>
													@else 
													<span>{{ round($dis) }}tk</span>
													@endif 
											@endif
										</div>                        		   
									</div><!-- /.product-image -->
										<div class="product-info text-left">
											<h3 class="name"><a href="detail.html">
												@if(session()->get('language')=='bangla')
													{{ $product->product_name_bn }}
												@else 
													{{ $product->product_name_en }}
												@endif
											</a></h3>
											<div class="rating rateit-small"></div>
											<div class="description"></div>
												<div class="product-price">	
													@if($product->discount_price==null)
														@if(session()->get('language')=='bangla')
														<span class="price">{{ bn_price($product->selling_price) }}৳</span>
														@else 
														<span class="price">{{ $product->selling_price }}tk</span>
														@endif
													@else 
														@if(session()->get('language')=='bangla')
														<span class="price">{{ bn_price($product->discount_price) }}৳</span>
														<span class="price-before-discount">{{ bn_price($product->selling_price) }}৳</span>
														@else 
														<span class="price">{{ $product->discount_price }}tk</span>
														<span class="price-before-discount">{{ $product->selling_price }}tk</span>
														@endif
													@endif															
												</div><!-- /.product-price -->								
										</div><!-- /.product-info -->
										<div class="cart clearfix animate-effect">
											<div class="action">
												<ul class="list-unstyled">
													<li class="add-cart-button btn-group">
														<button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
															<i class="fa fa-shopping-cart"></i>													
														</button>
														<button class="btn btn-primary cart-btn" type="button">@if(session()->get('language')=='bangla')কার্ট এ যুক্ত করুন @else Add to cart @endif</button>
																				
													</li>
												
													<li class="lnk wishlist">
														<a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
															<i class="icon fa fa-heart"></i>
														</a>
													</li>

													<li class="lnk">
														<a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
															<i class="fa fa-signal" aria-hidden="true"></i>
														</a>
													</li>
												</ul>
											</div><!-- /.action -->
										</div><!-- /.cart -->
								</div><!-- /.product -->					
							</div><!-- /.products -->
						</div><!-- /.item -->
					@endforeach
				</div><!-- /.home-owl-carousel -->
			</div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->
		{{-- nicher code ta buija kora acy  --}}
		@foreach ($categories as $categorie)
			<div class="tab-pane" id="categorie{{ $categorie->id }}">
				<div class="product-slider">
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">	
						@php
							$catwiseproduct=App\Models\Product::where('category_id',$categorie->id)->orderBy('id','DESC')->get();
						@endphp
						@forelse ($catwiseproduct as $product)
							<div class="item item-carousel">
								<div class="products">				
									<div class="product">		
										<div class="product-image">
											<div class="image">
												<a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thambnail) }}" alt=""></a>
											</div><!-- /.image -->
											@php                                           
											$amount=$product->selling_price-$product->discount_price;
											$dis=($amount/$product->selling_price)*100;                                                                                       
											@endphp
											<div class="tag new">
												@if($product->discount_price==null)
														@if(session()->get('language')=='bangla')
														<span>ণতুন</span>
														@else 
														<span>new</span>
														@endif
													@else 
														@if(session()->get('language')=='bangla')
														<span>{{ bn_price(round($dis)) }}৳</span>
														@else 
														<span>{{ round($dis) }}tk</span>
														@endif 
												@endif
											</div>                        		   
										</div><!-- /.product-image -->
											<div class="product-info text-left">
												<h3 class="name"><a href="detail.html">
													@if(session()->get('language')=='bangla')
														{{ $product->product_name_bn }}
													@else 
														{{ $product->product_name_en }}
													@endif
												</a></h3>
												<div class="rating rateit-small"></div>
												<div class="description"></div>
													<div class="product-price">	
														@if($product->discount_price==null)
															@if(session()->get('language')=='bangla')
															<span class="price">{{ bn_price($product->selling_price) }}৳</span>
															@else 
															<span class="price">{{ $product->selling_price }}tk</span>
															@endif
														@else 
															@if(session()->get('language')=='bangla')
															<span class="price">{{ bn_price($product->discount_price) }}৳</span>
															<span class="price-before-discount">{{ bn_price($product->selling_price) }}৳</span>
															@else 
															<span class="price">{{ $product->discount_price }}tk</span>
															<span class="price-before-discount">{{ $product->selling_price }}tk</span>
															@endif
														@endif															
													</div><!-- /.product-price -->								
											</div><!-- /.product-info -->
											<div class="cart clearfix animate-effect">
												<div class="action">
													<ul class="list-unstyled">
														<li class="add-cart-button btn-group">
															<button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
																<i class="fa fa-shopping-cart"></i>													
															</button>
															<button class="btn btn-primary cart-btn" type="button">@if(session()->get('language')=='bangla')কার্ট এ যুক্ত করুন @else Add to cart @endif</button>
																					
														</li>
													
														<li class="lnk wishlist">
															<a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
																<i class="icon fa fa-heart"></i>
															</a>
														</li>

														<li class="lnk">
															<a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
																<i class="fa fa-signal" aria-hidden="true"></i>
															</a>
														</li>
													</ul>
												</div><!-- /.action -->
											</div><!-- /.cart -->
									</div><!-- /.product -->					
								</div><!-- /.products -->
							</div><!-- /.item -->
						@empty 
							<span class="text-danger">@if(session()->get('language')=='bangla') দুঃখিত-পন্ন নাই @else No Product Found @endif</span>	
						@endforelse
					</div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->
		@endforeach
	</div><!-- /.tab-content -->
</div><!-- /.scroll-tabs -->
			<!-- ============================================== SCROLL TABS : END ============================================== -->
			<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-xs">
	<div class="row">
<div class="col-md-7 col-sm-7">
<div class="wide-banner cnt-strip">
<div class="image">
<img class="img-responsive" src="{{asset('f')}}/assets/images/banners/home-banner1.jpg" alt="">
</div>

</div><!-- /.wide-banner -->
</div><!-- /.col -->
<div class="col-md-5 col-sm-5">
<div class="wide-banner cnt-strip">
<div class="image">
<img class="img-responsive" src="{{asset('f')}}/assets/images/banners/home-banner2.jpg" alt="">
</div>

</div><!-- /.wide-banner -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.wide-banners -->

			<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
			<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">@if(session()->get('language')=='bangla') ফিচারদ প্রোডাক্ট @else Featured products @endif</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
		@foreach ($featured as $product)
			<div class="item item-carousel">
				<div class="products">				
					<div class="product">		
						<div class="product-image">
							<div class="image">
								<a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thambnail) }}" alt=""></a>
							</div><!-- /.image -->
							@php                                           
							$amount=$product->selling_price-$product->discount_price;
							$dis=($amount/$product->selling_price)*100;                                                                                       
							@endphp
							<div class="tag new">
								@if($product->discount_price==null)
										@if(session()->get('language')=='bangla')
										<span>ণতুন</span>
										@else 
										<span>new</span>
										@endif
									@else 
										@if(session()->get('language')=='bangla')
										<span>{{ bn_price(round($dis)) }}৳</span>
										@else 
										<span>{{ round($dis) }}tk</span>
										@endif 
								@endif
							</div>                        		   
						</div><!-- /.product-image -->
							<div class="product-info text-left">
								<h3 class="name"><a href="detail.html">
									@if(session()->get('language')=='bangla')
										{{ $product->product_name_bn }}
									@else 
										{{ $product->product_name_en }}
									@endif
								</a></h3>
								<div class="rating rateit-small"></div>
								<div class="description"></div>
									<div class="product-price">	
										@if($product->discount_price==null)
											@if(session()->get('language')=='bangla')
											<span class="price">{{ bn_price($product->selling_price) }}৳</span>
											@else 
											<span class="price">{{ $product->selling_price }}tk</span>
											@endif
										@else 
											@if(session()->get('language')=='bangla')
											<span class="price">{{ bn_price($product->discount_price) }}৳</span>
											<span class="price-before-discount">{{ bn_price($product->selling_price) }}৳</span>
											@else 
											<span class="price">{{ $product->discount_price }}tk</span>
											<span class="price-before-discount">{{ $product->selling_price }}tk</span>
											@endif
										@endif															
									</div><!-- /.product-price -->								
							</div><!-- /.product-info -->
							<div class="cart clearfix animate-effect">
								<div class="action">
									<ul class="list-unstyled">
										<li class="add-cart-button btn-group">
											<button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#cart_modal" id="{{ $product->id }}" onclick="productview(this.id)"> 
												<i class="fa fa-shopping-cart"></i>													
											</button>
											<button class="btn btn-primary cart-btn" type="button">@if(session()->get('language')=='bangla')কার্ট এ যুক্ত করুন @else Add to cart @endif</button>
																	
										</li>
									
										
											<button  class="btn btn-primary icon" type="button" title="Add To Wish-List"  id="{{ $product->id }}" onclick="add_to_wish_list(this.id)"> 
												<i class="icon fa fa-heart"></i>												
											</button>
										

										<li class="lnk">
											<a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
												<i class="fa fa-signal" aria-hidden="true"></i>
											</a>
										</li>
									</ul>
								</div><!-- /.action -->
							</div><!-- /.cart -->
					</div><!-- /.product -->					
				</div><!-- /.products -->
			</div><!-- /.item -->
		@endforeach	
	</div>	
</section><!-- /.section -->

{{-- skip_product_0_start --}}
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">{{ $skip_category_0->category_name_en }}</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
		@foreach ($skip_product_0 as $product)
			<div class="item item-carousel">
				<div class="products">				
					<div class="product">		
						<div class="product-image">
							<div class="image">
								<a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thambnail) }}" alt=""></a>
							</div><!-- /.image -->
							@php                                           
							$amount=$product->selling_price-$product->discount_price;
							$dis=($amount/$product->selling_price)*100;                                                                                       
							@endphp
							<div class="tag new">
								@if($product->discount_price==null)
										@if(session()->get('language')=='bangla')
										<span>ণতুন</span>
										@else 
										<span>new</span>
										@endif
									@else 
										@if(session()->get('language')=='bangla')
										<span>{{ bn_price(round($dis)) }}৳</span>
										@else 
										<span>{{ round($dis) }}tk</span>
										@endif 
								@endif
							</div>                        		   
						</div><!-- /.product-image -->
							<div class="product-info text-left">
								<h3 class="name"><a href="detail.html">
									@if(session()->get('language')=='bangla')
										{{ $product->product_name_bn }}
									@else 
										{{ $product->product_name_en }}t
									@endif
								</a></h3>
								<div class="rating rateit-small"></div>
								<div class="description"></div>
									<div class="product-price">	
										@if($product->discount_price==null)
											@if(session()->get('language')=='bangla')
											<span class="price">{{ bn_price($product->selling_price) }}৳</span>
											@else 
											<span class="price">{{ $product->selling_price }}tk</span>
											@endif
										@else 
											@if(session()->get('language')=='bangla')
											<span class="price">{{ bn_price($product->discount_price) }}৳</span>
											<span class="price-before-discount">{{ bn_price($product->selling_price) }}৳</span>
											@else 
											<span class="price">{{ $product->discount_price }}tk</span>
											<span class="price-before-discount">{{ $product->selling_price }}tk</span>
											@endif
										@endif															
									</div><!-- /.product-price -->								
							</div><!-- /.product-info -->
							<div class="cart clearfix animate-effect">
								<div class="action">
									<ul class="list-unstyled">
										<li class="add-cart-button btn-group">
											<button class="btn btn-primary icon" type="button" title="Add Cart" >
												<i class="fa fa-shopping-cart"></i>													
											</button>
											<button class="btn btn-primary cart-btn" type="button">@if(session()->get('language')=='bangla')কার্ট এ যুক্ত করুন @else Add to cart @endif</button>
																	
										</li>
									
										<li class="lnk wishlist">
											<a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
												<i class="icon fa fa-heart"></i>
											</a>
										</li>

										<li class="lnk">
											<a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
												<i class="fa fa-signal" aria-hidden="true"></i>
											</a>
										</li>
									</ul>
								</div><!-- /.action -->
							</div><!-- /.cart -->
					</div><!-- /.product -->					
				</div><!-- /.products -->
			</div><!-- /.item -->
		@endforeach	
	</div>	
</section><!-- /.section -->
{{-- skip_product_0_end --}}

{{-- skip_brandproduct_0_start --}}
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">@if(session()->get('language')=='bangla') {{ $skip_brand_0->brand_name_bn }} @else {{ $skip_brand_0->brand_name_en }} @endif</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
		@foreach ($skip_brandproduct_0 as $product)
			<div class="item item-carousel">
				<div class="products">				
					<div class="product">		
						<div class="product-image">
							<div class="image">
								<a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thambnail) }}" alt=""></a>
							</div><!-- /.image -->
							@php                                           
							$amount=$product->selling_price-$product->discount_price;
							$dis=($amount/$product->selling_price)*100;                                                                                       
							@endphp
							<div class="tag new">
								@if($product->discount_price==null)
										@if(session()->get('language')=='bangla')
										<span>ণতুন</span>
										@else 
										<span>new</span>
										@endif
									@else 
										@if(session()->get('language')=='bangla')
										<span>{{ bn_price(round($dis)) }}৳</span>
										@else 
										<span>{{ round($dis) }}tk</span>
										@endif 
								@endif
							</div>                        		   
						</div><!-- /.product-image -->
							<div class="product-info text-left">
								<h3 class="name"><a href="detail.html">
									@if(session()->get('language')=='bangla')
										{{ $product->product_name_bn }}
									@else 
										{{ $product->product_name_en }}t
									@endif
								</a></h3>
								<div class="rating rateit-small"></div>
								<div class="description"></div>
									<div class="product-price">	
										@if($product->discount_price==null)
											@if(session()->get('language')=='bangla')
											<span class="price">{{ bn_price($product->selling_price) }}৳</span>
											@else 
											<span class="price">{{ $product->selling_price }}tk</span>
											@endif
										@else 
											@if(session()->get('language')=='bangla')
											<span class="price">{{ bn_price($product->discount_price) }}৳</span>
											<span class="price-before-discount">{{ bn_price($product->selling_price) }}৳</span>
											@else 
											<span class="price">{{ $product->discount_price }}tk</span>
											<span class="price-before-discount">{{ $product->selling_price }}tk</span>
											@endif
										@endif															
									</div><!-- /.product-price -->								
							</div><!-- /.product-info -->
							<div class="cart clearfix animate-effect">
								<div class="action">
									<ul class="list-unstyled">
										<li class="add-cart-button btn-group">
											<button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart" >
												<i class="fa fa-shopping-cart"></i>													
											</button>
											<button class="btn btn-primary cart-btn" type="button">@if(session()->get('language')=='bangla')কার্ট এ যুক্ত করুন @else Add to cart @endif</button>
																	
										</li>
									
										<li class="lnk wishlist">
											<a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
												<i class="icon fa fa-heart"></i>
											</a>
										</li>

										<li class="lnk">
											<a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
												<i class="fa fa-signal" aria-hidden="true"></i>
											</a>
										</li>
									</ul>
								</div><!-- /.action -->
							</div><!-- /.cart -->
					</div><!-- /.product -->					
				</div><!-- /.products -->
			</div><!-- /.item -->
		@endforeach	
	</div>	
</section><!-- /.section -->
{{-- skip_brandproduct_0_end --}}
			<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
			<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-xs">
	<div class="row">

		<div class="col-md-12">
			<div class="wide-banner cnt-strip">
				<div class="image">
					<img class="img-responsive" src="{{asset('f')}}/assets/images/banners/home-banner.jpg" alt="">
				</div>	
				<div class="strip strip-text">
					<div class="strip-inner">
						<h2 class="text-right">New Mens Fashion<br>
						<span class="shopping-needs">Save up to 40% off</span></h2>
					</div>	
				</div>
				<div class="new-label">
				    <div class="text">NEW</div>
				</div><!-- /.new-label -->
			</div><!-- /.wide-banner -->
		</div><!-- /.col -->

	</div><!-- /.row -->
</div><!-- /.wide-banners -->
<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
			<!-- ============================================== BEST SELLER ============================================== -->

		<div class="best-deal wow fadeInUp outer-bottom-xs">
			<h3 class="section-title">Best seller</h3>
			<div class="sidebar-widget-body outer-top-xs">
				<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
					<div class="item">
						<div class="products best-product">
							{{-- a1 --}}
								<div class="product">
									<div class="product-micro">
										<div class="row product-micro-row">
											<div class="col col-xs-5">
												<div class="product-image">
													<div class="image">
														<a href="#">
															<img src="{{asset('f')}}/assets/images/products/p20.jpg" alt="">
														</a>					
													</div><!-- /.image -->
												</div><!-- /.product-image -->
											</div><!-- /.col -->
											<div class="col2 col-xs-7">
												<div class="product-info">
													<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
													<div class="rating rateit-small"></div>
													<div class="product-price">	
													<span class="price">$450.99	</span>
													
												</div><!-- /.product-price -->
												
												</div>
											</div><!-- /.col -->
										</div><!-- /.product-micro-row -->
									</div><!-- /.product-micro -->
								</div>
							{{-- a2 --}}
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- ============================================== BEST SELLER : END ============================================== -->	

			<!-- ============================================== BLOG SLIDER ============================================== -->
<section class="section latest-blog outer-bottom-vs wow fadeInUp">
	<h3 class="section-title">latest form blog</h3>
	<div class="blog-slider-container outer-top-xs">
		<div class="owl-carousel blog-slider custom-carousel">
													
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset('f')}}/assets/images/blog-post/post1.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>	
							<span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
												
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset('f')}}/assets/images/blog-post/post2.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
												
				<!-- /.item -->
			
												
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset('f')}}/assets/images/blog-post/post1.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
												
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset('f')}}/assets/images/blog-post/post2.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-left">
						<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
												
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset('f')}}/assets/images/blog-post/post1.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
						
		</div><!-- /.owl-carousel -->
	</div><!-- /.blog-slider-container -->
</section><!-- /.section -->
<!-- ============================================== BLOG SLIDER : END ============================================== -->	

			<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section wow fadeInUp new-arriavls">
	<h3 class="section-title">New Arrivals</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
	    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('f')}}/assets/images/products/p19.jpg" alt=""></a>
			</div><!-- /.image -->			

			<div class="tag new"><span>new</span></div>                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('f')}}/assets/images/products/p28.jpg" alt=""></a>
			</div><!-- /.image -->			

			<div class="tag new"><span>new</span></div>                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('f')}}/assets/images/products/p30.jpg" alt=""></a>
			</div><!-- /.image -->			

			                        <div class="tag hot"><span>hot</span></div>		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('f')}}/assets/images/products/p1.jpg" alt=""></a>
			</div><!-- /.image -->			

			                        <div class="tag hot"><span>hot</span></div>		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('f')}}/assets/images/products/p2.jpg" alt=""></a>
			</div><!-- /.image -->			

			            <div class="tag sale"><span>sale</span></div>            		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('f')}}/assets/images/products/p3.jpg" alt=""></a>
			</div><!-- /.image -->			

			            <div class="tag sale"><span>sale</span></div>            		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

		</div><!-- /.homebanner-holder -->
		<!-- ============================================== CONTENT : END ============================================== -->
	</div><!-- /.row -->
@endsection