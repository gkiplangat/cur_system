<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_shop == 1)
<title>{{ Helper::translation(71,$translate,'') }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				@include('header')

		@if($allsettings->display_shop == 1)
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">@if($slug != '') {{ $slug }} @else {{ Helper::translation(71,$translate,'') }} @endif</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(71,$translate,'') }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
            
            <div class="row">
                        @foreach($product['view'] as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 li-item">
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
            
            
            
              <div class="row pt-5">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-5">
                <div class="turn-page" id="product-pager"></div>
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