<!DOCTYPE html>
<html lang="en">
<head>
<?php if($allsettings->display_shop == 1): ?>
<title><?php echo e($product['view']->product_name); ?> - <?php echo e($allsettings->site_title); ?></title>
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
                          <div class="h2 text-white"><?php echo e(Helper::translation(12,$translate,'')); ?></div>
                          <div><a href="<?php echo e(URL::to('/')); ?>" class="link-color"><?php echo e(Helper::translation(2,$translate,'')); ?></a> <span class="split text-light">/</span> <span class="text-light"><?php echo e($product['view']->product_name); ?></span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
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
    <form class="cmnt_reply_form" action="<?php echo e(route('cart')); ?>" id="product_form" method="post">
    <?php echo e(csrf_field()); ?>           
	<div class="row">
		<div class="col-md-6">
            
            <div class="cars-gallery">
		       <div class="swiper-container gallery-top mb-2 pb-2">
                    <div class="swiper-wrapper">
                    <?php if($product['view']->product_featured_image != ""): ?>
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container gallery">
                          <a href="<?php echo e(url('/')); ?>/public/storage/products/<?php echo e($product['view']->product_featured_image); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/products/<?php echo e($product['view']->product_featured_image); ?>" title="<?php echo e($product['view']->product_name); ?>"></a>
                        </div>
                      </div>
                    <?php endif; ?>  
                    <?php $imagecount = count($product['view']->productsimages); ?>
                    <?php if($imagecount != 0): ?>
                    <?php $__currentLoopData = $product['view']->productsimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container gallery">
                          <a href="<?php echo e(url('/')); ?>/public/storage/products/<?php echo e($images->product_image); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/products/<?php echo e($images->product_image); ?>" title="<?php echo e($product['view']->product_name); ?>"></a>
                        </div>
                      </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                    </div>
                    <?php if($imagecount != 0): ?>
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                    <?php endif; ?>
               </div>
                 <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                    <?php $imagecount = count($product['view']->productsimages); ?>
                    <?php if($imagecount != 0): ?>
                    <?php if($product['view']->product_featured_image != ""): ?>
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container">
                          <img src="<?php echo e(url('/')); ?>/public/storage/products/<?php echo e($product['view']->product_featured_image); ?>" title="<?php echo e($product['view']->product_name); ?>">
                        </div>
                      </div>
                    <?php endif; ?> 
                    <?php $__currentLoopData = $product['view']->productsimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container">
                          <img src="<?php echo e(url('/')); ?>/public/storage/products/<?php echo e($images->product_image); ?>" title="<?php echo e($product['view']->product_name); ?>">
                        </div>
                      </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                    </div>
                </div>
		   </div>
            
		</div>
		<div class="col-sm-6">
            <div class="card-body">
            <h3 class="title mb-3"><?php echo e($product['view']->product_name); ?></h3>
            <div class="shop-price fs20 pt-4"><?php if($product['view']->product_offer_price != 0): ?><del class="fs20"><?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($product['view']->product_regular_price); ?></del> <?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($product['view']->product_offer_price); ?> <?php else: ?> <?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($product['view']->product_regular_price); ?> <?php endif; ?></div>
            
            <div class="pt-4">
               <p class="fs17 text-warning"><?php echo e(Helper::translation(127,$translate,'')); ?> : <?php echo e($product['view']->product_stock); ?></p>
            </div>
            
            <div class="product-rating pt-2 pb-2"> 
                                
                                <ul class="rating-text">
                                    <?php if($getreview == 0): ?>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <?php else: ?>
                                    <?php if($count_rating == 0): ?>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    
                                    <?php endif; ?>
                                    
                                    <?php if($count_rating == 1): ?>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    
                                    <?php endif; ?>
                                    
                                    
                                    <?php if($count_rating == 2): ?>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    
                                    <?php endif; ?>
                                    
                                                                       
                                    <?php if($count_rating == 3): ?>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    
                                    <?php endif; ?>
                                    
                                    <?php if($count_rating == 4): ?>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    
                                    <?php endif; ?>
                                    
                                    <?php if($count_rating == 5): ?>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    
                                    <?php endif; ?>
                                    
                                    
                                    <?php endif; ?>
                                </ul>
                                <span class="rating-text">( <?php echo e($getreview); ?> <?php echo e(Helper::translation(128,$translate,'')); ?> )</span>
                            </div>
            
            
            <div class="pt-2">
               <p class="fs16 lh22 text-dark"><?php echo nl2br($product['view']->product_short_desc); ?></p>
            </div>
            
            <div class="pt-5">
               <p class="fs17 text-dark"><?php echo e(Helper::translation(55,$translate,'')); ?> : <a href="<?php echo e(url('/shop')); ?>/category/<?php echo e($product['view']->category_slug); ?>" class="link-color"><?php echo e($product['view']->category_name); ?></a></p>
            </div>
            
            <?php if($product['view']->product_offer_price != 0): ?>
            <?php $price = $product['view']->product_offer_price; ?>
            <?php else: ?>
            <?php $price = $product['view']->product_regular_price; ?>
            <?php endif; ?>
            
            <div class="row pt-1 mt-1">
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="product_quantity" value="1" data-bvalidator="digit,min[1],max[<?php echo e($product['view']->product_stock); ?>]">
                     </div>
                    
                    <input type="hidden" name="product_id" value="<?php echo e($product['view']->product_id); ?>">
                    <input type="hidden" name="product_token" value="<?php echo e($product['view']->product_token); ?>">
                    <input type="hidden" name="product_price" value="<?php echo e($price); ?>">
                    <input type="hidden" name="product_shipping" value="<?php echo e($product['view']->product_shipping); ?>">
                      
                    <div class="col-md-10">
                    <?php if(Auth::guest()): ?>
                    <a href="<?php echo e(URL::to('/login')); ?>" class="button text-uppercase rounded"> <?php echo e(Helper::translation(129,$translate,'')); ?></a>
                    <?php endif; ?>
                    <?php if(Auth::check()): ?>
                    <?php if(Auth::user()->id != 1): ?>
                    <input type="hidden" name="product_user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <button type="submit" class="button text-uppercase rounded"> <?php echo e(Helper::translation(129,$translate,'')); ?></button>
                    <?php else: ?>
                    <a href="<?php echo e(URL::to('/admin')); ?>/edit-product/<?php echo e($product['view']->product_token); ?>" class="button text-uppercase rounded"> <?php echo e(Helper::translation(130,$translate,'')); ?></a>
                    <?php endif; ?>
                    <?php endif; ?>
                    </div>
                </div> <!-- row.// -->
                
                
            </div> <!-- card-body.// -->
		
	</div>



        
              </div>
              </form> 
              
              <div class="row mt-3 pt-3">
                 
                 <div class="col-md-12">
                  <div class="product-tabs">
                      <div class="product-tab-button-outer">
                        <ul id="product-tab-button">
                          <li><a href="#description"><?php echo e(Helper::translation(118,$translate,'')); ?></a></li>
                          <li><a href="#reviews"><?php echo e(Helper::translation(128,$translate,'')); ?> (<?php echo e($getreview); ?>)</a></li>
                          <li><a href="#comments"><?php echo e(Helper::translation(131,$translate,'')); ?> (<?php echo e($count); ?>)</a></li>
                         </ul>
                      </div>
                      <div class="product-tab-select-outer">
                        <select id="product-tab-select">
                          <option value="#description"><?php echo e(Helper::translation(118,$translate,'')); ?></option>
                          <option value="#reviews"><?php echo e(Helper::translation(128,$translate,'')); ?></option>
                          <option value="#comments"><?php echo e(Helper::translation(131,$translate,'')); ?> (<?php echo e($count); ?>)</option>
                          
                        </select>
                      </div>
                    
                      <div id="description" class="product-tab-contents">
                        <div class="pt-4 fs16 lh22 text-dark">
                         <?php echo html_entity_decode($product['view']->product_desc); ?>

                        </div>
                      </div>
                      <div id="reviews" class="product-tab-contents">
                        <div class="pt-4">
                         <?php $__currentLoopData = $rating['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <div class="comment-wrap mt-5">
                                <div class="photo rating-photo  col-lg-3 col-md-3 col-sm-6">
                                        <?php if($rating->user_photo != ''): ?>
                                        <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($rating->user_photo); ?>" class="avatar">
                                        <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" class="avatar">
                                        <?php endif; ?>
                                </div>
                                <div class="comment-block border rounded col-lg-9 col-md-9 col-sm-6">
                                        <p class="fs15 text-black font-weight-bold"><?php echo e($rating->name); ?></p>
                                        <p class="fs16 lh22 text-dark"><?php echo e($rating->product_comments); ?></p>
                                        <?php if($rating->product_rate  != 0): ?>
                                        <div class="bottom-comment product-rating">
                                        <ul>
                                        <?php if($rating->product_rate == 5): ?>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                        <?php endif; ?>
                                        <?php if($rating->product_rate == 4): ?>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                        <?php endif; ?> 
                                        <?php if($rating->product_rate == 3): ?>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                        <?php endif; ?> 
                                        <?php if($rating->product_rate == 2): ?>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                        <?php endif; ?>
                                        <?php if($rating->product_rate == 1): ?>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                        <?php endif; ?>
                                        </ul>
                                       </div>
                                       <?php endif; ?>
                                </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </div>
                      </div>
                      <div id="comments" class="product-tab-contents">
                        <div class="pt-4">
                        <?php if(Auth::guest()): ?>
                        <p class="fs18"><?php echo e(Helper::translation(120,$translate,'')); ?> <a href="<?php echo e(URL::to('/login')); ?>" class="link-color fs18"><?php echo e(Helper::translation(121,$translate,'')); ?></a> <?php echo e(Helper::translation(132,$translate,'')); ?></p>
                        <?php endif; ?>
                        <div class="comments w-100">
                        <?php if(Auth::check()): ?>
                        <div class="comment-wrap mt-5">
                                <div class="photo">
                                        <?php if(Auth::user()->user_photo != ''): ?>
                                        <div class="avatar" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>')"></div>
                                        <?php else: ?>
                                        <div class="avatar" style="background-image: url('<?php echo e(url('/')); ?>/public/img/no-user.png')"></div>
                                        <?php endif; ?>
                                </div>
                                <div class="comment-block p-0 shadow-none">
                                        <form class="cmnt_reply_form" action="<?php echo e(route('product-comment')); ?>" id="comment_form" method="post">
                                                <?php echo e(csrf_field()); ?>

                                                <textarea name="comment_content" id="" cols="30" rows="3" placeholder="<?php echo e(Helper::translation(133,$translate,'')); ?>" data-bvalidator="required"></textarea>
                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                                <input type="hidden" name="product_token" value="<?php echo e($product['view']->product_token); ?>">
                                                <input type="submit" name="submit" class="button" value="<?php echo e(Helper::translation(37,$translate,'')); ?>">
                                        </form>
                                </div>
                        </div>
                        <?php endif; ?>
                        <?php if($count != 0): ?>
                        <?php $no = 1; ?>
                        <?php $__currentLoopData = $comment['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="comment-wrap <?php if($no==1){ echo 'mt-5'; } ?>">
                                <div class="photo">
                                        <?php if($comment->user_photo != ''): ?>
                                        <div class="avatar" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($comment->user_photo); ?>')"></div>
                                        <?php else: ?>
                                        <div class="avatar" style="background-image: url('<?php echo e(url('/')); ?>/public/img/no-user.png')"></div>
                                        <?php endif; ?>
                                </div>
                                <div class="comment-block border rounded">
                                        <p class="fs15 text-black font-weight-bold"><?php echo e($comment->name); ?></p>
                                        <p class="fs16 lh22 text-dark"><?php echo e($comment->product_comment_content); ?></p>
                                        <div class="bottom-comment">
                                                <div class="comment-date"><?php echo e(date('d M Y', strtotime($comment->product_comment_date))); ?></div>
                                                
                                        </div>
                                </div>
                        </div>
                        <?php $no++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </div>
                        </div>
                      </div>
                     </div>
                 </div>
              </div>
              
              
             
             <div class="row mt-3 pt-3">
             <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h2 text-black"><?php echo e(Helper::translation(134,$translate,'')); ?></div>
             </div>
             </div>
             <div class="row">
                  <?php $__currentLoopData = $related['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
      <?php else: ?>  
           <?php echo $__env->make('404', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
      <?php endif; ?>      

           <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	

		</div>

</div>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>                              <?php /**PATH C:\xampp\htdocs\my-jesus\resources\views/product.blade.php ENDPATH**/ ?>