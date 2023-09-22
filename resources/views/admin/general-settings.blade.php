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
                        <h1>General Settings</h1>
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
                           <form action="{{ route('admin.general-settings') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Name <span class="require">*</span></label>
                                                <input id="site_title" name="site_title" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_title }}" data-bvalidator="required">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Meta Description (max 160 chars) <span class="require">*</span></label>
                                                
                                            <textarea name="site_desc" id="site_desc" rows="6" placeholder="site description" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]">{{ $setting['setting']->site_desc }}</textarea>
                                            </div>
                                                
                                               <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">Meta Keywords (max 160 chars) <span class="require">*</span></label>
                                                
                                            <textarea name="site_keywords" id="site_keywords" rows="6" placeholder="separate keywords with commas" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]">{{ $setting['setting']->site_keywords }}</textarea>
                                            </div>  
                                                
                                                
                                              
                                         <div class="form-group">
                                                <label for="site_favicon" class="control-label mb-1">Header & Testimonial Background (size 1920 x 500) <span class="require">*</span></label>
                                                
                                            <input type="file" id="site_banner" name="site_banner" class="form-control-file" @if($setting['setting']->site_banner == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>
                                            @if($setting['setting']->site_banner != '')
                                                <img height="24" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_banner }}" />
                                                @endif
                                            </div>     
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_copyright" class="control-label mb-1">Copyright<span class="require">*</span></label>
                                                <input id="site_copyright" name="site_copyright" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_copyright }}" data-bvalidator="required">
                                            </div>  
                                            
                                            
                                                                                         
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Multilanguage?<span class="require">*</span></label><br/>
                                               
                                                <select name="site_multilanguage" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->site_multilanguage == 1) selected @endif>ON</option>
                                                <option value="0" @if($setting['setting']->site_multilanguage == 0) selected @endif>OFF</option>
                                                </select>
                                                
                                             </div> 
                                             
                                             <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">Google Recaptcha?<span class="require">*</span></label><br/>
                                              <select name="site_google_recaptcha" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" @if($setting['setting']->site_google_recaptcha == 1) selected @endif>ON</option>
                                                        <option value="0" @if($setting['setting']->site_google_recaptcha == 0) selected @endif>OFF</option>
                                              </select>
                                            </div> 
                                            
                                            <div class="form-group mt-3">
                                             <label for="site_title" class="control-label mb-1">Google Recaptcha Site Key<span class="require">*</span></label>
                                             <input id="google_recaptcha_site_key" name="google_recaptcha_site_key" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->google_recaptcha_site_key }}" data-bvalidator="required">
                                        </div>
                                        <div class="form-group">
                                             <label for="site_title" class="control-label mb-1">Google Recaptcha Secret Key<span class="require">*</span></label>
                                             <input id="google_recaptcha_secret_key" name="google_recaptcha_secret_key" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->google_recaptcha_secret_key }}" data-bvalidator="required">
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
                                                <label for="site_favicon" class="control-label mb-1">Favicon (max 24 x 24) <span class="require">*</span></label>
                                                
                                            <input type="file" id="site_favicon" name="site_favicon" class="form-control-file" @if($setting['setting']->site_favicon == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>
                                            @if($setting['setting']->site_favicon != '')
                                                <img height="24" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_favicon }}" />
                                                @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Logo (size 180 x 50) <span class="require">*</span></label>
                                                
                                            <input type="file" id="site_logo" name="site_logo" class="form-control-file" @if($setting['setting']->site_logo == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>
                                            @if($setting['setting']->site_logo != '')
                                                <img height="24" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_logo }}" />
                                                @endif
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_loader_image" class="control-label mb-1">Page Loader GIF<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_loader_image" name="site_loader_image" class="form-control-file" @if($setting['setting']->site_loader_image == '') data-bvalidator="required,extension[gif]" data-bvalidator-msg="Please select file of type .gif" @else data-bvalidator="extension[gif]" data-bvalidator-msg="Please select file of type .gif" @endif>
                                            @if($setting['setting']->site_loader_image != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_loader_image }}" />
                                                @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1">Page Loader<span class="require">*</span></label><br/>
                                               
                                                <select name="site_loader_display" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->site_loader_display == 1) selected @endif>ON</option>
                                                <option value="0" @if($setting['setting']->site_loader_display == 0) selected @endif>OFF</option>
                                                </select>
                                                
                                             </div>
                                            
                                            
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Email <span class="require">*</span></label>
                                                <input id="office_email" name="office_email" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->office_email }}" data-bvalidator="required,email">
                                            </div>
                                                
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Phone Number <span class="require">*</span></label>
                                                <input id="office_phone" name="office_phone" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->office_phone }}" data-bvalidator="required">
                                            </div> 
                                            
                                               <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Address <span class="require">*</span></label>
                                                
                                            <textarea name="office_address" id="office_address" rows="6" class="form-control noscroll_textarea" data-bvalidator="required">{{ $setting['setting']->office_address}}</textarea>
                                            </div> 
                                            
                                             
                                               
                                                <input type="hidden" name="save_loader_image" value="{{ $setting['setting']->site_loader_image }}">
                                                <input type="hidden" name="image_size" value="{{ $setting['setting']->site_max_image_size }}">
                                                <input type="hidden" name="save_banner" value="{{ $setting['setting']->site_banner }}">
                                                <input type="hidden" name="save_logo" value="{{ $setting['setting']->site_logo }}">
                                                <input type="hidden" name="save_favicon" value="{{ $setting['setting']->site_favicon }}">
                                                <input type="hidden" name="sid" value="1">
                             
                             
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
