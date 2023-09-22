<!DOCTYPE html>
<html lang="en">
<head>
<?php if($allsettings->display_sermons == 1): ?>
<title><?php echo e(Helper::translation(74,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php else: ?>
<title><?php echo e(Helper::translation(1,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php endif; ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<div id="page-wrapper" class="pastors-bg">

			<!-- Header -->
				<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php if($allsettings->display_sermons == 1): ?> 
			<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
                      <div class="container text-center">
                          <div class="h2 text-white"><?php if($tag_title != ''): ?> <?php echo e($tag_title); ?> <?php else: ?> <?php if($slug != ''): ?> <?php echo e($slug); ?> <?php else: ?> <?php echo e(Helper::translation(74,$translate,'')); ?> <?php endif; ?> <?php endif; ?></div>
                          <div><a href="<?php echo e(URL::to('/')); ?>" class="link-color"><?php echo e(Helper::translation(2,$translate,'')); ?></a> <span class="split text-light">/</span> <span class="text-light"><?php echo e(Helper::translation(74,$translate,'')); ?></span> <?php if($tag_title != ''): ?><span class="split text-light">/</span> <span class="text-light">"<?php echo e($slug); ?>"</span> <?php endif; ?></div>
                        </div>
                    </div>
                </section>
     
       <section id="team" class="pt-5 pb-5 mt-5 mb-5">
            <div class="container">
                 <div class="row sermon-card">
                    <?php $__currentLoopData = $sermon['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sermon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 li-item">
                      <div class="card-section">
                         <div class="card-section-image">
                         <a href="<?php echo e(URL::to('/sermon')); ?>/<?php echo e($sermon->sermon_slug); ?>" title="<?php echo e($sermon->sermon_title); ?>">
                           <?php if($sermon->sermon_image != ""): ?>
                           <img class="sermon-image" src="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($sermon->sermon_image); ?>" alt="<?php echo e($sermon->sermon_image); ?>">
                           <?php else: ?>
                           <img class="sermon-image" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($sermon->sermon_image); ?>">
                           <?php endif; ?>
                         </a>
                         <div class="card-purchase">
                           <ul>
                              <?php if($sermon->sermon_video != ''): ?><li><a href="<?php echo e($sermon->sermon_video); ?>" class="rounded popupvideo"><i class="fa fa-video-camera"></i></a></li><?php endif; ?>
                              <?php if($sermon->sermon_mp3 != ''): ?><li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal-<?php echo e($sermon->sermon_id); ?>" class="rounded"><i class="fa fa-volume-up"></i></a></li><?php endif; ?>
                              <?php if($sermon->sermon_pdf != ''): ?><li><a href="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($sermon->sermon_pdf); ?>" target="_blank" class="rounded"><i class="fa fa-file-pdf-o"></i></li><?php endif; ?>
                           </ul>
                          </div>
                         </div>
                         <div class="card-desc">
                           <div class="title">
                           <a href="<?php echo e(URL::to('/sermon')); ?>/<?php echo e($sermon->sermon_slug); ?>" class="text-dark fs22"><?php echo e($sermon->sermon_title); ?></a>
                           </div>
                           <p class="mt-2 fs16 text-dark lh22"><?php echo substr(nl2br($sermon->sermon_short_desc),0,150); ?></p>
                           <div class="card-info">
                           <ul class="list-unstyle">
                           <li><i class="fa fa-calendar"></i> <?php echo e(date('M d Y', strtotime($sermon->sermon_update_date))); ?></li>
                           </ul>
                           <a href="<?php echo e(URL::to('/sermon')); ?>/<?php echo e($sermon->sermon_slug); ?>" class="button rounded"> <?php echo e(Helper::translation(69,$translate,'')); ?></a>
                           </div>
                         </div>
                      </div>
                      
                      
                      <div class="modal fade" id="myModal-<?php echo e($sermon->sermon_id); ?>">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                    
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title"><?php echo e($sermon->sermon_title); ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                    
                          <!-- Modal body -->
                          <div class="modal-body">
                              <audio preload="auto" controls>
					         <source src="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($sermon->sermon_mp3); ?>">
		                     </audio>
                          </div>
                    
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(Helper::translation(63,$translate,'')); ?></button>
                          </div>
                    
                        </div>
                      </div>
                    </div>
                    
                    
                    </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
                <div class="row pt-5">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <div class="turn-page" id="sermon-pager"></div>
               </div>
              </div> 
             <div class="clear-fix"></div>
                
                
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
</html>                              <?php /**PATH C:\xampp\htdocs\cur_system\resources\views/sermons.blade.php ENDPATH**/ ?>