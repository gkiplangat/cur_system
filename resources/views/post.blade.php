<!DOCTYPE html>
<html lang="en">
<head>
@if($allsettings->display_blog == 1)
<title>{{ $edit['post']->post_title }} - {{ $allsettings->site_title }}</title>
@else
<title>{{ Helper::translation(1,$translate,'') }} - {{ $allsettings->site_title }}</title>
@endif
@include('style')
</head>
<body class="index">
     <div id="page-wrapper">

			<!-- Header -->
				@include('header')

		@if($allsettings->display_blog == 1)
				<section id="banner">
                   <div class="headerbg overlay other-header" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
                      <div class="container text-center">
                          <div class="h2 text-white">{{ $edit['post']->post_title }}</div>
                          <div><a href="{{ URL::to('/') }}" class="link-color">{{ Helper::translation(2,$translate,'') }}</a> <span class="split text-light">/</span> <span class="text-light">{{ Helper::translation(6,$translate,'') }}</span> <span class="split text-light">/</span> <span class="text-light">{{ $edit['post']->post_title }}</span></div>
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
                    <h2 class="card-title">{{ $edit['post']->post_title }}</h2>
                 <div class="card mb-4">
          @if($edit['post']->post_image!='') 
          <img src="{{ url('/') }}/public/storage/post/{{ $edit['post']->post_image }}" alt="{{ $edit['post']->post_title }}" class="card-img-top event-bg" />@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $edit['post']->post_title }}"  class="card-img-top event-bg"/>  @endif
            <span class="post-date">{{ date('M d, Y', strtotime($edit['post']->post_date)) }}</span>          
            <div class="card-body">
             
             @if($edit['post']->post_desc != '')
             <h4 class="h3">{{ Helper::translation(49,$translate,'') }}</h4>
             <div class="text-dark fs16 lh25">{!! html_entity_decode($edit['post']->post_desc) !!}</div>
             @endif
             <hr/>
             <div class="post-icon">
             <span><a href="{{ URL::to('/blog') }}/category/{{ $edit['post']->blog_cat_id }}/{{ $edit['post']->blog_category_slug }}" class="link-color">
                                            <i class="fa fa-list-alt"></i> {{ $edit['post']->blog_category_name }}</p>
                                            </a></span><span><i class="fa fa-comments"></i> {{ $count }}</span></div>
            </div>
           
          </div>

           <div class="col-md-12 mb-4 mt-4">
           <h4 class="mb-4">{{ Helper::translation(58,$translate,'') }}</h4>
               <div class="social_icons mt-2">
                   <a class="share-button" data-share-url="{{ URL::to('/post') }}/{{ $edit['post']->post_slug }}" data-share-network="facebook" data-share-text="{{ $edit['post']->post_short_desc }}" data-share-title="{{ $edit['post']->post_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/post/{{ $edit['post']->post_image }}" href="javascript:void(0)">
                                                       <img src="{{ url('/') }}/public/img/facebook.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/post') }}/{{ $edit['post']->post_slug }}" data-share-network="twitter" data-share-text="{{ $edit['post']->post_short_desc }}" data-share-title="{{ $edit['post']->post_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/post/{{ $edit['post']->post_image }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/twitter.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/post') }}/{{ $edit['post']->post_slug }}" data-share-network="googleplus" data-share-text="{{ $edit['post']->post_short_desc }}" data-share-title="{{ $edit['post']->post_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/post/{{ $edit['post']->post_image }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/gplus.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/post') }}/{{ $edit['post']->post_slug }}" data-share-network="linkedin" data-share-text="{{ $edit['post']->post_short_desc }}" data-share-title="{{ $edit['post']->post_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/post/{{ $edit['post']->post_image }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/linked.png" width="40">
                                                    </a>
                 </div>       
          </div>
          
          
        @if(Auth::guest())
          <div class="mb-5 mt-5"> 
             <p class="fs18">{{ Helper::translation(120,$translate,'') }} <a href="{{ URL::to('/login') }}" class="link-color fs18">{{ Helper::translation(121,$translate,'') }}</a> {{ Helper::translation(122,$translate,'') }}</p>
          </div>      
         @endif
         
         
         
         <div class="mb-5 bg-white @if (Auth::check()) card border rounded @endif"> 
          
          <div class="comments">
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
                                <form class="cmnt_reply_form" action="{{ route('post') }}" id="comment_form" method="post">
                                        {{ csrf_field() }}
                                        <textarea name="comment_content" id="" cols="30" rows="3" placeholder="{{ Helper::translation(123,$translate,'') }}" data-bvalidator="required"></textarea>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="post_id" value="{{ $edit['post']->post_id }}">
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
                                <p class="fs16 lh22 text-dark">{{ $comment->comment_content }}</p>
                                <div class="bottom-comment">
                                        <div class="comment-date">{{ date('d M Y', strtotime($comment->comment_date)) }}</div>
                                        
                                </div>
                        </div>
                </div>
                @php $no++; @endphp
                @endforeach
                @endif
                
        </div>
        
        </div>
         
      

        </div>
        
        
        
        
              
              <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="200">
                 <div class="mt-3 pt-3 pb-2 mb-2">
                   <div class="card w-100">
                <div class="card-header sidebar-header text-uppercase">{{ Helper::translation(64,$translate,'') }}</div>
                <ul class="list-group category_block">
                    <li class="list-group-item"><a href="{{ url('/blog') }}" class="text-dark"><i class="fa fa-chevron-right"></i> {{ Helper::translation(124,$translate,'') }}</a></li>
                    @foreach($catData['post'] as $post)
                    <li class="list-group-item"><a href="{{ URL::to('/blog') }}/category/{{ $post->blog_cat_id }}/{{ $post->blog_category_slug }}" class="text-dark"><i class="fa fa-chevron-right"></i> {{ $post->blog_category_name }} ({{ $category_count->has($post->blog_cat_id) ? count($category_count[$post->blog_cat_id]) : 0 }})</a></li>
                    @endforeach
                </ul>
            </div>
                 
                 </div>
                 
                 
                 
                 <div class="mt-3 pt-3 pb-2 mb-2">
                   <div class="card w-100">
                <div class="card-header sidebar-header text-uppercase">{{ Helper::translation(125,$translate,'') }}</div>
                
                <ul class="media-list mt-3">
                       @foreach($blogPost['latest'] as $post)
                        <li class="media mb-4 mt-2 no-gutters">
                            <div class="col-md-5 full-width-image">
                            <a href="{{ URL::to('/post') }}/{{ $post->post_slug }}" class="captial" title="{{ $post->post_title }}">
                                @if($post->post_image!='') <img src="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" alt="{{ $post->post_title }}" class="img-circle mx-auto d-block recent-event"/>@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $post->post_title }}" class="img-circle mx-auto d-block recent-event"/>  @endif</a>
                            </div>
                            <div class="col-md-7 mr-1">
                                <a href="{{ URL::to('/post') }}/{{ $post->post_slug }}" class="link-color fs16">{{ $post->post_title }}</a>
                                <div>
                                <small class="fs12">
                                      {{ date('d M Y h:i a', strtotime($post->post_date)) }}
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
                <div class="card-header sidebar-header text-uppercase">{{ Helper::translation(126,$translate,'') }}</div>
                 <div class="media-list event-tag mt-3 mb-3">
                    @foreach($post_tags as $tags)
                    <a href="{{ url('/blog') }}/{{ strtolower(str_replace(' ','-',$tags)) }}" class="fs13 rounded">{{ $tags }}</a>
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