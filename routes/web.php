<?php
/* admin panel */


    Route::group(['middleware' => ['is_admin', 'XSS']], function () {
    Route::get('/admin', 'Admin\AdminController@admin');
	
	
	/* customer */
	Route::get('/admin/customer', 'Admin\MembersController@customer');
	Route::get('/admin/add-customer', 'Admin\MembersController@add_customer')->name('admin.add-customer');
	Route::post('/admin/add-customer', 'Admin\MembersController@save_customer');
	Route::get('/admin/customer/{token}', 'Admin\MembersController@delete_customer');
	Route::get('/admin/edit-customer/{token}', 'Admin\MembersController@edit_customer')->name('admin.edit-customer');
	Route::post('/admin/edit-customer', ['as' => 'admin.edit-customer','uses'=>'Admin\MembersController@update_customer']);
	Route::get('/admin/customer/{token}/{subcr_id}', 'Admin\MembersController@upgrade_customer');
	/* customer */
	
	
	
	/* edit profile */
	
	Route::get('/admin/edit-profile', 'Admin\MembersController@edit_profile');
	Route::post('/admin/edit-profile', ['as' => 'admin.edit-profile','uses'=>'Admin\MembersController@update_profile']);
	/* edit profile */
	
	
	/* general settings */
	
	Route::get('/admin/general-settings', 'Admin\SettingsController@general_settings');
	Route::post('/admin/general-settings', ['as' => 'admin.general-settings','uses'=>'Admin\SettingsController@update_general_settings']);
		
	/* general settings */
	
	
	/* media settings */
	
	Route::get('/admin/media-settings', 'Admin\SettingsController@media_settings');
	Route::post('/admin/media-settings', ['as' => 'admin.media-settings','uses'=>'Admin\SettingsController@update_media_settings']);
		
	/* media settings */
	
	
	/* email settings */
	
	Route::get('/admin/email-settings', 'Admin\SettingsController@email_settings');
	Route::post('/admin/email-settings', ['as' => 'admin.email-settings','uses'=>'Admin\SettingsController@update_email_settings']);
	
	/* email settings */
	
	/* currency settings */
	Route::get('/admin/currency-settings', 'Admin\SettingsController@currency_settings');
	Route::post('/admin/currency-settings', ['as' => 'admin.currency-settings','uses'=>'Admin\SettingsController@update_currency_settings']);
	/* currency settings */
	
	
	/* preferred settings */
	Route::get('/admin/preferred-settings', 'Admin\SettingsController@preferred_settings');
	Route::post('/admin/preferred-settings', ['as' => 'admin.preferred-settings','uses'=>'Admin\SettingsController@update_preferred_settings']);
	/* preferred settings */
	
	
	
	
	/* social settings */
	
	Route::get('/admin/social-settings', 'Admin\SettingsController@social_settings');
	Route::post('/admin/social-settings', ['as' => 'admin.social-settings','uses'=>'Admin\SettingsController@update_social_settings']);
	
	/* social settings */
	
	
	/* color settings */
	
	Route::get('/admin/color-settings', 'Admin\SettingsController@color_settings');
	Route::post('/admin/color-settings', ['as' => 'admin.color-settings','uses'=>'Admin\SettingsController@update_color_settings']);
	
	/* color settings */
	
	
	/* font settings */
	
	Route::get('/admin/font-settings', 'Admin\SettingsController@font_settings');
	Route::post('/admin/font-settings', ['as' => 'admin.font-settings','uses'=>'Admin\SettingsController@update_font_settings']);
	
	/* font settings */
	
	
	
	/* payment settings */
	
	Route::get('/admin/payment-settings', 'Admin\SettingsController@payment_settings');
	Route::post('/admin/payment-settings', ['as' => 'admin.payment-settings','uses'=>'Admin\SettingsController@update_payment_settings']);
	
	/* payment settings */
	
	/* about section layout */
	
	Route::get('/admin/about-section', 'Admin\SettingsController@about_section');
	Route::post('/admin/about-section', ['as' => 'admin.about-section','uses'=>'Admin\SettingsController@update_about_section']);
	
	/* about section layout */
	
	/* limitation settings */
	Route::get('/admin/limitation-settings', 'Admin\SettingsController@limitation_settings');
	Route::post('/admin/limitation-settings', ['as' => 'admin.limitation-settings','uses'=>'Admin\SettingsController@update_limitation_settings']);
	/* limitation settings */
	
	
	/* sermon section layout */
	
	Route::get('/admin/sermon-section', 'Admin\SettingsController@sermon_section');
	Route::post('/admin/sermon-section', ['as' => 'admin.sermon-section','uses'=>'Admin\SettingsController@update_sermon_section']);
	
	/* sermon section layout */
	
	
	/* gallery section layout */
	
	Route::get('/admin/gallery-section', 'Admin\SettingsController@gallery_section');
	Route::post('/admin/gallery-section', ['as' => 'admin.gallery-section','uses'=>'Admin\SettingsController@update_gallery_section']);
	
	/* gallery section layout */
	
	
	/* product section layout */
	
	Route::get('/admin/product-section', 'Admin\SettingsController@product_section');
	Route::post('/admin/product-section', ['as' => 'admin.product-section','uses'=>'Admin\SettingsController@update_product_section']);
	
	/* product section layout */
	
	
	/* testimonial section layout */
	
	Route::get('/admin/testimonial-section', 'Admin\SettingsController@testimonial_section');
	Route::post('/admin/testimonial-section', ['as' => 'admin.testimonial-section','uses'=>'Admin\SettingsController@update_testimonial_section']);
	
	/* testimonial section layout */
	
	
	/* blog section layout */
	
	Route::get('/admin/blog-section', 'Admin\SettingsController@blog_section');
	Route::post('/admin/blog-section', ['as' => 'admin.blog-section','uses'=>'Admin\SettingsController@update_blog_section']);
	
	/* blog section layout */
	
	
	
	/* demo mode */
	Route::post('/admin/demo-mode', ['as' => 'admin.demo-mode','uses'=>'Admin\SettingsController@update_demo_mode']);
	Route::get('/admin/demo-mode', 'Admin\SettingsController@demo_mode');
	/* demo mode */
	
	
	/* pages */
	
	Route::get('/admin/pages', 'Admin\PagesController@pages');
	Route::get('/admin/add-page', 'Admin\PagesController@add_page')->name('admin.add-page');
	Route::post('/admin/add-page', 'Admin\PagesController@save_page');
	Route::get('/admin/pages/{page_id}', 'Admin\PagesController@delete_pages');
	Route::get('/admin/edit-page/{page_id}', 'Admin\PagesController@edit_page')->name('admin.edit-page');
	Route::post('/admin/edit-page', ['as' => 'admin.edit-page','uses'=>'Admin\PagesController@update_page']);
	
	/* pages */
	
	
	
	/* products */
	Route::get('/admin/products', 'Admin\ProductsController@products');
	Route::get('/admin/add-product', 'Admin\ProductsController@add_product')->name('admin.add-product');
	Route::post('/admin/add-product', ['as' => 'admin.add-product','uses'=>'Admin\ProductsController@update_products']);
	Route::get('/admin/products/{token}', 'Admin\ProductsController@products_delete');
	Route::get('/admin/edit-product/{token}', 'Admin\ProductsController@edit_product')->name('admin.edit-product');
	Route::post('/admin/edit-product', ['as' => 'admin.edit-product','uses'=>'Admin\ProductsController@edit_products']);
	Route::get('/admin/edit-product/{dropimg}/{token}', 'Admin\ProductsController@drop_image_product');
	/* products */
	
	
	
	/* orders */
	Route::get('/admin/orders', 'Admin\ProductsController@view_orders');
	Route::get('/admin/orders/{token}', 'Admin\ProductsController@orders_delete');
	Route::get('/admin/order-details/{order_id}', 'Admin\ProductsController@full_details_order');
	Route::get('/admin/order-details/{delete}/{order_id}', 'Admin\ProductsController@single_order_delete');
	/* orders */
	
	
	/* reviews */
	Route::get('/admin/reviews', 'Admin\ProductsController@view_reviews');
	Route::get('/admin/reviews/{rating_id}', 'Admin\ProductsController@view_reviews_delete');
	/* reviews */
	
	
	/* events */
	Route::get('/admin/events', 'Admin\EventsController@events');
	Route::get('/admin/add-event', 'Admin\EventsController@add_event')->name('admin.add-event');
	Route::post('/admin/add-event', ['as' => 'admin.add-event','uses'=>'Admin\EventsController@update_events']);
	Route::get('/admin/events/{token}', 'Admin\EventsController@events_delete');
	Route::get('/admin/edit-event/{token}', 'Admin\EventsController@edit_event')->name('admin.edit-event');
	Route::post('/admin/edit-event', ['as' => 'admin.edit-event','uses'=>'Admin\EventsController@edit_events']);
	Route::get('/admin/events-bookings', 'Admin\EventsController@events_bookings');
	Route::get('/admin/events-bookings/{booking_id}/{status}', 'Admin\EventsController@events_bookings_delete');
	Route::get('/admin/events-bookings/{approval}/{booking_id}/{event_token}', 'Admin\EventsController@events_bookings_approval');
	/* events */
	
	
	
	
	
	
	/* pastors */
	Route::get('/admin/pastors', 'Admin\PastorsController@pastors');
	Route::get('/admin/add-pastor', 'Admin\PastorsController@add_pastor')->name('admin.add-pastor');
	Route::post('/admin/add-pastor', ['as' => 'admin.add-pastor','uses'=>'Admin\PastorsController@update_pastors']);
	Route::get('/admin/pastors/{token}', 'Admin\PastorsController@pastors_delete');
	Route::get('/admin/edit-pastor/{token}', 'Admin\PastorsController@edit_pastor')->name('admin.edit-pastor');
	Route::post('/admin/edit-pastor', ['as' => 'admin.edit-pastor','uses'=>'Admin\PastorsController@edit_pastors']);
	/* pastors */
	
	
	
	/* events */
	Route::get('/admin/sermons', 'Admin\SermonsController@sermons');
	Route::get('/admin/add-sermon', 'Admin\SermonsController@add_sermon')->name('admin.add-sermon');
	Route::post('/admin/add-sermon', ['as' => 'admin.add-sermon','uses'=>'Admin\SermonsController@update_sermons']);
	Route::get('/admin/sermons/{token}', 'Admin\SermonsController@sermons_delete');
	Route::get('/admin/edit-sermon/{token}', 'Admin\SermonsController@edit_sermon')->name('admin.edit-sermon');
	Route::post('/admin/edit-sermon', ['as' => 'admin.edit-sermon','uses'=>'Admin\SermonsController@edit_sermons']);
	/* events */
	
	
	
	/* category */
	
	Route::get('/admin/category', 'Admin\CategoryController@category');
	Route::get('/admin/add-category', 'Admin\CategoryController@add_category')->name('admin.add-category');
	Route::post('/admin/add-category', 'Admin\CategoryController@save_category');
	Route::get('/admin/category/{cat_id}', 'Admin\CategoryController@delete_category');
	Route::get('/admin/edit-category/{cat_id}', 'Admin\CategoryController@edit_category')->name('admin.edit-category');
	Route::post('/admin/edit-category', ['as' => 'admin.edit-category','uses'=>'Admin\CategoryController@update_category']);
	/* category */
	
	
	/* slideshow */
	
	Route::get('/admin/slideshow', 'Admin\SlideshowController@slideshow');
	Route::get('/admin/add-slideshow', 'Admin\SlideshowController@add_slideshow')->name('admin.add-slideshow');
	Route::post('/admin/add-slideshow', 'Admin\SlideshowController@save_slideshow');
	Route::get('/admin/slideshow/{slide_id}', 'Admin\SlideshowController@delete_slideshow');
	Route::get('/admin/edit-slideshow/{slide_id}', 'Admin\SlideshowController@edit_slideshow')->name('admin.edit-slideshow');
	Route::post('/admin/edit-slideshow', ['as' => 'admin.edit-slideshow','uses'=>'Admin\SlideshowController@update_slideshow']);
	
	/* slideshow */
	
	
	/* testimonial */
	
	Route::get('/admin/testimonial', 'Admin\TestimonialController@testimonial');
	Route::get('/admin/add-testimonial', 'Admin\TestimonialController@add_testimonial')->name('admin.add-testimonial');
	Route::post('/admin/add-testimonial', 'Admin\TestimonialController@save_testimonial');
	Route::get('/admin/testimonial/{testimonial_id}', 'Admin\TestimonialController@delete_testimonial');
	Route::get('/admin/edit-testimonial/{testimonial_id}', 'Admin\TestimonialController@edit_testimonial')->name('admin.edit-testimonial');
	Route::post('/admin/edit-testimonial', ['as' => 'admin.edit-testimonial','uses'=>'Admin\TestimonialController@update_testimonial']);
	
	/* testimonial */
	
	
	/* blog */
	
	Route::get('/admin/blog-category', 'Admin\BlogController@blog_category');
	Route::get('/admin/add-blog-category', 'Admin\BlogController@add_blog_category')->name('admin.add-blog-category');
	Route::post('/admin/add-blog-category', 'Admin\BlogController@save_blog_category');
	Route::get('/admin/blog-category/{blog_cat_id}', 'Admin\BlogController@delete_blog_category');
	Route::get('/admin/edit-blog-category/{blog_cat_id}', 'Admin\BlogController@edit_blog_category')->name('admin.edit-blog-category');
	Route::post('/admin/edit-blog-category', ['as' => 'admin.edit-blog-category','uses'=>'Admin\BlogController@update_blog_category']);
	
	/* blog */
	
	
	
	/* post */
	
	Route::get('/admin/post', 'Admin\BlogController@posts');
	Route::get('/admin/add-post', 'Admin\BlogController@add_post')->name('admin.add-post');
	Route::post('/admin/add-post', 'Admin\BlogController@save_post');
	Route::get('/admin/post/{post_id}', 'Admin\BlogController@delete_post');
	Route::get('/admin/edit-post/{post_id}', 'Admin\BlogController@edit_post')->name('admin.edit-post');
	Route::post('/admin/edit-post', ['as' => 'admin.edit-post','uses'=>'Admin\BlogController@update_post']);
	
	/* post */
	
	
	/* comment */
	Route::get('/admin/comment/{post_id}', 'Admin\BlogController@comments');
	Route::get('/admin/comment/{delete}/{comment_id}', 'Admin\BlogController@delete_comment');
	Route::get('/admin/comment/update-status/{status}/{comment_id}', 'Admin\BlogController@comment_status');
	/* comment */
	
	
	/* product comment */
	Route::get('/admin/product-comment/{product_token}', 'Admin\ProductsController@comments');
	Route::get('/admin/product-comment/{delete}/{comment_id}', 'Admin\ProductsController@delete_comment');
	Route::get('/admin/product-comment/update-status/{status}/{comment_id}', 'Admin\ProductsController@comment_status');
	/* product comment */
	
		
	
	/* gallery */
	
	Route::get('/admin/gallery', 'Admin\CommonController@view_gallery');
	Route::get('/admin/add-gallery', 'Admin\CommonController@view_add_gallery');
	Route::post('/admin/add-gallery', ['as' => 'admin.add-gallery','uses'=>'Admin\CommonController@update_add_gallery']);
	Route::get('/admin/gallery/{token}', 'Admin\CommonController@delete_gallery');
	Route::get('/admin/edit-gallery/{token}', 'Admin\CommonController@edit_gallery');
	Route::post('/admin/edit-gallery', ['as' => 'admin.edit-gallery','uses'=>'Admin\CommonController@update_gallery']);
	

   /* gallery */
	
		
	
	/* contact */
	Route::get('/admin/contact', 'Admin\CommonController@view_contact');
	Route::get('/admin/contact/{id}', 'Admin\CommonController@view_contact_delete');
	Route::get('/admin/add-contact', 'Admin\CommonController@view_add_contact');
	Route::post('/admin/add-contact', ['as' => 'admin.add-contact','uses'=>'Admin\CommonController@update_contact']);
	/* contact */
	
	
	/* donation */
	Route::get('/admin/donation', 'Admin\CommonController@view_donation');
	Route::get('/admin/donation/{id}', 'Admin\CommonController@view_donation_delete');
	/* donation */
	
	
	
	/* newsletter */
	Route::get('/admin/newsletter', 'Admin\CommonController@view_newsletter');
	Route::get('/admin/newsletter/{id}', 'Admin\CommonController@view_newsletter_delete');
	Route::get('/admin/send-updates', 'Admin\CommonController@view_send_updates');
	Route::post('/admin/send-updates', ['as' => 'admin.send-updates','uses'=>'Admin\CommonController@send_updates']);
	/* newsletter */
	
	
	/* languages */
	Route::get('/admin/languages', 'Admin\LanguageController@view_languages');
	Route::get('/admin/add-language', 'Admin\LanguageController@add_language')->name('admin.add-language');
	Route::post('/admin/add-language', 'Admin\LanguageController@save_language');
	Route::get('/admin/languages/{token}/{code}', 'Admin\LanguageController@delete_languages');
	Route::get('/admin/edit-language/{language_id}', 'Admin\LanguageController@edit_language')->name('admin.edit-language');
	Route::post('/admin/edit-language', ['as' => 'admin.edit-language','uses'=>'Admin\LanguageController@update_language']);
	/* languages */
	
	
	/* edit keywords */
	Route::get('/admin/add-keywords', 'Admin\LanguageController@add_keywords');
	Route::post('/admin/add-keywords', ['as' => 'admin.add-keywords','uses'=>'Admin\LanguageController@insert_keywords']);
	Route::get('/admin/edit-keywords/{code}', 'Admin\LanguageController@edit_keywords');
	Route::post('/admin/edit-keywords', ['as' => 'admin.edit-keywords','uses'=>'Admin\LanguageController@save_keywords']);
	/* edit keywords */
	
	/* clear cache */
	Route::get('/admin/clear-cache', 'Admin\CommonController@delete_cache');
	
	/* clear cache */
	
	
});


/* admin panel */

Route::group(['middleware' => ['XSS']], function () {

/* language */

Route::get('/translate/{translate}', 'CommonController@cookie_translate');

/* language */

Route::get('/', 'CommonController@view_index');
Route::get('/index', 'CommonController@view_index');
Route::post('/index', ['as' => 'index','uses'=>'CommonController@update_video']);


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::get('/logout', 'Admin\CommonController@logout');



/* email verification */

Route::get('/user-verify/{user_token}', 'CommonController@user_verify');

/* email verification */


/* my profile */

Route::get('/profile', 'ProfileController@view_myprofile');
Route::post('/profile', ['as' => 'profile','uses'=>'ProfileController@update_myprofile']);

/* my profile */


/* events */
Route::get('/events', 'CommonController@all_events');
Route::get('/events/{cat_id}/{slug}', 'CommonController@view_category_events');
Route::get('/event/{slug}', 'CommonController@single_event');
Route::get('/events/{tag}', 'CommonController@tag_events');
Route::post('/event', ['as' => 'event','uses'=>'CommonController@event_booking']);
/* events */


Route::get('/gallery', 'CommonController@all_gallery');
Route::get('/donate-now', 'ProfileController@donate_now');
Route::post('/donate-now', ['as' => 'donate-now','uses'=>'ProfileController@view_donate_now']);
Route::get('/donate-success/{ord_token}', 'ProfileController@donate_paypal_success');
Route::get('/donate-flutterwave', 'ProfileController@donate_flutterwaveCallback');
Route::get('/donate-coinpayments/{ord_token}', 'ProfileController@donate_coinpayments');
Route::get('/pastors', 'CommonController@all_pastors');
Route::get('/pastor/{id}/{slug}', 'CommonController@single_pastor');
Route::get('/sermons', 'CommonController@all_sermons');
Route::get('/sermon/{slug}', 'CommonController@single_sermon');
Route::get('/sermons/{tag}', 'CommonController@tag_sermons');
Route::get('/testimonials', 'CommonController@all_testimonials');
Route::get('/shop', 'CommonController@all_products');
Route::get('/product/{slug}', 'CommonController@single_product');
Route::get('/shop/{category}/{slug}', 'CommonController@category_products');
Route::post('/product-comment', ['as' => 'product-comment','uses'=>'ProfileController@insert_product_comment']);


/* cart */
Route::get('/cart', 'ProfileController@show_cart');
Route::get('/cart/{ord_id}', 'ProfileController@remove_cart_item');
Route::post('/cart', ['as' => 'cart','uses'=>'ProfileController@view_cart']);
/* cart */


/* my order */
Route::get('/my-order', 'ProfileController@show_my_order');
Route::get('/order-details/{order_id}', 'ProfileController@full_details_order');
Route::get('/product-ratings/{product_token}', 'ProfileController@product_details_order');
Route::post('/order-details', ['as' => 'order-details','uses'=>'ProfileController@update_rating']);
/* my order */


/* my donation */
Route::get('/my-donation', 'ProfileController@show_my_donation');
/* my donation */

/* checkout */
Route::get('/checkout', 'ProfileController@show_checkout');
Route::post('/checkout', ['as' => 'checkout','uses'=>'ProfileController@view_checkout']);
/* checkout */


/* blog */
Route::get('/blog', 'BlogController@view_blog');
Route::get('/post/{slug}', 'BlogController@view_single');
Route::get('/blog/{category}/{id}/{slug}', 'BlogController@view_category_blog');
Route::post('/post', ['as' => 'post','uses'=>'BlogController@insert_comment']);
Route::get('/blog/{tag}', 'BlogController@view_tags');
/* blog */



/* forgot */

Route::get('/forgot', 'CommonController@view_forgot');
Route::post('/forgot', ['as' => 'forgot','uses'=>'CommonController@update_forgot']);
Route::get('/reset/{user_token}', 'CommonController@view_reset');
Route::post('/reset', ['as' => 'reset','uses'=>'CommonController@update_reset']);

/* forgot */


/* pages */

Route::get('/page/{page_slug}', 'PageController@view_page');

/* pages */


/* success */
Route::get('/success/{ord_token}', 'ProfileController@paypal_success');
Route::get('/cancel', 'ProfileController@payment_cancel');
Route::get('/flutterwave', 'ProfileController@flutterwaveCallback');
Route::get('/coinpayments/{ord_token}', 'ProfileController@coinpayments');
/* success */

/* paystack */

Route::post('/paystack', ['as' => 'paystack','uses'=>'ProfileController@redirectToGateway']);
Route::get('/paystack', 'ProfileController@handleGatewayCallback');
/* paystack */


/* contact */

Route::get('/contact', 'CommonController@view_contact');
Route::post('/contact', ['as' => 'contact','uses'=>'CommonController@update_contact']);
/* contact */


/* paytm */

Route::post('/paytm', ['as' => 'paytm','uses'=>'PaytmController@order']);
Route::post('/paytm/status', 'PaytmController@paymentCallback');
Route::get('/paytm_success/{payment_id}', 'PaytmController@paytm_success');
/* paytm */


/* newsletter */
Route::post('/newsletter', ['as' => 'newsletter','uses'=>'CommonController@update_newsletter']);
Route::get('/newsletter/{token}', 'CommonController@activate_newsletter');
Route::get('/newsletter', 'CommonController@view_newsletter');
/* newsletter */




});

