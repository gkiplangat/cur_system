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
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Event Bookings</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
         @if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
@if (session('error'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Event Bookings</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th width="100">Event Name</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Want seats?</th>
                                            <th>Phone</th>
                                            <th width="100">Message</th>
                                            <th>Date</th>
                                            <th width="200">Approval / Reject </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($event['view'] as $event)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td><a href="{{ url('/event') }}/{{ $event->event_slug }}" target="_blank" class="blue-color">{{ $event->event_title }}</a> </td>
                                            <td>{{ $event->booking_name }} </td>
                                            
                                            <td>{{ $event->booking_email }} </td>
                                            <td>{{ $event->booking_seats }} </td>
                                            <td>{{ $event->booking_phone }} </td>
                                            <td>{{ $event->booking_message }} </td>
                                            <td>{{ date('d F Y', strtotime($event->booking_date)) }} </td>
                                            <td>
                                            @if($event->booking_approval == "")
                                            <a href="events-bookings/approval/{{ $event->booking_id }}/{{ $event->event_token }}" class="btn btn-success btn-sm" onClick="return confirm('Are you sure you want to approval?');">Approval?</a>
                                            <a href="events-bookings/reject/{{ $event->booking_id }}/{{ $event->event_token }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to reject?');">Reject?</a>
                                            @else
                                            @if($event->booking_approval == 'Approved')<span class="badge badge-success">{{ $event->booking_approval }}</span> @else <span class="badge badge-danger">{{ $event->booking_approval }}</span>@endif
                                            @endif
                                            </td>
                                            <td>
                                            @if($demo_mode == 'on') 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                            @else
                                            <a href="events-bookings/{{ $event->booking_id }}/{{ $event->booking_status }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;Delete</a>@endif
                                            </td>
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
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   @include('admin.javascript')


</body>

</html>
