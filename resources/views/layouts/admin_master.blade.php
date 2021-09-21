<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>E-com</title>

    <!-- vendor css -->
    <link href="{{asset('b')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('b')}}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('b')}}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{asset('b')}}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="{{asset('b')}}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{asset('b')}}/lib/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" integrity="sha512-3uVpgbpX33N/XhyD3eWlOgFVAraGn3AfpxywfOTEQeBDByJ/J7HkLvl4mJE1fvArGh4ye1EiPfSBnJo2fgfZmg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('b')}}/lib/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="{{asset('b')}}/lib/spectrum/spectrum.css" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('b')}}/css/starlight.css">
    
    <!-- toster link -->
    
    {{-- sweet alert css --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('admin.inc.left_bar')

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
        <div class="sl-header-left">
            <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i
                        class="icon ion-navicon-round"></i></a></div>
            <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                        class="icon ion-navicon-round"></i></a></div>
        </div><!-- sl-header-left -->
        <div class="sl-header-right">
            <nav class="nav">
                <div class="dropdown">
                    <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                        <span class="logged-name"><span class="hidden-md-down">{{ (Auth::user()->name) }}</span></span>
                        <img src="{{ asset(Auth::user()->image) }}" class="wd-32 rounded-circle" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-header wd-200">
                        <ul class="list-unstyled user-profile-nav">
                            <li><a href="{{ route('admin_profile') }}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                            <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="icon ion-power"></i> {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div><!-- dropdown-menu -->
                </div><!-- dropdown -->
            </nav>
            <div class="navicon-right">
                <a id="btnRightMenu" href="" class="pos-relative">
                    <i class="icon ion-ios-bell-outline"></i>
                    <!-- start: if statement -->
                    <span class="square-8 bg-danger"></span>
                    <!-- end: if statement -->
                </a>
            </div><!-- navicon-right -->
        </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
        <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
            </li>
        </ul><!-- sidebar-tabs -->

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
                <div class="media-list">
                    <!-- loop starts here -->
                    <a href="" class="media-list-link">
                        <div class="media">
                            <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                                <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                                <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire
                                    soul, like these sweet mornings of spring.</p>
                            </div>
                        </div><!-- media -->
                    </a>
                    <!-- loop ends here -->
                    <a href="" class="media-list-link">
                        <div class="media">
                            <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                                <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                                <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link">
                        <div class="media">
                            <img src="../img/img7.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                                <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                                <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the
                                    present moment...</p>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link">
                        <div class="media">
                            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                                <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                                <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around
                                    me, and the meridian sun strikes...</p>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link">
                        <div class="media">
                            <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                                <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                                <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire
                                    soul, like these sweet mornings of spring.</p>
                            </div>
                        </div><!-- media -->
                    </a>
                </div><!-- media-list -->
                <div class="pd-15">
                    <a href=""
                        class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View
                        More Messages</a>
                </div>
            </div><!-- #messages -->

            <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
                <div class="media-list">
                    <!-- loop starts here -->
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth
                                        Bungaos</strong> tagged you and 18 others in a post.</p>
                                <span class="tx-12">October 03, 2017 8:45am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <!-- loop ends here -->
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa
                                        Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The
                                        Social Network</strong></p>
                                <span class="tx-12">October 02, 2017 12:44am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong
                                        class="tx-medium tx-gray-800">Sale Group</strong></p>
                                <span class="tx-12">October 01, 2017 10:20pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius
                                        Erving</strong> wants to connect with you on your conversation with <strong
                                        class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                <span class="tx-12">October 01, 2017 6:08pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth
                                        Bungaos</strong> tagged you and 12 others in a post.</p>
                                <span class="tx-12">September 27, 2017 6:45am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong
                                        class="tx-medium tx-gray-800">Sale Group</strong></p>
                                <span class="tx-12">September 28, 2017 11:30pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa
                                        Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The
                                        Great Pyramid</strong></p>
                                <span class="tx-12">September 26, 2017 11:01am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius
                                        Erving</strong> wants to connect with you on your conversation with <strong
                                        class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                <span class="tx-12">September 23, 2017 9:19pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                </div><!-- media-list -->
            </div><!-- #notifications -->

        </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    @yield('admin_content')
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{asset('b')}}/lib/jquery/jquery.js"></script>
    <script src="{{asset('b')}}/lib/popper.js/popper.js"></script>
    <script src="{{asset('b')}}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{asset('b')}}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js" integrity="sha512-SXJkO2QQrKk2amHckjns/RYjUIBCI34edl9yh0dzgw3scKu0q4Bo/dUr+sGHMUha0j9Q1Y7fJXJMaBi4xtyfDw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('b')}}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    {{-- data table link add here ander below 3 of them  --}}
    <script src="{{asset('b')}}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('b')}}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{asset('b')}}/lib/select2/js/select2.min.js"></script>
    <script src="{{asset('b')}}/lib/spectrum/spectrum.js"></script>
    <script>
        $(function(){
  
          'use strict';
  
          $('.select2').select2({
            minimumResultsForSearch: Infinity
          });
  
          // Select2 by showing the search
          $('.select2-show-search').select2({
            minimumResultsForSearch: ''
          });
  
          // Select2 with tagging support
          $('.select2-tag').select2({
            tags: true,
            tokenSeparators: [',', ' ']
          });
  
          // Datepicker
          $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
          });
  
          $('#datepickerNoOfMonths').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            numberOfMonths: 2
          });
  
          // Color picker
          $('#colorpicker').spectrum({
            color: '#17A2B8'
          });
  
          $('#showAlpha').spectrum({
            color: 'rgba(23,162,184,0.5)',
            showAlpha: true
          });
  
          $('#showPaletteOnly').spectrum({
              showPaletteOnly: true,
              showPalette:true,
              color: '#DC3545',
              palette: [
                  ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
                  ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
              ]
          });
  
        });
      </script>
    <script>
        $(function(){
          'use strict';
  
          $('#datatable1').DataTable({
            responsive: true,
            language: {
              searchPlaceholder: 'Search...',
              sSearch: '',
              lengthMenu: '_MENU_ items/page',
            }
          });
  
         /*  $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
          });
  
          // Select2
          $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity }); */
  
        });
      </script>
{{-- data table end --}}  
    <script src="{{asset('b')}}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{asset('b')}}/lib/d3/d3.js"></script>
    <script src="{{asset('b')}}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{asset('b')}}/lib/chart.js/Chart.js"></script>
    <script src="{{asset('b')}}/lib/Flot/jquery.flot.js"></script>
    <script src="{{asset('b')}}/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{asset('b')}}/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{asset('b')}}/lib/flot-spline/jquery.flot.spline.js"></script>
    <script src="{{asset('b')}}/lib/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function(){
          'use strict';

          // Summernote editor
          $('#summernote').summernote({
            height: 150,
            tooltip: false
          })
          // Summernote2 editor
          $('#summernote2').summernote({
            height: 150,
            tooltip: false
          })
          // Summernote3 editor
          $('#summernote3').summernote({
            height: 150,
            tooltip: false
          })
          // Summernote4 editor
          $('#summernote4').summernote({
            height: 150,
            tooltip: false
          })
        });
      </script>
    <script src="{{asset('b')}}/js/starlight.js"></script>
    <script src="{{asset('b')}}/js/ResizeSensor.js"></script>
    <script src="{{asset('b')}}/js/dashboard.js"></script>
    <script src="{{ asset('b') }}/lib/highlightjs/highlight.pack.js"></script>

    

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
{{-- sweet alert js --}}
<script src={{asset("https://unpkg.com/sweetalert/dist/sweetalert.min.js")}}></script>
        <script>
            $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            } else {
                swal("Your data is safe!");
            }
            });
        });
        </script>
</body>

</html>