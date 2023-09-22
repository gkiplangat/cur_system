<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_sermons == 1)
<title>{{ $single['view']->sermon_title }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
</head>
<body class="index">
     <div id="page-wrapper">

			<!-- Header -->
				@include('header')

		@if($allsettings->display_sermons == 1) 
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ $single['view']->sermon_title }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(74,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="pb-5 mb-5 mt-5 pt-5 single-event">
          <div class="container mb-5 pb-5">
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
          
                <div class="row">
                 <div class="col-md-9" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="card-title">{{ $single['view']->sermon_title }}</h2>
                 <div class="card mb-4">
          @if($single['view']->sermon_image != '') <img src="{{ url('/') }}/public/storage/sermons/{{ $single['view']->sermon_image }}" alt="{{ $single['view']->sermon_title }}" class="card-img-top event-bg" />@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $single['view']->sermon_title }}"  class="card-img-top event-bg"/>  @endif
            <div class="countdown-timing">
            <ul>
                @if($single['view']->sermon_video != '')<li><a href="{{ $single['view']->sermon_video }}" class="rounded popupvideo"><i class="fa fa-video-camera"></i></a></li>@endif
                @if($single['view']->sermon_mp3 != '')<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal-{{ $single['view']->sermon_id }}" class="rounded"><i class="fa fa-volume-up"></i></a></li>@endif
                @if($single['view']->sermon_pdf != '')<li><a href="{{ url('/') }}/public/storage/sermons/{{ $single['view']->sermon_pdf }}" target="_blank" class="rounded"><i class="fa fa-file-pdf-o"></i></a></li>@endif
                
            </ul>
            </div>
            <div class="card-body">
             @if($single['view']->sermon_desc != '')
             <h4 class="h3">{{ Helper::translation(118,$translate,'') }}</h4>
             <div class="text-dark fs16 lh25">{!! html_entity_decode($single['view']->sermon_desc) !!}</div>
             @endif
             <h4 class="h3">{{ Helper::translation(145,$translate,'') }}</h4>
             <a href="{{ URL::to('/pastor') }}/{{ $single['view']->pastor_id }}/{{ $single['view']->pastor_slug }}" class="button rounded"> {{ $single['view']->pastor_name }}</a>           
            </div>
           
            
          </div>
          

           <div class="col-md-12 mb-4 mt-4">
           <h4 class="mb-4">{{ Helper::translation(58,$translate,'') }}</h4>
               <div class="social_icons mt-2">
                   <a class="share-button" data-share-url="{{ URL::to('/sermon') }}/{{ $single['view']->sermon_slug }}" data-share-network="facebook" data-share-text="{{ $single['view']->sermon_short_desc }}" data-share-title="{{ $single['view']->sermon_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/sermons/{{ $single['view']->sermon_image }}" href="javascript:void(0)">
                                                       <img src="{{ url('/') }}/public/img/facebook.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/sermon') }}/{{ $single['view']->sermon_slug }}" data-share-network="twitter" data-share-text="{{ $single['view']->sermon_short_desc }}" data-share-title="{{ $single['view']->sermon_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/sermons/{{ $single['view']->sermon_image }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/twitter.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/sermon') }}/{{ $single['view']->sermon_slug }}" data-share-network="googleplus" data-share-text="{{ $single['view']->sermon_short_desc }}" data-share-title="{{ $single['view']->sermon_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/sermons/{{ $single['view']->sermon_image }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/gplus.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/sermon') }}/{{ $single['view']->sermon_slug }}" data-share-network="linkedin" data-share-text="{{ $single['view']->sermon_short_desc }}" data-share-title="{{ $single['view']->sermon_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/sermons/{{ $single['view']->sermon_image }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/linked.png" width="40">
                                                    </a>
                 </div>       
          </div>
          

        </div>
        
        
        <div class="modal fade" id="myModal-{{ $single['view']->sermon_id }}">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                    
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">{{ $single['view']->sermon_title }}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                    
                          <!-- Modal body -->
                          <div class="modal-body">
                              <audio preload="auto" controls>
					         <source src="{{ url('/') }}/public/storage/sermons/{{ $single['view']->sermon_mp3 }}">
		                     </audio>
                          </div>
                    
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ Helper::translation(63,$translate,'') }}</button>
                          </div>
                    
                        </div>
                      </div>
                    </div>
        
              
              <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="200">
                                
                 
                 
                 <div class="mt-3 pt-3 pb-2 mb-2">
                   <div class="card w-100">
                <div class="card-header sidebar-header text-uppercase">{{ Helper::translation(146,$translate,'') }}</div>
                
                <ul class="media-list mt-3">
                       @foreach($recent['view'] as $recent)
                        <li class="media mb-4 mt-2 no-gutters">
                            <div class="col-md-5 full-width-image">
                            <a href="{{ url('/sermon') }}/{{ $recent->sermon_slug }}" class="captial" title="{{ $recent->sermon_title }}">
                                @if($recent->sermon_image != '') <img src="{{ url('/') }}/public/storage/sermons/{{ $recent->sermon_image }}" alt="{{ $recent->sermon_title }}" class="img-circle mx-auto d-block recent-event"/>@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $recent->sermon_title }}" class="img-circle mx-auto d-block recent-event"/>  @endif</a>
                            </div>
                            <div class="col-md-7 mr-1">
                                <a href="{{ url('/sermon') }}/{{ $recent->sermon_slug }}" class="link-color fs16">{{ $recent->sermon_title }}</a>
                                <div>
                                <small class="fs12">
                                    {{ date('d M Y h:i a', strtotime($recent->sermon_update_date)) }}
                                </small>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
                </div>
                 
                
                 
                 <div class="mt-3 pt-3 pb-2 mb-2">
                   <div class="card w-100">
                <div class="card-header sidebar-header text-uppercase">{{ Helper::translation(66,$translate,'') }}</div>
                 <div class="media-list event-tag mt-3 mb-3">
                    @foreach($sermon_tag as $tags)
                    <a href="{{ url('/sermons') }}/{{ strtolower(str_replace(' ','-',$tags)) }}" class="fs13 rounded">{{ $tags }}</a>
                    @endforeach
                 </div>
                 
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