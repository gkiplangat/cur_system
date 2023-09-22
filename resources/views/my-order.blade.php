<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(89,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(89,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(89,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
            <div class="row table-responsive">
                 <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th>{{ Helper::translation(106,$translate,'') }}</th>
                        <th>{{ Helper::translation(101,$translate,'') }}</th>
                        <th>{{ Helper::translation(102,$translate,'') }}</th>
                        <th>{{ Helper::translation(33,$translate,'') }}</th>
                        <th>{{ Helper::translation(107,$translate,'') }}</th>
                        <th>{{ Helper::translation(7,$translate,'') }}</th>
                        <th>{{ Helper::translation(103,$translate,'') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($order['product'] as $order)
                      <tr>
                        <td>{{ $order->purchase_token }}</td>
                        <td>{{ date('M d,Y', strtotime($order->payment_date)) }}</td>
                        <td>@if($order->payment_token != ""){{ $order->payment_token }}@else<span>---</span>@endif</td>
                        <td>{{ $order->payment_type }}</td>
                        <td>{{ $allsettings->site_currency_symbol }}{{ $order->total_price }}</td>
                        <td><a href="{{ URL::to('/order-details') }}/{{ $order->purchase_token }}" class="btn btn-success rounded-0">{{ Helper::translation(7,$translate,'') }}</a></td>
                        <td>@if($order->payment_status == "completed")<span class="badge badge-success">{{ Helper::translation(104,$translate,'') }}</span>@else<span class="badge badge-danger">{{ Helper::translation(105,$translate,'') }}</span>@endif</td>
                      </tr>
                   @endforeach   
                    </tbody>
                  </table>
              </div>
             </div>
      </section>
        

           @include('footer')	

		</div>

</div>
@include('script')

</body>
</html>                              