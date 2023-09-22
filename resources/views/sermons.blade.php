<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_sermons == 1)
<title>{{ Helper::translation(74,$translate,'') }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
</head>
<body>
<div id="page-wrapper" class="pastors-bg">

			<!-- Header -->
				@include('header')

		@if($allsettings->display_sermons == 1) 
			<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">@if($tag_title != '') {{ $tag_title }} @else @if($slug != '') {{ $slug }} @else {{ Helper::translation(74,$translate,'') }} @endif @endif</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(74,$translate,'') }}</span> @if($tag_title != '')<span class="split text-light">/</span> <span class="text-light">"{{ $slug }}"</span> @endif</div>
                        </div>
                    </div>
                </section>
     
       <section id="team" class="pt-5 pb-5 mt-5 mb-5">
            <div class="container">
                 <div class="row sermon-card">
                    @foreach($sermon['view'] as $sermon)
                    <div class="col-lg-4 col-md-6 col-sm-6 li-item">
                      <div class="card-section">
                         <div class="card-section-image">
                         <a href="{{ URL::to('/sermon') }}/{{ $sermon->sermon_slug }}" title="{{ $sermon->sermon_title }}">
                           @if($sermon->sermon_image != "")
                           <img class="sermon-image" src="{{ url('/') }}/public/storage/sermons/{{ $sermon->sermon_image }}" alt="{{ $sermon->sermon_image }}">
                           @else
                           <img class="sermon-image" src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $sermon->sermon_image }}">
                           @endif
                         </a>
                         <div class="card-purchase">
                           <ul>
                              @if($sermon->sermon_video != '')<li><a href="{{ $sermon->sermon_video }}" class="rounded popupvideo"><i class="fa fa-video-camera"></i></a></li>@endif
                              @if($sermon->sermon_mp3 != '')<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal-{{ $sermon->sermon_id }}" class="rounded"><i class="fa fa-volume-up"></i></a></li>@endif
                              @if($sermon->sermon_pdf != '')<li><a href="{{ url('/') }}/public/storage/sermons/{{ $sermon->sermon_pdf }}" target="_blank" class="rounded"><i class="fa fa-file-pdf-o"></i></li>@endif
                           </ul>
                          </div>
                         </div>
                         <div class="card-desc">
                           <div class="title">
                           <a href="{{ URL::to('/sermon') }}/{{ $sermon->sermon_slug }}" class="text-dark fs22">{{ $sermon->sermon_title }}</a>
                           </div>
                           <p class="mt-2 fs16 text-dark lh22">{!! substr(nl2br($sermon->sermon_short_desc),0,150) !!}</p>
                           <div class="card-info">
                           <ul class="list-unstyle">
                           <li><i class="fa fa-calendar"></i> {{ date('M d Y', strtotime($sermon->sermon_update_date)) }}</li>
                           </ul>
                           <a href="{{ URL::to('/sermon') }}/{{ $sermon->sermon_slug }}" class="button rounded"> {{ Helper::translation(69,$translate,'') }}</a>
                           </div>
                         </div>
                      </div>
                      
                      
                      <div class="modal fade" id="myModal-{{ $sermon->sermon_id }}">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                    
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">{{ $sermon->sermon_title }}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                    
                          <!-- Modal body -->
                          <div class="modal-body">
                              <audio preload="auto" controls>
					         <source src="{{ url('/') }}/public/storage/sermons/{{ $sermon->sermon_mp3 }}">
		                     </audio>
                          </div>
                    
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ Helper::translation(63,$translate,'') }}</button>
                          </div>
                    
                        </div>
                      </div>
                    </div>
                    
                    
                    </div>
                   @endforeach 
                </div>
                <div class="row pt-5">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <div class="turn-page" id="sermon-pager"></div>
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