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
                        <h1>Edit Gallery Image</h1>
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
                       <form action="{{ route('admin.edit-gallery') }}" method="post" id="staff_form" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}
                        @endif
                        <div class="card">
                           
                           
                           
                           <div class="col-md-8">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                          
                                            
                                           
                                            
                                            
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">Image <span class="require">*</span></label>
                                                <input type="file" id="gallery_image" name="gallery_image" class="form-control" @if($edit['gallery']->gallery_image != '') data-bvalidator="extension[jpg:png:jpeg]" @else data-bvalidator="required,extension[jpg:png:jpeg]" @endif data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">@if($edit['gallery']->gallery_image != '')
                  <img src="{{ url('/') }}/public/storage/gallery/{{ $edit['gallery']->gallery_image }}" alt="{{ $edit['gallery']->gallery_image }}" height="50" width="50">
                  @else
                  <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $edit['gallery']->gallery_image }}" height="50" width="50">
                  @endif
                                            </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Display<span class="require">*</span></label>
                                                <select name="gallery_status" id="gallery_status" class="form-control" data-bvalidator="required">
                                                      <option value=""></option> 
                                                      <option value="1" @if($edit['gallery']->gallery_status == 1) selected @endif>Enable</option>
                                                      <option value="0" @if($edit['gallery']->gallery_status == 0) selected @endif>Disable</option>  
                                                 </select>
                                                
                                            </div>
                                            
                                            
                                            
                                                
                                              
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                             
                             
                             
                             </div>
                            
                            <input type="hidden" name="save_gallery_image" value="{{ $edit['gallery']->gallery_image }}">
                            <input type="hidden" name="gallery_id" value="{{ base64_encode($edit['gallery']->gallery_id) }}">
                            <input type="hidden" name="image_size" value="{{ $allsettings->site_max_image_size }}"> 
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
