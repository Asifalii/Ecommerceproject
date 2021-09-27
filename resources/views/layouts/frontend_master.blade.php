<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; c
    harset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('f')}}/assets/css/bootstrap.min.css">
    <!-- toster link -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('f')}}/assets/css/main.css">
    <link rel="stylesheet" href="{{asset('f')}}/assets/css/blue.css">
    <link rel="stylesheet" href="{{asset('f')}}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('f')}}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{asset('f')}}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('f')}}/assets/css/rateit.css">
    <link rel="stylesheet" href="{{asset('f')}}/assets/css/bootstrap-select.min.css">




    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('f')}}/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <div class="top-bar animate-dropdown">
            <div class="container">
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                            <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                            <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                            <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                            
                            <li>
                                @auth
                                <a href="{{route('user.dashboard')}}"><i class="icon fa fa-lock"></i>
                                    @if (session()->get('language')== 'bangla')
                                    আমার প্রোফাইল
                                    @else
                                    My Profile</a>
                                    @endif
                                @else
                                <a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login/Register</a>
                                @endauth
                            </li>
                        </ul>
                    </div><!-- /.cnt-account -->

                    <div class="cnt-block">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span
                                        class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                    <span class="value">
                                        @if (session()->get('language')== 'bangla') 
                                        ভাষা পরিবরতন করুন 
                                        @else Language 
                                        @endif
                                    </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    @if (session()->get('language')== 'bangla')
                                    <li><a href="{{ route('english.language') }}">English</a></li>
                                    @else 
                                    <li><a href="{{ route('bangla.language') }}">বাংলা</a></li>
                                    @endif
                                   
                                                                        
                                </ul>
                            </li>
                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.cnt-cart -->
                    <div class="clearfix"></div>
                </div><!-- /.header-top-inner -->
            </div><!-- /.container -->
        </div><!-- /.header-top -->
        <!-- ============================================== TOP MENU : END ============================================== -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                        <!-- ============================================================= LOGO ============================================================= -->
                        <div class="logo">
                            <a href="{{url('/')}}">

                                <img src="{{asset('f')}}/assets/images/logo.png" alt="">

                            </a>
                        </div><!-- /.logo -->
                        <!-- ============================================================= LOGO : END ============================================================= -->
                    </div><!-- /.logo-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                        <!-- /.contact-row -->
                        <!-- ============================================================= SEARCH AREA ============================================================= -->
                        <div class="search-area">
                            <form>
                                <div class="control-group">

                                    <ul class="categories-filter animate-dropdown">
                                        <li class="dropdown">

                                            <a class="dropdown-toggle" data-toggle="dropdown"
                                                href="category.html">Categories <b class="caret"></b></a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li class="menu-header">Computer</li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Clothing</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Electronics</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Shoes</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Watches</a></li>

                                            </ul>
                                        </li>
                                    </ul>

                                    <input class="search-field" placeholder="Search here..." />

                                    <a class="search-button" href="#"></a>

                                </div>
                            </form>
                        </div><!-- /.search-area -->
                        <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                    </div><!-- /.top-search-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                        <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                        <div class="dropdown dropdown-cart">
                            <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </div>
                                    <div class="basket-item-count"><span class="count">2</span></div>
                                    <div class="total-price-basket">
                                        <span class="lbl">cart -</span>
                                        <span class="total-price">
                                            <span class="sign">$</span><span class="value">600.00</span>
                                        </span>
                                    </div>


                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="cart-item product-summary">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image">
                                                    <a href="detail.html"><img src="{{asset('f')}}/
                                                    assets/images/cart.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">

                                                <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a>
                                                </h3>
                                                <div class="price">$600.00</div>
                                            </div>
                                            <div class="col-xs-1 action">
                                                <a href="#"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div><!-- /.cart-item -->
                                    <div class="clearfix"></div>
                                    <hr>

                                    <div class="clearfix cart-total">
                                        <div class="pull-right">

                                            <span class="text">Sub Total :</span><span class='price'>$600.00</span>

                                        </div>
                                        <div class="clearfix"></div>

                                        <a href="checkout.html"
                                            class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                    </div><!-- /.cart-total-->


                                </li>
                            </ul><!-- /.dropdown-menu-->
                        </div><!-- /.dropdown-cart -->

                        <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                    </div><!-- /.top-cart-row -->
                </div><!-- /.row -->

            </div><!-- /.container -->

        </div><!-- /.main-header -->

        <!-- ============================================== NAVBAR ============================================== -->
        <div class="header-nav animate-dropdown">
            <div class="container">
                <div class="yamm navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="nav-bg-class">
                        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                            <div class="nav-outer">
                                <ul class="nav navbar-nav">
                                    <li class="active dropdown yamm-fw">
                                        <a href="{{url('/')}}" data-hover="dropdown" class="dropdown-toggle"
                                            data-toggle="dropdown">@if (session()->get('language')== 'bangla') হোম @else Home @endif</a>
                                    </li>
                                    {{-- ai $categories amra model dara call kory neay asllam , compact kore na , tai php tag neay kaj korlam  --}}
                                    @php
                                        $categories=App\Models\Category::orderBy('category_name_en','ASC')->get();
                                    @endphp
                                    @foreach ($categories as $cat)
                                    <li class="dropdown yamm mega-menu">
                                            @if (session()->get('language')== 'bangla')
                                            <a href="home.html" data-hover="dropdown" class="dropdown-toggle"
                                            data-toggle="dropdown">{{ $cat->category_name_bn }}</a>
                                            @else
                                            <a href="home.html" data-hover="dropdown" class="dropdown-toggle"
                                            data-toggle="dropdown">{{ $cat->category_name_en }}</a>
                                            @endif
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        {{-- where('category_id',$cat->id) ai j ai ctaegory_id ta model Category saty milay data anba akta , cause amder toa categoryr under ai subcategory milan lagby --}}
                                                        @php
                                                          $subcategories=App\Models\Subcategory::where('category_id',$cat->id)->orderBy('subcategory_name_en','ASC')->get();
                                                        @endphp
                                                        @foreach ($subcategories as $cat)                                                                                                
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                    @if (session()->get('language')== 'bangla')
                                                                        <a href="">
                                                                            <h2 class="title">{{ $cat->subcategory_name_bn }}</h2>
                                                                        </a>
                                                                    @else
                                                                            <h2 class="title">{{ $cat->subcategory_name_en }}</h2>
                                                                    @endif
                                                                                {{-- where('subcategory_id',$cat->id) akdom same javaby sub anlam , same method --}}
                                                                    @php
                                                                        $subsubcategories=App\Models\Subsubcategory::where('subcategory_id',$cat->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                                                    @endphp                                                                
                                                                    @foreach ($subsubcategories as $cat)                                                                   
                                                                    <ul class="links">
                                                                    @if (session()->get('language')== 'bangla')
                                                                        <li><a href="#">{{ $cat->subsubcategory_name_bn }}</a></li>                         
                                                                    @else
                                                                        <li><a href="#">{{ $cat->subsubcategory_name_en }}</a></li>                         
                                                                    @endif              
                                                                </ul>  
                                                                @endforeach                                        
                                                            </div><!-- /.col -->
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </li>
                                    <li class="dropdown  navbar-right special-menu">
                                        <a href="#">Todays offer</a>
                                    </li>
                                </ul><!-- /.navbar-nav -->
                                <div class="clearfix"></div>
                            </div><!-- /.nav-outer -->
                        </div><!-- /.navbar-collapse -->


                    </div><!-- /.nav-bg-class -->
                </div><!-- /.navbar-default -->
            </div><!-- /.container-class -->

        </div><!-- /.header-nav -->
        <!-- ============================================== NAVBAR : END ============================================== -->

    </header>

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            @yield('content')
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('layouts.inc_f_brand')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->




    <!-- ============================================================= FOOTER ============================================================= -->
    <footer id="footer" class="footer color-bg">


        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Contact Us</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body">
                            <ul class="toggle-footer" style="">
                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p>+(888) 123-4567<br>+(888) 456-7890</p>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <span><a href="#">flipmart@themesground.com</a></span>
                                    </div>
                                </li>

                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Customer Service</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a href="#" title="Contact us">My Account</a></li>
                                <li><a href="#" title="About us">Order History</a></li>
                                <li><a href="#" title="faq">FAQ</a></li>
                                <li><a href="#" title="Popular Searches">Specials</a></li>
                                <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Corporation</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a title="Your Account" href="#">About us</a></li>
                                <li><a title="Information" href="#">Customer Service</a></li>
                                <li><a title="Addresses" href="#">Company</a></li>
                                <li><a title="Addresses" href="#">Investor Relations</a></li>
                                <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Why Choose Us</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                                <li><a href="#" title="Blog">Blog</a></li>
                                <li><a href="#" title="Company">Company</a></li>
                                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright-bar">
            <div class="container">
                <div class="col-xs-12 col-sm-6 no-padding social">
                    <ul class="link">
                        <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                        <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                        <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="GooglePlus"></a></li>
                        <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                        <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a>
                        </li>
                        <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a>
                        </li>
                        <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 no-padding">
                    <div class="clearfix payment-methods">
                        <ul>
                            <li><img src="assets/images/payments/1.png" alt=""></li>
                            <li><img src="assets/images/payments/2.png" alt=""></li>
                            <li><img src="assets/images/payments/3.png" alt=""></li>
                            <li><img src="assets/images/payments/4.png" alt=""></li>
                            <li><img src="assets/images/payments/5.png" alt=""></li>
                        </ul>
                    </div><!-- /.payment-methods -->
                </div>
            </div>
        </div>
    </footer>
    <!-- ============================================================= FOOTER : END============================================================= -->
    
    {{--==================================================== product add model start =================================== --}}
    <!-- Modal -->
    <div class="modal fade" id="cart_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" id="closemodal">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card" style="width:16px;">
                                        <img src="" class="card-img-top" id="pimage"  alt="" style="height:200px;">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <ul class="list-group">
                                            <li class="list-group-item">Price:<strong class="text-danger">$<span id="price"></span></strong>
                                            <del id="oldprice"></del>
                                            </li>
                                            <li class="list-group-item">Product code:<strong id="pcode"></strong></li>
                                            <li class="list-group-item">Category:<strong id="category_id"></strong></li>
                                            <li class="list-group-item">Brand:<strong id="pbrand"></strong></li>
                                            <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="avilable" style="background: green; color:white;" ></span>
                                                <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color:white;"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_color_en">Select color</label>
                                        <select class="form-control" id="product_color_en"  name="product_color_en">
                                                                      
                                        </select>
                                      </div>

                                    <div class="form-group" id="sizearea">
                                        <label for="product_size_en">Select size</label>
                                        <select class="form-control" id="product_size_en" name="product_size_en">
                                                                          
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="qty">Quantinty</label>
                                        <input type="number" class="form-control" id="qty" aria-describedby="emailHelp" value="1" min="1">
                                      </div>
                                      <input type="hidden" id="product_id">
                                      <button type="submit" class="btn btn-primary" onclick="addtocart()">Add to cart</button>                                
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    </div>


{{--==================================================== product add model end =================================== --}}

    <!-- For demo purposes – can be removed on production -->


    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{asset('f')}}/assets/js/jquery-1.11.1.min.js"></script>

    <script src="{{asset('f')}}/assets/js/bootstrap.min.js"></script>

    <script src="{{asset('f')}}/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="{{asset('f')}}/assets/js/owl.carousel.min.js"></script>

    <script src="{{asset('f')}}/assets/js/echo.min.js"></script>
    <script src="{{asset('f')}}/assets/js/jquery.easing-1.3.min.js"></script>
    <script src="{{asset('f')}}/assets/js/bootstrap-slider.min.js"></script>
    <script src="{{asset('f')}}/assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="{{asset('f')}}/assets/js/lightbox.min.js"></script>
    <script src="{{asset('f')}}/assets/js/bootstrap-select.min.js"></script>
    <script src="{{asset('f')}}/assets/js/wow.min.js"></script>
    <script src="{{asset('f')}}/assets/js/scripts.js"></script>
    {{-- sweet alert 2 --}}
    <script src="http:////cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- toster js link -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    <script>
        @if(Session::has('message'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
            case 'info':
                  toastr.info("{{Session::get('message') }}");
                  break;
            case 'success':
                  toastr.success("{{Session::get('message') }}");
                  break;
            case 'warning':
                  toastr.warning("{{Session::get('message') }}");
                  break;   
            case 'error':
                  toastr.error("{{Session::get('message') }}");
                  break;  
          }
          @endif
      </script>
    {{-- ============================ Start show product in modal with ajax================= --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        function productview(id){ 
           $.ajax({
                type:'GET',
                url:'product/view/modal/'+id,
                dataType:'json',
                success:function(data){
                    /* akhny only product neay kaj korci tai .product */
                    $('#pname').text(data.product.product_name_en);
                    $('#price').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#category_id').text(data.product.category.category_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#pimage').attr('src','/'+data.product.product_thambnail);
                    $('#product_id').val(id);
                    $('#qty').val(1);

                    /* to check if there is any discount */
                    if (data.product.discount_price==null) {
                        $('#price').text('');
                        $('#oldprice').text('');
                        $('#price').text(data.product.selling_price);
                    }else{
                        $('#price').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);
                    }

                    /* stoc  is also dame like them  */
                    if (data.product.product_qty > 0) {
                        $('#avilable').text('');
                        $('#stockout').text('');
                        $('#avilable').text('avilable');
                    }else{
                        $('#avilable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    }

                    /* akhny only color , jahaetu multipale color thaty pare tai amder for each ar moto loop calty hby , ajax a aivaby chaly  */
                    $('select[name="product_color_en"]').empty();
                    $.each(data.product_color_en,function(key,value){
                        $('select[name="product_color_en"]').append('<option value="'+value+'">'+value+'</option>')
                    })

                    /* for size as like same color */
                    $('select[name="product_size_en"]').empty();
                    $.each(data.product_size_en,function(key,value){
                        $('select[name="product_size_en"]').append('<option value="'+value+'">'+value+'</option>')
                        if (data.product_size_en== "") {
                            $('#sizearea').hide();
                        } else {
                            $('#sizearea').show();
                        }
                    })
                }

           })
        }
        /* ================end show product in modal with ajax=========================== */
        /* ================start show add to cart with ajax =========================== */

        function addtocart(){
                        var pname=$('#pname').text();
                        var id=$('#product_id').val();
                        var product_color_en=$('#product_color_en option:selected').text();
                        var product_size_en=$('#product_size_en option:selected').text();
                        var qty=$('#qty').val();

                        $.ajax({
                            type:"POST",
                            dataType:'json',
                            data:{
                                product_color_en:product_color_en,
                                product_size_en:product_size_en,
                                qty:qty,
                                pname:pname
                            },
                            url:"/cart/data/store/"+id,
                            success:function(data){
                                $('#closemodal').click();
                                /* start message */
                                    const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    timer: 3000,
                                    })

                                    if($.isEmptyObject(data.error)){
                                            Toast.fire({
                                                type: 'success',
                                                icon: 'success',
                                                title: data.success
                                                    })
                                        }else{
                                            Toast.fire({
                                                type: 'error',
                                                icon: 'error',
                                                title: data.error
                                                
                                            })
                                        }
                                /* end message */
                              
                              }
                            })
                        }
        /* ================End show add to cart with ajax =========================== */

    </script>
    
</body>

</html>