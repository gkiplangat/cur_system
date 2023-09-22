<?php

namespace MyJesus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MyJesus\Http\Controllers\Controller;
use Session;
use MyJesus\Models\Sermons;
use MyJesus\Models\Pastors;
use MyJesus\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class SermonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
	
	public function sermons()
    {
        
		$sermon['view'] = Sermons::getsermonData();
		return view('admin.sermons',[ 'sermon' => $sermon]);
    }
	
	public function add_sermon()
	{
	 
	 $pastor['view'] = Pastors::getpastorData();
	  return view('admin.add-sermon',[ 'pastor' => $pastor]);
	
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
	
	public function slug($string){
		   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   return $slug;
    }
	
	
	public function update_sermons(Request $request)
	{
	
	   $sermon_title = $request->input('sermon_title');
	   $sermon_slug = $this->slug($sermon_title);
	   $sermon_short_desc = $request->input('sermon_short_desc');
	   $sermon_desc = $request->input('sermon_desc');
	   $sermon_pastor = $request->input('sermon_pastor');
	   $sermon_video = $request->input('sermon_video');
	   $sermon_update_date = date('Y-m-d H:i:s');
	   $sermon_status = $request->input('sermon_status');
	   $image_size = $request->input('image_size');
	   $pdf_size = $request->input('pdf_size');	
	   $mp3_size = $request->input('mp3_size');		
	   $sermon_token = $this->generateRandomString();
	   $sermon_tag = $request->input('sermon_tag');
	   $sermon_approve_status = "Thanks for your submission. Your details updated successfully.";
	  	   
	   
	   $request->validate([
							'sermon_title' => 'required',
							'sermon_mp3' => 'mimes:mpga|max:'.$mp3_size,
							'sermon_pdf' => 'mimes:pdf|max:'.$pdf_size,
							'sermon_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
         ]);
		 $rules = array(
				
				'sermon_title' => ['required',  Rule::unique('sermons') -> where(function($sql){ $sql->where('sermon_status','!=','');})],
				
				
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
	        
		  
			     if ($request->hasFile('sermon_image')) 
				  {
					$image = $request->file('sermon_image');
					$img_name = time() . '.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/sermons');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$sermon_image = $img_name;
				  }
				  else
				  {
					 $sermon_image = "";
				  }
				  
				  
				  if ($request->hasFile('sermon_mp3')) 
				  {
					$image = $request->file('sermon_mp3');
					$img_name = time() . '707.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/sermons');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$sermon_mp3 = $img_name;
				  }
				  else
				  {
					 $sermon_mp3 = "";
				  }
				  
				  if ($request->hasFile('sermon_pdf')) 
				  {
					$image = $request->file('sermon_pdf');
					$img_name = time() . '554.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/sermons');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$sermon_pdf = $img_name;
				  }
				  else
				  {
					 $sermon_pdf = "";
				  }
				  
			   
			   $data = array('sermon_token' => $sermon_token, 'sermon_title' => $sermon_title, 'sermon_slug' => $sermon_slug, 'sermon_tag' => $sermon_tag, 'sermon_short_desc' => $sermon_short_desc, 'sermon_desc' => $sermon_desc, 'sermon_pastor' => $sermon_pastor, 'sermon_mp3' => $sermon_mp3, 'sermon_video' => $sermon_video, 'sermon_pdf' => $sermon_pdf, 'sermon_image' => $sermon_image, 'sermon_update_date' => $sermon_update_date, 'sermon_status' => $sermon_status);
			   
			   Sermons::savesermonData($data);
			   
			   return redirect()->back()->with('success', $sermon_approve_status);
			
			   
			   
		}
		
				
	
	
	}
	
	public function sermons_delete($token)
	{
	   Sermons::deleteSermons($token);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');
	
	}
	
	
	public function edit_sermon($token)
	{
	  $pastor['view'] = Pastors::getpastorData();
	  $edit['view'] = Sermons::singleSermons($token);
	  return view('admin.edit-sermon',[ 'pastor' => $pastor, 'edit' => $edit]);
	}
	
	
	
	
	public function edit_sermons(Request $request)
	{
	
	   $sermon_title = $request->input('sermon_title');
	   $sermon_slug = $this->slug($sermon_title);
	   $sermon_short_desc = $request->input('sermon_short_desc');
	   $sermon_desc = $request->input('sermon_desc');
	   $sermon_pastor = $request->input('sermon_pastor');
	   $sermon_video = $request->input('sermon_video');
	   $sermon_update_date = date('Y-m-d H:i:s');
	   $sermon_status = $request->input('sermon_status');
	   $image_size = $request->input('image_size');
	   $pdf_size = $request->input('pdf_size');	
	   $mp3_size = $request->input('mp3_size');		
	   $sermon_token = $request->input('sermon_token');	
	   $sermon_tag = $request->input('sermon_tag');
	   $save_sermon_image = $request->input('save_sermon_image');
	   $save_sermon_mp3 = $request->input('save_sermon_mp3');
	   $save_sermon_pdf = $request->input('save_sermon_pdf');
	   $sermon_approve_status = "Thanks for your submission. Your details updated successfully.";
	  	   
	   
	   $request->validate([
							'sermon_title' => 'required',
							'sermon_mp3' => 'mimes:mpga|max:'.$mp3_size,
							'sermon_pdf' => 'mimes:pdf|max:'.$pdf_size,
							'sermon_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
         ]);
		 $rules = array(
				
				
				'sermon_title' => ['required', Rule::unique('sermons') ->ignore($sermon_token, 'sermon_token') -> where(function($sql){ $sql->where('sermon_status','!=','');})],
				
				
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
	        
			
			    if ($request->hasFile('sermon_image')) 
				  {
				    Sermons::dropSermons($sermon_token);
					$image = $request->file('sermon_image');
					$img_name = time() . '.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/sermons');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$sermon_image = $img_name;
				  }
				  else
				  {
					 $sermon_image = $save_sermon_image;
				  }
				  
				  
				  if ($request->hasFile('sermon_mp3')) 
				  {
				    Sermons::dropmp3Sermons($sermon_token);
					$image = $request->file('sermon_mp3');
					$img_name = time() . '707.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/sermons');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$sermon_mp3 = $img_name;
				  }
				  else
				  {
					 $sermon_mp3 = $save_sermon_mp3;
				  }
				  
				  if ($request->hasFile('sermon_pdf')) 
				  {
				    Sermons::droppdfSermons($sermon_token);
					$image = $request->file('sermon_pdf');
					$img_name = time() . '554.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/sermons');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$sermon_pdf = $img_name;
				  }
				  else
				  {
					 $sermon_pdf = $save_sermon_pdf;
				  }
				  
			
		  
			   $data = array('sermon_title' => $sermon_title, 'sermon_slug' => $sermon_slug, 'sermon_tag' => $sermon_tag, 'sermon_short_desc' => $sermon_short_desc, 'sermon_desc' => $sermon_desc, 'sermon_pastor' => $sermon_pastor, 'sermon_mp3' => $sermon_mp3, 'sermon_video' => $sermon_video, 'sermon_pdf' => $sermon_pdf, 'sermon_image' => $sermon_image, 'sermon_update_date' => $sermon_update_date, 'sermon_status' => $sermon_status);
			   		   
			   
			   Sermons::updateSermons($sermon_token,$data);
			   
			   return redirect()->back()->with('success', $sermon_approve_status);
			
			   
			   
		}
		
				
	
	
	}
	
	
	
	
	
	
	
	
  
	
	
	
}
