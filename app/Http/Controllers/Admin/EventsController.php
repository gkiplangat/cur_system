<?php

namespace MyJesus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MyJesus\Http\Controllers\Controller;
use Session;
use MyJesus\Models\Events;
use MyJesus\Models\Category;
use MyJesus\Models\Settings;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use URL;
use Mail;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
	
	public function events()
    {
        
		$event['view'] = Events::geteventData();
		return view('admin.events',[ 'event' => $event]);
    }
	
	
	
	public static function events_bookings_delete($booking_id,$status)
    {
    
	if($status == 0)
    {
	    Events::dropBooking($booking_id);
		return redirect()->back()->with('success', 'Delete successfully.');		
	}
	else
	{
	
	  $get['book'] = Events::singleBooking($booking_id);
	  $event_token = $get['book']->event_token;
	  $seats = $get['book']->booking_seats;
	  $event['view'] = Events::singleEvents($event_token);
	  $update_seat = $event['view']->event_booked_seat - $seats;
	  $data = array('event_booked_seat' => $update_seat);
	  Events::updateEvents($event_token,$data);
	  Events::dropBooking($booking_id);
	   return redirect()->back()->with('success', 'Delete successfully.');  
	}
  
  
  }
  
  
  public static function events_bookings_approval($status,$booking_id,$event_token)
  {
    
	if($status == 'approval')
	{
	  $get['book'] = Events::singleBooking($booking_id);
	  $event_token = $get['book']->event_token;
	  $seats = $get['book']->booking_seats;
	  $event['view'] = Events::singleEvents($event_token);
	  $update_seat = $event['view']->event_booked_seat + $seats;
	  $data = array('event_booked_seat' => $update_seat);
	  Events::updateEvents($event_token,$data);
	  $book_data = array('booking_approval' => 'Approved', 'booking_status' => 1);
	  Events::updateEventbooking($booking_id,$book_data);
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $to_name = $get['book']->booking_name;
	  $to_email = $get['book']->booking_email;
	  $from_name = $setting['setting']->sender_name;
      $from_email = $setting['setting']->sender_email;
	  $event_url = URL::to('/event').'/'.$event['view']->event_slug;
	  $booking_seats = $seats;
		
		$record = array('event_url' => $event_url, 'from_name' => $from_name, 'from_email' => $from_email, 'booking_seats' => $booking_seats);
		Mail::send('admin.event_booking_approval_mail', $record, function($message) use ($from_name, $from_email, $to_name, $to_email, $event_url) {
			$message->to($to_email, $to_name)
					->subject('Event Booking');
			$message->from($from_email,$from_name);
		});	
	  
	  return redirect()->back()->with('success', 'Event booking has been approved');
	   
	}
	else
	{
	  $book_data = array('booking_approval' => 'Rejected', 'booking_status' => 0);
	  Events::updateEventbooking($booking_id,$book_data);
	  $get['book'] = Events::singleBooking($booking_id);
	  $seats = $get['book']->booking_seats;
	  $event_token = $get['book']->event_token;
	  $event['view'] = Events::singleEvents($event_token);
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $to_name = $get['book']->booking_name;
	  $to_email = $get['book']->booking_email;
	  $from_name = $setting['setting']->sender_name;
      $from_email = $setting['setting']->sender_email;
	  $event_url = URL::to('/event').'/'.$event['view']->event_slug;
	  $booking_seats = $seats;
		
		$record = array('event_url' => $event_url, 'from_name' => $from_name, 'from_email' => $from_email, 'booking_seats' => $booking_seats);
		Mail::send('admin.event_booking_reject_mail', $record, function($message) use ($from_name, $from_email, $to_name, $to_email, $event_url) {
			$message->to($to_email, $to_name)
					->subject('Event Booking');
			$message->from($from_email,$from_name);
		});	
	  return redirect()->back()->with('error', 'Event booking has been rejected');
	}
	
	
  }
	
	
	public function events_bookings()
    {
        
		$event['view'] = Events::vieweventBooking();
		return view('admin.events-bookings',[ 'event' => $event]);
    }
	
	public function add_event()
	{
	 
	 $category['view'] = Category::quickbookData();
	  return view('admin.add-event',[ 'category' => $category]);
	
	}
	
	
	public function edit_event($token)
	{
	  $category['view'] = Category::quickbookData();
	  $edit['view'] = Events::singleEvents($token);
	  return view('admin.edit-event',[ 'category' => $category, 'edit' => $edit]);
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
	
	public function event_slug($string){
		   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   return $slug;
    }
	
	
	public function edit_events(Request $request)
	{
	
	   $event_title = $request->input('event_title');
	   $event_slug = $this->event_slug($event_title);
	   $event_short_desc = $request->input('event_short_desc');
	   $event_desc = $request->input('event_desc');
	   $event_cat_id = $request->input('event_cat_id');
	   $event_location = $request->input('event_location');
	   $event_start_date_time = $request->input('event_start_date_time');
	   $event_end_date_time = $request->input('event_end_date_time');
	   $event_org_email = $request->input('event_org_email');
	   $event_org_phone = $request->input('event_org_phone');
	   $event_org_website = $request->input('event_org_website');
	   $event_org_address = $request->input('event_org_address');
	   $event_status = $request->input('event_status');
	   $image_size = $request->input('image_size');	
	   $event_token = $request->input('event_token');	
	   $event_status = $request->input('event_status');
	   $save_event_photo = $request->input('save_event_photo');
	   $event_tags = $request->input('event_tags');
	   $event_available_seat = $request->input('event_available_seat');
	   $event_approve_status = "Thanks for your submission. Your details updated successfully.";
	   $event_update_date = date('Y-m-d H:i:s');	   
	   
	   $request->validate([
							'event_title' => 'required',
							'event_photo' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
         ]);
		 $rules = array(
				
				
				'event_title' => ['required', Rule::unique('events') ->ignore($event_token, 'event_token') -> where(function($sql){ $sql->where('event_status','!=','');})],
				
				
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
	        
		  
			   if ($request->hasFile('event_photo')) 
				  {
				    Events::dropEvents($event_token);
					$image = $request->file('event_photo');
					$img_name = time() . '.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/events');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$event_photo = $img_name;
				  }
				  else
				  {
					 $event_photo = $save_event_photo;
				  }
			   
			   $data = array('event_cat_id' => $event_cat_id, 'event_title' => $event_title, 'event_slug' => $event_slug, 'event_short_desc' => $event_short_desc, 'event_desc' => $event_desc, 'event_location' => $event_location, 'event_start_date_time' => $event_start_date_time, 'event_end_date_time' => $event_end_date_time, 'event_photo' => $event_photo, 'event_org_email' => $event_org_email, 'event_org_phone' => $event_org_phone, 'event_org_website' => $event_org_website, 'event_org_address' => $event_org_address, 'event_status' => $event_status, 'event_update_date' => $event_update_date, 'event_tags' => $event_tags, 'event_available_seat' => $event_available_seat);
			   
			   Events::updateEvents($event_token,$data);
			   
			   return redirect()->back()->with('success', $event_approve_status);
			
			   
			   
		}
		
				
	
	
	}
	
	
	
	
	public function update_events(Request $request)
	{
	
	   $event_title = $request->input('event_title');
	   $event_slug = $this->event_slug($event_title);
	   $event_short_desc = $request->input('event_short_desc');
	   $event_desc = $request->input('event_desc');
	   $event_cat_id = $request->input('event_cat_id');
	   $event_location = $request->input('event_location');
	   $event_start_date_time = $request->input('event_start_date_time');
	   $event_end_date_time = $request->input('event_end_date_time');
	   $event_org_email = $request->input('event_org_email');
	   $event_org_phone = $request->input('event_org_phone');
	   $event_org_website = $request->input('event_org_website');
	   $event_org_address = $request->input('event_org_address');
	   $event_status = $request->input('event_status');
	   $image_size = $request->input('image_size');	
	   $event_token = $this->generateRandomString();
	   $event_status = $request->input('event_status');
	   $event_available_seat = $request->input('event_available_seat');
	   $event_tags = $request->input('event_tags');
	   
	   $event_approve_status = "Thanks for your submission. Your details updated successfully.";
	   $event_update_date = date('Y-m-d H:i:s');	   
	   
	   $request->validate([
							'event_title' => 'required',
							'event_photo' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
         ]);
		 $rules = array(
				
				'event_title' => ['required',  Rule::unique('events') -> where(function($sql){ $sql->where('event_status','!=','');})],
				
				
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
	        
		  
			   if ($request->hasFile('event_photo')) 
				  {
					$image = $request->file('event_photo');
					$img_name = time() . '.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/events');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$event_photo = $img_name;
				  }
				  else
				  {
					 $event_photo = "";
				  }
			   
			   $data = array('event_cat_id' => $event_cat_id, 'event_token' => $event_token, 'event_title' => $event_title, 'event_slug' => $event_slug, 'event_short_desc' => $event_short_desc, 'event_desc' => $event_desc, 'event_location' => $event_location, 'event_start_date_time' => $event_start_date_time, 'event_end_date_time' => $event_end_date_time, 'event_photo' => $event_photo, 'event_org_email' => $event_org_email, 'event_org_phone' => $event_org_phone, 'event_org_website' => $event_org_website, 'event_org_address' => $event_org_address, 'event_status' => $event_status, 'event_update_date' => $event_update_date, 'event_tags' => $event_tags, 'event_available_seat' => $event_available_seat);
			   
			   Events::saveeventData($data);
			   
			   return redirect()->back()->with('success', $event_approve_status);
			
			   
			   
		}
		
				
	
	
	}
	
	
	public function events_delete($token)
	{
	   Events::deleteEvents($token);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');
	
	}
	
  
	
	
	
}
