<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(113,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(113,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(89,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
         <div class="row">
          <div class="col-md-12">
                    @if ($message = Session::get('success'))
                           <div class="alert alert-success" role="alert">
                                            <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-close" aria-hidden="true"></span>
                                            </button>
                                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                                            <span class="alert_icon lnr lnr-warning"></span>
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-close" aria-hidden="true"></span>
                                            </button>
                                        </div>
                    @endif
                    @if (!$errors->isEmpty())
                    <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    @foreach ($errors->all() as $error)
                     
                    {{ $error }}
            
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-close" aria-hidden="true"></span>
                    </button>
                    </div>
                    @endif
               </div>
           </div>
            <div class="row table-responsive">
               <div class="col-lg-12 col-md-12 col-sm-12">
                 <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th>{{ Helper::translation(106,$translate,'') }}</th>
                        <th>{{ Helper::translation(12,$translate,'') }}</th>
                        <th>{{ Helper::translation(115,$translate,'') }}</th>
                        <th>{{ Helper::translation(14,$translate,'') }}</th>
                        <th>{{ Helper::translation(114,$translate,'') }}</th>
                        <th>{{ Helper::translation(116,$translate,'') }}</th>
                        <th>{{ Helper::translation(15,$translate,'') }}</th>
                        <th>{{ Helper::translation(117,$translate,'') }}</th>
                        <th>{{ Helper::translation(103,$translate,'') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($order['product'] as $order)
                      <tr>
                        <td>{{ $order->purchase_token }}</td>
                        <td><a href="{{ URL::to('/product') }}/{{ $order->product_slug }}">{{ $order->product_name }}</a></td>
                        <td>{{ $order->product_quantity }}</td>
                        <td>{{ $allsettings->site_currency_symbol }} {{ $order->product_price }}</td>
                        <td>{{ $allsettings->site_currency_symbol }} {{ $order->product_shipping }}</td>
                        <td>{{ $allsettings->site_currency_symbol }} {{ $order->product_subtotal }}</td>
                        <td>{{ $allsettings->site_currency_symbol }} {{ $order->product_total }}</td>
                        <td>@if($order->product_order_status == "completed")<a href="{{ URL::to('/product-ratings') }}/{{ $order->product_token }}" class="btn btn-success rounded-0">{{ Helper::translation(117,$translate,'') }}</a>@endif 
                        </td>
                        <td>@if($order->product_order_status == "completed")<span class="badge badge-success">{{ Helper::translation(104,$translate,'') }}</span>@else<span class="badge badge-danger">{{ Helper::translation(105,$translate,'') }}</span>@endif</td>
                      </tr>
                      
                  @endforeach
                    </tbody>
                  </table>
                  </div>
              </div>
             </div>
      </section>
        

           @include('footer')	

		</div>

</div>
@include('script')

</body>
</html>                              