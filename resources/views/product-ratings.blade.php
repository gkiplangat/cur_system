<!DOCTYPE html>
<html lang="en">
<head>

<title>{{ Helper::translation(117,$translate,'') }} - {{ $allsettings->site_title }}</title>

@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(117,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(135,$translate,'') }}</span><span class="split text-light">/</span> <span class="text-light">{{ $product['view']->product_name }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 mx-auto">
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
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mx-auto">
                  
                  <form action="{{ route('order-details') }}" class="setting_form" id="checkout_form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-row mb-3 pb-3">
                                        <div class="col-md-3">
                                        @if($product['view']->product_featured_image != "")
                                        <a href="{{ url('/') }}/public/storage/products/{{ $product['view']->product_featured_image }}"><img src="{{ url('/') }}/public/storage/products/{{ $product['view']->product_featured_image }}" title="{{ $product['view']->product_name }}" class="rate-img"></a>
                                        @endif
                                        </div>
                                        <div class="col-md-9">
                                        <a href="{{ URL::to('/product') }}/{{ $product['view']->product_slug }}" class="fs18 link-color">{{ $product['view']->product_name }}</a>
                                        <p class="fs16 lh22 text-dark mt-3">{!! nl2br($product['view']->product_short_desc) !!}</p>
                                        </div>
                                     </div>   
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label>{{ Helper::translation(136,$translate,'') }} <span>*</span></label>
                                          <select name="product_rate"  class="form-control" data-bvalidator="required">
                                            <option value="1" @if($rate_count != 0) @if($order['single']->product_rate == 1) selected @endif @endif>1 Star</option>
                                            <option value="2" @if($rate_count != 0) @if($order['single']->product_rate == 2) selected @endif @endif>2 Stars</option>
                                            <option value="3" @if($rate_count != 0) @if($order['single']->product_rate == 3) selected @endif @endif>3 Stars</option>
                                            <option value="4" @if($rate_count != 0) @if($order['single']->product_rate == 4) selected @endif @endif>4 Stars</option>
                                            <option value="5" @if($rate_count != 0) @if($order['single']->product_rate == 5) selected @endif @endif>5 Stars</option>
                                          </select>
                                        </div>
                                        
                                      </div>
                                   
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <label>{{ Helper::translation(131,$translate,'') }} <span>*</span></label>
                                          <textarea name="product_comments" class="form-control" data-bvalidator="required">@if($rate_count != 0) {{ $order['single']->product_comments }} @endif</textarea>
                                        </div>
                                        
                                      </div>
                                      <input type="hidden" name="product_token" value="{{ $product_token }}">
                                      <input type="hidden" name="user_id" value="{{ $user_id }}">
                                    <div class="form-row">
                                        <button type="submit" class="button"> {{ Helper::translation(37,$translate,'') }}</button>
                                    </div>
                                </form>
                 
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