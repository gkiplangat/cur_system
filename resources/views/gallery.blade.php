<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_gallery == 1)
<title>{{ Helper::translation(83,$translate,'') }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
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
                          <div class="h2 text-white">{{ Helper::translation(83,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(83,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
            <div class="row">
            @foreach($gallery['view'] as $gallery)
               <div class="col-lg-3 col-md-6 col-sm-6 li-item">
                           <div class="gallery">
                           
                            <a href="{{ url('/') }}/public/storage/gallery/{{ $gallery->gallery_image }}">
                            <img src="{{ url('/') }}/public/storage/gallery/{{ $gallery->gallery_image }}" class="img-fluid rounded">
                            </a>
                            
                           </div>
                         </div>
              @endforeach 
              </div>
              <div class="row pt-5">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <div class="turn-page" id="gallery-pager"></div>
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