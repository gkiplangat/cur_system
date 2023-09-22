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
                        <h1>Edit Pastor</h1>
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
                       <form action="{{ route('admin.edit-pastor') }}" method="post" id="setting_form" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}
                        @endif
                        <div class="row bg-white">
                           
                           
                           
                           <div class="col-md-6">
                           
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name <span class="require">*</span></label>
                                               <input id="pastor_name" name="pastor_name" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->pastor_name }}">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Short Description<span class="require">*</span></label>
                                                
                                            <textarea id="pastor_short_desc" name="pastor_short_desc" type="text" cols="30" rows="5" class="form-control" data-bvalidator="required,maxlen[120]">{{ $edit['view']->pastor_short_desc }}</textarea>
                                            </div>
                                                
                                            
                                                                                      
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Description <span class="require">*</span></label>
                                                <textarea name="pastor_desc" id="summary-ckeditor" cols="30" rows="5" class="form-control" data-bvalidator="required">{{ html_entity_decode($edit['view']->pastor_desc) }}</textarea>
                                                
                                            </div>   
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Phone <span class="require">*</span></label>
                                               <input id="pastor_phone" name="pastor_phone" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->pastor_phone }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Website</label>
                                                
                                                <input name="pastor_website" id="pastor_website" class="form-control" data-bvalidator="url" value="{{ $edit['view']->pastor_website }}">
                                            </div> 
                                                                                       
                                         
                                    
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Email <span class="require">*</span></label>
                                               <input id="pastor_email" name="pastor_email" type="text" class="form-control" data-bvalidator="required,email" value="{{ $edit['view']->pastor_email }}">
                                            </div>
                                            
                                            
                                           
                                    
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Photo</label>
                                                <input type="file" id="pastor_image" name="pastor_image" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                                @if($edit['view']->pastor_image !='')
                                                    <img src="{{ url('/') }}/public/storage/pastors/{{ $edit['view']->pastor_image }}" alt="{{ $edit['view']->pastor_image }}" class="image-size">
                                                    @else
                                                    <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $edit['view']->pastor_image }}" class="image-size">
                                                    @endif
                                            </div> 
                                            
                                    
                                    
                                    <div class="form-group">
                                                <label for="name" class="control-label mb-1">Facebook Url</label>
                                                <input id="pastor_facebook" name="pastor_facebook" type="text" class="form-control" data-bvalidator="url" value="{{ $edit['view']->pastor_facebook }}">
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Twitter Url</label>
                                                <input id="pastor_twitter" name="pastor_twitter" type="text" class="form-control" data-bvalidator="url" value="{{ $edit['view']->pastor_twitter }}">
                                            </div>    
                             
                                   <div class="form-group">
                                                <label for="name" class="control-label mb-1">GPlus Url</label>
                                                <input id="pastor_gplus" name="pastor_gplus" type="text" class="form-control" data-bvalidator="url" value="{{ $edit['view']->pastor_gplus }}">
                                            </div> 
                                            
                                            
                                    <div class="form-group">
                                                <label for="name" class="control-label mb-1">Youtube Url</label>
                                                <input id="pastor_youtube" name="pastor_youtube" type="text" class="form-control" data-bvalidator="url" value="{{ $edit['view']->pastor_youtube }}">
                                            </div>                                            
                                            
                                   
                                     <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status?<span class="require">*</span></label>
                                                <select name="pastor_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['view']->pastor_status == 1) selected @endif>Active</option>
                                                <option value="0" @if($edit['view']->pastor_status == 0) selected @endif>InActive</option>
                                                </select>
                                                
                                            </div>
                                                    
                            <input type="hidden" name="image_size" value="{{ $allsettings->site_max_image_size }}">
                            <input type="hidden" name="save_pastor_image" value="{{ $edit['view']->pastor_image }}">
                            <input type="hidden" name="pastor_token" value="{{ $edit['view']->pastor_token }}">
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
