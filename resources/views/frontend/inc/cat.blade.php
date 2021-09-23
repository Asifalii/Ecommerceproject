@php
    $categories=App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            @foreach ($categories as $categorie)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>
                        @if (session()->get('language')=='bangla') {{ $categorie->category_name_bn }} @else  {{ $categorie->category_name_en }} @endif </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $subcategories=App\Models\Subcategory::where('category_id',$categorie->id)->orderBy('subcategory_name_en','ASC')->get();
                                @endphp
                                @foreach ($subcategories as $cat)
                                    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">	
                                        <a href="">
                                            <h2 class="title">@if(session()->get('language')=='bangla') {{ $cat->subcategory_name_bn }} @else {{ $cat->subcategory_name_en }} @endif </h2>	
                                        </a>	
                                        @php
                                            $subsubcategories=App\Models\Subsubcategory::where('subcategory_id',$cat->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                        @endphp		
                                        @foreach ($subsubcategories as $cat)	
                                            <ul class="links list-unstyled">  
                                                <li><a href="#">@if(session()->get('language')=='bangla') {{ $cat->subsubcategory_name_bn }} @else {{ $cat->subsubcategory_name_en }} @endif</a></li>
                                            </ul>
                                        @endforeach			
                                    </div><!-- /.col -->
                                @endforeach								
                            </div><!-- /.row -->
                        </li><!-- /.yamm-content -->                    
                    </ul><!-- /.dropdown-menu -->            
                </li><!-- /.menu-item --> 
            @endforeach         
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->