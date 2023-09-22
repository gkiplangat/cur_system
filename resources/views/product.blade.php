<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_shop == 1)
<title>{{ $product['view']->product_name }} - {{ $allsettings->site_title }}</title>
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
                          <div class="h2 text-white">{{ Helper::translation(12,$translate,'') }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ $product['view']->product_name }}</span></div>
                        </div>
                    </div>
                </section>
                
                
       <section class="blog-me pt-5 pb-5 mt-5 mb-5" id="blog">
         <div class="container">
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
    <form class="cmnt_reply_form" action="{{ route('cart') }}" id="product_form" method="post">
    {{ csrf_field() }}           
	<div class="row">
		<div class="col-md-6">
            
            <div class="cars-gallery">
		       <div class="swiper-container gallery-top mb-2 pb-2">
                    <div class="swiper-wrapper">
                    @if($product['view']->product_featured_image != "")
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container gallery">
                          <a href="{{ url('/') }}/public/storage/products/{{ $product['view']->product_featured_image }}"><img src="{{ url('/') }}/public/storage/products/{{ $product['view']->product_featured_image }}" title="{{ $product['view']->product_name }}"></a>
                        </div>
                      </div>
                    @endif  
                    @php $imagecount = count($product['view']->productsimages); @endphp
                    @if($imagecount != 0)
                    @foreach($product['view']->productsimages as $images)
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container gallery">
                          <a href="{{ url('/') }}/public/storage/products/{{ $images->product_image }}"><img src="{{ url('/') }}/public/storage/products/{{ $images->product_image }}" title="{{ $product['view']->product_name }}"></a>
                        </div>
                      </div>
                   @endforeach
                   @endif
                    </div>
                    @if($imagecount != 0)
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                    @endif
               </div>
                 <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                    @php $imagecount = count($product['view']->productsimages); @endphp
                    @if($imagecount != 0)
                    @if($product['view']->product_featured_image != "")
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container">
                          <img src="{{ url('/') }}/public/storage/products/{{ $product['view']->product_featured_image }}" title="{{ $product['view']->product_name }}">
                        </div>
                      </div>
                    @endif 
                    @foreach($product['view']->productsimages as $images) 
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container">
                          <img src="{{ url('/') }}/public/storage/products/{{ $images->product_image }}" title="{{ $product['view']->product_name }}">
                        </div>
                      </div>
                   @endforeach
                   @endif
                    </div>
                </div>
		   </div>
            
		</div>
		<div class="col-sm-6">
            <div class="card-body">
            <h3 class="title mb-3">{{ $product['view']->product_name }}</h3>
            <div class="shop-price fs20 pt-4">@if($product['view']->product_offer_price != 0)<del class="fs20">{{ $allsettings->site_currency_symbol }} {{ $product['view']->product_regular_price }}</del> {{ $allsettings->site_currency_symbol }} {{ $product['view']->product_offer_price }} @else {{ $allsettings->site_currency_symbol }} {{ $product['view']->product_regular_price }} @endif</div>
            
            <div class="pt-4">
               <p class="fs17 text-warning">{{ Helper::translation(127,$translate,'') }} : {{ $product['view']->product_stock }}</p>
            </div>
            
            <div class="product-rating pt-2 pb-2"> 
                                
                                <ul class="rating-text">
                                    @if($getreview == 0)
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    @else
                                    @if($count_rating == 0)
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    
                                    @endif
                                    
                                    @if($count_rating == 1)
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    
                                    @endif
                                    
                                    
                                    @if($count_rating == 2)
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    
                                    @endif
                                    
                                                                       
                                    @if($count_rating == 3)
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    
                                    @endif
                                    
                                    @if($count_rating == 4)
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    
                                    @endif
                                    
                                    @if($count_rating == 5)
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    
                                    @endif
                                    
                                    
                                    @endif
                                </ul>
                                <span class="rating-text">( {{ $getreview }} {{ Helper::translation(128,$translate,'') }} )</span>
                            </div>
            
            
            <div class="pt-2">
               <p class="fs16 lh22 text-dark">{!! nl2br($product['view']->product_short_desc) !!}</p>
            </div>
            
            <div class="pt-5">
               <p class="fs17 text-dark">{{ Helper::translation(55,$translate,'') }} : <a href="{{ url('/shop') }}/category/{{ $product['view']->category_slug }}" class="link-color">{{ $product['view']->category_name }}</a></p>
            </div>
            
            @if($product['view']->product_offer_price != 0)
            @php $price = $product['view']->product_offer_price; @endphp
            @else
            @php $price = $product['view']->product_regular_price; @endphp
            @endif
            
            <div class="row pt-1 mt-1">
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="product_quantity" value="1" data-bvalidator="digit,min[1],max[{{ $product['view']->product_stock }}]">
                     </div>
                    
                    <input type="hidden" name="product_id" value="{{ $product['view']->product_id }}">
                    <input type="hidden" name="product_token" value="{{ $product['view']->product_token }}">
                    <input type="hidden" name="product_price" value="{{ $price }}">
                    <input type="hidden" name="product_shipping" value="{{ $product['view']->product_shipping }}">
                      
                    <div class="col-md-10">
                    @if(Auth::guest())
                    <a href="{{ URL::to('/login') }}" class="button text-uppercase rounded"> {{ Helper::translation(129,$translate,'') }}</a>
                    @endif
                    @if (Auth::check())
                    @if(Auth::user()->id != 1)
                    <input type="hidden" name="product_user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="button text-uppercase rounded"> {{ Helper::translation(129,$translate,'') }}</button>
                    @else
                    <a href="{{ URL::to('/admin') }}/edit-product/{{ $product['view']->product_token }}" class="button text-uppercase rounded"> {{ Helper::translation(130,$translate,'') }}</a>
                    @endif
                    @endif
                    </div>
                </div> <!-- row.// -->
                
                
            </div> <!-- card-body.// -->
		
	</div>



        
              </div>
              </form> 
              
              <div class="row mt-3 pt-3">
                 
                 <div class="col-md-12">
                  <div class="product-tabs">
                      <div class="product-tab-button-outer">
                        <ul id="product-tab-button">
                          <li><a href="#description">{{ Helper::translation(118,$translate,'') }}</a></li>
                          <li><a href="#reviews">{{ Helper::translation(128,$translate,'') }} ({{ $getreview }})</a></li>
                          <li><a href="#comments">{{ Helper::translation(131,$translate,'') }} ({{$count}})</a></li>
                         </ul>
                      </div>
                      <div class="product-tab-select-outer">
                        <select id="product-tab-select">
                          <option value="#description">{{ Helper::translation(118,$translate,'') }}</option>
                          <option value="#reviews">{{ Helper::translation(128,$translate,'') }}</option>
                          <option value="#comments">{{ Helper::translation(131,$translate,'') }} ({{$count}})</option>
                          
                        </select>
                      </div>
                    
                      <div id="description" class="product-tab-contents">
                        <div class="pt-4 fs16 lh22 text-dark">
                         {!! html_entity_decode($product['view']->product_desc) !!}
                        </div>
                      </div>
                      <div id="reviews" class="product-tab-contents">
                        <div class="pt-4">
                         @foreach($rating['display'] as $rating)
                         <div class="comment-wrap mt-5">
                                <div class="photo rating-photo  col-lg-3 col-md-3 col-sm-6">
                                        @if($rating->user_photo != '')
                                        <img src="{{ url('/') }}/public/storage/users/{{ $rating->user_photo }}" class="avatar">
                                        @else
                                        <img src="{{ url('/') }}/public/img/no-user.png" class="avatar">
                                        @endif
                                </div>
                                <div class="comment-block border rounded col-lg-9 col-md-9 col-sm-6">
                                        <p class="fs15 text-black font-weight-bold">{{ $rating->name }}</p>
                                        <p class="fs16 lh22 text-dark">{{ $rating->product_comments	 }}</p>
                                        @if($rating->product_rate  != 0)
                                        <div class="bottom-comment product-rating">
                                        <ul>
                                        @if($rating->product_rate == 5)
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                        @endif
                                        @if($rating->product_rate == 4)
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                        @endif 
                                        @if($rating->product_rate == 3)
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                        @endif 
                                        @if($rating->product_rate == 2)
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                        @endif
                                        @if($rating->product_rate == 1)
                                           <li><i class="fa fa-star"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                           <li><i class="fa fa-star-o"></i></li>
                                        @endif
                                        </ul>
                                       </div>
                                       @endif
                                </div>
                        </div>
                        @endforeach 
                        </div>
                      </div>
                      <div id="comments" class="product-tab-contents">
                        <div class="pt-4">
                        @if(Auth::guest())
                        <p class="fs18">{{ Helper::translation(120,$translate,'') }} <a href="{{ URL::to('/login') }}" class="link-color fs18">{{ Helper::translation(121,$translate,'') }}</a> {{ Helper::translation(132,$translate,'') }}</p>
                        @endif
                        <div class="comments w-100">
                        @if (Auth::check())
                        <div class="comment-wrap mt-5">
                                <div class="photo">
                                        @if(Auth::user()->user_photo != '')
                                        <div class="avatar" style="background-image: url('{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}')"></div>
                                        @else
                                        <div class="avatar" style="background-image: url('{{ url('/') }}/public/img/no-user.png')"></div>
                                        @endif
                                </div>
                                <div class="comment-block p-0 shadow-none">
                                        <form class="cmnt_reply_form" action="{{ route('product-comment') }}" id="comment_form" method="post">
                                                {{ csrf_field() }}
                                                <textarea name="comment_content" id="" cols="30" rows="3" placeholder="{{ Helper::translation(133,$translate,'') }}" data-bvalidator="required"></textarea>
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="product_token" value="{{ $product['view']->product_token }}">
                                                <input type="submit" name="submit" class="button" value="{{ Helper::translation(37,$translate,'') }}">
                                        </form>
                                </div>
                        </div>
                        @endif
                        @if($count != 0)
                        @php $no = 1; @endphp
                        @foreach($comment['display'] as $comment)
                        <div class="comment-wrap @php if($no==1){ echo 'mt-5'; } @endphp">
                                <div class="photo">
                                        @if($comment->user_photo != '')
                                        <div class="avatar" style="background-image: url('{{ url('/') }}/public/storage/users/{{ $comment->user_photo }}')"></div>
                                        @else
                                        <div class="avatar" style="background-image: url('{{ url('/') }}/public/img/no-user.png')"></div>
                                        @endif
                                </div>
                                <div class="comment-block border rounded">
                                        <p class="fs15 text-black font-weight-bold">{{ $comment->name }}</p>
                                        <p class="fs16 lh22 text-dark">{{ $comment->product_comment_content }}</p>
                                        <div class="bottom-comment">
                                                <div class="comment-date">{{ date('d M Y', strtotime($comment->product_comment_date)) }}</div>
                                                
                                        </div>
                                </div>
                        </div>
                        @php $no++; @endphp
                        @endforeach
                        @endif
                        </div>
                        </div>
                      </div>
                     </div>
                 </div>
              </div>
              
              
             
             <div class="row mt-3 pt-3">
             <div class="title-section mt-3 pt-3 pb-3 mb-3 text-center">
                   <div class="h2 text-black">{{ Helper::translation(134,$translate,'') }}</div>
             </div>
             </div>
             <div class="row">
                  @foreach($related['view'] as $product)
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
      @else  
           @include('404') 
      @endif      

           @include('footer')	

		</div>

</div>
@include('script')

</body>
</html>                              