<!DOCTYPE html>
<html lang="en">
<head>

<title>{{ Helper::translation(20,$translate,'') }} - {{ $allsettings->site_title }}</title>

@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(20,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(20,$translate,'') }}</span></div>
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
                <div class="col-md-6">
                    <div class="h3">{{ Helper::translation(22,$translate,'') }}</div>
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
            $product_token = "";
            $product_order_id = "";
            @endphp
            @foreach($cart['product'] as $cart)
            <tr>
                <td>
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
             $product_token .= $cart->product_token.',';
             $product_order_id .= $cart->product_order_id.',';
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
                <th colspan="3"><span class="pull-right">{{ Helper::translation(15,$translate,'') }}</span></th>
                <th>{{ $allsettings->site_currency_symbol }} {{ $total }}</th>
            </tr>
            
        </tbody>
        </table>          
                </div>
                
                <div class="col-md-6">
                    <div class="h3">{{ Helper::translation(23,$translate,'') }}</div>
                    <form action="{{ route('checkout') }}" class="setting_form mt-3" id="checkout_form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">{{ Helper::translation(24,$translate,'') }} <span>*</span></label>
                          <input type="text" class="form-control" id="buyer_name" name="buyer_name" data-bvalidator="required">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">{{ Helper::translation(25,$translate,'') }} <span>*</span></label>
                          <input type="text" class="form-control" id="buyer_phone" name="buyer_phone" data-bvalidator="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">{{ Helper::translation(26,$translate,'') }} <span>*</span></label>
                        <input type="text" class="form-control" id="buyer_email" name="buyer_email" data-bvalidator="required,email">
                      </div>
                      <div class="form-group">
                        <label for="inputAddress2">{{ Helper::translation(27,$translate,'') }} <span>*</span></label>
                        <input type="text" class="form-control" id="buyer_address" name="buyer_address" data-bvalidator="required">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputCity">{{ Helper::translation(28,$translate,'') }} <span>*</span></label>
                          <input type="text" class="form-control" id="buyer_country" name="buyer_country" data-bvalidator="required">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputState">{{ Helper::translation(29,$translate,'') }} <span>*</span></label>
                          <input type="text" class="form-control" id="buyer_state" name="buyer_state" data-bvalidator="required">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputZip">{{ Helper::translation(30,$translate,'') }} <span>*</span></label>
                          <input type="text" class="form-control" id="buyer_city" name="buyer_city" data-bvalidator="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress2">{{ Helper::translation(31,$translate,'') }} <span>*</span></label>
                        <input type="text" class="form-control" id="buyer_postcode" name="buyer_postcode" data-bvalidator="required">
                      </div>
                      <div class="form-group">
                        <label for="inputAddress2">{{ Helper::translation(32,$translate,'') }}</label>
                        <input type="text" class="form-control" id="buyer_notes" name="buyer_notes">
                      </div>
                      <div class="form-group h3 mt-3 pt-3">{{ Helper::translation(33,$translate,'') }}</div>
                       @php $no = 1; @endphp
                        @foreach($get_payment as $payment)
                        <div class="form-group">
                           
                            
                             <input id="opt1-{{ $payment }}" name="payment_method" type="radio" value="{{ $payment }}" data-bvalidator="required">
                              <label for="opt1-{{ $payment }}">{{ $payment }}</label>      
                        </div>
                        @if($payment == 'stripe')
                                <div class="row" id="ifYes" style="display:none;">
                                  <div class="col-md-12 mb-3">
                                        <div class="stripebox">
                                        <label for="card-element">{{ Helper::translation(34,$translate,'') }}</label>
                                        <div id="card-element">
                                            
                                        </div>
                                 
                                        
                                        <div id="card-errors" role="alert"></div>
                                        </div>
                                    </div>    
                                </div>        
                                @endif
                                
                                @php $no++; @endphp
                                @endforeach
                       @if (Auth::check())        
                       @if(Auth::user()->id != 1) 
                       <input type="hidden" name="product_token" value="{{ rtrim($product_token,',') }}">
                       <input type="hidden" name="product_order_id" value="{{ rtrim($product_order_id,',') }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="shipping_price" value="{{ base64_encode($shipping) }}">
                        <input type="hidden" name="sub_total_price" value="{{ base64_encode($subtotal) }}">
                        <input type="hidden" name="total_price" value="{{ base64_encode($total) }}">
                        <input type="hidden" name="token" class="token">
                        <input type="hidden" name="website_url" class="{{ URL::to('/') }}">
                      <button type="submit" class="button"> {{ Helper::translation(35,$translate,'') }}</button>
                      @endif
                      @endif
                    </form>
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