<?php

namespace MyJesus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MyJesus\Http\Controllers\Controller;
use Session;
use MyJesus\Models\Members;
use MyJesus\Models\Settings;
use MyJesus\Models\Volunteers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use MyJesus\Models\Subscription;
use Auth;
use URL;
use Mail;


class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
	
	
  
	/* edit profile */
	
	
	
	public function upgrade_customer($token,$subcr_id)
	{
	   
	        
			$subscr['view'] = Subscription::editsubData($subcr_id);
			$subscri_date = $subscr['view']->subscr_duration;
			$subscr_value = "+".$subscri_date;
			$subscr_date = date('Y-m-d', strtotime($subscr_value));
			$checkoutdata = array('user_subscr_date' => $subscr_date);
			Subscription::confirmupgradeData($token,$checkoutdata);
			return redirect()->back()->with('success', 'Membership has been upgrade');
	   
	} 
	
	
	
	
	public function edit_profile()
    {
        $token = 1;
		$edit['userdata'] = Members::editprofileData($token);
		
		return view('admin.edit-profile', [ 'edit' => $edit, 'token' => $token]);
		
    }
	
	
	
	public function update_profile(Request $request)
	{
	
	   $name = $request->input('name');
	   $username = $request->input('username');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 
		 if(!empty($request->input('password')))
		 {
		 $password = bcrypt($request->input('password'));
		 $pass = $password;
		 }
		 else
		 {
		 $pass = $request->input('save_password');
		 }
		 
		 
		 
		  $token = $request->input('edit_id');
		 
         
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png,gif|max:3000',
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') ->ignore($token, 'id') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') ->ignore($token, 'id') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
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
		
		if ($request->hasFile('user_photo')) {
		     
			Members::droprofilePhoto($token); 
		   
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = $request->input('save_photo');
		  }
		  
		 
		 
		$data = array('name' => $name, 'username' => $username, 'email' => $email,'user_type' => $user_type, 'password' => $pass, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'));
 
            
            
			Members::updateprofileData($token, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	}
	
	/* edit profile */
	
	
	/* customer */
	
    public function customer()
    {
        
		
		$userData['data'] = Members::getuserData();
		return view('admin.customer',[ 'userData' => $userData]);
    }
	
	public function add_customer()
	{
	   
	   return view('admin.add-customer');
	}
	
	
	
	
	public function save_customer(Request $request)
	{
 
         $sid = 1;
		 $setting['setting'] = Settings::editGeneral($sid);
		 $site_max_image_size = $setting['setting']->site_max_image_size;
		 $name = $request->input('name');
		 $username = $request->input('username');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 $password = bcrypt($request->input('password'));
		 
		 
		 
		 
         
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'password' => 'min:6',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png|max:'.$site_max_image_size,
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
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
		
		if ($request->hasFile('user_photo')) {
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = "";
		  }
		  $verified = 1;
		  $token = $this->generateRandomString();
		 
		$data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $password, 'user_photo' => $user_image, 'verified' => $verified, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'user_token' => $token);
 
            
            Members::insertData($data);
            return redirect()->back()->with('success', 'Insert successfully.');
            
 
       } 
     
    
  }
  
  
  public function delete_customer($token){

      $data = array('drop_status'=>'yes');
	  
      Members::deleteData($token,$data);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
  
  public function edit_customer($token)
	{
	   
	   $edit['userdata'] = Members::editData($token);
	   return view('admin.edit-customer', [ 'edit' => $edit, 'token' => $token]);
	}
	
	
	public function update_customer(Request $request)
	{
	
	   $name = $request->input('name');
	   $username = $request->input('username');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 
		 if(!empty($request->input('password')))
		 {
		 $password = bcrypt($request->input('password'));
		 $pass = $password;
		 }
		 else
		 {
		 $pass = $request->input('save_password');
		 }
		 
		 $token = $request->input('edit_id');
		 
         
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'password' => 'min:7',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png,gif|max:3000',
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') ->ignore($token, 'user_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') ->ignore($token, 'user_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
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
		
		if ($request->hasFile('user_photo')) {
		     
			Members::droPhoto($token); 
		   
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = $request->input('save_photo');
		  }
		  
		 
		 
		$data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $pass, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'));
 
            
            
			Members::updateData($token, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	}
	
	/* customer */
	
	
	
	
	
}
