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
                        <h1>Product Section</h1>
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
                       
                        
                        
                      
                        <div class="card">
                           @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                           <form action="{{ route('admin.product-section') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                          
                           <div class="col-md-12">
                          
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                          
                              <div class="form-group">
                                                    <label for="site_title" class="control-label mb-1">Product Section <span class="require">*</span></label>
                                                                                                    
                                                    <select name="site_product_display" class="form-control" data-bvalidator="required">
                                                    <option value=""></option>
                                                    <option value="1" @if($setting['setting']->site_product_display == 1) selected @endif>Enable</option>
                                                    <option value="0" @if($setting['setting']->site_product_display == 0) selected @endif>Disable</option>
                                                    </select>
                                                    
                                                </div>
                                                
                                             
                                       </div>
                                    </div>
                                </div>                
                          
                          
                          </div>
                          
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Product Heading</label>
                                                <input id="site_product_heading" name="site_product_heading" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_product_heading }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Product Sub Heading</label>
                                                <input id="site_product_sub_heading" name="site_product_sub_heading" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_product_sub_heading }}">
                                            </div>
                                            
                                           
                                                                                       
                                                                                       
                                           
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                     <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">How many Product Display on Homepage?</label>
                                                
                                            <input id="site_home_product" name="site_home_product" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_home_product }}" data-bvalidator="required"> 
                                            </div>
                             
                               
                                   <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Display Order</label><br/>
                                               
                                                <select name="site_home_product_order" class="form-control">
                                                <option value="asc" @if($setting['setting']->site_home_product_order == 'asc') selected @endif>ASC</option>
                                                <option value="desc" @if($setting['setting']->site_home_product_order == 'desc') selected @endif>DESC</option>
                                                </select>
                                                <small>(ASC - Ascending | DESC - Descending)</small>
                                             </div> 
                                  
                                            
                             
                             </div>
                                </div>

                            </div>
                            
                             <input type="hidden" name="sid" value="1">
                             
                             </div>
                             
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset </button>
                             </div>
                             
                             </div>
                             
                            
                            </form>
                            
                                                    
                                                    
                                                 
                            
                        </div> 

                     
                    
                    
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   @include('admin.javascript')


</body>

</html>
