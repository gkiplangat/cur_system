<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_blog == 1)
<title>{{ $slug }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		@if($allsettings->display_blog == 1)
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ $slug }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(6,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
            <div class="row">
           @foreach($blogData['post'] as $blog)                         
                        <div class="col-lg-4 col-md-6 col-sm-6 li-item">
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
            
            
              <div class="row pt-5">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <div class="turn-page" id="blog-pager"></div>
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