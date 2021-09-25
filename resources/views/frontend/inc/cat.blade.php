{{-- ai category amra jokhn indexcontroller thekey compact kore pass korci tokhn ta akta view page ar jonno pathici , kintu aita onno view page tai php tag deay aivaby anay nawa laglo  --}}
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
                                @foreach ($subcategories as $subcat)
                                    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">	
                                        @if(session()->get('language')=='bangla')
                                            <a href="{{ url('subactegory/product/'.$subcat->id.'/'.$subcat->subcategory_slug_en) }}">
                                                <h2 class="title">{{ $subcat->subcategory_name_bn }}</h2>	
                                            </a>	
                                        @else 
                                            <a href="{{ url('subactegory/product/'.$subcat->id.'/'.$subcat->subcategory_slug_bn) }}">
                                                <h2 class="title">{{ $subcat->subcategory_name_en }}</h2>	
                                            </a>
                                        @endif 
                                        @php
                                            $subsubcategories=App\Models\Subsubcategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                        @endphp		
                                        @foreach ($subsubcategories as $subsubcat)	
                                        @if(session()->get('language')=='bangla')
                                            <ul class="links list-unstyled">  
                                                <li><a href="{{ url('sub/subactegory/product/'.$subsubcat->id.'/'.$subsubcat->subsubcategory_slug_bn) }}">{{ $subsubcat->subsubcategory_name_bn }}</a></li>
                                            </ul>
                                            @else 
                                                <ul class="links list-unstyled">  
                                                    <li><a href="{{ url('sub/subactegory/product/'.$subsubcat->id.'/'.$subsubcat->subsubcategory_slug_bn) }}">{{ $subsubcat->subsubcategory_name_en }}</a></li>
                                                </ul>
                                            @endif
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