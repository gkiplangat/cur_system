<!DOCTYPE html>
<html lang="en">
<head>

<title>{{ Helper::translation(85,$translate,'') }} - {{ $allsettings->site_title }}</title>

@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		@if($allsettings->display_gallery == 1)
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(86,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(85,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="pt-5 pb-5 mt-5 mb-5">
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
                 <div class="col-lg-12 col-md-12 col-sm-12">
           <form id="login_form" action="{{ route('profile') }}" method="post" action="" role="form" enctype="multipart/form-data">
           {{ csrf_field() }}
                <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputFirstname">{{ Helper::translation(24,$translate,'') }} <span>*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" data-bvalidator="required">
                    </div>
                    <div class="col-md-6">
                        <label for="inputLastname">{{ Helper::translation(137,$translate,'') }} <span>*</span></label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" data-bvalidator="required">
                    </div>
                </div>
                 <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputAddressLine1">{{ Helper::translation(26,$translate,'') }} <span>*</span></label>
                        <input type="text" name="email" id="email" class="form-control" data-bvalidator="email,required" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddressLine2">{{ Helper::translation(138,$translate,'') }}</label>
                        <input type="text" class="form-control" name="password" id="password">
                    </div>
                </div>
                 <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">{{ Helper::translation(139,$translate,'') }} <span>*</span></label>
                         <input type="file" class="form-control" id="user_photo" name="user_photo" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="{{ Helper::translation(140,$translate,'') }}">
                          @if(Auth::user()->user_photo != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}"  class="userphoto"/>@else <img height="50" src="{{ url('/') }}/public/img/no-user.png"  class="userphoto"/>  @endif
                    </div>
                    
                </div>
                <input type="hidden" name="save_photo" value="{{ Auth::user()->user_photo }}">
                                                 
                <input type="hidden" name="image_size" value="{{ $allsettings->site_max_image_size }}">
                <input type="hidden" name="save_password" value="{{ Auth::user()->password }}">
                                                
                <input type="hidden" name="edit_id" value="{{ Auth::user()->user_token }}">
                <div class="row">
                 <div class="col-md-12">
                <button type="submit" class="button float-right">{{ Helper::translation(37,$translate,'') }}</button>
                </div>
                </div>
            </form>
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