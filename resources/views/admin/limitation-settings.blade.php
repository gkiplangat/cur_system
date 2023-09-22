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
                        <h1>Limitation Settings</h1>
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
                           <form action="{{ route('admin.limitation-settings') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                           
                                           <div class="form-group">
                                                <label for="product_per_page" class="control-label mb-1">Product per page<span class="require">*</span></label>
                                                <input id="product_per_page" name="product_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->product_per_page }}" data-bvalidator="required,min[1]">
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="comment_per_page" class="control-label mb-1">Event per page<span class="require">*</span></label>
                                                <input id="event_per_page" name="event_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->event_per_page }}" data-bvalidator="required,min[1]">
                                            </div>  
                                            
                                            
                                            <div class="form-group">
                                                <label for="blog_per_page" class="control-label mb-1">Blog per page<span class="require">*</span></label>
                                                <input id="blog_per_page" name="blog_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->blog_per_page }}" data-bvalidator="required,min[1]">
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="testimonial_per_page" class="control-label mb-1">Testimonial per page<span class="require">*</span></label>
                                                <input id="testimonial_per_page" name="testimonial_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->testimonial_per_page }}" data-bvalidator="required,min[1]">
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
                                                <label for="pastor_per_page" class="control-label mb-1">Pastor per page<span class="require">*</span></label>
                                                <input id="pastor_per_page" name="pastor_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->pastor_per_page }}" data-bvalidator="required,min[1]">
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="pastor_per_page" class="control-label mb-1">Sermon per page<span class="require">*</span></label>
                                                <input id="sermon_per_page" name="sermon_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->sermon_per_page }}" data-bvalidator="required,min[1]">
                                            </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="gallery_per_page" class="control-label mb-1">Gallery per page<span class="require">*</span></label>
                                                <input id="gallery_per_page" name="gallery_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->gallery_per_page }}" data-bvalidator="required,min[1]">
                                            </div> 
                                            
                                            
                                            
                                           <input type="hidden" name="eid" value="1">
                             
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
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
