<div class="sl-logo"><a href="{{ route('admin.dashboard') }}"><i class="icon ion-android-star-outline"></i> E-com </a></div>
<div class="sl-sideleft">

    <div class="sl-sideleft-menu">
        <a href="{{url('/')}}" class="sl-menu-link " target="blank">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Visite Site</span>
            </div>
        </a>

        <a href="{{ route('admin.dashboard') }}" class="sl-menu-link ">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
{{-- 
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>
        </ul> --}}

        <a href="{{ route('brands') }}" class="sl-menu-link  @yield('brands')" >
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Brands</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link  @yield('categories')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Category</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

     <ul class="sl-menu-sub nav flex-column ">
            <li class="nav-item"><a href="{{ route('Category') }}" class="nav-link @yield('sub_categori')">Add Categories</a></li>
            <li class="nav-item"><a href="{{ route('sub_Category') }}" class="nav-link @yield('sub_categori_1')">Sub-Categories</a></li>
        </ul>
        
    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->