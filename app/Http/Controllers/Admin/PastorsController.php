<?php

namespace MyJesus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MyJesus\Http\Controllers\Controller;
use Session;
use MyJesus\Models\Pastors;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class PastorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
	
	public function pastors()
    {
        
		$pastor['view'] = Pastors::getpastorData();
		return view('admin.pastors',[ 'pastor' => $pastor]);
    }
	
	public function add_pastor()
	{
	 
	 
	  return view('admin.add-pastor');
	
	}
	public function pastor_slug($string){
		   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   return $slug;
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
	
	
	public function update_pastors(Request $request)
	{
	
	   $pastor_name = $request->input('pastor_name');
	   $pastor_slug = $this->pastor_slug($pastor_name);
	   $pastor_short_desc = $request->input('pastor_short_desc');
	   $pastor_desc = $request->input('pastor_desc');
	   
	   $pastor_phone = $request->input('pastor_phone');
	   $pastor_website = $request->input('pastor_website');
	   $pastor_email = $request->input('pastor_email');
	   $pastor_facebook = $request->input('pastor_facebook');
	   $pastor_twitter = $request->input('pastor_twitter');
	   $pastor_gplus = $request->input('pastor_gplus');
	   $pastor_youtube = $request->input('pastor_youtube');
	   $pastor_status = $request->input('pastor_status');
	   $image_size = $request->input('image_size');	
	   $pastor_token = $this->generateRandomString();
	   $pastor_approve_status = "Thanks for your submission. Your details updated successfully.";
	   $pastor_update_date = date('Y-m-d H:i:s');	   
	   
	   $request->validate([
							'pastor_name' => 'required',
							'pastor_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
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
	        
		  
			   if ($request->hasFile('pastor_image')) 
				  {
					$image = $request->file('pastor_image');
					$img_name = time() . '.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/pastors');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$pastor_image = $img_name;
				  }
				  else
				  {
					 $pastor_image = "";
				  }
			   
			   $data = array('pastor_token' => $pastor_token, 'pastor_name' => $pastor_name, 'pastor_slug' => $pastor_slug, 'pastor_short_desc' => $pastor_short_desc, 'pastor_desc' => $pastor_desc, 'pastor_phone' => $pastor_phone, 'pastor_website' => $pastor_website, 'pastor_email' => $pastor_email, 'pastor_image' => $pastor_image, 'pastor_facebook' => $pastor_facebook, 'pastor_twitter' => $pastor_twitter, 'pastor_gplus' => $pastor_gplus, 'pastor_youtube' => $pastor_youtube, 'pastor_status' => $pastor_status);
			   
			   Pastors::savepastorData($data);
			   
			   return redirect()->back()->with('success', $pastor_approve_status);
			
			   
			   
		}
		
				
	
	
	}
	
	
	public function pastors_delete($token)
	{
	   Pastors::deletePastors($token);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');
	
	}
	
	
	
	public function edit_pastor($token)
	{
	  
	  $edit['view'] = Pastors::singlePastors($token);
	  return view('admin.edit-pastor',[ 'edit' => $edit]);
	}
	
	
	
	
	
	
	public function edit_pastors(Request $request)
	{
	
	   $pastor_name = $request->input('pastor_name');
	   $pastor_slug = $this->pastor_slug($pastor_name);
	   $pastor_short_desc = $request->input('pastor_short_desc');
	   $pastor_desc = $request->input('pastor_desc');
	   $save_pastor_image = $request->input('save_pastor_image');
	   $pastor_phone = $request->input('pastor_phone');
	   $pastor_website = $request->input('pastor_website');
	   $pastor_email = $request->input('pastor_email');
	   $pastor_facebook = $request->input('pastor_facebook');
	   $pastor_twitter = $request->input('pastor_twitter');
	   $pastor_gplus = $request->input('pastor_gplus');
	   $pastor_youtube = $request->input('pastor_youtube');
	   $pastor_status = $request->input('pastor_status');
	   $image_size = $request->input('image_size');	
	   $pastor_token = $request->input('pastor_token');
	   $pastor_approve_status = "Thanks for your submission. Your details updated successfully.";
	   $pastor_update_date = date('Y-m-d H:i:s');	   
	   
	   $request->validate([
							'pastor_name' => 'required',
							'pastor_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
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
	        
		  
			   if ($request->hasFile('pastor_image')) 
				  {
				    Pastors::dropPastors($pastor_token);
					$image = $request->file('pastor_image');
					$img_name = time() . '.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/pastors');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$pastor_image = $img_name;
				  }
				  else
				  {
					 $pastor_image = $save_pastor_image;
				  }
			   
			   $data = array('pastor_name' => $pastor_name, 'pastor_slug' => $pastor_slug, 'pastor_short_desc' => $pastor_short_desc, 'pastor_desc' => $pastor_desc, 'pastor_phone' => $pastor_phone, 'pastor_website' => $pastor_website, 'pastor_email' => $pastor_email, 'pastor_image' => $pastor_image, 'pastor_facebook' => $pastor_facebook, 'pastor_twitter' => $pastor_twitter, 'pastor_gplus' => $pastor_gplus, 'pastor_youtube' => $pastor_youtube, 'pastor_status' => $pastor_status);
			   
			   
			   Pastors::updatePastors($pastor_token,$data);
			   return redirect()->back()->with('success', $pastor_approve_status);
			
			   
			   
		}
		
	   
	   
	
	}
	
	
	
	
}
