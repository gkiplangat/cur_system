<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo e(Helper::translation(153,$translate,'')); ?> - <?php echo e($allsettings->site_title); ?></title>
        <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if($allsettings->site_google_recaptcha == 1): ?>
        <?php echo RecaptchaV3::initJs(); ?>

        <?php endif; ?>
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
               <h2><?php echo e(Helper::translation(154,$translate,'')); ?></h2>
                   <p><?php echo e(Helper::translation(155,$translate,'')); ?> <br/> <?php echo e(Helper::translation(156,$translate,'')); ?></p>
               </div>
              <form method="POST" action="<?php echo e(route('register')); ?>" id="login_form">
                    <?php echo csrf_field(); ?>
               <div class="form-group">
                    <label for="urname"><?php echo e(Helper::translation(157,$translate,'')); ?> <span class="required">*</span></label>
                                   <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"  value="<?php echo e(old('name')); ?>" data-bvalidator="required" autocomplete="name" autofocus>

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        
                   
        
                </div>
        
                <div class="form-group">
                    <label for="user_name"><?php echo e(Helper::translation(137,$translate,'')); ?> <span class="required">*</span></label>
                    <input id="username" type="text" name="username" class="form-control"  data-bvalidator="required">
                    
        
                </div>
                
                
                <div class="form-group">
                <label for="email_ad"><?php echo e(Helper::translation(158,$translate,'')); ?> <span class="required">*</span></label>
                                   <input id="email" type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>"  autocomplete="email" data-bvalidator="email,required">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
        
                </div>
                
                
                <div class="form-group">
                    <label for="password"><?php echo e(Helper::translation(138,$translate,'')); ?><span class="required">*</span></label>
                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="new-password" data-bvalidator="required">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                 <div class="form-group">
                    <label for="con_pass"> <?php echo e(Helper::translation(159,$translate,'')); ?> <span class="required">*</span></label>
                                   
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  data-bvalidator="equal[password],required" autocomplete="new-password">
                                </div>
                                
                                <input type="hidden" name="user_type" value="customer">
                 
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
                <button type="submit" class="button rounded btn-block"><?php echo e(Helper::translation(153,$translate,'')); ?></button>
                <div class="d-flex justify-content-between forgot">
                <div>
                </div>
                <div>
                  <a href="<?php echo e(URL::to('/login')); ?>"><?php echo e(Helper::translation(161,$translate,'')); ?></a>
                </div>
                </div>
        </div>
            </form>
         </div>

      </div>
    </div>
    </div>
    <?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>


<?php /**PATH C:\xampp\htdocs\cur_system\resources\views/auth/register.blade.php ENDPATH**/ ?>