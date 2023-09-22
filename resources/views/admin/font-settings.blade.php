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
                        <h1>Font Settings</h1>
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
                           <form action="{{ route('admin.font-settings') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">H1 Font Family<span class="require">*</span></label>
                                               
                                                <input id="h1_font" type="text" class="form-control noscroll_textarea" name="h1_font" value="{{ $setting['setting']->h1_font }}" data-bvalidator="required">
                                                <span id="paragraph1" @if($setting['setting']->h1_font != '') style="font-family: '{{ str_replace("+"," ",$setting['setting']->h1_font) }}';" @endif>This is the preview of the font selected</span>
                                            </div>
                                            
                                            
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">H2 Font Family <span class="require">*</span></label>
                                                
                                                <input id="h2_font" type="text" class="form-control noscroll_textarea" name="h2_font" data-bvalidator="required" value="{{ $setting['setting']->h2_font }}">
                                                 <span id="paragraph2" @if($setting['setting']->h2_font != '') style="font-family: '{{ str_replace("+"," ",$setting['setting']->h2_font) }}';" @endif>This is the preview of the font selected</span>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">H3 Font Family<span class="require">*</span></label>
                                                
                                               <input id="h3_font" type="text" class="form-control noscroll_textarea" data-bvalidator="required" name="h3_font" value="{{ $setting['setting']->h3_font }}">
                                                <span id="paragraph3" @if($setting['setting']->h3_font != '') style="font-family: '{{ str_replace("+"," ",$setting['setting']->h3_font) }}';" @endif>This is the preview of the font selected</span>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Body Font Family<span class="require">*</span></label>
                                                
                                                <input id="body_font" type="text" class="form-control noscroll_textarea" data-bvalidator="required" name="body_font" value="{{ $setting['setting']->body_font }}">
                                                <span id="paragraph7" @if($setting['setting']->body_font != '') style="font-family: '{{ str_replace("+"," ",$setting['setting']->body_font) }}';" @endif>This is the preview of the font selected</span>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Body Font Size <span class="require">*</span></label>
                                                <input id="body_font_size" name="body_font_size" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->body_font_size }}" data-bvalidator="required,digit">px
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
                                                <label for="site_title" class="control-label mb-1">H4 Font Family<span class="require">*</span></label>
                                                
                                                <input id="h4_font" type="text" class="form-control noscroll_textarea" data-bvalidator="required" name="h4_font" value="{{ $setting['setting']->h4_font }}">
                                                <span id="paragraph4" @if($setting['setting']->h4_font != '') style="font-family: '{{ str_replace("+"," ",$setting['setting']->h4_font) }}';" @endif>This is the preview of the font selected</span>
                                            </div>
                                            
                                            
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">H5 Font Family<span class="require">*</span></label>
                                                
                                                <input id="h5_font" type="text" class="form-control noscroll_textarea" data-bvalidator="required" name="h5_font" value="{{ $setting['setting']->h5_font }}">
                                               <span id="paragraph5" @if($setting['setting']->h5_font != '') style="font-family: '{{ str_replace("+"," ",$setting['setting']->h5_font) }}';" @endif>This is the preview of the font selected</span>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">H6 Font Family<span class="require">*</span></label>
                                                
                                                <input id="h6_font" type="text" class="form-control noscroll_textarea" data-bvalidator="required" name="h6_font" value="{{ $setting['setting']->h6_font }}">
                                               <span id="paragraph6" @if($setting['setting']->h6_font != '') style="font-family: '{{ str_replace("+"," ",$setting['setting']->h6_font) }}';" @endif>This is the preview of the font selected</span>
                                            </div>
                                            
                                            
                                            
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Button Font Family<span class="require">*</span></label>
                                                
                                                <input id="button_font" type="text" class="form-control noscroll_textarea" data-bvalidator="required" name="button_font" value="{{ $setting['setting']->button_font }}">
                                                <span id="paragraph8" @if($setting['setting']->button_font != '') style="font-family: '{{ str_replace("+"," ",$setting['setting']->button_font) }}';" @endif>This is the preview of the font selected</span>
                                            </div> 
                                            
                                            
                                             
                                                 
                                                <input type="hidden" name="save_h1_font" value="{{ $setting['setting']->h1_font }}">
                                                <input type="hidden" name="save_h2_font" value="{{ $setting['setting']->h2_font }}">
                                                <input type="hidden" name="save_h3_font" value="{{ $setting['setting']->h3_font }}">
                                                <input type="hidden" name="save_h4_font" value="{{ $setting['setting']->h4_font }}">
                                                <input type="hidden" name="save_h5_font" value="{{ $setting['setting']->h5_font }}">
                                                <input type="hidden" name="save_h6_font" value="{{ $setting['setting']->h6_font }}">
                                                <input type="hidden" name="save_body_font" value="{{ $setting['setting']->body_font }}">
                                                <input type="hidden" name="save_button_font" value="{{ $setting['setting']->button_font }}">
                                                <input type="hidden" name="sid" value="1">
                             
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             
                             
                             
                             
                             
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
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
                    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   @include('admin.javascript')


</body>

</html>
