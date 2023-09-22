<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_contact == 1)
<title>{{ Helper::translation(36,$translate,'') }} - {{ $allsettings->site_title }}</title>
@else
<title>404 not found - {{ $allsettings->site_title }}</title>
@endif
@include('style')
@if($allsettings->site_google_recaptcha == 1)
{!! RecaptchaV3::initJs() !!}
@endif
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		@if($allsettings->display_contact == 1)
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(36,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(36,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
                
       
       <section class="contact pt-5 pb-5 mt-5 mb-5" id="contact">
<div class="container">
    
    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
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
	    
		<div class="col-lg-5 col-md-5 col-sm-12">
		    <div class="address">
		        
		    <div class="h5 font-weight-bold">{{ Helper::translation(27,$translate,'') }}</div>
		    <ul class="list-unstyled">
		        <li> {{ $allsettings->office_address }}</li>
		    </ul>
		    
		    </div>
		    <div class="email mt-3 pt-3 mb-3 pb-3">
		    <div class="h5 font-weight-bold">{{ Helper::translation(26,$translate,'') }}</div>
		    <ul class="list-unstyled">
		        <li> {{ $allsettings->office_email }}</li>
		        
		    </ul>
		    </div>
		    <div class="phone">
		        <div class="h5 font-weight-bold">{{ Helper::translation(25,$translate,'') }}</div>
		        <ul class="list-unstyled">
		        <li> {{ $allsettings->office_phone }}</li>
		        
		    </ul>
		    </div>
		   
		    
		</div>
		<div class="col-lg-7 col-md-7 col-sm-12">
		    <div class="card">
		        <div class="card-body">
		             <form action="{{ route('contact') }}" class="setting_form" id="contact_form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <input id="from_name" name="from_name" class="form-control" type="text" placeholder="{{ Helper::translation(24,$translate,'') }}" data-bvalidator="required">
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" class="form-control" id="from_email" name="from_email" placeholder="{{ Helper::translation(26,$translate,'') }}" data-bvalidator="email,required">
                            </div>
                          </div>
                        <div class="form-row">
                                                       
                            <div class="form-group col-md-12">
                                      <textarea id="message_text" name="message_text" cols="40" rows="5" class="form-control" placeholder="{{ Helper::translation(38,$translate,'') }}" data-bvalidator="required"></textarea>
                            </div>
                        </div>
                        @if($allsettings->site_google_recaptcha == 1)
                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                {!! RecaptchaV3::field('register') !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="form-row">
                            <button type="submit" class="button"> {{ Helper::translation(37,$translate,'') }}</button>
                        </div>
                    </form>
		        </div>
		    </div>
		</div>
	</div>
	
	
</div>
</section>
       
                
       
      @else  
           @include('404') 
      @endif      

           @include('footer')	

		</div>

</div>
@include('script')

</body>
</html>                              