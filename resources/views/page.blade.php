<!DOCTYPE html>
<html lang="en">
<head>
@if($totalpageCount != 0)
<title>{{ $page['page']->page_title }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		@if($totalpageCount != 0)
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ $page['page']->page_title }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ $page['page']->page_title }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-3 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
            <div class="row">
            
               <div class="col-lg-12 col-md-12 col-sm-12 fs16 lh22 text-dark">
                           {!! html_entity_decode($page['page']->page_desc) !!}
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