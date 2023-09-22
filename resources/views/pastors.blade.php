<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_pastors == 1)
<title>{{ Helper::translation(119,$translate,'') }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
</head>
<body>
<div id="page-wrapper" class="pastors-bg">

			<!-- Header -->
				@include('header')

		@if($allsettings->display_pastors == 1) 
			<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(119,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(119,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
     
       <section id="team" class="pt-5 pb-5 mt-5 mb-5">
            <div class="container">
                 <div class="row">
                    
                    @foreach($pastor['view'] as $pastor)
                    <div class="col-lg-3 col-md-4 col-sm-6 li-item">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div align="center">
                                            @if($pastor->pastor_image != "")
                                            <img class=" img-fluid" src="{{ url('/') }}/public/storage/pastors/{{ $pastor->pastor_image }}" alt="{{ $pastor->pastor_image }}">
                                            @else
                                            <img class=" img-fluid" src="{{ url('/') }}/public/img/no-user.png" alt="{{ $pastor->pastor_image }}">
                                            @endif
                                            </div>
                                            <h4 class="h4 mt-2 text-color">{{ $pastor->pastor_name }}</h4>
                                            <p class="card-text fs16 text-dark lh22">{!! substr(nl2br($pastor->pastor_short_desc),0,150) !!}</p>
                                            </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <h4><a href="{{ url('/pastor') }}/{{ $pastor->pastor_id }}/{{ $pastor->pastor_slug }}" class="h4 mt-2 link-color" title="{{ $pastor->pastor_name }}">{{ $pastor->pastor_name }}</a></h4>
                                            <p class="card-text fs16 text-dark lh22">{!! nl2br($pastor->pastor_short_desc) !!}</p>
                                            <ul class="list-inline pastor-social">
                                            @if($pastor->pastor_facebook != '')
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank" href="{{ $pastor->pastor_facebook }}">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($pastor->pastor_twitter != '')     
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank" href="{{ $pastor->pastor_twitter }}">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($pastor->pastor_gplus != '')    
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank" href="{{ $pastor->pastor_gplus }}">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </li>
                                            @endif 
                                            @if($pastor->pastor_youtube != '')    
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank" href="{{ $pastor->pastor_youtube }}">
                                                        <i class="fa fa-youtube"></i>
                                                    </a>
                                                </li>
                                            @endif    
                                            </ul>
                                        </div>
                                        <div align="center" class="pb-2 mb-3"><a href="{{ url('/pastor') }}/{{ $pastor->pastor_id }}/{{ $pastor->pastor_slug }}" class="button rounded" title="{{ $pastor->pastor_name }}"> {{ Helper::translation(7,$translate,'') }}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
        
                </div>
                <div class="row pt-5">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <div class="turn-page" id="pastor-pager"></div>
               </div>
              </div> 
             <div class="clear-fix"></div>
                
                
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