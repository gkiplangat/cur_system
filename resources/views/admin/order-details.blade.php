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
                        <h1>Order Details</h1>
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
                                <strong class="card-title">Order Details</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                             <th>Sno</th>
                                            <th>Order Id</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Shipping Price</th>
                                            <th>SubTotal</th>
                                            <th>Total Price</th>
                                            
                                            <th>Payment Status</th>
                                             <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($order['product'] as $order)
                                      <tr>
                                        <td>{{ $no }}</td>
                                         <td>{{ $order->purchase_token }}</td>
                                            <td><a href="{{ URL::to('/product') }}/{{ $order->product_slug }}" class="blue-color" target="_blank">{{ $order->product_name }}</a></td>
                                            <td>{{ $order->product_quantity }}</td>
                                            <td>{{ $allsettings->site_currency_symbol }} {{ $order->product_price }}</td>
                                            <td>{{ $allsettings->site_currency_symbol }} {{ $order->product_shipping }}</td>
                                            <td>{{ $allsettings->site_currency_symbol }} {{ $order->product_subtotal }}</td>
                                            <td>{{ $allsettings->site_currency_symbol }} {{ $order->product_total }}</td>
                                          <td>@if($order->product_order_status == "completed")<span class="badge badge-success">Completed</span>@else<span class="badge badge-danger">Failed</span>@endif</td>  
                                        <td>
                                        @if($demo_mode == 'on') 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                            @else
                                            <a href="{{ URL::to('/admin/order-details') }}/delete/{{ $order->product_order_id }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;Delete</a>@endif
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