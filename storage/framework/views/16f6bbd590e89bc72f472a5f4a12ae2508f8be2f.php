<section id="footer">
		<div class="container">
			<div class="row pt-3 pb-5">
				<div class="col-lg-3 col-md-6 col-sm-6 mb-5">
					<div class="footer-logo mb-5">  
                      <?php if($allsettings->site_logo != ''): ?>
                        <a href="<?php echo e(URL::to('/')); ?>">
                        <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>" class="img-fluid">
                        </a>
                        <?php endif; ?>
                     </div>
                     <div  class="footer-contact">   
					 <p><i class="fa fa-address-card-o"></i> <?php echo e($allsettings->office_address); ?></p> 
                     <p><i class="fa fa-envelope"></i> <a href="mailto:<?php echo e($allsettings->office_email); ?>"><?php echo e($allsettings->office_email); ?></a></p>
                     <p><i class="fa fa-phone-square"></i> <a href="tel:<?php echo e($allsettings->office_phone); ?>"><?php echo e($allsettings->office_phone); ?></a></p>
                     </div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 mb-5">
					<h5 class="mb-5"><?php echo e(Helper::translation(70,$translate,'')); ?></h5>
					<ul class="list-unstyled quick-links">
                        <?php if($allsettings->display_shop == 1): ?>
						<li><a href="<?php echo e(URL::to('/shop')); ?>" class="text-light"><?php echo e(Helper::translation(71,$translate,'')); ?></a></li>
                        <?php endif; ?>
                        <?php if($allsettings->display_pastors == 1): ?>
                        <li><a href="<?php echo e(URL::to('/pastors')); ?>" class="text-light"><?php echo e(Helper::translation(72,$translate,'')); ?></a></li>
                        <?php endif; ?>
                        <?php if($allsettings->display_events == 1): ?>
						<li><a href="<?php echo e(URL::to('/events')); ?>" class="text-light"><?php echo e(Helper::translation(44,$translate,'')); ?></a></li>
                        <?php endif; ?>
                        <?php if($allsettings->display_testimonial == 1): ?>
                        <li><a href="<?php echo e(URL::to('/testimonials')); ?>" class="text-light"><?php echo e(Helper::translation(73,$translate,'')); ?></a></li>
                        <?php endif; ?>
                        <?php if($allsettings->display_sermons == 1): ?>
                        <li><a href="<?php echo e(URL::to('/sermons')); ?>" class="text-light"><?php echo e(Helper::translation(74,$translate,'')); ?></a></li>
                        <?php endif; ?>
                        <?php if($allsettings->display_blog == 1): ?>
                        <li><a href="<?php echo e(URL::to('/blog')); ?>" class="text-light"><?php echo e(Helper::translation(6,$translate,'')); ?></a></li>
                        <?php endif; ?>
					</ul>
				</div>
				<?php if($totalpageCount != 0): ?>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5">
					<h5 class="mb-5"><?php echo e(Helper::translation(75,$translate,'')); ?></h5>
					<ul class="list-unstyled quick-links">
                    <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_slug); ?>" class="text-light"><?php echo e($pages->page_title); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                     <?php if($allsettings->display_contact == 1): ?>
                                   <li><a href="<?php echo e(URL::to('/contact')); ?>" class="text-light"><?php echo e(Helper::translation(36,$translate,'')); ?></a></li>
                     <?php endif; ?>
					</ul>
				</div>
                <?php endif; ?>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5">
                   <div class="footer-social-link">
                     <h5 class="mb-5"><?php echo e(Helper::translation(76,$translate,'')); ?></h5>
                             <ul>
                               <?php if($allsettings->facebook_url != ''): ?>
                                <li>
                                    <a href="<?php echo e($allsettings->facebook_url); ?>" target="_blank" title="facebook" class="text-light">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($allsettings->twitter_url != ''): ?>
                                <li>
                                    <a href="<?php echo e($allsettings->twitter_url); ?>" target="_blank" title="twitter" class="text-light">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($allsettings->gplus_url != ''): ?>
                                <li>
                                    <a href="<?php echo e($allsettings->gplus_url); ?>" target="_blank" title="google" class="text-light">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($allsettings->pinterest_url != ''): ?>
                                <li>
                                    <a href="<?php echo e($allsettings->pinterest_url); ?>" target="_blank" title="pinterest" class="text-light">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($allsettings->instagram_url != ''): ?>
                                <li>
                                    <a href="<?php echo e($allsettings->instagram_url); ?>" target="_blank" title="instagram" class="text-light">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                
			</div>
			
		</div>
</section>
<section id="copyright">
  <div class="container">
    <div class="pt-4 pb-2">
       <p class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white"><?php echo $allsettings->site_copyright; ?> <?php echo e($allsettings->site_title); ?></p>
    </div>
  </div>
</section>            
<a id='backTop'><?php echo e(Helper::translation(77,$translate,'')); ?></a><?php /**PATH C:\xampp\htdocs\my-jesus\resources\views/footer.blade.php ENDPATH**/ ?>