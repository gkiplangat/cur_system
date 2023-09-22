<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    @include('admin.stylesheet')
</head>

<body>
    
    @include('admin.navigation')

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Product</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
        @if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif


@if ($errors->any())
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     @foreach ($errors->all() as $error)
      
         {{$error}}
      
     @endforeach
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>   
 @endif

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                       <form action="{{ route('admin.edit-product') }}" method="post" id="setting_form" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}
                        @endif
                        <div class="row bg-white">
                           
                           
                           
                           <div class="col-md-6">
                           
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Product Name <span class="require">*</span></label>
                                               <input id="product_name" name="product_name" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->product_name }}">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Short Description<span class="require">*</span></label>
                                                
                                            <textarea id="product_short_desc" name="product_short_desc" type="text" cols="30" rows="5" class="form-control" data-bvalidator="required,maxlen[120]">{{ $edit['view']->product_short_desc }}</textarea>
                                            </div>
                                                
                                            
                                                                                      
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Description <span class="require">*</span></label>
                                                <textarea name="product_desc" id="summary-ckeditor" cols="30" rows="5" class="form-control" data-bvalidator="required">{{ html_entity_decode($edit['view']->product_desc) }}</textarea>
                                                
                                            </div>   
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Category <span class="require">*</span></label>
                                                <select name="product_category" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                @foreach($category['view'] as $category)
                                                <option value="{{ $category->cat_id }}" @if($edit['view']->product_category == $category->cat_id) selected @endif>{{ $category->category_name }}</option>
                                                @endforeach
                                                </select>
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Regular Price <span class="require">*</span></label>
                                               <input id="product_regular_price" name="product_regular_price" type="text" class="form-control" data-bvalidator="min[1],required" value="{{ $edit['view']->product_regular_price }}">
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Offer Price</label>
                                               <input id="product_offer_price" name="product_offer_price" type="text" class="form-control" data-bvalidator="min[0]" value="{{ $edit['view']->product_offer_price }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Tags</label>
                                                
                                                <textarea name="product_tag" id="product_tag" cols="30" rows="5" class="form-control">{{ $edit['view']->product_tag }}</textarea><small>(tag separated by commas)</small>
                                            </div> 
                                                                                       
                                         
                                    
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Available Quantity (stock)</label>
                                               <input id="product_stock" name="product_stock" type="text" class="form-control" data-bvalidator="digit" value="{{ $edit['view']->product_stock }}">
                                            </div>
                                    
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Shipping Fee</label>
                                               <input id="product_shipping" name="product_shipping" type="text" class="form-control" data-bvalidator="min[0]" value="{{ $edit['view']->product_shipping }}">
                                               <small>(if <strong>0 or Empty</strong> field free shipping)</small>
                                            </div>
                                    
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Featured Image</label>
                                                <input type="file" id="product_featured_image" name="product_featured_image" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                                
                                                @if($edit['view']->product_featured_image !='')
                                                    <img src="{{ url('/') }}/public/storage/products/{{ $edit['view']->product_featured_image }}" alt="{{ $edit['view']->product_featured_image }}" class="image-size">
                                                    @else
                                                    <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $edit['view']->product_featured_image }}" class="image-size">
                                                    @endif
                                            </div> 
                                       
                                       
                                       <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Gallery Images (multiple)</label>
                                                
                                               <input type="file" id="product_image" name="product_image[]" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" multiple> <br/>@foreach($product['images'] as $product)
                                                    
                                                    <span><img src="{{ url('/') }}/public/storage/products/{{ $product->product_image }}" alt="{{ $product->product_image }}" class="image-size">
                                                    <a href="{{ url('/admin/edit-product') }}/dropimg/{{ base64_encode($product->product_image_id) }}" onClick="return confirm('Are you sure you want to delete?');" class="red-color"><i class="fa fa-trash-o"></i></a>
                                                    </span>
                                                    
                                                    @endforeach
                                                
                                            </div>
                                            
                                    <div class="clear-fix"></div>
                                     <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status?<span class="require">*</span></label>
                                                <select name="product_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['view']->product_status == 1) selected @endif>Active</option>
                                                <option value="0" @if($edit['view']->product_status == 0) selected @endif>InActive</option>
                                                </select>
                                                
                                            </div>
                                                    
                            <input type="hidden" name="image_size" value="{{ $allsettings->site_max_image_size }}">
                            <input type="hidden" name="save_product_featured_image" value="{{ $edit['view']->product_featured_image }}">
                            <input type="hidden" name="product_token" value="{{ $edit['view']->product_token }}">
                             </div>
                             </div>
                             
                             </div>
                            
                            
                            <div class="card-footer col-md-12">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                    
                                                    
                                                 
                            
                        </div> 

                    
                    </form> 
                    
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   @include('admin.javascript')


</body>

</html>
