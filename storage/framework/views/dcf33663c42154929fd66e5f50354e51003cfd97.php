<!DOCTYPE html>
<html lang="en">
<head>
<?php if($allsettings->display_shop == 1): ?>
<title><?php echo e(Helper::translation(71,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php else: ?>
<title><?php echo e(Helper::translation(1,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php endif; ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php if($allsettings->display_shop == 1): ?>
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
                      <div class="container text-center">
                          <div class="h2 text-white"><?php if($slug != ''): ?> <?php echo e($slug); ?> <?php else: ?> <?php echo e(Helper::translation(71,$translate,'')); ?> <?php endif; ?></div>
                          <div><a href="<?php echo e(URL::to('/')); ?>" class="link-color"><?php echo e(Helper::translation(2,$translate,'')); ?></a> <span class="split text-light">/</span> <span class="text-light"><?php echo e(Helper::translation(71,$translate,'')); ?></span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
            
            <div class="row">
                        <?php $__currentLoopData = $product['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 li-item">
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
            
            
            
              <div class="row pt-5">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <div class="turn-page" id="product-pager"></div>
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
</html>                              <?php /**PATH C:\xampp\htdocs\my-jesus\resources\views/shop.blade.php ENDPATH**/ ?>