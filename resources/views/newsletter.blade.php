<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(108,$translate,'') }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
@include('header')
 
<section class="headerbg overlay" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="container text-center">
        <h2 class="mb-0">{{ Helper::translation(108,$translate,'') }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}" class="text-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(108,$translate,'') }}</span></p>
      </div>
    </section>

<section class="best-plan mt-5 mb-5">
<div class="container">
					
					<div class="b_plan_body">					
						
                      
                      
            <div class="row justify-content-center pb-5 mb-5 mt-5 pt-5">
          <div class="col-md-12">
                    <div class="product_archive added_to__cart pb-5 mb-5">
                        @if ($message = Session::get('success'))
                        <div align="center"><h4>{{ $message }}</h4></div>
                        @endif
                        @if ($message = Session::get('error'))
                        <div align="center"><h4>{{ $message }}</h4></div>
                        @endif
                        
                    </div>
                    
                </div>
        </div>
            
					</div>
				</div>
                </section>


@include('script')
@include('footer')
</body>
</html>                            