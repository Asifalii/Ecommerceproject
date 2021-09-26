@php
    $hot_deals =App\Models\Product::where('hot_deals',1)->where('status',1)->where('discount_price','!=',null)->orderBy('id','DESC')->get();
@endphp
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
	<h3 class="section-title">@if (session()->get('language')=='bangla')লভনিও ডিল @else hot deals @endif</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
		@foreach ($hot_deals as $product)
		<div class="item">
			<div class="products">
				<div class="hot-deal-wrapper">
					<div class="image">
						<a href="{{ url('single/product/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thambnail) }}" alt=""></a>
					</div>
						@php                                           
							$amount=$product->selling_price-$product->discount_price;
							$dis=($amount/$product->selling_price)*100;                                                                                       
						@endphp
						<div class="sale-offer-tag">
							@if($product->discount_price==null)
									@if(session()->get('language')=='bangla')
									<span>ণতুন</span>
									@else 
									<span>Hot</span>
									@endif
								@else 
									@if(session()->get('language')=='bangla')
									<span>{{ bn_price(round($dis)) }}৳</span>
									@else 
									<span>{{ round($dis) }}tk</span>
									@endif 
							@endif
						</div>

					<div class="timing-wrapper">
						<div class="box-wrapper">
							<div class="date box">
								<span class="key">120</span>
								<span class="value">DAYS</span>
							</div>
						</div>
						<div class="box-wrapper hidden-md">
							<div class="seconds box">
								<span class="key">60</span>
								<span class="value">SEC</span>
							</div>
						</div>
					</div>
				</div><!-- /.hot-deal-wrapper -->

				<div class="product-info text-left m-t-20">
					<h3 class="name">
						<a href="detail.html">
						@if(session()->get('language')=='bangla')
							{{ $product->product_name_bn }}
						@else 
							{{ $product->product_name_en }}t
						@endif
					</a>
					</h3>
					<div class="rating rateit-small"></div>

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
						
						<div class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">@if(session()->get('language')=='bangla')কার্ট এ যুক্ত করুন @else Add to cart @endif</button>
													
						</div>
						
					</div><!-- /.action -->
				</div><!-- /.cart -->
			</div>	
		</div>
		@endforeach	
	</div>
</div>	  