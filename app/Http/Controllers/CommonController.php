<?php

namespace MyJesus\Http\Controllers;

use Illuminate\Http\Request;
use MyJesus\Models\Members;
use MyJesus\Models\Settings;
use MyJesus\Models\Slideshow;
use MyJesus\Models\Pages;
use MyJesus\Models\Events;
use MyJesus\Models\Products;
use MyJesus\Models\Sermons;
use MyJesus\Models\Pastors;
use MyJesus\Models\Blog;
use MyJesus\Models\Category;
use MyJesus\Models\Testimonial;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use URL;
use PaytmWallet;
use Cookie;
use Redirect;
use Illuminate\Support\Facades\Config;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class CommonController extends Controller
{
    
	
	

    public function view_index()
	{
	   
	   
	   
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $extra['setting'] = Settings::editExtra($sid);
	  
	  $slideshow['view'] = Slideshow::viewSlideshow(); 
	  $gallery['view'] = Events::viewGallery($setting['setting']->site_home_gallery,$setting['setting']->site_home_gallery_order);
	  $upcoming_count = Events::countupcomingEvents(); 
	  if($upcoming_count != 0)
	  {
	  $upcoming['event'] = Events::upcomingEvents();
	  $event_start_time = $upcoming['event']->event_start_date_time;
	  }
	  else
	  {
	  $upcoming['event'] = "";
	  $event_start_time = "";
	  }
	  $sermons['view'] = Sermons::viewSermons($setting['setting']->site_home_sermons,$setting['setting']->site_home_sermon_order);
	  $product['view'] = Products::with('ProductsImages')->where('product_status','=',1)->where('drop_status','=','no')->take($setting['setting']->site_home_product)->orderBy('product_id',$setting['setting']->site_home_product_order)->get();
	  $testimonial['view'] = Testimonial::viewTestimonial($setting['setting']->site_home_testimonial); 
	  $testimonial_dots['display'] = Testimonial::viewTestimonial($setting['setting']->site_home_testimonial); 
	  $blog['view'] = Blog::viewBlog($extra['setting']->site_home_blog,$extra['setting']->site_home_blog_order);
	  $comments = Blog::getgroupcommentWell();
	  $data = array('setting' => $setting, 'slideshow' => $slideshow, 'gallery' => $gallery, 'upcoming' => $upcoming, 'event_start_time' => $event_start_time, 'sermons' => $sermons, 'product' => $product, 'testimonial' => $testimonial, 'testimonial_dots' => $testimonial_dots, 'blog' => $blog, 'comments' => $comments, 'upcoming_count' => $upcoming_count);
	  return view('index')->with($data);
	}
	
	
	public function cookie_translate($id)
	{
	
	  Cookie::queue(Cookie::make('translate', $id, 3000));
      return Redirect::route('index')->withCookie('translate');
	  
	}
	
	
		
	
	public function all_gallery()
	{
	  $gallery['view'] = Events::viewallGallery(); 
	  $data = array('gallery' => $gallery);
	  return view('gallery')->with($data);
	
	}
	
	public function all_products()
	{
	  $product['view'] = Products::with('ProductsImages')->where('product_status','=',1)->where('drop_status','=','no')->orderBy('product_id','desc')->get();
	  $slug = ""; 
	  $data = array('product' => $product, 'slug' => $slug);
	  return view('shop')->with($data);
	
	}
	
	
	public function category_products($category,$slug)
	{
	  
	  $product['view'] = Products::with('ProductsImages')->join('category','category.cat_id','products.product_category')->where('category.category_slug','=',$slug)->where('products.product_status','=',1)->where('products.drop_status','=','no')->orderBy('products.product_id','desc')->get(); 
	  $data = array('product' => $product, 'slug' => $slug);
	  return view('shop')->with($data);
	
	}
	
	
	
	public function all_testimonials()
	{
	  $testimonial['view'] = Testimonial::viewallTestimonial(); 
	  $data = array('testimonial' => $testimonial);
	  return view('testimonials')->with($data);
	
	}
	
	public function single_product($slug)
	{
	  $product['view'] = Products::with('ProductsImages')->join('category','category.cat_id','products.product_category')->where('products.product_slug','=',$slug)->where('products.product_status','=',1)->where('products.drop_status','=','no')->first();
	  $related['view'] = Products::with('ProductsImages')->where('product_status','=',1)->where('drop_status','=','no')->where('product_slug','!=',$slug)->take(4)->orderBy('product_id','desc')->get();
	  $product_token = $product['view']->product_token;
	  $comment['display'] = Products::getcommentProducts($product_token);
	  $count = Products::getcommentCount($product_token);
	  $rating['display'] = Products::getrateProducts($product_token);
	  
	  $getreview  = Products::getreviewCount($product_token);
	  if($getreview !=0)
	  {
	      $review['view'] = Products::getreviewView($product_token);
		  $top = 0;
		  $bottom = 0;
		  foreach($review['view'] as $review)
		  {
		     if($review->product_rate == 1) { $value1 = $review->product_rate*1; } else { $value1 = 0; }
			 if($review->product_rate == 2) { $value2 = $review->product_rate*2; } else { $value2 = 0; }
			 if($review->product_rate == 3) { $value3 = $review->product_rate*3; } else { $value3 = 0; }
			 if($review->product_rate == 4) { $value4 = $review->product_rate*4; } else { $value4 = 0; }
			 if($review->product_rate == 5) { $value5 = $review->product_rate*5; } else { $value5 = 0; }
			 
			 $top += $value1 + $value2 + $value3 + $value4 + $value5;
			 $bottom += $review->product_rate;
			 
		  }
		  if(!empty(round($top/$bottom)))
		  {
		    $count_rating = round($top/$bottom);
		  }
		  else
		  {
		    $count_rating = 0;
		  }
	  
	  }
	  else
	  {
	    $count_rating = 0;
	  }
	  
	  $data = array('product' => $product, 'comment' => $comment, 'count' => $count, 'related' => $related, 'rating' => $rating, 'getreview' => $getreview, 'count_rating' => $count_rating);
	  return view('product')->with($data);
	}
	
	
	public function all_pastors()
	{
	  $pastor['view'] = Pastors::getpastorData(); 
	  $data = array('pastor' => $pastor);
	  return view('pastors')->with($data);
	}
	
	public function single_pastor($id,$slug)
	{
	  $pastor['view'] = Pastors::singlePastor($id); 
	  $data = array('pastor' => $pastor);
	  return view('pastor')->with($data);
	
	}
	
	
	
	
	
	public function activate_newsletter($token)
	{
	   
	   $check = Members::checkNewsletter($token);
	   if($check == 1)
	   {
	      
		  $data = array('news_status' => 1);
		
		  Members::updateNewsletter($token,$data);
		  
		  return redirect('/newsletter')->with('success', 'Thank You! Your subscription has been confirmed!');
		  
	   }
	   else
	   {
	       return redirect('/newsletter')->with('error', 'This email address already subscribed');
	   }
	
	}
	
	
	public function event_booking(Request $request)
	{
	
	  $booking_seats = $request->input('booking_seats');
	  $booking_name = $request->input('booking_name');
	  $booking_email = $request->input('booking_email');
	  $booking_phone = $request->input('booking_phone');
	  $booking_message = $request->input('booking_message');
	  $event_token = $request->input('event_token');
	  $event_available_seat = $request->input('event_available_seat');
	  $event_booked_seat = $request->input('event_booked_seat');
	  $event_url = $request->input('event_url');
	  $booking_date = date('Y-m-d H:i:s');
	  $available_seat = $request->input('available_seat').' Seats only available. Please enter less than '.$request->input('available_seat').' Seats';
	  if($event_available_seat > $event_booked_seat)
	  {
	    
		if($event_available_seat > $booking_seats)
		{
		   $data = array('event_token' => $event_token, 'booking_seats' => $booking_seats, 'booking_name' => $booking_name, 'booking_email' => $booking_email, 'booking_phone' => $booking_phone, 'booking_message' => $booking_message, 'booking_date' => $booking_date);
		   Events::saveeventBooking($data);
		   
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $booking_name;
		$from_email = $booking_email;
		$to_name = $setting['setting']->sender_name;
        $to_email = $setting['setting']->sender_email;
		
		$record = array('event_url' => $event_url, 'from_name' => $from_name, 'from_email' => $from_email, 'booking_seats' => $booking_seats);
		Mail::send('event_booking_mail', $record, function($message) use ($from_name, $from_email, $to_name, $to_email, $event_url) {
			$message->to($to_email, $to_name)
					->subject('Event Booking');
			$message->from($from_email,$from_name);
		});
        return redirect()->back()->with('success', 'Thank You! Your booking details has been sent. Once admin approved you will receive a confirmation email.');
		  
		}
		else
		{
		   return redirect()->back()->with('error', $available_seat);
		}
		
	  }
	  else
	  {
	     return redirect()->back()->with('error', 'No available seats');
	  }
	  
	
	}
	
	
	public function view_newsletter()
	{
	 
	  return view('newsletter');
	
	}
	
	
	public function update_newsletter(Request $request)
	{
	
	   $news_email = $request->input('news_email');
	   $news_status = 0;
	   $news_token = $this->generateRandomString();
	   
	   $request->validate([
							
							'news_email' => 'required|email',
							
							
							
         ]);
		 $rules = array(
		 
		      'news_email' => ['required',  Rule::unique('newsletter') -> where(function($sql){ $sql->where('news_status','=',0);})],
								
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make($request->all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 /*return back()->withErrors($validator);*/
		 return redirect()->back()->with('news-error', 'This email address already subscribed.');
		} 
		else
		{
		
		
		$data = array('news_email' => $news_email, 'news_token' => $news_token, 'news_status' => $news_status);
		
		Members::savenewsletterData($data);
		
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $setting['setting']->sender_name;
        $from_email = $setting['setting']->sender_email;
		$activate_url = URL::to('/newsletter/').$news_token;
		
		$record = array('activate_url' => $activate_url);
		Mail::send('newsletter_mail', $record, function($message) use ($from_name, $from_email, $news_email) {
			$message->to($news_email)
					->subject('Newsletter');
			$message->from($from_email,$from_name);
		});
		
			   
		return redirect()->back()->with('news-success', 'Your email address subscribed. You will receive a confirmation email.');
		
		}
	   
	
	}
	
	
	
	
	
	

    public function user_verify($user_token)
    {
        $data = array('verified'=>'1');
		$user['user'] = Members::verifyuserData($user_token, $data);
		
		return redirect('login')->with('success','Your e-mail is verified. You can now login.');
    }
	
	
	
	
	public function single_sermon($slug)
	{
	   $single['view'] = Sermons::singleSermon($slug);
	   $recent['view'] = Sermons::recentSermon($slug);
	   $sermon_tag = explode(',',$single['view']->sermon_tag);
	   $data = array('single' => $single, 'slug' => $slug, 'recent' => $recent, 'sermon_tag' => $sermon_tag); 
	   return view('sermon')->with($data);
	
	}
	
	public function tag_sermons($tag)
	{
	
	  $sermon['view'] = Sermons::tagSermons($tag);
	  $slug = $tag;
	  $tag_title = "Tags";
	   $data = array('sermon' => $sermon, 'slug' => $slug, 'tag_title' => $tag_title); 
	   return view('sermons')->with($data);
	
	}
	
	public function all_sermons()
	{
	   
	  $sermon['view'] = Sermons::getsermonData(); 
	  $slug = "";
	  $tag_title = "";
	  $data = array('sermon' => $sermon, 'slug' => $slug, 'tag_title' => $tag_title);
	  return view('sermons')->with($data);
	
	}
	
	
	public function all_events()
	{
	
	  $display['view'] = Events::allEvents();
	  $category['view'] = Category::eventCategoryData();
	  $count_category = Category::getgroupeventData();
	  $slug = "";
	  $tag_title = "";
	   $data = array('display' => $display, 'category' => $category, 'count_category' => $count_category, 'slug' => $slug, 'tag_title' => $tag_title); 
	   return view('events')->with($data);
	
	}
	
	
	public function single_event($slug)
	{
	   $single['view'] = Events::singleEvent($slug);
	   $category['view'] = Category::eventCategoryData();
	   $count_category = Category::getgroupeventData();
	   $recent['view'] = Events::recentEvent($slug);
	   $event_start_time = date('F d, Y H:i:s', strtotime($single['view']->event_start_date_time));
	   $event_tags = explode(',',$single['view']->event_tags);
	   $data = array('single' => $single, 'category' => $category, 'count_category' => $count_category, 'slug' => $slug, 'recent' => $recent, 'event_start_time' => $event_start_time, 'event_tags' => $event_tags); 
	   return view('event')->with($data);
	
	}
	
	
	public function view_category_events($cat_id,$slug)
	{
	
	$display['view'] = Events::categoryEvents($cat_id);
	  $category['view'] = Category::eventCategoryData();
	  $count_category = Category::getgroupeventData();
	  $tag_title = "";
	   $data = array('display' => $display, 'category' => $category, 'count_category' => $count_category, 'slug' => $slug, 'tag_title' => $tag_title); 
	   return view('events')->with($data);
	
	}
	
	public function tag_events($tag)
	{
	
	$display['view'] = Events::tagEvents($tag);
	  $category['view'] = Category::eventCategoryData();
	  $count_category = Category::getgroupeventData();
	  $slug = $tag;
	  $tag_title = "Tags";
	   $data = array('display' => $display, 'category' => $category, 'count_category' => $count_category, 'slug' => $slug, 'tag_title' => $tag_title); 
	   return view('events')->with($data);
	
	}
	
	
	
	public function view_forgot()
	{
	   return view('forgot');
	}
	
	public function view_contact()
	{
	   return view('contact');
	}
	public function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
	
	public function view_reset($token)
	{
	  $data = array('token' => $token);
	  return view('reset')->with($data);
	}
	
	
	
	public function update_reset(Request $request)
	{
	
	   $user_token = $request->input('user_token');
	   $password = bcrypt($request->input('password'));
	   $password_confirmation = $request->input('password_confirmation');
	   $data = array("user_token" => $user_token);
	   $value = Members::verifytokenData($data);
	   $user['user'] = Members::gettokenData($user_token);
	   if($value)
	   {
	   
	      $request->validate([
							'password' => 'required|confirmed|min:6',
							
           ]);
		 $rules = array(
				
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make($request->all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
		   
		   $record = array('password' => $password);
           Members::updatepasswordData($user_token, $record);
           return redirect('login')->with('success','Your new password updated successfully. Please login now.');
		
		}
	   
	   
	   }
	   else
	   {
              
			  return redirect()->back()->with('error', 'These credentials do not match our records.');
       }
	   
	   
	
	}
	
	
	
	public function update_forgot(Request $request)
	{
	   $email = $request->input('email');
	   
	   $data = array("email"=>$email);
 
       $value = Members::verifycheckData($data);
	   $user['user'] = Members::getemailData($email);
       
	   if($value)
	   {
			
		$user_token = $user['user']->user_token;
		$name = $user['user']->name;
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $setting['setting']->sender_name;
        $from_email = $setting['setting']->sender_email;
		
		$record = array('user_token' => $user_token);
		Mail::send('forgot_mail', $record, function($message) use ($from_name, $from_email, $email, $name, $user_token) {
			$message->to($email, $name)
					->subject('Forgot Password');
			$message->from($from_email,$from_name);
		});
 
         return redirect('forgot')->with('success','We have e-mailed your password reset link!');     
			  
       }
	   else
	   {
              
			  return redirect()->back()->with('error', 'These credentials do not match our records.');
       }
	   
	  
	   
	   
	   
	}
	
	
	
	/* contact */
	
	public function update_contact(Request $request)
	{
	
	  $from_name = $request->input('from_name');
	  $from_email = $request->input('from_email');
	  $message_text = $request->input('message_text');
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $admin_name = $setting['setting']->sender_name;
	  $admin_email = $setting['setting']->sender_email;
	  if($setting['setting']->site_google_recaptcha == 1)
	  {
	  $request->validate([
							'from_name' => 'required',
							'from_email' => 'required|email',
							'message_text' => 'required',
							'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
							
							
         ]);
	  }
	  else
	  {
	     $request->validate([
							'from_name' => 'required',
							'from_email' => 'required|email',
							'message_text' => 'required',
							
							
							
         ]);
	  }	 
		 $rules = array(
				
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make(Input::all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{	
	  	  
			$record = array('from_name' => $from_name, 'from_email' => $from_email, 'message_text' => $message_text, 'contact_date' => date('Y-m-d'));
			$contact_count = Members::getcontactCount($from_email);
			if($contact_count == 0)
			  {
			  Members::saveContact($record);
			  Mail::send('contact_mail', $record, function($message) use ($admin_name, $admin_email, $from_email, $from_name) {
						$message->to($admin_email, $admin_name)
								->subject('Contact');
						$message->from($from_email,$from_name);
					});
			  return redirect('contact')->with('success','Your message has been sent successfully');
			  }
			  else
			  {
			  return redirect('contact')->with('error','Sorry! Your message already sent');
			  }
	  
	    }
	
	}
	
	/* contact */
	
	
	
	
}
