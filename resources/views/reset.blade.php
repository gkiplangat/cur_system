<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(82,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>

<div id="page-wrapper">
@include('header')
 

    <section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(82,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(82,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>

<section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
             <div class="row">
           <div class="main-div col-md-5 mx-auto">
            <div>
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
				
					
                     <form method="POST" action="{{ route('reset') }}" id="login_form">
                        @csrf

                        <input type="hidden" name="user_token" value="{{ $token }}">
						
                        <div class="form-group">
                        <label for="urname">{{ Helper::translation(138,$translate,'') }}</label>
						<input type="password" class="form-control input-lg" name="password" id="password" data-bvalidator="required">
                        </div>
                        <div class="form-group">
                        <label for="urname">{{ Helper::translation(159,$translate,'') }}</label>
						<input type="password" class="form-control input-lg"  name="password_confirmation" id="password_confirmation" data-bvalidator="equal[password],required">
						</div>
                        
						<button type="submit" class="button rounded btn-block">{{ Helper::translation(82,$translate,'') }}</button>
						
					</form>
				
                </div>
                </div>
                
			</div>
		</section>
@include('footer')
</div>
@include('script')

</body>
</html>                            