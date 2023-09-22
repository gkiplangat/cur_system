<!DOCTYPE html>
<html lang="en">
<head>
<?php if($allsettings->display_pastors == 1): ?>
<title><?php echo e(Helper::translation(119,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php else: ?>
<title><?php echo e(Helper::translation(1,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php endif; ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<div id="page-wrapper" class="pastors-bg">

			<!-- Header -->
				<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php if($allsettings->display_pastors == 1): ?> 
			<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
                      <div class="container text-center">
                          <div class="h2 text-white"><?php echo e(Helper::translation(119,$translate,'')); ?></div>
                          <div><a href="<?php echo e(URL::to('/')); ?>" class="link-color"><?php echo e(Helper::translation(2,$translate,'')); ?></a> <span class="split text-light">/</span> <span class="text-light"><?php echo e(Helper::translation(119,$translate,'')); ?></span></div>
                        </div>
                    </div>
                </section>
     
       <section id="team" class="pt-5 pb-5 mt-5 mb-5">
            <div class="container">
                 <div class="row">
                    
                    <?php $__currentLoopData = $pastor['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pastor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 li-item">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div align="center">
                                            <?php if($pastor->pastor_image != ""): ?>
                                            <img class=" img-fluid" src="<?php echo e(url('/')); ?>/public/storage/pastors/<?php echo e($pastor->pastor_image); ?>" alt="<?php echo e($pastor->pastor_image); ?>">
                                            <?php else: ?>
                                            <img class=" img-fluid" src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($pastor->pastor_image); ?>">
                                            <?php endif; ?>
                                            </div>
                                            <h4 class="h4 mt-2 text-color"><?php echo e($pastor->pastor_name); ?></h4>
                                            <p class="card-text fs16 text-dark lh22"><?php echo substr(nl2br($pastor->pastor_short_desc),0,150); ?></p>
                                            </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <h4><a href="<?php echo e(url('/pastor')); ?>/<?php echo e($pastor->pastor_id); ?>/<?php echo e($pastor->pastor_slug); ?>" class="h4 mt-2 link-color" title="<?php echo e($pastor->pastor_name); ?>"><?php echo e($pastor->pastor_name); ?></a></h4>
                                            <p class="card-text fs16 text-dark lh22"><?php echo nl2br($pastor->pastor_short_desc); ?></p>
                                            <ul class="list-inline pastor-social">
                                            <?php if($pastor->pastor_facebook != ''): ?>
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank" href="<?php echo e($pastor->pastor_facebook); ?>">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($pastor->pastor_twitter != ''): ?>     
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank" href="<?php echo e($pastor->pastor_twitter); ?>">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($pastor->pastor_gplus != ''): ?>    
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank" href="<?php echo e($pastor->pastor_gplus); ?>">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?> 
                                            <?php if($pastor->pastor_youtube != ''): ?>    
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank" href="<?php echo e($pastor->pastor_youtube); ?>">
                                                        <i class="fa fa-youtube"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>    
                                            </ul>
                                        </div>
                                        <div align="center" class="pb-2 mb-3"><a href="<?php echo e(url('/pastor')); ?>/<?php echo e($pastor->pastor_id); ?>/<?php echo e($pastor->pastor_slug); ?>" class="button rounded" title="<?php echo e($pastor->pastor_name); ?>"> <?php echo e(Helper::translation(7,$translate,'')); ?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                </div>
                <div class="row pt-5">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <div class="turn-page" id="pastor-pager"></div>
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
</html>                              <?php /**PATH C:\xampp\htdocs\my-jesus\resources\views/pastors.blade.php ENDPATH**/ ?>