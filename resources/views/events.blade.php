<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_events == 1)
<title>{{ Helper::translation(44,$translate,'') }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		 @if($allsettings->display_events == 1) 
			<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">@if($tag_title != '') {{ $tag_title }} @else @if($slug != '') {{ $slug }} @else {{ Helper::translation(44,$translate,'') }} @endif @endif</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(44,$translate,'') }}</span> @if($tag_title != '')<span class="split text-light">/</span> <span class="text-light">"{{ $slug }}"</span> @endif</div>
                        </div>
                    </div>
          </section>
         
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
            <div class="row">
            @foreach($display['view'] as $event)
               <div class="col-lg-4 col-md-6 col-sm-6 li-item">
                  <div class="single-blog">
                     <div class="blog-img">
                     <a href="{{ url('/event') }}/{{ $event->event_slug }}" title="{{ $event->event_title }}">
                        @if($event->event_photo != '') <img src="{{ url('/') }}/public/storage/events/{{ $event->event_photo }}" alt="{{ $event->event_title }}" />@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $event->event_title }}" />  @endif
                        </a>
                        <div class="post-category">
                           <a href="{{ url('/events') }}/{{ $event->event_cat_id }}/{{ $event->category_slug }}">{{ $event->category_name }}</a>
                        </div>
                     </div>
                     <div class="blog-content">
                        <div class="blog-title">
                           <h3><a href="{{ url('/event') }}/{{ $event->event_slug }}" class="h5 text-dark" title="{{ $event->event_title }}">{{ $event->event_title }}</a></h3>
                           <div class="meta">
                              <ul>
                                 <li><i class="fa fa-calendar-check-o"></i> {{ date('d F Y', strtotime($event->event_start_date_time)) }}</li>
                              </ul>
                           </div>
                        </div>
                        <p class="text-dark">{{ $event->event_short_desc }}</p>
                        <a href="{{ url('/event') }}/{{ $event->event_slug }}" class="button rounded" title="{{ $event->event_title }}"> {{ Helper::translation(69,$translate,'') }}</a>
                     </div>
                  </div>
               </div>
              @endforeach 
              </div>
              <div class="row pt-5">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <div class="turn-page" id="event-pager"></div>
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