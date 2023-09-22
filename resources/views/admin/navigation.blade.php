<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                @if($allsettings->site_logo != '')
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}"  alt="{{ $allsettings->site_title }}" width="180"/></a>
                @else
                <a class="navbar-brand" href="{{ url('/') }}">{{ substr($allsettings->site_title,0,10) }}</a>
                @endif
                @if($allsettings->site_favicon != '')
                <a class="navbar-brand hidden" href="{{ url('/') }}"><img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}"  alt="{{ $allsettings->site_title }}" width="24"/></a>
                @else
                <a class="navbar-brand hidden" href="{{ url('/') }}">{{ substr($allsettings->site_title,0,1) }}</a>
                @endif
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                
                   <li>
                        <a href="{{ url('/admin') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                                     
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/general-settings') }}">General Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/font-settings') }}">Font Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/color-settings') }}">Color Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/email-settings') }}">Email Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/media-settings') }}">Media Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/currency-settings') }}">Currency Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/payment-settings') }}">Payment Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/social-settings') }}">Social Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/preferred-settings') }}">Preferred Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/limitation-settings') }}">Limitation Settings</a></li>
                        </ul>
                    </li>
                    
                   <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>Home Layout</a>
                        <ul class="sub-menu children dropdown-menu">
                           
                            <li><i class="fa fa-file-text-o"></i><a href="{{ url('/admin/about-section') }}">About Section</a></li>
                            <li><i class="fa fa-file-text-o"></i><a href="{{ url('/admin/sermon-section') }}">Sermon Section</a></li>
                            <li><i class="fa fa-file-text-o"></i><a href="{{ url('/admin/gallery-section') }}">Gallery Section</a></li>
                            <li><i class="fa fa-file-text-o"></i><a href="{{ url('/admin/product-section') }}">Product Section</a></li>
                            <li><i class="fa fa-file-text-o"></i><a href="{{ url('/admin/testimonial-section') }}">Testimonial Section</a></li>
                            <li><i class="fa fa-file-text-o"></i><a href="{{ url('/admin/blog-section') }}">Blog Section</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{ url('/admin/customer') }}"> <i class="menu-icon ti-user"></i>Customers </a>
                    </li>
                    
                    
                                       
                    <li>
                        <a href="{{ url('/admin/category') }}"> <i class="menu-icon fa fa-location-arrow"></i>Category </a>
                    </li>
                    @if($allsettings->display_shop == 1)
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Shop</a>
                        <ul class="sub-menu children dropdown-menu">
                           
                            <li><i class="fa fa-shopping-cart"></i><a href="{{ url('/admin/products') }}">Products</a></li>
                            <li><i class="fa fa-shopping-cart"></i><a href="{{ url('/admin/orders') }}">Orders</a></li>
                            <li><i class="fa fa-shopping-cart"></i><a href="{{ url('/admin/reviews') }}">Rate & Reviews</a></li>
                         </ul>
                    </li>
                    @endif
                    @if($allsettings->display_events == 1)
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar"></i>Events</a>
                        <ul class="sub-menu children dropdown-menu">
                           
                            <li><i class="fa fa-calendar"></i><a href="{{ url('/admin/events') }}">View Events</a></li>
                            <li><i class="fa fa-calendar"></i><a href="{{ url('/admin/events-bookings') }}">Events Bookings</a></li>
                         </ul>
                    </li>
                    @endif
                    @if($allsettings->display_pastors == 1)
                     <li>
                        <a href="{{ url('/admin/pastors') }}"> <i class="menu-icon fa fa-user"></i>Pastors </a>
                    </li>
                    @endif
                    @if($allsettings->display_sermons == 1)
                    <li>
                        <a href="{{ url('/admin/sermons') }}"> <i class="menu-icon fa fa-newspaper-o"></i>Sermons </a>
                    </li>
                    @endif
                    @if($allsettings->display_blog == 1)
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comments-o"></i>Blog</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="{{ url('/admin/blog-category') }}">Category</a></li>
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="{{ url('/admin/post') }}">Post</a></li>
                        </ul>
                    </li>
                    @endif
                    @if($allsettings->display_gallery == 1)
                    <li>
                        <a href="{{ url('/admin/gallery') }}"> <i class="menu-icon fa fa-image"></i>Gallery </a>
                    </li>
                    @endif
                    @if($allsettings->display_pages == 1) 
                    <li>
                        <a href="{{ url('/admin/pages') }}"> <i class="menu-icon fa fa-file-text-o"></i>Pages </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ url('/admin/slideshow') }}"> <i class="menu-icon fa fa-image"></i>Slideshow </a>
                    </li>
                    @if($allsettings->display_testimonial == 1)
                    <li>
                        <a href="{{ url('/admin/testimonial') }}"> <i class="menu-icon fa fa-quote-left"></i>Testimonials </a>
                    </li>
                    @endif
                    @if($allsettings->display_contact == 1)
                    <li>
                        <a href="{{ url('/admin/contact') }}"> <i class="menu-icon fa fa-address-book-o"></i>Contact </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ url('/admin/donation') }}"> <i class="menu-icon fa fa-money"></i>Donation </a>
                    </li>
                    @if($allsettings->display_newsletter == 1)
                    <li>
                        <a href="{{ url('/admin/newsletter') }}"> <i class="menu-icon fa fa-newspaper-o"></i>Newsletter </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/clear-cache') }}" onClick="return confirm('{{ Helper::translation('61efd92f26dcb',$translate,'Are you sure you want to clear cache') }}?');"> <i class="menu-icon fa fa-trash"></i>{{ Helper::translation('61efd77eb4f5a',$translate,'Clear Cache') }} </a>
                    </li>
                    @endif 
                    @if($allsettings->site_multilanguage == 1)
                    <li>
                        <a href="{{ url('/admin/languages') }}"> <i class="menu-icon fa fa-language"></i>Languages </a>
                    </li>
                    @endif
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>