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
                        <h1>Add Event</h1>
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
                       <form action="{{ route('admin.add-event') }}" method="post" id="setting_form" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}
                        @endif
                        <div class="row bg-white">
                           
                           
                           
                           <div class="col-md-6">
                           
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Title <span class="require">*</span></label>
                                               <input id="event_title" name="event_title" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Short Description<span class="require">*</span></label>
                                                
                                            <textarea id="event_short_desc" name="event_short_desc" type="text" cols="30" rows="5" class="form-control" data-bvalidator="required,maxlen[120]"></textarea>
                                            </div>
                                                
                                            
                                                                                      
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Description <span class="require">*</span></label>
                                                <textarea name="event_desc" id="summary-ckeditor" cols="30" rows="5" class="form-control" data-bvalidator="required"></textarea>
                                                
                                            </div>   
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Category <span class="require">*</span></label>
                                                <select name="event_cat_id" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                @foreach($category['view'] as $category)
                                                <option value="{{ $category->cat_id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                                </select>
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Location <span class="require">*</span></label>
                                               <input id="event_location" name="event_location" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Tags <span class="require">*</span></label>
                                                
                                                <textarea name="event_tags" id="event_tags" cols="30" rows="5" class="form-control" data-bvalidator="required"></textarea><small>(tag separated by commas)</small>
                                            </div> 
                                                                                       
                                         
                                    
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Start Date and Time <span class="require">*</span></label>
                                               <input id="event_start_date_time" name="event_start_date_time" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">End Date and Time <span class="require">*</span></label>
                                               <input id="event_end_date_time" name="event_end_date_time" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                    
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Image</label>
                                                <input type="file" id="event_photo" name="event_photo" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                            </div> 
                                            
                                    
                                    
                                    <div class="form-group">
                                                <label for="name" class="control-label mb-1">Organizer Email <span class="require">*</span></label>
                                                <input id="event_org_email" name="event_org_email" type="text" class="form-control" data-bvalidator="required,email">
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Organizer Phone <span class="require">*</span></label>
                                                <input id="event_org_phone" name="event_org_phone" type="text" class="form-control" data-bvalidator="required">
                                            </div>    
                             
                                   <div class="form-group">
                                                <label for="name" class="control-label mb-1">Organizer Website</label>
                                                <input id="event_org_website" name="event_org_website" type="text" class="form-control" data-bvalidator="url">
                                            </div> 
                                            
                                            
                                                                               
                                            
                                   <div class="form-group">
                                                <label for="name" class="control-label mb-1">Address <span class="require">*</span></label>
                                                
                                                <textarea name="event_org_address" id="event_org_address" cols="30" rows="5" class="form-control" data-bvalidator="required"></textarea>
                                            </div>  
                                            
                                            
                                        <div class="form-group">
                                                <label for="name" class="control-label mb-1">Available Seats / Spaces</label>
                                                <input id="event_available_seat" name="event_available_seat" type="text" class="form-control" data-bvalidator="digit">
                                            </div>     
                                                   
                                       
                                     <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status?<span class="require">*</span></label>
                                                <select name="event_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                                </select>
                                                
                                            </div>
                                                    
                            <input type="hidden" name="image_size" value="{{ $allsettings->site_max_image_size }}">
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
