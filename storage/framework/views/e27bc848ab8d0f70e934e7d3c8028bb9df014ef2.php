<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>


   <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

       
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-user bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Customers</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_customers); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/customer')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <?php if($allsettings->display_sermons == 1): ?>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-newspaper-o bg-danger p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Sermons</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_sermons); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/sermons')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($allsettings->display_shop == 1): ?>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-shopping-cart bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Products</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_products); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/products')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-shopping-cart bg-warning p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Orders</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_orders); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/orders')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!--/.col-->
    
    
    
    <?php if($allsettings->display_events == 1): ?>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-gift bg-flat-color-4 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Event Bookings</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_event_booking); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/events-bookings')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!--/.col-->
    <?php if($allsettings->display_pastors == 1): ?>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-group bg-flat-color-3 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Pastors</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_pastors); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/pastors')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($allsettings->display_events == 1): ?>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-calendar bg-flat-color-2 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Events</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_events); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/events')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-money bg-flat-color-1 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Donations</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_donation); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/donation')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>

       
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <?php if($allsettings->display_events == 1): ?>
                <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Recent Event Booking</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sno</th>
                                            <th width="100" scope="col">Event Name</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Seats Need?</th>
                                            <th width="200">Approval / Reject </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $recentevent['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><a href="<?php echo e(url('/event')); ?>/<?php echo e($event->event_slug); ?>" target="_blank" class="blue-color"><?php echo e($event->event_title); ?></a> </td>
                                            <td><?php echo e($event->booking_name); ?> </td>
                                            
                                            
                                             <td><?php echo e($event->booking_seats); ?> </td>
                                             <td>
                                            <?php if($event->booking_approval == ""): ?>
                                            <a href="events-bookings/approval/<?php echo e($event->booking_id); ?>/<?php echo e($event->event_token); ?>" class="btn btn-success btn-sm" onClick="return confirm('Are you sure you want to approval?');">Approval?</a>
                                            <a href="events-bookings/reject/<?php echo e($event->booking_id); ?>/<?php echo e($event->event_token); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to reject?');">Reject?</a>
                                            <?php else: ?>
                                            <?php if($event->booking_approval == 'Approved'): ?><span class="badge badge-success"><?php echo e($event->booking_approval); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e($event->booking_approval); ?></span><?php endif; ?>
                                            <?php endif; ?>
                                            </td>
                                        </tr>
                                  <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Recent Donation</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Name</th>
                                            <th width="100">Payment Type</th>
                                            <th>Amount</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $donateData['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($donate->donate_name); ?> </td>
                                            <td><?php echo e($donate->donate_payment_type); ?> </td>
                                            <td><?php echo e($allsettings->site_currency_symbol); ?><?php echo e($donate->donate_amount); ?> </td>
                                            <td><?php if($donate->donate_payment_status == 'completed'): ?> <span class="badge badge-success">Completed</span> <?php else: ?> <span class="badge badge-danger">Pending</span> <?php endif; ?></td>
                                        </tr>
                                       <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div><!-- .animated -->
        </div>

         <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

</body>

</html>
<?php /**PATH C:\xampp\htdocs\my-jesus\resources\views/admin/index.blade.php ENDPATH**/ ?>