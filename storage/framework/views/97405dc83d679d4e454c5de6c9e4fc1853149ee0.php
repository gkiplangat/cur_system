<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    
    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Sermon</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
        <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>


<?php if($errors->any()): ?>
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
         <?php echo e($error); ?>

      
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>   
 <?php endif; ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                       <form action="<?php echo e(route('admin.add-sermon')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                        
                        <?php echo e(csrf_field()); ?>

                        <?php endif; ?>
                        <div class="row bg-white">
                           
                           
                           
                           <div class="col-md-6">
                           
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Title <span class="require">*</span></label>
                                               <input id="sermon_title" name="sermon_title" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Short Description<span class="require">*</span></label>
                                                
                                            <textarea id="sermon_short_desc" name="sermon_short_desc" type="text" cols="30" rows="5" class="form-control" data-bvalidator="required,maxlen[120]"></textarea>
                                            </div>
                                                
                                            
                                                                                      
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Description <span class="require">*</span></label>
                                                <textarea name="sermon_desc" id="summary-ckeditor" cols="30" rows="5" class="form-control" data-bvalidator="required"></textarea>
                                                
                                            </div>   
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Pastor <span class="require">*</span></label>
                                                <select name="sermon_pastor" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $pastor['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pastor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($pastor->pastor_id); ?>"><?php echo e($pastor->pastor_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Tags <span class="require">*</span></label>
                                                
                                                <textarea name="sermon_tag" id="sermon_tag" cols="30" rows="5" class="form-control" data-bvalidator="required"></textarea><small>(tag separated by commas)</small>
                                            </div> 
                                                                                       
                                         
                                    
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Mp3</label>
                                                <input type="file" id="sermon_mp3" name="sermon_mp3" class="form-control-file" data-bvalidator="extension[mp3]" data-bvalidator-msg="Please select file of type .mp3">
                                            </div> 
                                            
                                            
                                        <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload PDF</label>
                                                <input type="file" id="sermon_pdf" name="sermon_pdf" class="form-control-file" data-bvalidator="extension[pdf]" data-bvalidator-msg="Please select file of type .pdf">
                                            </div>     
                                    
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Image <span class="require">*</span></label>
                                                <input type="file" id="sermon_image" name="sermon_image" class="form-control-file" data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                            </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Video Link</label>
                                                
                                            <input id="sermon_video" name="sermon_video" type="text" class="form-control noscroll_textarea" data-bvalidator="url"> <small>(Youtube or Vimeo Link)</small>
                                            </div>  
                                            
                                    
                                               
                                       
                                     <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status?<span class="require">*</span></label>
                                                <select name="sermon_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                                </select>
                                                
                                            </div>
                                                    
                            <input type="hidden" name="image_size" value="<?php echo e($allsettings->site_max_image_size); ?>">
                            <input type="hidden" name="pdf_size" value="<?php echo e($allsettings->site_max_pdf_size); ?>">
                            <input type="hidden" name="mp3_size" value="<?php echo e($allsettings->site_max_mp3_size); ?>">
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


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\my-jesus\resources\views/admin/add-sermon.blade.php ENDPATH**/ ?>