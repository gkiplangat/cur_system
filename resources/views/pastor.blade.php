<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_pastors == 1)
<title>{{ $pastor['view']->pastor_name }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

	@if($allsettings->display_pastors == 1) 
	 <section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ $pastor['view']->pastor_name }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(72,$translate,'') }}</span></div>
                        </div>
         </div>
      </section>
                
       
       <section id="team" class="pt-5 pb-5 mt-5 mb-5">
            <div class="container">
                 <div class="row">
                    <div class=" col-lg-4 col-md-6 col-sm-12">
                        <div class="p-4 mb-3">
                            @if($pastor['view']->pastor_image != "")
                            <img src="{{ url('/') }}/public/storage/pastors/{{ $pastor['view']->pastor_image }}" alt="{{ $pastor['view']->pastor_image }}" class="pastor_image" title="{{ $pastor['view']->pastor_name }}">
                            @else
                            <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $pastor['view']->pastor_image }}" class="pastor_image" title="{{ $pastor['view']->pastor_name }}">
                            @endif
                            <div class="pastor-desc">
                              <h2 class="pt-2">{{ $pastor['view']->pastor_name }}</h2>
                              <p class="pt-2">
                              @if($pastor['view']->pastor_facebook != "")
                              <a href="{{ $pastor['view']->pastor_facebook }}" target="_blank" title="facebook"><img src="{{ url('/') }}/public/img/facebook.png" alt=""></a>
                              @endif
                              @if($pastor['view']->pastor_twitter != "")
                              <a href="{{ $pastor['view']->pastor_twitter }}" target="_blank" title="twitter"><img src="{{ url('/') }}/public/img/twitter.png" alt=""></a>
                              @endif
                              @if($pastor['view']->pastor_gplus != "")
                              <a href="{{ $pastor['view']->pastor_gplus }}" target="_blank" title="gplus"><img src="{{ url('/') }}/public/img/gplus.png" alt=""></a>
                              @endif
                              @if($pastor['view']->pastor_youtube != "")
                              <a href="{{ $pastor['view']->pastor_youtube }}" target="_blank" title="youtube"><img src="{{ url('/') }}/public/img/youtube.png" alt=""></a>
                              @endif
                              </p>
                            </div>
                        </div>
                     </div>

                    <div class="col-lg-8 col-md-6 col-sm-12">
                       <div class="p-4 mb-3">
                           @if($pastor['view']->pastor_email != "")
                           <p class="mb-0 font-weight-bold">{{ Helper::translation(26,$translate,'') }}</p>
                           <p class="mb-4"><a href="mailto:{{ $pastor['view']->pastor_email }}" class="link-color">{{ $pastor['view']->pastor_email }}</a></p>
                           @endif
                           @if($pastor['view']->pastor_phone != "")
                           <p class="mb-0 font-weight-bold">{{ Helper::translation(25,$translate,'') }}</p>
                           <p class="mb-4"><a href="tel:{{ $pastor['view']->pastor_phone }}" class="link-color">{{ $pastor['view']->pastor_phone }}</a></p>
                           @endif
                           @if($pastor['view']->pastor_website != "")
                           <p class="mb-0 font-weight-bold">{{ Helper::translation(57,$translate,'') }}</p>
                           <p class="mb-4"><a href="{{ $pastor['view']->pastor_website }}" class="link-color" target="_blank">{{ $pastor['view']->pastor_website }}</a></p>
                           @endif
                       </div>
                       @if($pastor['view']->pastor_desc != "")
                       <div class="p-4">
                       <h3 class="h4 text-black mb-3">{{ Helper::translation(118,$translate,'') }}</h3>
                       <div class="fs16 lh22 text-dark">{!! html_entity_decode($pastor['view']->pastor_desc) !!}</div>              
                       </div>
                       @endif
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