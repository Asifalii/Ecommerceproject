@extends('layouts.admin_master')
@section('products') active show-sub @endsection
@section('product')active @endsection

@section('admin_content')
     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">SHopMama</a>
          <span class="breadcrumb-item active">Add Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Add product</h6>
              <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row row-sm">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="brand_id">
                              <option label="Choose one"></option>
                              @foreach ($brands as $brand)
                              <option value="{{ $brand->id }}">{{ ucwords($brand->brand_name_en) }}</option>
                              @endforeach
                            </select>
                            @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="category_id">
                              <option label="Choose one"></option>
                              @foreach ($category as $cat)
                              <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                              @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Sub-Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="subcategory_id">
                              <option label="Choose one"></option>
                             
                            </select>
                            @error('subcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Sub-SubCategory: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="subsubcategory_id">
                              {{-- <option label="Choose one"></option>
                              @foreach ($categories as $cat)
                              <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                              @endforeach --}}
                            </select>
                            @error('subsubcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name_en" value="" placeholder="Enter Product Name English">
                        @error('product_name_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name_bn" value="" placeholder="Product Name Bangla">
                        @error('product_name_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_code" value="" placeholder="Enter Product Code">
                        @error('product_code')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_qty" value="" placeholder="Enter Product Quantity">
                        @error('product_qty')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Tags English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_tags_en" value="" placeholder="Product Tags English" data-role="tagsinput">
                        @error('product_tags_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Tags Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_tags_bn" value="" placeholder="product tags bangla" data-role="tagsinput">
                        @error('product_tags_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Size English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_size_en" value="" placeholder="Product Size English" data-role="tagsinput">
                        @error('product_size_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Size Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_size_bn" value="" placeholder="Product Size Bangla" data-role="tagsinput">
                        @error('product_size_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Color English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_color_en" value="" placeholder="Product Color Rnglish" data-role="tagsinput">
                        @error('product_color_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Color Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_color_bn" value="" placeholder="Enter Product Color Bangla" data-role="tagsinput">
                        @error('product_color_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="selling_price" value="" placeholder="Selling Price">
                        @error('selling_price')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="discount_price" value="" placeholder="Discount Price">
                        @error('discount_price')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Main Thambnail: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="product_thambnail" value="" onchange="mainThambUrl(this)">
                        @error('product_thambnail')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <img src="" id="mainThmb">
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Multiple_image: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="multi_img[]" value="" multiple id="multiImg">
                        @error('multi_img')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                      <div class="row" id="preview_img" >
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Short Description English: <span class="tx-danger">*</span></label>
                        <textarea name="short_descp_en" id="summernote"></textarea>
                        @error('short_descp_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Short Description Bangla: <span class="tx-danger">*</span></label>
                        <textarea name="short_descp_bn" id="summernote2"></textarea>
                        @error('short_descp_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Long Description English: <span class="tx-danger">*</span></label>
                        <textarea name="long_descp_en" id="summernote3"></textarea>
                        @error('long_descp_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Long Description Bangla: <span class="tx-danger">*</span></label>
                        <textarea name="long_descp_bn" id="summernote4"></textarea>
                        @error('long_descp_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_deals" value="1"><span>Hot Deals</span>
                  </label>
                  </div>

                  <div class="col-md-4">
                    <label class="ckbox">
                      <input type="checkbox" name="featured" value="1"><span>Featured</span>
                    </label>
                    </div>

                    <div class="col-md-4">
                        <label class="ckbox">
                          <input type="checkbox" name="special_offer" value="1"><span>special_offer</span>
                        </label>
                    </div>

                    <div class="col-md-4">
                        <label class="ckbox">
                          <input type="checkbox" name="special_deals" value="1"><span>special_deals</span>
                        </label>
                    </div>

                  <div class="form-layout-footer mt-3">
                  <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Add Products</button>
                </div><!-- form-layout-footer -->
            </form>
            </div>
            </div><!-- row -->


    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
                if(category_id) {
                  $.ajax({
                      url: "{{  url('/admin/subcategory/ajax') }}/"+category_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
    
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
    
                            });
    
                      },
    
                  });
              } else {
                  alert('danger');
              }
    
          }); 


          $('select[name="subcategory_id"]').on('change', function(){
              var subcategory_id = $(this).val();
                    if(subcategory_id) {
                  $.ajax({
                      url: "{{  url('/admin/subsubcategory/ajax') }}/"+subcategory_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
    
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
    
                            });
    
                      },
    
                  });
              } else {
                  alert('danger');
              }
    
          }); 
    
    
      });
    
      </script>
@endsection