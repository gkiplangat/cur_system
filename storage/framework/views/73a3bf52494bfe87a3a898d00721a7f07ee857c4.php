<!DOCTYPE html>
<html lang="en">
<head>
<?php if($allsettings->display_sermons == 1): ?>
<title><?php echo e($single['view']->sermon_title); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php else: ?>
<title><?php echo e(Helper::translation(1,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php endif; ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="index">
     <div id="page-wrapper">

			<!-- Header -->
				<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php if($allsettings->display_sermons == 1): ?> 
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
                      <div class="container text-center">
                          <div class="h2 text-white"><?php echo e($single['view']->sermon_title); ?></div>
                          <div><a href="<?php echo e(URL::to('/')); ?>" class="link-color"><?php echo e(Helper::translation(2,$translate,'')); ?></a> <span class="split text-light">/</span> <span class="text-light"><?php echo e(Helper::translation(74,$translate,'')); ?></span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="pb-5 mb-5 mt-5 pt-5 single-event">
          <div class="container mb-5 pb-5">
          <div class="row">
          <div class="col-md-12">
                    <?php if($message = Session::get('success')): ?>
                           <div class="alert alert-success" role="alert">
                                            <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                            <?php echo e($message); ?>

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-close" aria-hidden="true"></span>
                                            </button>
                                        </div>
                    <?php endif; ?>
                    <?php if($message = Session::get('error')): ?>
                    <div class="alert alert-danger" role="alert">
                                            <span class="alert_icon lnr lnr-warning"></span>
                                            <?php echo e($message); ?>

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-close" aria-hidden="true"></span>
                                            </button>
                                        </div>
                    <?php endif; ?>
                    <?php if(!$errors->isEmpty()): ?>
                    <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     
                    <?php echo e($error); ?>

            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-close" aria-hidden="true"></span>
                    </button>
                    </div>
                    <?php endif; ?>
               </div>
           </div>    
          
                <div class="row">
                 <div class="col-md-9" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="card-title"><?php echo e($single['view']->sermon_title); ?></h2>
                 <div class="card mb-4">
          <?php if($single['view']->sermon_image != ''): ?> <img src="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($single['view']->sermon_image); ?>" alt="<?php echo e($single['view']->sermon_title); ?>" class="card-img-top event-bg" /><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($single['view']->sermon_title); ?>"  class="card-img-top event-bg"/>  <?php endif; ?>
            <div class="countdown-timing">
            <ul>
                <?php if($single['view']->sermon_video != ''): ?><li><a href="<?php echo e($single['view']->sermon_video); ?>" class="rounded popupvideo"><i class="fa fa-video-camera"></i></a></li><?php endif; ?>
                <?php if($single['view']->sermon_mp3 != ''): ?><li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal-<?php echo e($single['view']->sermon_id); ?>" class="rounded"><i class="fa fa-volume-up"></i></a></li><?php endif; ?>
                <?php if($single['view']->sermon_pdf != ''): ?><li><a href="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($single['view']->sermon_pdf); ?>" target="_blank" class="rounded"><i class="fa fa-file-pdf-o"></i></a></li><?php endif; ?>
                
            </ul>
            </div>
            <div class="card-body">
             <?php if($single['view']->sermon_desc != ''): ?>
             <h4 class="h3"><?php echo e(Helper::translation(118,$translate,'')); ?></h4>
             <div class="text-dark fs16 lh25"><?php echo html_entity_decode($single['view']->sermon_desc); ?></div>
             <?php endif; ?>
             <h4 class="h3"><?php echo e(Helper::translation(145,$translate,'')); ?></h4>
             <a href="<?php echo e(URL::to('/pastor')); ?>/<?php echo e($single['view']->pastor_id); ?>/<?php echo e($single['view']->pastor_slug); ?>" class="button rounded"> <?php echo e($single['view']->pastor_name); ?></a>           
            </div>
           
            
          </div>
          

           <div class="col-md-12 mb-4 mt-4">
           <h4 class="mb-4"><?php echo e(Helper::translation(58,$translate,'')); ?></h4>
               <div class="social_icons mt-2">
                   <a class="share-button" data-share-url="<?php echo e(URL::to('/sermon')); ?>/<?php echo e($single['view']->sermon_slug); ?>" data-share-network="facebook" data-share-text="<?php echo e($single['view']->sermon_short_desc); ?>" data-share-title="<?php echo e($single['view']->sermon_title); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($single['view']->sermon_image); ?>" href="javascript:void(0)">
                                                       <img src="<?php echo e(url('/')); ?>/public/img/facebook.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="<?php echo e(URL::to('/sermon')); ?>/<?php echo e($single['view']->sermon_slug); ?>" data-share-network="twitter" data-share-text="<?php echo e($single['view']->sermon_short_desc); ?>" data-share-title="<?php echo e($single['view']->sermon_title); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($single['view']->sermon_image); ?>" href="javascript:void(0)">
                                                        <img src="<?php echo e(url('/')); ?>/public/img/twitter.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="<?php echo e(URL::to('/sermon')); ?>/<?php echo e($single['view']->sermon_slug); ?>" data-share-network="googleplus" data-share-text="<?php echo e($single['view']->sermon_short_desc); ?>" data-share-title="<?php echo e($single['view']->sermon_title); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($single['view']->sermon_image); ?>" href="javascript:void(0)">
                                                        <img src="<?php echo e(url('/')); ?>/public/img/gplus.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="<?php echo e(URL::to('/sermon')); ?>/<?php echo e($single['view']->sermon_slug); ?>" data-share-network="linkedin" data-share-text="<?php echo e($single['view']->sermon_short_desc); ?>" data-share-title="<?php echo e($single['view']->sermon_title); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($single['view']->sermon_image); ?>" href="javascript:void(0)">
                                                        <img src="<?php echo e(url('/')); ?>/public/img/linked.png" width="40">
                                                    </a>
                 </div>       
          </div>
          

        </div>
        
        
        <div class="modal fade" id="myModal-<?php echo e($single['view']->sermon_id); ?>">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                    
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title"><?php echo e($single['view']->sermon_title); ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                    
                          <!-- Modal body -->
                          <div class="modal-body">
                              <audio preload="auto" controls>
					         <source src="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($single['view']->sermon_mp3); ?>">
		                     </audio>
                          </div>
                    
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(Helper::translation(63,$translate,'')); ?></button>
                          </div>
                    
                        </div>
                      </div>
                    </div>
        
              
              <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="200">
                                
                 
                 
                 <div class="mt-3 pt-3 pb-2 mb-2">
                   <div class="card w-100">
                <div class="card-header sidebar-header text-uppercase"><?php echo e(Helper::translation(146,$translate,'')); ?></div>
                
                <ul class="media-list mt-3">
                       <?php $__currentLoopData = $recent['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="media mb-4 mt-2 no-gutters">
                            <div class="col-md-5 full-width-image">
                            <a href="<?php echo e(url('/sermon')); ?>/<?php echo e($recent->sermon_slug); ?>" class="captial" title="<?php echo e($recent->sermon_title); ?>">
                                <?php if($recent->sermon_image != ''): ?> <img src="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($recent->sermon_image); ?>" alt="<?php echo e($recent->sermon_title); ?>" class="img-circle mx-auto d-block recent-event"/><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($recent->sermon_title); ?>" class="img-circle mx-auto d-block recent-event"/>  <?php endif; ?></a>
                            </div>
                            <div class="col-md-7 mr-1">
                                <a href="<?php echo e(url('/sermon')); ?>/<?php echo e($recent->sermon_slug); ?>" class="link-color fs16"><?php echo e($recent->sermon_title); ?></a>
                                <div>
                                <small class="fs12">
                                    <?php echo e(date('d M Y h:i a', strtotime($recent->sermon_update_date))); ?>

                                </small>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </ul>
                </div>
                </div>
                 
                
                 
                 <div class="mt-3 pt-3 pb-2 mb-2">
                   <div class="card w-100">
                <div class="card-header sidebar-header text-uppercase"><?php echo e(Helper::translation(66,$translate,'')); ?></div>
                 <div class="media-list event-tag mt-3 mb-3">
                    <?php $__currentLoopData = $sermon_tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('/sermons')); ?>/<?php echo e(strtolower(str_replace(' ','-',$tags))); ?>" class="fs13 rounded"><?php echo e($tags); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </div>
                 
                 </div>
                 </div>                 
                 
                 
                 
              </div>
              </div>
               
            
            </div>

          
        </section>
         <?php else: ?>  
           <?php echo $__env->make('404', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <?php endif; ?>       

           <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	

		</div>

</div>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>                              <?php /**PATH C:\xampp\htdocs\cur_system\resources\views/sermon.blade.php ENDPATH**/ ?>