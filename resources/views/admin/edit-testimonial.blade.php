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
                        <h1>Edit Testimonial</h1>
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
                       <form action="{{ route('admin.edit-testimonial') }}" method="post" id="setting_form" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}
                        @endif
                        <div class="card">
                           
                           
                           
                           <div class="col-md-8">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                           <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name <span class="require">*</span></label>
                                                <input id="testimonial_name" name="testimonial_name" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->testimonial_name }}">
                                            </div> 
                                            
                                           <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Photo (size 200 x 200) <span class="require">*</span></label>
                                                
                                            <input type="file" id="testimonial_image" name="testimonial_image" class="form-control-file"   @if($edit['view']->testimonial_image =='') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>
                                            @if($edit['view']->testimonial_image !='')
                                                    <img src="{{ url('/') }}/public/storage/testimonial/{{ $edit['view']->testimonial_image }}" alt="{{ $edit['view']->testimonial_image }}" class="image-size">
                                                    @else
                                                    <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $edit['view']->testimonial_image }}" class="image-size">
                                                    @endif
                                            
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Description <span class="require">*</span></label>
                                                <textarea name="testimonial_desc" id="testimonial_desc" cols="30" rows="5" class="form-control" data-bvalidator="required">{{ $edit['view']->testimonial_desc }}</textarea>
                                                
                                            </div>  
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Display Order</label>
                                                <input id="testimonial_order" name="testimonial_order" type="text" class="form-control" data-bvalidator="digit,min[0]" value="{{ $edit['view']->testimonial_order }}">
                                            </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status <span class="require">*</span></label>
                                                <select name="testimonial_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['view']->testimonial_status == 1) selected @endif>Active</option>
                                                <option value="0" @if($edit['view']->testimonial_status == 0) selected @endif>InActive</option>
                                                </select>
                                                
                                            </div>   
                                            
                                                                                      
                                            
                                                                                       
                                            <input type="hidden" name="image_size" value="{{ $allsettings->site_max_image_size }}">    
                                            <input type="hidden" name="testimonial_id" value="{{ $edit['view']->testimonial_id }}">
                                            <input type="hidden" name="save_testimonial_image" value="{{ $edit['view']->testimonial_image }}">        
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                             
                             
                             
                             </div>
                            
                            
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
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   @include('admin.javascript')


</body>

</html>
