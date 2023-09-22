<!DOCTYPE html>
<html lang="en">
<head>

<title>{{ Helper::translation(39,$translate,'') }} - {{ $allsettings->site_title }}</title>

@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(39,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(39,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
                
                
      
          <section id="cover" class="pt-5 pb-5 mt-5 mb-5">
    <div id="cover-caption">
        <div id="container" class="container">
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
                    
                    <div class="info-form">
                        <form action="{{ route('donate-now') }}" class="justify-content-center" id="checkout_form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="form-group">
                            <label for="email">{{ Helper::translation(24,$translate,'') }} <span>*</span></label>
                            <input type="text" class="form-control" id="donate_name" name="donate_name" data-bvalidator="required" value="{{ Auth::user()->name }}">
                          </div>
                          <div class="form-group">
                            <label for="pwd">{{ Helper::translation(26,$translate,'') }} <span>*</span></label>
                            <input type="text" class="form-control" id="donate_email" name="donate_email" data-bvalidator="required,email" value="{{ Auth::user()->email }}">
                          </div>
                          <div class="form-group">
                            <label for="pwd">{{ Helper::translation(25,$translate,'') }} <span>*</span></label>
                            <input type="text" class="form-control" id="donate_phone" name="donate_phone" data-bvalidator="required">
                          </div>
                          <div class="form-group">
                            <label for="pwd">{{ Helper::translation(40,$translate,'') }} ({{ $allsettings->site_currency_code }})<span>*</span></label>
                            <input type="text" class="form-control" id="donate_amount" name="donate_amount" data-bvalidator="required,min[{{ $allsettings->site_minimum_donate }}]">
                          </div>
                          
                          <div class="form-group">
                            <label for="pwd">{{ Helper::translation(38,$translate,'') }} <span>*</span></label>
                            <textarea class="form-control" id="donate_message" name="donate_message" data-bvalidator="required"></textarea>
                          </div>
                          
                          <div class="form-group">
                          <label for="pwd">{{ Helper::translation(33,$translate,'') }} <span>*</span></label><br/>
                       @php $no = 1; @endphp
                        @foreach($get_payment as $payment)
                        <div>
                           
                            
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
                         </div>       
                         <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="token" class="token">
                        <input type="hidden" name="website_url" class="{{ URL::to('/') }}">
                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                          <button type="submit" class="button"> {{ Helper::translation(39,$translate,'') }}</button>
                        </form>
                        
                    </div>
                    <br>

                    
                </div>
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