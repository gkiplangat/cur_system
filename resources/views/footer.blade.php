<section id="footer">
		<div class="container">
			<div class="row pt-3 pb-5">
				<div class="col-lg-3 col-md-6 col-sm-6 mb-5">
					<div class="footer-logo mb-5">  
                      @if($allsettings->site_logo != '')
                        <a href="{{ URL::to('/') }}">
                        <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}" class="img-fluid">
                        </a>
                        @endif
                     </div>
                     <div  class="footer-contact">   
					 <p><i class="fa fa-address-card-o"></i> {{ $allsettings->office_address }}</p> 
                     <p><i class="fa fa-envelope"></i> <a href="mailto:{{ $allsettings->office_email }}">{{ $allsettings->office_email }}</a></p>
                     <p><i class="fa fa-phone-square"></i> <a href="tel:{{ $allsettings->office_phone }}">{{ $allsettings->office_phone }}</a></p>
                     </div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 mb-5">
					<h5 class="mb-5">{{ Helper::translation(70,$translate,'') }}</h5>
					<ul class="list-unstyled quick-links">
                        @if($allsettings->display_shop == 1)
						<li><a href="{{ URL::to('/shop') }}" class="text-light">{{ Helper::translation(71,$translate,'') }}</a></li>
                        @endif
                        @if($allsettings->display_pastors == 1)
                        <li><a href="{{ URL::to('/pastors') }}" class="text-light">{{ Helper::translation(72,$translate,'') }}</a></li>
                        @endif
                        @if($allsettings->display_events == 1)
						<li><a href="{{ URL::to('/events') }}" class="text-light">{{ Helper::translation(44,$translate,'') }}</a></li>
                        @endif
                        @if($allsettings->display_testimonial == 1)
                        <li><a href="{{ URL::to('/testimonials') }}" class="text-light">{{ Helper::translation(73,$translate,'') }}</a></li>
                        @endif
                        @if($allsettings->display_sermons == 1)
                        <li><a href="{{ URL::to('/sermons') }}" class="text-light">{{ Helper::translation(74,$translate,'') }}</a></li>
                        @endif
                        @if($allsettings->display_blog == 1)
                        <li><a href="{{ URL::to('/blog') }}" class="text-light">{{ Helper::translation(6,$translate,'') }}</a></li>
                        @endif
					</ul>
				</div>
				@if($totalpageCount != 0)
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5">
					<h5 class="mb-5">{{ Helper::translation(75,$translate,'') }}</h5>
					<ul class="list-unstyled quick-links">
                    @foreach($footerpages['pages'] as $pages)
						<li><a href="{{ URL::to('/page/') }}/{{ $pages->page_slug }}" class="text-light">{{ $pages->page_title }}</a></li>
					@endforeach	
                     @if($allsettings->display_contact == 1)
                                   <li><a href="{{ URL::to('/contact') }}" class="text-light">{{ Helper::translation(36,$translate,'') }}</a></li>
                     @endif
					</ul>
				</div>
                @endif
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5">
                   <div class="footer-social-link">
                     <h5 class="mb-5">{{ Helper::translation(76,$translate,'') }}</h5>
                             <ul>
                               @if($allsettings->facebook_url != '')
                                <li>
                                    <a href="{{ $allsettings->facebook_url }}" target="_blank" title="facebook" class="text-light">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                @endif
                                @if($allsettings->twitter_url != '')
                                <li>
                                    <a href="{{ $allsettings->twitter_url }}" target="_blank" title="twitter" class="text-light">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                @endif
                                @if($allsettings->gplus_url != '')
                                <li>
                                    <a href="{{ $allsettings->gplus_url }}" target="_blank" title="google" class="text-light">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                @endif
                                @if($allsettings->pinterest_url != '')
                                <li>
                                    <a href="{{ $allsettings->pinterest_url }}" target="_blank" title="pinterest" class="text-light">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                @endif
                                @if($allsettings->instagram_url != '')
                                <li>
                                    <a href="{{ $allsettings->instagram_url }}" target="_blank" title="instagram" class="text-light">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                
			</div>
			
		</div>
</section>
<section id="copyright">
  <div class="container">
    <div class="pt-4 pb-2">
       <p class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">{!! $allsettings->site_copyright !!} {{ $allsettings->site_title }}</p>
    </div>
  </div>
</section>            
<a id='backTop'>{{ Helper::translation(77,$translate,'') }}</a>