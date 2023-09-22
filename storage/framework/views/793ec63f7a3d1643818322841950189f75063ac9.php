<header id="header" class="alt">
					<div id="logo">
                    <?php if($allsettings->site_logo != ''): ?>
                    <a href="<?php echo e(URL::to('/')); ?>" class="navbar-brand">
                    <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>" class="logo">
                    </a>
                    <?php endif; ?>
                    </div>
                   
					<nav id="nav">
						<ul>
							<li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(2,$translate,'')); ?></a></li>
                            
							<li class="submenu">
								<a href="javascript:void(0)"><?php echo e(Helper::translation(75,$translate,'')); ?></a>
								<ul>
                                   <?php if($totalpageCount != 0): ?>
                                   <?php $__currentLoopData = $allpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li><a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_slug); ?>"><?php echo e($pages->page_title); ?></a></li>
								   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php endif; ?>
                                   
                                   
                                   <?php if($allsettings->display_gallery == 1): ?>
                                   <li><a href="<?php echo e(URL::to('/gallery')); ?>"><?php echo e(Helper::translation(83,$translate,'')); ?></a></li>
                                   <?php endif; ?>
                                   
                                   <?php if($allsettings->display_pastors == 1): ?>
                                   <li><a href="<?php echo e(URL::to('/pastors')); ?>"><?php echo e(Helper::translation(72,$translate,'')); ?></a></li>
                                   <?php endif; ?>
                                   
                                   <?php if($allsettings->display_testimonial == 1): ?>
                                   <li><a href="<?php echo e(URL::to('/testimonials')); ?>"><?php echo e(Helper::translation(73,$translate,'')); ?></a></li>
                                   <?php endif; ?>
                                   
                                   <?php if($allsettings->display_contact == 1): ?>
                                   <li><a href="<?php echo e(URL::to('/contact')); ?>"><?php echo e(Helper::translation(36,$translate,'')); ?></a></li>
                                   <?php endif; ?>
								</ul>
							</li>
                            <?php if($allsettings->display_blog == 1): ?>
                            <li><a href="<?php echo e(URL::to('/blog')); ?>"><?php echo e(Helper::translation(6,$translate,'')); ?></a></li>
                            <?php endif; ?>
                            <?php if($allsettings->display_events == 1): ?>
                            <li><a href="<?php echo e(URL::to('/events')); ?>"><?php echo e(Helper::translation(44,$translate,'')); ?></a></li>
                            <?php endif; ?>
                            <?php if($allsettings->display_sermons == 1): ?>
                            <li><a href="<?php echo e(URL::to('/sermons')); ?>"><?php echo e(Helper::translation(74,$translate,'')); ?></a></li>
                            <?php endif; ?>
                            <?php if($allsettings->display_shop == 1): ?>
                            <li><a href="<?php echo e(URL::to('/shop')); ?>"><?php echo e(Helper::translation(71,$translate,'')); ?></a></li>
                            <?php endif; ?>
                            <?php if($allsettings->site_multilanguage == 1): ?>
                            <li class="submenu">
								<a href="javascript:void(0)"><?php echo e($language_title); ?></a>
								<ul>
                                <?php $__currentLoopData = $languages['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li><a href="<?php echo e(URL::to('/translate')); ?>/<?php echo e($language->language_code); ?>"><?php echo e($language->language_name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
							</li>
                            <?php endif; ?>
                            <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(URL::to('/login')); ?>"><?php echo e(Helper::translation(84,$translate,'')); ?></a></li>
                            <?php endif; ?> 
                            <?php if(Auth::check()): ?>
                            <li class="submenu">
								<a href="javascript:void(0);"><?php echo e(Helper::translation(85,$translate,'')); ?></a>
								<ul>
                                    <?php if(Auth::user()->id != 1): ?>
									<li><a href="<?php echo e(URL::to('/profile')); ?>"><?php echo e(Helper::translation(86,$translate,'')); ?></a></li>
									<li><a href="<?php echo e(URL::to('/cart')); ?>"><?php echo e(Helper::translation(87,$translate,'')); ?></a></li>
                                    <li><a href="<?php echo e(URL::to('/my-donation')); ?>"><?php echo e(Helper::translation(88,$translate,'')); ?></a></li>
                                    <li><a href="<?php echo e(URL::to('/my-order')); ?>"><?php echo e(Helper::translation(89,$translate,'')); ?></a></li>
                                    <li><a href="<?php echo e(URL::to('/logout')); ?>"><?php echo e(Helper::translation(90,$translate,'')); ?></a></li>
                                    <?php else: ?>
									<li><a href="<?php echo e(URL::to('/admin')); ?>"><?php echo e(Helper::translation(91,$translate,'')); ?></a></li>
                                    <li><a href="<?php echo e(URL::to('/logout')); ?>"><?php echo e(Helper::translation(90,$translate,'')); ?></a></li>
								    <?php endif; ?> 
								</ul>
							</li>
                            <?php endif; ?>
                            <?php if(Auth::guest()): ?>
							<li><a href="<?php echo e(URL::to('/register')); ?>" class="button"><?php echo e(Helper::translation(92,$translate,'')); ?></a></li>
                            <?php endif; ?>
                            <?php if(Auth::check()): ?>
                            <li><a href="<?php echo e(URL::to('/donate-now')); ?>" class="button"> <?php echo e(Helper::translation(39,$translate,'')); ?></a></li>
                            <?php endif; ?>
						</ul>
					</nav>
</header><?php /**PATH C:\xampp\htdocs\my-jesus\resources\views/header.blade.php ENDPATH**/ ?>