<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo e(Helper::translation(84,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
        <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </head>
	
    <body id="LoginForm">
	
        <div class="container mt-5">
        
        <div align="center" class="mt-5 mb-5">
        <?php if($allsettings->site_logo != ''): ?>
    	<a href="<?php echo e(URL::to('/')); ?>" class="navbar-brand">
    	<img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>" class="logo">
    	</a>
    	<?php endif; ?>
        </div>
        <div class="login-form mt-5">
           <div class="main-div col-md-5 mx-auto">
               <div>
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
               <div class="panel">
               <h2><?php echo e(Helper::translation(84,$translate,'')); ?></h2>
                   <p><?php echo e(Helper::translation(148,$translate,'')); ?></p>
               </div>
    
              <form action="<?php echo e(route('login')); ?>" method="POST" id="login_form">
                <?php echo csrf_field(); ?>
                <div class="form-group">
        
                    <label for="urname"><?php echo e(Helper::translation(149,$translate,'')); ?></label>
                    <input type="text" class="form-control" name="email"  data-bvalidator="required">
        
                </div>
        
                <div class="form-group">
                    <label for="urname"><?php echo e(Helper::translation(138,$translate,'')); ?></label>
                    <input type="password" class="form-control" name="password"  data-bvalidator="required">
        
                </div>
                
                <div class="d-flex justify-content-between forgot">
                <div>
                <a href="<?php echo e(URL::to('/forgot')); ?>"><?php echo e(Helper::translation(150,$translate,'')); ?></a>
                </div>
                <div>
                  <a href="<?php echo e(URL::to('/register')); ?>"><?php echo e(Helper::translation(151,$translate,'')); ?></a>
                </div>
                </div>
                <button type="submit" class="button rounded btn-block"><?php echo e(Helper::translation(84,$translate,'')); ?></button>
                <?php if($allsettings->display_social_login == 1): ?>
                <div class="row form-group mt-1">
                <div class="col-md-12">
                <label class="font-weight-bold" for="fullname"><?php echo e(Helper::translation(152,$translate,'')); ?></label>
                <div>
                <a href="<?php echo e(url('/login/facebook')); ?>">
                            <img src="<?php echo e(url('/')); ?>/public/img/fb.png" alt=""/>
                </a>
                <a href="<?php echo e(url('/login/google')); ?>">
                            <img src="<?php echo e(url('/')); ?>/public/img/gp.png" alt=""/>
                </a>
                </div>
                </div>
                </div>
                <?php endif; ?>
            </form>
         </div>

      </div>
    </div>
    </div>
    <?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\my-jesus\resources\views/auth/login.blade.php ENDPATH**/ ?>