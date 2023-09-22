<!DOCTYPE html>
<html lang="en">
<head>
<?php if($allsettings->display_contact == 1): ?>
<title><?php echo e(Helper::translation(36,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php else: ?>
<title>404 not found - <?php echo e($allsettings->site_title); ?></title>
<?php endif; ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($allsettings->site_google_recaptcha == 1): ?>
<?php echo RecaptchaV3::initJs(); ?>

<?php endif; ?>
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php if($allsettings->display_contact == 1): ?>
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
                      <div class="container text-center">
                          <div class="h2 text-white"><?php echo e(Helper::translation(36,$translate,'')); ?></div>
                          <div><a href="<?php echo e(URL::to('/')); ?>" class="link-color"><?php echo e(Helper::translation(2,$translate,'')); ?></a> <span class="split text-light">/</span> <span class="text-light"><?php echo e(Helper::translation(36,$translate,'')); ?></span></div>
                        </div>
                    </div>
                </section>
                
       
       <section class="contact pt-5 pb-5 mt-5 mb-5" id="contact">
<div class="container">
    
    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
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
	    
		<div class="col-lg-5 col-md-5 col-sm-12">
		    <div class="address">
		        
		    <div class="h5 font-weight-bold"><?php echo e(Helper::translation(27,$translate,'')); ?></div>
		    <ul class="list-unstyled">
		        <li> <?php echo e($allsettings->office_address); ?></li>
		    </ul>
		    
		    </div>
		    <div class="email mt-3 pt-3 mb-3 pb-3">
		    <div class="h5 font-weight-bold"><?php echo e(Helper::translation(26,$translate,'')); ?></div>
		    <ul class="list-unstyled">
		        <li> <?php echo e($allsettings->office_email); ?></li>
		        
		    </ul>
		    </div>
		    <div class="phone">
		        <div class="h5 font-weight-bold"><?php echo e(Helper::translation(25,$translate,'')); ?></div>
		        <ul class="list-unstyled">
		        <li> <?php echo e($allsettings->office_phone); ?></li>
		        
		    </ul>
		    </div>
		   
		    
		</div>
		<div class="col-lg-7 col-md-7 col-sm-12">
		    <div class="card">
		        <div class="card-body">
		             <form action="<?php echo e(route('contact')); ?>" class="setting_form" id="contact_form" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <input id="from_name" name="from_name" class="form-control" type="text" placeholder="<?php echo e(Helper::translation(24,$translate,'')); ?>" data-bvalidator="required">
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" class="form-control" id="from_email" name="from_email" placeholder="<?php echo e(Helper::translation(26,$translate,'')); ?>" data-bvalidator="email,required">
                            </div>
                          </div>
                        <div class="form-row">
                                                       
                            <div class="form-group col-md-12">
                                      <textarea id="message_text" name="message_text" cols="40" rows="5" class="form-control" placeholder="<?php echo e(Helper::translation(38,$translate,'')); ?>" data-bvalidator="required"></textarea>
                            </div>
                        </div>
                        <?php if($allsettings->site_google_recaptcha == 1): ?>
                        <div class="form-group<?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">
                            <div class="col-sm-12">
                                <?php echo RecaptchaV3::field('register'); ?>

                                <?php if($errors->has('g-recaptcha-response')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="form-row">
                            <button type="submit" class="button"> <?php echo e(Helper::translation(37,$translate,'')); ?></button>
                        </div>
                    </form>
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
</html>                              <?php /**PATH C:\xampp\htdocs\cur_system\resources\views/contact.blade.php ENDPATH**/ ?>