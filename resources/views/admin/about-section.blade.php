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
                        <h1>About Section</h1>
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
                           <form action="{{ route('admin.about-section') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                          
                           <div class="col-md-12">
                          
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                          
                              <div class="form-group">
                                                    <label for="site_title" class="control-label mb-1">About Section <span class="require">*</span></label>
                                                                                                    
                                                    <select name="site_about_display" class="form-control" data-bvalidator="required">
                                                    <option value=""></option>
                                                    <option value="1" @if($setting['setting']->site_about_display == 1) selected @endif>Enable</option>
                                                    <option value="0" @if($setting['setting']->site_about_display == 0) selected @endif>Disable</option>
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
                                                <label for="site_title" class="control-label mb-1">About Heading</label>
                                                <input id="site_about_heading" name="site_about_heading" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_about_heading }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">About Sub Heading</label>
                                                <input id="site_about_sub_heading" name="site_about_sub_heading" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_about_sub_heading }}">
                                            </div>
                                                                                       
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">About Description</label>
                                                
                                            <textarea name="site_about_desc" id="site_about_desc" rows="6" class="form-control noscroll_textarea" data-bvalidator="maxlen[1000]">{{ $setting['setting']->site_about_desc }}</textarea>
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
                                                <label for="site_desc" class="control-label mb-1">More Button Text</label>
                                                
                                            <input id="site_about_btntext" name="site_about_btntext" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_about_btntext }}">
                                            </div>
                             
                              <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">More Button Link</label>
                                                
                                            <input id="site_about_btnlink" name="site_about_btnlink" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_about_btnlink }}" data-bvalidator="url">
                                            </div>
                             
                               
                             <div class="form-group">
                                                <label for="site_favicon" class="control-label mb-1">About Image</label>
                                                
                                            <input type="file" id="site_about_image" name="site_about_image" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                            @if($setting['setting']->site_about_image != '')
                                                <img width="100" height="80" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_about_image }}" />
                                                @endif
                                            </div>
                                  
                                            
                             
                             </div>
                                </div>

                            </div>
                            <input type="hidden" name="image_size" value="{{ $setting['setting']->site_max_image_size }}">
                             <input type="hidden" name="save_about_image" value="{{ $setting['setting']->site_about_image }}">
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
