<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(2,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="index">
		<div id="page-wrapper">

			<!-- Header -->
				<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<!-- Banner -->
				<section id="banner">

					<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                      <div class="carousel-inner">
                        <?php $i=1; ?>
                        <?php $__currentLoopData = $slideshow['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slideshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php if($i==1): ?> active <?php endif; ?>">
                          <img src="<?php echo e(url('/')); ?>/public/storage/slideshow/<?php echo e($slideshow->slide_image); ?>" alt="First slide">
                          <div class="carousel-caption">
                            <div class="mb-3 mt-5 h1"><?php echo e($slideshow->slide_heading); ?></div>
                            <div class="h4"><?php echo e($slideshow->slide_subheading); ?></div>
                          </div>
                        </div>
                        <?php $i++; ?> 
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"><?php echo e(Helper::translation(93,$translate,'')); ?></span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"><?php echo e(Helper::translation(94,$translate,'')); ?></span>
                      </a>
                    </div>

				</section>
                
                <?php if($upcoming_count != 0): ?>
                <section class="latest-event pt-5 pb-5">
                   <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 calendar text-upper text-left">
                            <div>
                            <span>
                            <i class="fa fa-calendar"></i>
                            </span>
                            <span class="font-weight">
                            
                            <?php echo e(Helper::translation(95,$translate,'')); ?>

                            </span>
                            </div>
                            <div>
                            <span class="event-title clearfix display-inline mt-2">
                            <a href="<?php echo e(URL::to('/event')); ?>/<?php echo e($upcoming['event']->event_slug); ?>" class="text-white h3"><?php echo e($upcoming['event']->event_title); ?></a>
                            </span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-3 text-center">
                            <div class="countdown-timer home-timer">
                            <ul id="example">
                                <li class="pt-2 pb-1 mb-2 rounded"><span class="days">00</span><div><?php echo e(Helper::translation(45,$translate,'')); ?></div></li>
                                <li class="pt-2 pb-1 mb-2 rounded"><span class="hours">00</span><div><?php echo e(Helper::translation(46,$translate,'')); ?></div></li>
                                <li class="pt-2 pb-1 mb-2 rounded"><span class="minutes">00</span><div><?php echo e(Helper::translation(47,$translate,'')); ?></div></li>
		                        <li class="pt-2 pb-1 mb-2 rounded"><span class="seconds">00</span><div><?php echo e(Helper::translation(48,$translate,'')); ?></div></li>
                            </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 mt-3 text-right">
                          <a href="<?php echo e(URL::to('/event')); ?>/<?php echo e($upcoming['event']->event_slug); ?>" class="black-button text-white text-upper rounded"> <?php echo e(Helper::translation(69,$translate,'')); ?></i></a>
                        </div>
                    </div>
                    </div>
            </section>
            <?php endif; ?>
            
            <?php if($allsettings->site_about_display == 1): ?>
            <section class="title-section mt-5 pt-3 pb-3 mb-5 text-center">
               <div class="h1 text-black"><?php echo e($allsettings->site_about_heading); ?></div>
               <div class="h5 text-secondary fs12"><?php echo e($allsettings->site_about_sub_heading); ?></div>
            </section>

			<section class="about-section">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        <p class="text-dark fs16 lh25"><?php echo nl2br($allsettings->site_about_desc); ?></p>
		    <?php if($allsettings->site_about_btnlink != ''): ?><a href="<?php echo e($allsettings->site_about_btnlink); ?>" class="button rounded p-3"><?php endif; ?> <?php if($allsettings->site_about_btntext != ''): ?><?php echo e($allsettings->site_about_btntext); ?><?php endif; ?> <?php if($allsettings->site_about_btnlink != ''): ?></a><?php endif; ?>
                        </div>
                       <div class="col-lg-6 col-md-6 col-sm-12"> 
                        <?php if($allsettings->site_about_image != ''): ?>
                        <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_about_image); ?>" alt="" class="img-fluid align-middle rounded"/>
                        <?php endif; ?>
                       </div> 
                     </div>   
               </div>
            </section>
            <?php endif; ?>
            
            <?php if($allsettings->site_sermon_display == 1): ?>
           <section class="sermons-section pb-5 pt-5 mt-5 mb-5"> 
                <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h1 text-black"><?php echo e($allsettings->site_sermon_heading); ?></div>
                   <div class="h5 text-secondary fs12"><?php echo e($allsettings->site_sermon_sub_heading); ?></div>
                </div>
                
                <div class="container">
                    <?php $__currentLoopData = $sermons['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sermon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row white-bg mt-2 mb-3 pb-5 rounded">
                          <div class="col-lg-2 col-md-2 col-sm-12">
                          <a href="<?php echo e(URL::to('/sermon')); ?>/<?php echo e($sermon->sermon_slug); ?>" title="<?php echo e($sermon->sermon_title); ?>">
                                    <?php if($sermon->sermon_image !=''): ?>
                                    <img class="img-fluid align-middle rounded"  src="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($sermon->sermon_image); ?>" alt="<?php echo e($sermon->sermon_image); ?>" ><?php else: ?><img class="img-fluid align-middle rounded"  src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($sermon->sermon_image); ?>" ><?php endif; ?>
                          </a>          
                          </div>
                         <div class="col-lg-7 col-md-7 col-sm-12 mt-4">
                                    <h4 class="list-group-item-heading"><a href="<?php echo e(URL::to('/sermon')); ?>/<?php echo e($sermon->sermon_slug); ?>" class="h4 text-dark" title="<?php echo e($sermon->sermon_title); ?>"><?php echo e($sermon->sermon_title); ?></a> </h4>
                                    <p class="list-group-item-text"> <?php echo e(date('F d,Y', strtotime($sermon->sermon_update_date))); ?>

                                    </p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 mt-4">
                            <?php if($sermon->sermon_video != ''): ?><a href="<?php echo e($sermon->sermon_video); ?>" class="icon-button popupvideo rounded"><i class="fa fa-video-camera"></i></a><?php endif; ?>
                            <?php if($sermon->sermon_mp3 != ''): ?><a href="javascript:void(0);" class="icon-button rounded" data-toggle="modal" data-target="#myModal-<?php echo e($sermon->sermon_id); ?>"><i class="fa fa-volume-up"></i></a><?php endif; ?>
                            <?php if($sermon->sermon_pdf != ''): ?><a href="<?php echo e(url('/')); ?>/public/storage/sermons/<?php echo e($sermon->sermon_pdf); ?>" class="icon-button rounded" target="_blank"><i class="fa fa-file-pdf-o"></i></a><?php endif; ?>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                         
                </div>
                
           </section>     
            <?php endif; ?>
            
            
            <?php if($allsettings->site_gallery_display == 1): ?>
           <section class="pb-3 pt-3 mt-5 mb-5"> 
                <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h1 text-black"><?php echo e($allsettings->site_gallery_heading); ?></div>
                   <div class="h5 text-secondary fs12"><?php echo e($allsettings->site_gallery_sub_heading); ?></div>
                </div>
                
                <div class="container pt-3 pb-3">
                   
                   <div class="row">
                    <?php $i=1; ?>
                    <?php $__currentLoopData = $gallery['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($i == 1 or $i == 6) { $class = "col-lg-6 col-md-6 col-sm-6"; } else { $class = "col-lg-3 col-md-6 col-sm-6"; } ?>
                         <div class="<?php echo e($class); ?>">
                           <div class="gallery">
                           
                            <a href="<?php echo e(url('/')); ?>/public/storage/gallery/<?php echo e($gallery->gallery_image); ?>">
                            <img src="<?php echo e(url('/')); ?>/public/storage/gallery/<?php echo e($gallery->gallery_image); ?>" class="img-fluid rounded">
                            </a>
                            
                           </div>
                         </div>
                      <?php $i++; ?>   
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                   </div>
                   
                </div>
            
            </section>
            
                 
            <?php endif; ?>
            
            
            <?php if($allsettings->site_product_display == 1): ?>
            <section class="pb-3 pt-3 mt-5 mb-5"> 
                <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h1 text-black"><?php echo e($allsettings->site_product_heading); ?></div>
                   <div class="h5 text-secondary fs12"><?php echo e($allsettings->site_product_sub_heading); ?></div>
                </div>
                
                <div class="container pt-3 pb-3">
                    
                    <div class="row">
                        <?php $__currentLoopData = $product['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-grid9">
                                <div class="product-image9">
                                    <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>">
                                        <?php if($product->product_featured_image != ""): ?>
                                        <img class="pic-1" src="<?php echo e(url('/')); ?>/public/storage/products/<?php echo e($product->product_featured_image); ?>">
                                        <?php else: ?>
                                        <img class="pic-1" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg">
                                        <?php endif; ?>
                                        <?php $imagecount = count($product->productsimages); ?>
                                        <?php if($imagecount != 0): ?>
                                        <?php $no = 1; ?>
                                        <?php $__currentLoopData = $product->productsimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($no == 1): ?>
                                        <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/products/<?php echo e($images->product_image); ?>">
                                        <?php endif; ?>
                                        <?php $no++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <img class="pic-2" src="<?php echo e(url('/')); ?>/public/storage/products/<?php echo e($product->product_featured_image); ?>">
                                        <?php endif; ?>
                                    </a>
                                    <a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>" class="fa fa-search product-full-view"></a>
                                </div>
                                <div class="product-content">
                                    <h3 class="h3"><a href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>" class="text-dark"><?php echo e($product->product_name); ?></a></h3>
                                    <div class="price"><?php if($product->product_offer_price != 0): ?><del><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($product->product_regular_price); ?></del> <?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($product->product_offer_price); ?> <?php else: ?> <?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($product->product_regular_price); ?> <?php endif; ?></div>
                                    <a class="add-to-cart" href="<?php echo e(URL::to('/product')); ?>/<?php echo e($product->product_slug); ?>"><?php echo e(Helper::translation(96,$translate,'')); ?></a>
                                </div>
                            </div>
                        </div> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </div>
                </div>
                
            </section>
            <?php endif; ?>
            
            
            
            <?php if($allsettings->site_testimonial_display == 1): ?>
            <section class="pt-5 pb-5" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>'); background-repeat: no-repeat; background-size: cover;"> 
                <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h1 text-white"><?php echo e($allsettings->site_testimonial_heading); ?></div>
                   <div class="h5 text-secondary fs12"><?php echo e($allsettings->site_testimonial_sub_heading); ?></div>
                </div>
                <div class="container pt-3 pb-3">
                      <div class="row">   
                         <div id="testim" class="testim">
                                <div class="wrap">
                    
                                    <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                                    <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                                    <ul id="testim-dots" class="dots">
                                        <?php $i=1; ?>
                                        <?php $__currentLoopData = $testimonial_dots['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="dot <?php if($i == 1): ?> active <?php endif; ?>"></li>
                                        <?php $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <div id="testim-content" class="cont">
                                        <?php $j=1; ?>
                                        <?php $__currentLoopData = $testimonial['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                  
                                        <div <?php if($j == 1): ?> class="active" <?php endif; ?>>
                                            <?php if($testimonial->testimonial_image != ''): ?>
                                            <div class="img"><img src="<?php echo e(url('/')); ?>/public/storage/testimonial/<?php echo e($testimonial->testimonial_image); ?>" alt=""></div>
                                            <?php else: ?>
                                            <div class="img"><img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt=""></div>
                                            <?php endif; ?>
                                            <div class="h4"><?php echo e($testimonial->testimonial_name); ?></div>
                                            <p><?php echo nl2br($testimonial->testimonial_desc); ?></p>                    
                                        </div>
                                        <?php $j++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                                    </div>
                                     </div>
                             </div>
                     </div>     
                </div>
           </section>     
           <?php endif; ?> 
            
           <?php if($extrasettings->site_blog_display == 1): ?> 
           <section class="pb-3 pt-3 mt-5 mb-5"> 
                <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h1 text-black"><?php echo e($extrasettings->site_blog_heading); ?></div>
                   <div class="h5 text-secondary fs12"><?php echo e($extrasettings->site_blog_sub_heading); ?></div>
                </div>
                
                <div class="container pt-3 pb-3">
                   <div class="row">
                        <?php $__currentLoopData = $blog['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                         
                        <div class="col-lg-4 col-md-6 col-sm-6">
                           <div class="single-blog-item">
                                <div class="blog-thumnail">
                                    <?php if($blog->post_image != ''): ?>
                                    <a href="<?php echo e(URL::to('/post')); ?>/<?php echo e($blog->post_slug); ?>" title="<?php echo e($blog->post_title); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($blog->post_image); ?>" alt="blog-img rounded"></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(URL::to('/post')); ?>/<?php echo e($blog->post_slug); ?>" title="<?php echo e($blog->post_title); ?>"><img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="blog-img rounded"></a>
                                    <?php endif; ?>
                                </div>
                                <div class="blog-content">
                                    <h4 class="title"><a href="<?php echo e(URL::to('/post')); ?>/<?php echo e($blog->post_slug); ?>" class="fs18 text-black" title="<?php echo e($blog->post_title); ?>"><?php echo e($blog->post_title); ?></a></h4>
                                    <p class="fs16 text-dark"><?php echo substr(nl2br($blog->post_short_desc),0,200).'...'; ?></p>
                                    <a href="<?php echo e(URL::to('/post')); ?>/<?php echo e($blog->post_slug); ?>" class="button rounded" title="<?php echo e($blog->post_title); ?>"> <?php echo e(Helper::translation(7,$translate,'')); ?></a>
                                    <span class="float-right text-dark"><i class="fa fa-comments"></i> <?php echo e($comments->has($blog->post_id) ? count($comments[$blog->post_id]) : 0); ?></span>
                                </div>
                                <span class="blog-date"><?php echo e(date('M d, Y', strtotime($blog->post_date))); ?></span>
                            </div>
                         </div>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            	   </div>
                   
                </div>
           </section>     
           <?php endif; ?>
           
           <?php if($allsettings->display_newsletter == 1): ?>
           <section class="subscribe-area pb-5 pt-5">
            <div class="container">
                <div>
                  <?php if($message = Session::get('news-success')): ?>
                  <div class="alert alert-success" role="alert">
                                                        <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                                        <?php echo e($message); ?>

                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span class="fa fa-close" aria-hidden="true"></span>
                                                        </button>
                  </div>
                  <?php endif; ?>
                  <?php if($message = Session::get('news-error')): ?>
                  <div class="alert alert-danger" role="alert">
                              <span class="alert_icon lnr lnr-warning"></span>
                                                        <?php echo e($message); ?>

                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span class="fa fa-close" aria-hidden="true"></span>
                                                        </button>
                             </div>
                  <?php endif; ?>
                  </div>
                
                <div class="row pb-5 pt-4">
            
                                <div class="col-md-4">
                                    <div class="subscribe-text mb-3">
                                        <span><?php echo e(Helper::translation(97,$translate,'')); ?></span>
                                        <h2><?php echo e(Helper::translation(98,$translate,'')); ?></h2>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    
                                    <div class="subscribe-wrapper subscribe2-wrapper mb-3">
                                        <div class="subscribe-form">
                                            <form action="<?php echo e(route('newsletter')); ?>" id="footer_form" method="post" enctype="multipart/form-data">
                                            <?php echo e(csrf_field()); ?>

                                                <input placeholder="<?php echo e(Helper::translation(79,$translate,'')); ?>" type="email" name="news_email" class="rounded mb-3" data-bvalidator="required">
                                                <button type="submit" class="black-button text-white text-upper rounded"> <?php echo e(Helper::translation(99,$translate,'')); ?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
            </div>
            </section>
            <?php endif; ?>
           
			<!-- Footer image-hover img-inner-shadow -->
			<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	

		</div>

</div>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>                            <?php /**PATH C:\xampp\htdocs\cur_system\resources\views/index.blade.php ENDPATH**/ ?>