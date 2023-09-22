<!DOCTYPE html>
<html lang="en">
<head>

<title>{{ Helper::translation(11,$translate,'') }} - {{ $allsettings->site_title }}</title>

@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(11,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(11,$translate,'') }}</span></div>
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
           
           @if($cart_count != 0)
           <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover table-bordered">
        <tbody>
            <tr>
                <th>{{ Helper::translation(12,$translate,'') }}</th>
                <th>{{ Helper::translation(13,$translate,'') }}</th>
                <th>{{ Helper::translation(14,$translate,'') }}</th>
                <th>{{ Helper::translation(15,$translate,'') }}</th>
            </tr>
            @php 
            $subtotal = 0; 
            $shipping = 0;
            $total = 0;
            @endphp
            @foreach($cart['product'] as $cart)
            <tr>
                <td>
                <a href="{{ url('/cart') }}/{{ base64_encode($cart->product_order_id) }}" class="" onClick="return confirm('{{ Helper::translation(16,$translate,'') }}');" class="text-danger">
                   <i class="fa fa-trash-o text-danger"></i>                                 
                </a>
                <a href="{{ URL::to('/product') }}/{{ $cart->product_slug }}" title="{{ $cart->product_name }}">
                                            @if($cart->product_featured_image!='')
                                            <img src="{{ url('/') }}/public/storage/products/{{ $cart->product_featured_image }}" alt="{{ $cart->product_name  }}" class="cart-thumb rounded">
                                            @else
                                            <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $cart->product_name }}" class="cart-thumb rounded">
                                            @endif
                                            </a>
                <a href="{{ URL::to('/product') }}/{{ $cart->product_slug }}" class="link-color ml-3">{{ $cart->product_name }}</a>
                </td>
                <td>{{ $cart->product_quantity }}</td>
                <td>{{ $allsettings->site_currency_symbol }} {{ $cart->product_price }}</td>
                <td>{{ $allsettings->site_currency_symbol }} {{ $cart->product_subtotal }}</td>
            </tr>
             @php 
             $subtotal += $cart->product_subtotal;
             $shipping += $cart->product_shipping; 
             $total += $cart->product_total;
             @endphp
             @endforeach
            <tr>
                <th colspan="3"><span class="pull-right">{{ Helper::translation(17,$translate,'') }}</span></th>
                <th>{{ $allsettings->site_currency_symbol }} {{ $subtotal }}</th>
            </tr>
            @if($shipping != 0)
            <tr>
                <th colspan="3"><span class="pull-right">{{ Helper::translation(18,$translate,'') }}</span></th>
                <th>{{ $allsettings->site_currency_symbol }} {{ $shipping }}</th>
            </tr>
            @endif
            <tr>
                <th colspan="3"><span class="pull-right">{{ Helper::translation(107,$translate,'') }}</span></th>
                <th>{{ $allsettings->site_currency_symbol }} {{ $total }}</th>
            </tr>
            <tr>
                 <td><a href="{{ url('/shop') }}" class="button"> {{ Helper::translation(19,$translate,'') }}</a></td>
                <td colspan="3"><a href="{{ url('/checkout') }}" class="button pull-right"> {{ Helper::translation(20,$translate,'') }}</a></td>
            </tr>
        </tbody>
    </table>          
                    <!-- end /.product_archive2 -->
                </div>
                <!-- end .col-md-12 -->
            </div>
            @else
            <div class="h2 text-center mb-2 pb-3"> {{ Helper::translation(21,$translate,'') }}</div>
            @endif   
             
         </div>
      </section>
      

           @include('footer')	

		</div>

</div>
@include('script')

</body>
</html>                              