<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    @include('admin.stylesheet')
</head>

<body>


   @include('admin.navigation')

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

       
                       @include('admin.header')
                       
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-user bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Customers</div>
                    <div class="h5 text-secondary mb-0 mt-1">{{ $total_customers }}</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="{{ url('/admin/customer') }}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    @if($allsettings->display_sermons == 1)
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-newspaper-o bg-danger p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Sermons</div>
                    <div class="h5 text-secondary mb-0 mt-1">{{ $total_sermons }}</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="{{ url('/admin/sermons') }}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($allsettings->display_shop == 1)
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-shopping-cart bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Products</div>
                    <div class="h5 text-secondary mb-0 mt-1">{{ $total_products }}</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="{{ url('/admin/products') }}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
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
                    <div class="h5 text-secondary mb-0 mt-1">{{ $total_orders }}</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="{{ url('/admin/orders') }}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--/.col-->
    
    
    
    @if($allsettings->display_events == 1)
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-gift bg-flat-color-4 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Event Bookings</div>
                    <div class="h5 text-secondary mb-0 mt-1">{{ $total_event_booking }}</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="{{ url('/admin/events-bookings') }}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--/.col-->
    @if($allsettings->display_pastors == 1)
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-group bg-flat-color-3 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Pastors</div>
                    <div class="h5 text-secondary mb-0 mt-1">{{ $total_pastors }}</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="{{ url('/admin/pastors') }}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($allsettings->display_events == 1)
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-calendar bg-flat-color-2 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Events</div>
                    <div class="h5 text-secondary mb-0 mt-1">{{ $total_events }}</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="{{ url('/admin/events') }}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-money bg-flat-color-1 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Donations</div>
                    <div class="h5 text-secondary mb-0 mt-1">{{ $total_donation }}</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="{{ url('/admin/donation') }}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>

       
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                @if($allsettings->display_events == 1)
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
                                    @php $no = 1; @endphp
                                    @foreach($recentevent['view'] as $event)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td><a href="{{ url('/event') }}/{{ $event->event_slug }}" target="_blank" class="blue-color">{{ $event->event_title }}</a> </td>
                                            <td>{{ $event->booking_name }} </td>
                                            
                                            
                                             <td>{{ $event->booking_seats }} </td>
                                             <td>
                                            @if($event->booking_approval == "")
                                            <a href="events-bookings/approval/{{ $event->booking_id }}/{{ $event->event_token }}" class="btn btn-success btn-sm" onClick="return confirm('Are you sure you want to approval?');">Approval?</a>
                                            <a href="events-bookings/reject/{{ $event->booking_id }}/{{ $event->event_token }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to reject?');">Reject?</a>
                                            @else
                                            @if($event->booking_approval == 'Approved')<span class="badge badge-success">{{ $event->booking_approval }}</span> @else <span class="badge badge-danger">{{ $event->booking_approval }}</span>@endif
                                            @endif
                                            </td>
                                        </tr>
                                  @php $no++; @endphp
                                   @endforeach      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    
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
                                    @php $no = 1; @endphp
                                    @foreach($donateData['view'] as $donate)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $donate->donate_name }} </td>
                                            <td>{{ $donate->donate_payment_type }} </td>
                                            <td>{{ $allsettings->site_currency_symbol }}{{ $donate->donate_amount }} </td>
                                            <td>@if($donate->donate_payment_status == 'completed') <span class="badge badge-success">Completed</span> @else <span class="badge badge-danger">Pending</span> @endif</td>
                                        </tr>
                                       @php $no++; @endphp
                                   @endforeach 
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

    @include('admin.javascript')
    

</body>

</html>
