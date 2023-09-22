<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(2,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body class="index">
		<div id="page-wrapper">

			<!-- Header -->
				@include('header')

			<!-- Banner -->
				<section id="banner">

					<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                      <div class="carousel-inner">
                        @php $i=1; @endphp
                        @foreach($slideshow['view'] as $slideshow)
                        <div class="carousel-item @if($i==1) active @endif">
                          <img src="{{ url('/') }}/public/storage/slideshow/{{ $slideshow->slide_image }}" alt="First slide">
                          <div class="carousel-caption">
                            <div class="mb-3 mt-5 h1">{{ $slideshow->slide_heading }}</div>
                            <div class="h4">{{ $slideshow->slide_subheading }}</div>
                          </div>
                        </div>
                        @php $i++; @endphp 
                       @endforeach 
                        
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">{{ Helper::translation(93,$translate,'') }}</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">{{ Helper::translation(94,$translate,'') }}</span>
                      </a>
                    </div>

				</section>
                
                @if($upcoming_count != 0)
                <section class="latest-event pt-5 pb-5">
                   <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 calendar text-upper text-left">
                            <div>
                            <span>
                            <i class="fa fa-calendar"></i>
                            </span>
                            <span class="font-weight">
                            
                            {{ Helper::translation(95,$translate,'') }}
                            </span>
                            </div>
                            <div>
                            <span class="event-title clearfix display-inline mt-2">
                            <a href="{{ URL::to('/event') }}/{{ $upcoming['event']->event_slug }}" class="text-white h3">{{ $upcoming['event']->event_title }}</a>
                            </span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-3 text-center">
                            <div class="countdown-timer home-timer">
                            <ul id="example">
                                <li class="pt-2 pb-1 mb-2 rounded"><span class="days">00</span><div>{{ Helper::translation(45,$translate,'') }}</div></li>
                                <li class="pt-2 pb-1 mb-2 rounded"><span class="hours">00</span><div>{{ Helper::translation(46,$translate,'') }}</div></li>
                                <li class="pt-2 pb-1 mb-2 rounded"><span class="minutes">00</span><div>{{ Helper::translation(47,$translate,'') }}</div></li>
		                        <li class="pt-2 pb-1 mb-2 rounded"><span class="seconds">00</span><div>{{ Helper::translation(48,$translate,'') }}</div></li>
                            </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 mt-3 text-right">
                          <a href="{{ URL::to('/event') }}/{{ $upcoming['event']->event_slug }}" class="black-button text-white text-upper rounded"> {{ Helper::translation(69,$translate,'') }}</i></a>
                        </div>
                    </div>
                    </div>
            </section>
            @endif
            
            @if($allsettings->site_about_display == 1)
            <section class="title-section mt-5 pt-3 pb-3 mb-5 text-center">
               <div class="h1 text-black">{{ $allsettings->site_about_heading }}</div>
               <div class="h5 text-secondary fs12">{{ $allsettings->site_about_sub_heading }}</div>
            </section>

			<section class="about-section">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        <p class="text-dark fs16 lh25">{!! nl2br($allsettings->site_about_desc) !!}</p>
		    @if($allsettings->site_about_btnlink != '')<a href="{{ $allsettings->site_about_btnlink }}" class="button rounded p-3">@endif @if($allsettings->site_about_btntext != ''){{ $allsettings->site_about_btntext }}@endif @if($allsettings->site_about_btnlink != '')</a>@endif
                        </div>
                       <div class="col-lg-6 col-md-6 col-sm-12"> 
                        @if($allsettings->site_about_image != '')
                        <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_about_image }}" alt="" class="img-fluid align-middle rounded"/>
                        @endif
                       </div> 
                     </div>   
               </div>
            </section>
            @endif
            
            @if($allsettings->site_sermon_display == 1)
           <section class="sermons-section pb-5 pt-5 mt-5 mb-5"> 
                <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h1 text-black">{{ $allsettings->site_sermon_heading }}</div>
                   <div class="h5 text-secondary fs12">{{ $allsettings->site_sermon_sub_heading }}</div>
                </div>
                
                <div class="container">
                    @foreach($sermons['view'] as $sermon)
                    <div class="row white-bg mt-2 mb-3 pb-5 rounded">
                          <div class="col-lg-2 col-md-2 col-sm-12">
                          <a href="{{ URL::to('/sermon') }}/{{ $sermon->sermon_slug }}" title="{{ $sermon->sermon_title }}">
                                    @if($sermon->sermon_image !='')
                                    <img class="img-fluid align-middle rounded"  src="{{ url('/') }}/public/storage/sermons/{{ $sermon->sermon_image }}" alt="{{ $sermon->sermon_image }}" >@else<img class="img-fluid align-middle rounded"  src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $sermon->sermon_image }}" >@endif
                          </a>          
                          </div>
                         <div class="col-lg-7 col-md-7 col-sm-12 mt-4">
                                    <h4 class="list-group-item-heading"><a href="{{ URL::to('/sermon') }}/{{ $sermon->sermon_slug }}" class="h4 text-dark" title="{{ $sermon->sermon_title }}">{{ $sermon->sermon_title }}</a> </h4>
                                    <p class="list-group-item-text"> {{ date('F d,Y', strtotime($sermon->sermon_update_date)) }}
                                    </p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 mt-4">
                            @if($sermon->sermon_video != '')<a href="{{ $sermon->sermon_video }}" class="icon-button popupvideo rounded"><i class="fa fa-video-camera"></i></a>@endif
                            @if($sermon->sermon_mp3 != '')<a href="javascript:void(0);" class="icon-button rounded" data-toggle="modal" data-target="#myModal-{{ $sermon->sermon_id }}"><i class="fa fa-volume-up"></i></a>@endif
                            @if($sermon->sermon_pdf != '')<a href="{{ url('/') }}/public/storage/sermons/{{ $sermon->sermon_pdf }}" class="icon-button rounded" target="_blank"><i class="fa fa-file-pdf-o"></i></a>@endif
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
                    @endforeach    
                         
                </div>
                
           </section>     
            @endif
            
            
            @if($allsettings->site_gallery_display == 1)
           <section class="pb-3 pt-3 mt-5 mb-5"> 
                <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h1 text-black">{{ $allsettings->site_gallery_heading }}</div>
                   <div class="h5 text-secondary fs12">{{ $allsettings->site_gallery_sub_heading }}</div>
                </div>
                
                <div class="container pt-3 pb-3">
                   
                   <div class="row">
                    @php $i=1; @endphp
                    @foreach($gallery['view'] as $gallery)
                    @php if($i == 1 or $i == 6) { $class = "col-lg-6 col-md-6 col-sm-6"; } else { $class = "col-lg-3 col-md-6 col-sm-6"; } @endphp
                         <div class="{{ $class }}">
                           <div class="gallery">
                           
                            <a href="{{ url('/') }}/public/storage/gallery/{{ $gallery->gallery_image }}">
                            <img src="{{ url('/') }}/public/storage/gallery/{{ $gallery->gallery_image }}" class="img-fluid rounded">
                            </a>
                            
                           </div>
                         </div>
                      @php $i++; @endphp   
                      @endforeach     
                   </div>
                   
                </div>
            
            </section>
            
                 
            @endif
            
            
            @if($allsettings->site_product_display == 1)
            <section class="pb-3 pt-3 mt-5 mb-5"> 
                <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h1 text-black">{{ $allsettings->site_product_heading }}</div>
                   <div class="h5 text-secondary fs12">{{ $allsettings->site_product_sub_heading }}</div>
                </div>
                
                <div class="container pt-3 pb-3">
                    
                    <div class="row">
                        @foreach($product['view'] as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-grid9">
                                <div class="product-image9">
                                    <a href="{{ URL::to('/product') }}/{{ $product->product_slug }}">
                                        @if($product->product_featured_image != "")
                                        <img class="pic-1" src="{{ url('/') }}/public/storage/products/{{ $product->product_featured_image }}">
                                        @else
                                        <img class="pic-1" src="{{ url('/') }}/public/img/no-image.jpg">
                                        @endif
                                        @php $imagecount = count($product->productsimages); @endphp
                                        @if($imagecount != 0)
                                        @php $no = 1; @endphp
                                        @foreach($product->productsimages as $images)
                                        @if($no == 1)
                                        <img class="pic-2" src="{{ url('/') }}/public/storage/products/{{ $images->product_image }}">
                                        @endif
                                        @php $no++; @endphp
                                        @endforeach
                                        @else
                                        <img class="pic-2" src="{{ url('/') }}/public/storage/products/{{ $product->product_featured_image }}">
                                        @endif
                                    </a>
                                    <a href="{{ URL::to('/product') }}/{{ $product->product_slug }}" class="fa fa-search product-full-view"></a>
                                </div>
                                <div class="product-content">
                                    <h3 class="h3"><a href="{{ URL::to('/product') }}/{{ $product->product_slug }}" class="text-dark">{{ $product->product_name }}</a></h3>
                                    <div class="price">@if($product->product_offer_price != 0)<del>{{ $allsettings->site_currency_symbol }} {{ $product->product_regular_price }}</del> {{ $allsettings->site_currency_symbol }} {{ $product->product_offer_price }} @else {{ $allsettings->site_currency_symbol }} {{ $product->product_regular_price }} @endif</div>
                                    <a class="add-to-cart" href="{{ URL::to('/product') }}/{{ $product->product_slug }}">{{ Helper::translation(96,$translate,'') }}</a>
                                </div>
                            </div>
                        </div> 
                        @endforeach
                        
                        
                    </div>
                </div>
                
            </section>
            @endif
            
            
            
            @if($allsettings->site_testimonial_display == 1)
            <section class="pt-5 pb-5" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}'); background-repeat: no-repeat; background-size: cover;"> 
                <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h1 text-white">{{ $allsettings->site_testimonial_heading }}</div>
                   <div class="h5 text-secondary fs12">{{ $allsettings->site_testimonial_sub_heading }}</div>
                </div>
                <div class="container pt-3 pb-3">
                      <div class="row">   
                         <div id="testim" class="testim">
                                <div class="wrap">
                    
                                    <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                                    <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                                    <ul id="testim-dots" class="dots">
                                        @php $i=1; @endphp
                                        @foreach($testimonial_dots['display'] as $test)
                                        <li class="dot @if($i == 1) active @endif"></li>
                                        @php $i++; @endphp
                                        @endforeach
                                    </ul>
                                    <div id="testim-content" class="cont">
                                        @php $j=1; @endphp
                                        @foreach($testimonial['view'] as $testimonial)                  
                                        <div @if($j == 1) class="active" @endif>
                                            @if($testimonial->testimonial_image != '')
                                            <div class="img"><img src="{{ url('/') }}/public/storage/testimonial/{{ $testimonial->testimonial_image }}" alt=""></div>
                                            @else
                                            <div class="img"><img src="{{ url('/') }}/public/img/no-user.png" alt=""></div>
                                            @endif
                                            <div class="h4">{{ $testimonial->testimonial_name }}</div>
                                            <p>{!! nl2br($testimonial->testimonial_desc) !!}</p>                    
                                        </div>
                                        @php $j++; @endphp
                                        @endforeach
                    
                                    </div>
                                     </div>
                             </div>
                     </div>     
                </div>
           </section>     
           @endif 
            
           @if($extrasettings->site_blog_display == 1) 
           <section class="pb-3 pt-3 mt-5 mb-5"> 
                <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h1 text-black">{{ $extrasettings->site_blog_heading }}</div>
                   <div class="h5 text-secondary fs12">{{ $extrasettings->site_blog_sub_heading }}</div>
                </div>
                
                <div class="container pt-3 pb-3">
                   <div class="row">
                        @foreach($blog['view'] as $blog)                         
                        <div class="col-lg-4 col-md-6 col-sm-6">
                           <div class="single-blog-item">
                                <div class="blog-thumnail">
                                    @if($blog->post_image != '')
                                    <a href="{{ URL::to('/post') }}/{{ $blog->post_slug }}" title="{{ $blog->post_title }}"><img src="{{ url('/') }}/public/storage/post/{{ $blog->post_image }}" alt="blog-img rounded"></a>
                                    @else
                                    <a href="{{ URL::to('/post') }}/{{ $blog->post_slug }}" title="{{ $blog->post_title }}"><img src="{{ url('/') }}/public/img/no-image.jpg" alt="blog-img rounded"></a>
                                    @endif
                                </div>
                                <div class="blog-content">
                                    <h4 class="title"><a href="{{ URL::to('/post') }}/{{ $blog->post_slug }}" class="fs18 text-black" title="{{ $blog->post_title }}">{{ $blog->post_title }}</a></h4>
                                    <p class="fs16 text-dark">{!! substr(nl2br($blog->post_short_desc),0,200).'...' !!}</p>
                                    <a href="{{ URL::to('/post') }}/{{ $blog->post_slug }}" class="button rounded" title="{{ $blog->post_title }}"> {{ Helper::translation(7,$translate,'') }}</a>
                                    <span class="float-right text-dark"><i class="fa fa-comments"></i> {{ $comments->has($blog->post_id) ? count($comments[$blog->post_id]) : 0 }}</span>
                                </div>
                                <span class="blog-date">{{ date('M d, Y', strtotime($blog->post_date)) }}</span>
                            </div>
                         </div>
                       @endforeach
            	   </div>
                   
                </div>
           </section>     
           @endif
           
           @if($allsettings->display_newsletter == 1)
           <section class="subscribe-area pb-5 pt-5">
            <div class="container">
                <div>
                  @if ($message = Session::get('news-success'))
                  <div class="alert alert-success" role="alert">
                                                        <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                                        {{ $message }}
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span class="fa fa-close" aria-hidden="true"></span>
                                                        </button>
                  </div>
                  @endif
                  @if ($message = Session::get('news-error'))
                  <div class="alert alert-danger" role="alert">
                              <span class="alert_icon lnr lnr-warning"></span>
                                                        {{ $message }}
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span class="fa fa-close" aria-hidden="true"></span>
                                                        </button>
                             </div>
                  @endif
                  </div>
                
                <div class="row pb-5 pt-4">
            
                                <div class="col-md-4">
                                    <div class="subscribe-text mb-3">
                                        <span>{{ Helper::translation(97,$translate,'') }}</span>
                                        <h2>{{ Helper::translation(98,$translate,'') }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    
                                    <div class="subscribe-wrapper subscribe2-wrapper mb-3">
                                        <div class="subscribe-form">
                                            <form action="{{ route('newsletter') }}" id="footer_form" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <input placeholder="{{ Helper::translation(79,$translate,'') }}" type="email" name="news_email" class="rounded mb-3" data-bvalidator="required">
                                                <button type="submit" class="black-button text-white text-upper rounded"> {{ Helper::translation(99,$translate,'') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
            </div>
            </section>
            @endif
           
			<!-- Footer image-hover img-inner-shadow -->
			@include('footer')	

		</div>

</div>
@include('script')

</body>
</html>                            