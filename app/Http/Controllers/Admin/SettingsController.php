<?php

namespace MyJesus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MyJesus\Http\Controllers\Controller;
use Session;
use MyJesus\Models\Settings;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Image;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	    
	
	/* settings */
	
	
	public function general_settings()
    {
        
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.general-settings', [ 'setting' => $setting, 'sid' => $sid]);
		
    }
	
	public function demo_mode()
	{
	   return redirect()->back()->with('error', 'This is Demo version. You can not delete');
	}
	
	
	
	public function update_demo_mode(Request $request)
	{
	   return redirect()->back()->with('error', 'This is Demo version. You can not add or change any thing');
	}
	
	
	public function color_settings()
	{
	
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.color-settings', [ 'setting' => $setting, 'sid' => $sid]);
	
	}
	
	
	public function limitation_settings()
	{
	
	    $eid = 1;
		$setting['setting'] = Settings::editExtra($eid);
		
		return view('admin.limitation-settings', [ 'setting' => $setting, 'eid' => $eid]);
	
	}
	
	
	public function update_limitation_settings(Request $request)
	{
	   	   
	      
	   
	   $product_per_page = $request->input('product_per_page');
	   $event_per_page = $request->input('event_per_page');
	   $blog_per_page = $request->input('blog_per_page');
	   $testimonial_per_page = $request->input('testimonial_per_page');
	   $pastor_per_page = $request->input('pastor_per_page');
	   $sermon_per_page = $request->input('sermon_per_page');
	   $gallery_per_page = $request->input('gallery_per_page');
	   
	   $eid = $request->input('eid');
	         
         
		 $request->validate([
		 
							
							
							
							
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
		
		 
		   $data = array('product_per_page' => $product_per_page, 'event_per_page' => $event_per_page, 'blog_per_page' => $blog_per_page, 'testimonial_per_page' => $testimonial_per_page, 'pastor_per_page' => $pastor_per_page, 'sermon_per_page' => $sermon_per_page, 'gallery_per_page' => $gallery_per_page);
 
			Settings::updateExtra($eid,$data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
	
	
	}
	
	
	
	
	
	public function testimonial_section()
	{
	
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.testimonial-section', [ 'setting' => $setting, 'sid' => $sid]);
	
	}
	
	
	public function update_testimonial_section(Request $request)
	{
	   $site_testimonial_display = $request->input('site_testimonial_display');
	   $site_testimonial_heading = $request->input('site_testimonial_heading');
	   $site_testimonial_sub_heading = $request->input('site_testimonial_sub_heading');
	   $site_home_testimonial = $request->input('site_home_testimonial');
	  
	   
	   $sid = $request->input('sid');
	   
	            
         
		 $request->validate([
		 
							
							
							
							
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
		
			  
		 
		 
		$data = array('site_testimonial_display' => $site_testimonial_display, 'site_testimonial_heading' => $site_testimonial_heading, 'site_testimonial_sub_heading' => $site_testimonial_sub_heading, 'site_home_testimonial' => $site_home_testimonial);
 
         Settings::updatemailData($sid, $data);
         return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
	
	
	}
	
	
	public function blog_section()
	{
	
	    $eid = 1;
		$setting['setting'] = Settings::editExtra($eid);
		
		return view('admin.blog-section', [ 'setting' => $setting, 'eid' => $eid]);
	
	}
	
	public function update_blog_section(Request $request)
	{
	   $site_blog_display = $request->input('site_blog_display');
	   $site_blog_heading = $request->input('site_blog_heading');
	   $site_blog_sub_heading = $request->input('site_blog_sub_heading');
	   $site_home_blog = $request->input('site_home_blog');
	   $site_home_blog_order = $request->input('site_home_blog_order');
	   
	   $eid = $request->input('eid');
	   
	            
         
		 $request->validate([
		 
							
							
							
							
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
		
			  
		 
		 
		$data = array('site_blog_display' => $site_blog_display, 'site_blog_heading' => $site_blog_heading, 'site_blog_sub_heading' => $site_blog_sub_heading, 'site_home_blog' => $site_home_blog, 'site_home_blog_order' => $site_home_blog_order);
 
         Settings::updateExtra($eid, $data);
         return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
	
	
	}
	
	
	public function product_section()
	{
	
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.product-section', [ 'setting' => $setting, 'sid' => $sid]);
	
	}
	
	
	public function update_product_section(Request $request)
	{
	   $site_product_display = $request->input('site_product_display');
	   $site_home_product = $request->input('site_home_product');
	   $site_home_product_order = $request->input('site_home_product_order');
	   $site_product_heading = $request->input('site_product_heading');
	   $site_product_sub_heading = $request->input('site_product_sub_heading');
	   
	   $sid = $request->input('sid');
	   
	            
         
		 $request->validate([
		 
							
							
							
							
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
		
			  
		 
		 
		$data = array('site_product_display' => $site_product_display, 'site_home_product' => $site_home_product, 'site_home_product_order' => $site_home_product_order, 'site_product_heading' => $site_product_heading, 'site_product_sub_heading' => $site_product_sub_heading);
 
         Settings::updatemailData($sid, $data);
         return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
	
	
	}
	
	
	
	
	
	public function gallery_section()
	{
	
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.gallery-section', [ 'setting' => $setting, 'sid' => $sid]);
	
	}
	
	
	public function update_gallery_section(Request $request)
	{
	   $site_gallery_display = $request->input('site_gallery_display');
	   $site_home_gallery = $request->input('site_home_gallery');
	   $site_home_gallery_order = $request->input('site_home_gallery_order');
	   $site_gallery_heading = $request->input('site_gallery_heading');
	   $site_gallery_sub_heading = $request->input('site_gallery_sub_heading');
	   
	   $sid = $request->input('sid');
	   
	            
         
		 $request->validate([
		 
							
							
							
							
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
		
			  
		 
		 
		$data = array('site_gallery_display' => $site_gallery_display, 'site_home_gallery' => $site_home_gallery, 'site_home_gallery_order' => $site_home_gallery_order, 'site_gallery_heading' => $site_gallery_heading, 'site_gallery_sub_heading' => $site_gallery_sub_heading);
 
         Settings::updatemailData($sid, $data);
         return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
	
	
	}
	
	
	
	
	
	public function sermon_section()
	{
	
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.sermon-section', [ 'setting' => $setting, 'sid' => $sid]);
	
	}
	
	
	public function update_sermon_section(Request $request)
	{
	   
	   $site_sermon_display = $request->input('site_sermon_display');
	   $site_sermon_heading = $request->input('site_sermon_heading');
	   $site_sermon_sub_heading = $request->input('site_sermon_sub_heading');
	   $site_home_sermons = $request->input('site_home_sermons');
	   $site_home_sermon_order = $request->input('site_home_sermon_order');
	   $sid = $request->input('sid');
	   
	            
         
		 $request->validate([
		 
							
							
							
							
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
		
			  
		 
		 
		$data = array('site_sermon_display' => $site_sermon_display, 'site_sermon_heading' => $site_sermon_heading, 'site_sermon_sub_heading' => $site_sermon_sub_heading, 'site_home_sermons' => $site_home_sermons, 'site_home_sermon_order' => $site_home_sermon_order);
 
         Settings::updatemailData($sid, $data);
         return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
	
	
	}
	
	
	
	
	
	public function about_section()
	{
	
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.about-section', [ 'setting' => $setting, 'sid' => $sid]);
	
	}
	
	
	public function update_about_section(Request $request)
	{
	   if(!empty($request->input('site_about_heading')))
	   {
	   $site_about_heading = $request->input('site_about_heading');
	   }
	   else
	   {
	   $site_about_heading = "";
	   }
	   if(!empty($request->input('site_about_desc')))
	   {
	   $site_about_desc = $request->input('site_about_desc');
	   }
	   else 
	   {
	   $site_about_desc = "";
	   }
	   
	   if(!empty($request->input('site_about_btntext')))
	   {
	   $site_about_btntext = $request->input('site_about_btntext');
	   }
	   else 
	   {
	   $site_about_btntext = "";
	   }
	   if(!empty($request->input('site_about_btnlink')))
	   {
	   $site_about_btnlink = $request->input('site_about_btnlink');
	   }
	   else 
	   {
	   $site_about_btnlink = "";
	   }
	   $site_about_sub_heading = $request->input('site_about_sub_heading');
	   
	   
	   
	   
	   $save_about_image = $request->input('save_about_image');
	   $sid = $request->input('sid');
	   $image_size = $request->input('image_size');
	   $site_about_display = $request->input('site_about_display');
	            
         
		 $request->validate([
		 
							'site_about_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
							
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
		
			  
		 if ($request->hasFile('site_about_image')) {
		     
			Settings::dropAboutbanner($sid); 
		   
			$image = $request->file('site_about_image');
			$img_name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/settings');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$site_about_image = $img_name;
		  }
		  else
		  {
		     $site_about_image = $request->input('save_about_image');
		  }
		 
		$data = array('site_about_heading' => $site_about_heading, 'site_about_desc' => $site_about_desc, 'site_about_btntext' => $site_about_btntext, 'site_about_btnlink' => $site_about_btnlink, 'site_about_image' => $site_about_image, 'site_about_display' => $site_about_display, 'site_about_sub_heading' => $site_about_sub_heading);
 
            
            
			Settings::updatemailData($sid, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
	
	
	}
	
	
	public function font_settings()
	{
	
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.font-settings', [ 'setting' => $setting, 'sid' => $sid]);
	
	}
	
	
	
	public function update_font_settings(Request $request)
	{
	    if($request->input('h1_font') != '')
		{
	  	$h1_font = $request->input('h1_font');
		}
		else
		{
		  $h1_font = $request->input('save_h1_font');
		}
		if($request->input('h2_font') != '')
		{
		$h2_font = $request->input('h2_font');
		}
		else
		{
		$h2_font = $request->input('save_h2_font');
		}
		if($request->input('h3_font') != '')
		{
		$h3_font = $request->input('h3_font');
		}
		else
		{
		$h3_font = $request->input('save_h3_font');
		}
		if($request->input('h4_font') != '')
		{
		$h4_font = $request->input('h4_font');
		}
		else
		{
		$h4_font = $request->input('save_h4_font');
		}
		if($request->input('h5_font') != '')
		{
		$h5_font = $request->input('h5_font');
		}
		else
		{
		$h5_font = $request->input('save_h5_font');
		}
		if($request->input('h6_font') != '')
		{
		$h6_font = $request->input('h6_font');
		}
		else
		{
		$h6_font = $request->input('save_h6_font');
		}
		if($request->input('body_font') != '')
		{
		$body_font = $request->input('body_font');
		}
		else
		{
		$body_font = $request->input('save_body_font');
		}
		if($request->input('button_font') != '')
		{
		$button_font = $request->input('button_font');
		}
		else
		{
		$button_font = $request->input('save_button_font');
		}
		
		
		$body_font_size = $request->input('body_font_size');
		
		
	  	$sid = $request->input('sid');
	     
         
		 $request->validate([
		 
					
							
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
		
			  
		 
		 
		$data = array('h1_font' => $h1_font, 'h2_font' => $h2_font, 'h3_font' => $h3_font, 'h4_font' => $h4_font, 'h5_font' => $h5_font, 'h6_font' => $h6_font, 'body_font' => $body_font, 'button_font' => $button_font, 'body_font_size' => $body_font_size);
 
			Settings::updatemailData($sid, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
	
	
	
	}
	
	
	
	
	public function update_color_settings(Request $request)
	{
	  	$site_theme_color = $request->input('site_theme_color');
		$site_button_color = $request->input('site_button_color');
		$site_copyright_color = $request->input('site_copyright_color');
		$site_footer_color = $request->input('site_footer_color');
		$site_button_hover = $request->input('site_button_hover');
	  	$sid = $request->input('sid');
	     
         
		 $request->validate([
		 
					'site_theme_color' => 'required',
					'site_button_color' => 'required',
					'site_copyright_color' => 'required',
					'site_footer_color' => 'required',			
							
							
							
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
		
			  
		 
		 
		$data = array('site_theme_color' => $site_theme_color, 'site_button_color' => $site_button_color, 'site_copyright_color' => $site_copyright_color, 'site_footer_color' => $site_footer_color, 'site_button_hover' => $site_button_hover);
 
			Settings::updatemailData($sid, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
	
	
	
	}
	
	
		
	 public function update_general_settings(Request $request)
	{
	
	     $site_title = $request->input('site_title');
	     $site_desc = $request->input('site_desc');
         $site_keywords = $request->input('site_keywords');
		 $sid = $request->input('sid');
		 $office_email = $request->input('office_email');
		 $office_phone = $request->input('office_phone');
		 $office_address = $request->input('office_address');
		 $image_size = $request->input('image_size');
		 $site_copyright = $request->input('site_copyright');
		 $site_loader_display = $request->input('site_loader_display');
		 $save_loader_image = $request->input('save_loader_image');
		 $site_multilanguage = $request->input('site_multilanguage');
		 
		 $site_google_recaptcha = $request->input('site_google_recaptcha');
		 $google_recaptcha_site_key = $request->input('google_recaptcha_site_key');
		 $google_recaptcha_secret_key = $request->input('google_recaptcha_secret_key');
         
		 $request->validate([
							'site_title' => 'required',
							'site_favicon' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							'site_logo' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							'site_banner' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
							
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
		
		if ($request->hasFile('site_favicon')) {
		     
			Settings::dropFavicon($sid); 
		   
			$image = $request->file('site_favicon');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/settings');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$fav_image = $img_name;
		  }
		  else
		  {
		     $fav_image = $request->input('save_favicon');
		  }
		  
		  
		  
		  if ($request->hasFile('site_logo')) {
		     
			Settings::dropLogo($sid); 
		   
			$image = $request->file('site_logo');
			$img_name = time() . '11.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/settings');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$logo_image = $img_name;
		  }
		  else
		  {
		     $logo_image = $request->input('save_logo');
		  }
		  
		  
		  
		  if ($request->hasFile('site_banner')) {
		     
			Settings::dropBanner($sid); 
		   
			$image = $request->file('site_banner');
			$img_name = time() . '11.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/settings');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$banner_image = $img_name;
		  }
		  else
		  {
		     $banner_image = $request->input('save_banner');
		  }
		  
		  
		  		  
		  
		  if ($request->hasFile('site_loader_image')) {
		     
			Settings::dropLoader($sid); 
		   
			$image = $request->file('site_loader_image');
			$img_name = time() . '6713.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/settings');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$site_loader_image = $img_name;
		  }
		  else
		  {
		     $site_loader_image = $save_loader_image;
		  }
		   
		 
		 
		$data = array('site_title' => $site_title, 'site_desc' => $site_desc, 'site_keywords' => $site_keywords,  'site_favicon' => $fav_image, 'site_logo' => $logo_image, 'site_banner' => $banner_image, 'office_address' => $office_address, 'office_email' => $office_email, 'office_phone' => $office_phone, 'site_copyright' => $site_copyright, 'site_loader_image' => $site_loader_image, 'site_loader_display' => $site_loader_display, 'site_multilanguage' => $site_multilanguage, 'site_google_recaptcha' => $site_google_recaptcha, 'google_recaptcha_site_key' => $google_recaptcha_site_key, 'google_recaptcha_secret_key' => $google_recaptcha_secret_key);
 
            
            
			Settings::updategeneralData($sid, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	} 
	
	
	
	
	public function media_settings()
	{
	
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.media-settings', [ 'setting' => $setting, 'sid' => $sid]);
	
	}
	
	
	public function update_media_settings(Request $request)
	{
	
	   $site_max_image_size = $request->input('site_max_image_size');
	   $site_max_pdf_size = $request->input('site_max_pdf_size');
	   $site_max_mp3_size = $request->input('site_max_mp3_size');
		         
         
		 $request->validate([
							'site_max_image_size' => 'required',
							'site_max_pdf_size' => 'required',
							'site_max_mp3_size' => 'required',
							
							
         ]);
		 
		  $sid = $request->input('sid');
		 
         
		 
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
		
			  
		 
		 
		$data = array('site_max_image_size' => $site_max_image_size, 'site_max_pdf_size' => $site_max_pdf_size, 'site_max_mp3_size' => $site_max_mp3_size);
 
            
            
			Settings::updatemailData($sid, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
	
	
	}
	
	
	public function email_settings()
    {
        
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.email-settings', [ 'setting' => $setting, 'sid' => $sid]);
		
    }
	
	
	
	public function update_email_settings(Request $request)
	{
	
	   $sender_name = $request->input('sender_name');
	   $sender_email = $request->input('sender_email');
	   $mail_driver = $request->input('mail_driver');
	   $mail_port = $request->input('mail_port');
	   $mail_password = $request->input('mail_password');
	   $mail_host = $request->input('mail_host');
	   $mail_username = $request->input('mail_username');
	   $mail_encryption = $request->input('mail_encryption');
		         
         
		 $request->validate([
							'sender_name' => 'required',
							'sender_email' => 'required',
							'mail_driver' => 'required',
							'mail_port' => 'required',
							'mail_host' => 'required',
							
							
							
							
         ]);
		 
		  $sid = $request->input('sid');
		 
         
		 
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
		
			  
		 
		 
		$data = array('sender_name' => $sender_name, 'sender_email' => $sender_email, 'mail_driver' => $mail_driver, 'mail_host' => $mail_host, 'mail_port' => $mail_port, 'mail_username' => $mail_username, 'mail_password' => $mail_password, 'mail_encryption' => $mail_encryption);
 
            
            
			Settings::updatemailData($sid, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
      
	
	
	}
	
	
	public function social_settings()
    {
        
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.social-settings', [ 'setting' => $setting, 'sid' => $sid]);
		
    }
	
	
	public function update_social_settings(Request $request)
	{
	    if(!empty($request->input('facebook_url')))
		{
	    $facebook = $request->input('facebook_url');
		}
		else
		{
		 $facebook = ""; 
		}
		
		if(!empty($request->input('twitter_url')))
		{
	    $twitter = $request->input('twitter_url');
		}
		else
		{
		$twitter = "";
		}
		
		if(!empty($request->input('gplus_url')))
		{
		$gplus = $request->input('gplus_url');
		}
		else
		{
		$gplus = "";
		}
		
		if(!empty($request->input('pinterest_url')))
		{
		$pinterest = $request->input('pinterest_url');
		}
		else
		{
		$pinterest = "";
		}
		
		if(!empty($request->input('instagram_url')))
		{
		$instagram = $request->input('instagram_url');
		}
		else
		{
		$instagram = "";
		}
		
		$facebook_client_id = $request->input('facebook_client_id');
		$facebook_client_secret = $request->input('facebook_client_secret');
		$facebook_callback_url = $request->input('facebook_callback_url');
		$google_client_id = $request->input('google_client_id');
		$google_client_secret = $request->input('google_client_secret');
		$google_callback_url = $request->input('google_callback_url');
		$display_social_login = $request->input('display_social_login');
		 
		$sid = $request->input('sid');
			 
		$data = array('facebook_url' => $facebook, 'twitter_url' => $twitter, 'gplus_url' => $gplus, 'pinterest_url' => $pinterest, 'instagram_url' => $instagram, 'facebook_client_id' => $facebook_client_id, 'facebook_client_secret' => $facebook_client_secret, 'facebook_callback_url' => $facebook_callback_url, 'google_client_id' => $google_client_id, 'google_client_secret' => $google_client_secret, 'google_callback_url' => $google_callback_url, 'display_social_login' => $display_social_login);
  		Settings::updatemailData($sid, $data);
        return redirect()->back()->with('success', 'Update successfully.');
       
	
		
	
	}
	
	
	
	public function preferred_settings()
    {
        
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.preferred-settings', [ 'setting' => $setting, 'sid' => $sid]);
		
    }
	
	
	public function update_preferred_settings(Request $request)
	{
	
	     
		 $sid = $request->input('sid');
		 
		 
		 $display_shop = $request->input('display_shop');
		 $display_events = $request->input('display_events');
		 $display_pastors = $request->input('display_pastors');
		 $display_sermons = $request->input('display_sermons');
		 $display_gallery = $request->input('display_gallery');
		 $display_pages = $request->input('display_pages');
		 $display_newsletter = $request->input('display_newsletter');
		 $display_contact = $request->input('display_contact');
		 $display_blog = $request->input('display_blog');
		 $display_testimonial = $request->input('display_testimonial');
		 
		
		 
         
		 $request->validate([
							
							
							'display_shop' => 'required',
							'display_events' => 'required',
							'display_pastors' => 'required',
							'display_sermons' => 'required',
							'display_gallery' => 'required',
							'display_pages' => 'required',
							'display_newsletter' => 'required',
							'display_contact' => 'required',
							
							
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
		
		
		 
		$data = array('display_shop' => $display_shop, 'display_events' => $display_events, 'display_pastors' => $display_pastors, 'display_sermons' => $display_sermons, 'display_gallery' => $display_gallery, 'display_pages' => $display_pages, 'display_newsletter' => $display_newsletter, 'display_contact' => $display_contact, 'display_blog' => $display_blog, 'display_testimonial' => $display_testimonial);
        Settings::updategeneralData($sid, $data);
        return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	} 
	
	
	
	
	
	
	public function currency_settings()
    {
        
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		return view('admin.currency-settings', [ 'setting' => $setting, 'sid' => $sid]);
		
    }
	
	
	
	public function update_currency_settings(Request $request)
	{
	
	     
		 $sid = $request->input('sid');
		 
		 $site_currency_code = $request->input('site_currency_code');
		 $site_currency_symbol = $request->input('site_currency_symbol');
		
		
		 
         
		 $request->validate([
							
							'site_currency_code' => 'required',
							'site_currency_symbol' => 'required',
							
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
		
		
		 
		$data = array('site_currency_code' => $site_currency_code, 'site_currency_symbol' => $site_currency_symbol);
        Settings::updategeneralData($sid, $data);
        return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	} 
	
	
	
	
	public function payment_settings()
    {
        
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$payment_option = array('paypal','flutterwave','coinpayments','stripe');
		$get_payment = explode(',', $setting['setting']->payment_option);
		return view('admin.payment-settings', [ 'setting' => $setting, 'sid' => $sid, 'payment_option' => $payment_option, 'get_payment' => $get_payment]);
		
    }
	
	
	public function update_payment_settings(Request $request)
	{
	
	   
	   
	   if(!empty($request->input('payment_option')))
	   {
	     $payment = "";
		 foreach($request->input('payment_option') as $payment_option)
		 {
		    $payment .= $payment_option.',';
		 }
		 $payment_method = rtrim($payment,',');
	   }
	   else
	   {
	   $payment_method = "";
	   }
	   
	   
	   $paypal_email = $request->input('paypal_email');
	   $paypal_mode = $request->input('paypal_mode');
	   $stripe_mode = $request->input('stripe_mode');
	   $test_publish_key = $request->input('test_publish_key');
	   $live_publish_key = $request->input('live_publish_key');
	   $test_secret_key = $request->input('test_secret_key');
	   $live_secret_key = $request->input('live_secret_key');
	   $site_minimum_donate = $request->input('site_minimum_donate');
	   
	   $paystack_public_key = $request->input('paystack_public_key');
	   $paystack_secret_key = $request->input('paystack_secret_key');
	   $paystack_merchant_email = $request->input('paystack_merchant_email');
	   
	   $flutterwave_public_key = $request->input('flutterwave_public_key');
	   $flutterwave_secret_key = $request->input('flutterwave_secret_key');
	   
	   $coinpayments_merchant_id = $request->input('coinpayments_merchant_id');
	   
	   
	   	   
	   $request->validate([
							
							
							
							
         ]);
		 
		  $sid = $request->input('sid');
		 
         
		 
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
		
			  
		 
		 
		$data = array('payment_option' => $payment_method, 'paypal_email' => $paypal_email, 'paypal_mode' => $paypal_mode, 'stripe_mode' => $stripe_mode, 'test_publish_key' => $test_publish_key, 'test_secret_key' => $test_secret_key, 'live_publish_key' => $live_publish_key, 'live_secret_key' => $live_secret_key, 'site_minimum_donate' => $site_minimum_donate, 'paystack_public_key' => $paystack_public_key, 'paystack_secret_key' => $paystack_secret_key, 'paystack_merchant_email' => $paystack_merchant_email, 'flutterwave_public_key' => $flutterwave_public_key, 'flutterwave_secret_key' => $flutterwave_secret_key, 'coinpayments_merchant_id' => $coinpayments_merchant_id);
 
            
            
			Settings::updatemailData($sid, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       
	   
		     
	}
	
	
	
	
	/* settings */
	
	
	
}
