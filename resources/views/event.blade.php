<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_events == 1)
<title>{{ $single['view']->event_title }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
</head>
<body class="index">
     <div id="page-wrapper">

			<!-- Header -->
				@include('header')

		@if($allsettings->display_events == 1) 
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ $single['view']->event_title }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(44,$translate,'') }}</span></div>
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
                    <h2 class="card-title">{{ $single['view']->event_title }}</h2>
                 <div class="card mb-4">
          @if($single['view']->event_photo != '') <img src="{{ url('/') }}/public/storage/events/{{ $single['view']->event_photo }}" alt="{{ $single['view']->event_title }}" class="card-img-top event-bg" />@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $single['view']->event_title }}"  class="card-img-top event-bg"/>  @endif
            <div class="countdown-timer">
              <ul id="example">
                                <li class="pt-2 pb-1 mb-2 rounded"><span class="days">00</span><div>{{ Helper::translation(45,$translate,'') }}</div></li>
                                <li class="pt-2 pb-1 mb-2 rounded"><span class="hours">00</span><div>{{ Helper::translation(46,$translate,'') }}</div></li>
                                <li class="pt-2 pb-1 mb-2 rounded"><span class="minutes">00</span><div>{{ Helper::translation(47,$translate,'') }}</div></li>
		                        <li class="pt-2 pb-1 mb-2 rounded"><span class="seconds">00</span><div>{{ Helper::translation(48,$translate,'') }}</div></li>
            </ul>
            </div>
            
            
            <div class="card-body">
             @if($single['view']->event_desc != '')
             <h4 class="h3">{{ Helper::translation(49,$translate,'') }}</h4>
             <div class="text-dark fs16 lh25">{!! html_entity_decode($single['view']->event_desc) !!}</div>
             @endif
             @php $available_seat = $single['view']->event_available_seat - $single['view']->event_booked_seat; @endphp
             @if($single['view']->event_available_seat != 0)
               @if($available_seat != 0)
             <div align="left"><a href="javascript:void(0);" class="button rounded" data-toggle="modal" data-target="#myModal-new"> {{ Helper::translation(50,$translate,'') }}</a></div>
               @endif
             @endif 
            </div>
           
            
            <div class="card-footer">
              <div class="bs-example">
                <h4 class="h3 event_title">{{ Helper::translation(51,$translate,'') }}</h4>
                <dl class="row lh0">
                    <dt class="col-sm-3">{{ Helper::translation(52,$translate,'') }}</dt>
                    <dd class="col-sm-9">{{ date('d M Y h:i a', strtotime($single['view']->event_start_date_time)) }}</dd>
                    <dt class="col-sm-3">{{ Helper::translation(53,$translate,'') }}</dt>
                    <dd class="col-sm-9">{{ date('d M Y h:i a', strtotime($single['view']->event_end_date_time)) }}</dd>
                    <dt class="col-sm-3">{{ Helper::translation(54,$translate,'') }}</dt>
                    <dd class="col-sm-9">{{ $single['view']->event_location }}</dd>
                    <dt class="col-sm-3">{{ Helper::translation(55,$translate,'') }}</dt>
                    <dd class="col-sm-9"><a href="{{ url('/events') }}/{{ $single['view']->event_cat_id }}/{{ $single['view']->category_slug }}" class="link-color">{{ $single['view']->category_name }}</a></dd>
                </dl>
            </div>
            </div>
            
            <div class="card-footer bg-white">
              <div class="bs-example">
                <h4 class="h3 event_title">{{ Helper::translation(56,$translate,'') }}</h4>
                <dl class="row lh0">
                    <dt class="col-sm-3">{{ Helper::translation(26,$translate,'') }}</dt>
                    <dd class="col-sm-9">{{ $single['view']->event_org_email }}</dd>
                    <dt class="col-sm-3">{{ Helper::translation(25,$translate,'') }}</dt>
                    <dd class="col-sm-9">{{ $single['view']->event_org_phone }}</dd>
                    <dt class="col-sm-3">{{ Helper::translation(57,$translate,'') }}</dt>
                    <dd class="col-sm-9"><a href="{{ $single['view']->event_org_website }}" class="link-color" target="_blank">{{ $single['view']->event_org_website }}</a></dd>
                    <dt class="col-sm-3">{{ Helper::translation(27,$translate,'') }}</dt>
                    <dd class="col-sm-9">{{ $single['view']->event_org_address }}</dd>
                </dl>
            </div>
            </div>
            
            
          </div>

           <div class="col-md-12 mb-4 mt-4">
           <h4 class="mb-4">{{ Helper::translation(58,$translate,'') }}</h4>
               <div class="social_icons mt-2">
                   <a class="share-button" data-share-url="{{ URL::to('/event') }}/{{ $single['view']->event_slug }}" data-share-network="facebook" data-share-text="{{ $single['view']->event_short_desc }}" data-share-title="{{ $single['view']->event_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/events/{{ $single['view']->event_photo }}" href="javascript:void(0)">
                                                       <img src="{{ url('/') }}/public/img/facebook.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/event') }}/{{ $single['view']->event_slug }}" data-share-network="twitter" data-share-text="{{ $single['view']->event_short_desc }}" data-share-title="{{ $single['view']->event_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/events/{{ $single['view']->event_photo }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/twitter.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/event') }}/{{ $single['view']->event_slug }}" data-share-network="googleplus" data-share-text="{{ $single['view']->event_short_desc }}" data-share-title="{{ $single['view']->event_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/events/{{ $single['view']->event_photo }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/gplus.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/event') }}/{{ $single['view']->event_slug }}" data-share-network="linkedin" data-share-text="{{ $single['view']->event_short_desc }}" data-share-title="{{ $single['view']->event_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/events/{{ $single['view']->event_photo }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/linked.png" width="40">
                                                    </a>
                 </div>       
          </div>
          

        </div>
        
        
        <div class="modal fade" id="myModal-new">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">{{ Helper::translation(59,$translate,'') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="{{ route('event') }}" id="booking_form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="email">{{ Helper::translation(60,$translate,'') }}:</label>
                        {{ $available_seat }}
                      </div>
                                            
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(61,$translate,'') }} <span>*</span></label>
                        <input type="text" class="form-control" id="booking_seats" name="booking_seats" data-bvalidator="required,digit,min[1],max[{{ $available_seat }}]">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(24,$translate,'') }} <span>*</span></label>
                        <input type="text" class="form-control" id="booking_name" name="booking_name" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(26,$translate,'') }} <span>*</span></label>
                        <input type="text" class="form-control" id="booking_email" name="booking_email" data-bvalidator="required,email">
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(25,$translate,'') }} <span>*</span></label>
                        <input type="text" class="form-control" id="booking_phone" name="booking_phone" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(38,$translate,'') }} <span>*</span></label>
                        <textarea class="form-control" id="booking_message" name="booking_message" data-bvalidator="required"></textarea>
                      </div>
                      <input type="hidden" name="event_token" value="{{ $single['view']->event_token }}">
                      <input type="hidden" name="event_available_seat" value="{{ $single['view']->event_available_seat }}">
                      <input type="hidden" name="event_booked_seat" value="{{ $single['view']->event_booked_seat }}">
                      <input type="hidden" name="available_seat" value="{{ $available_seat }}">
                      <input type="hidden" name="event_url" value="{{ url('/event') }}/{{ $single['view']->event_slug }}">
                      <button type="submit" class="button rounded"> {{ Helper::translation(62,$translate,'') }}</button>
                    </form>
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
                <div class="card-header sidebar-header text-uppercase">{{ Helper::translation(64,$translate,'') }}</div>
                <ul class="list-group category_block">
                    <li class="list-group-item"><a href="{{ url('/events') }}" class="text-dark"><i class="fa fa-chevron-right"></i> {{ Helper::translation(124,$translate,'') }}</a></li>
                    @foreach($category['view'] as $category)
                    <li class="list-group-item"><a href="{{ url('/events') }}/{{ $category->cat_id }}/{{ $category->category_slug }}" class="text-dark"><i class="fa fa-chevron-right"></i> {{ $category->category_name }} ({{ $count_category->has($category->cat_id) ? count($count_category[$category->cat_id]) : 0 }})</a></li>
                    @endforeach
                </ul>
            </div>
                 
                 </div>
                 
                 
                 
                 <div class="mt-3 pt-3 pb-2 mb-2">
                   <div class="card w-100">
                <div class="card-header sidebar-header text-uppercase">{{ Helper::translation(65,$translate,'') }}</div>
                
                <ul class="media-list mt-3">
                       @foreach($recent['view'] as $recent)
                        <li class="media mb-4 mt-2 no-gutters">
                            <div class="col-md-5 full-width-image">
                            <a href="{{ url('/event') }}/{{ $recent->event_slug }}" class="captial" title="{{ $recent->event_title }}">
                                @if($recent->event_photo != '') <img src="{{ url('/') }}/public/storage/events/{{ $recent->event_photo }}" alt="{{ $recent->event_title }}" class="img-circle mx-auto d-block recent-event"/>@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $recent->event_title }}" class="img-circle mx-auto d-block recent-event"/>  @endif</a>
                            </div>
                            <div class="col-md-7 mr-1">
                                <a href="{{ url('/event') }}/{{ $recent->event_slug }}" class="link-color fs16">{{ $recent->event_title }}</a>
                                <div>
                                <small class="fs12">
                                    {{ date('d M Y h:i a', strtotime($recent->event_start_date_time)) }}
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
                    @foreach($event_tags as $tags)
                    <a href="{{ url('/events') }}/{{ strtolower(str_replace(' ','-',$tags)) }}" class="fs13 rounded">{{ $tags }}</a>
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