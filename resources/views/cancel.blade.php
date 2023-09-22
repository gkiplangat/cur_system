<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(8,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ Helper::translation(9,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(8,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
            <div class="row">
            
               <div class="col-lg-12 col-md-12 col-sm-12 li-item">
                           <div align="center"><h4>{{ Helper::translation(10,$translate,'') }}</h4></div>
                         </div>
             
              </div>
             
         </div>
      </section>
           

           @include('footer')	

		</div>

</div>
@include('script')

</body>
</html>                              