<?php

namespace MyJesus\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Events extends Model
{
    
	
  
  public static function geteventData()
  {
    $value=DB::table('events')->join('category','category.cat_id','events.event_cat_id')->where('category.drop_status','=','no')->orderBy('event_id','desc')->get();
	return $value;
  
  }
  
  
  public static function recenteventBooking()
  {
    $value=DB::table('events_booking')->join('events','events.event_token','events_booking.event_token')->take(3)->orderBy('events_booking.booking_id','desc')->get();
	return $value;
  
  }
  
  
  public static function vieweventBooking()
  {
    $value=DB::table('events_booking')->join('events','events.event_token','events_booking.event_token')->orderBy('events_booking.booking_id','desc')->get();
	return $value;
  
  }
  
  public static function singleBooking($booking_id)
  {
    $value=DB::table('events_booking')->where('booking_id', '=', $booking_id)->first();;
	return $value;
  
  }
  
  
  
  public static function dropBooking($booking_id)
  {
     DB::table('events_booking')->where('booking_id', '=', $booking_id)->delete();
  }
  
  public static function saveeventData($data)
  {
   
      DB::table('events')->insert($data);
     
 
  }
  
  public static function saveeventBooking($data)
  {
   
      DB::table('events_booking')->insert($data);
     
 
  }
  
  
  public static function viewEvent($count)
  {
    $value=DB::table('events')->join('category','category.cat_id','events.event_cat_id')->where('events.event_status','=',1)->take($count)->orderBy('events.event_id','desc')->get();
	return $value;
  
  }
  
  
  
  public static function totalEvent()
  {
    $get=DB::table('events')->orderBy('event_id','desc')->get();
	$value = $get->count();
	return $value;
  
  }
  
  public static function totalEventBooking()
  {
    $get=DB::table('events_booking')->orderBy('booking_id','desc')->get();
	$value = $get->count();
	return $value;
  
  }
  
  
  public static function totalPastors()
  {
    $get=DB::table('pastors')->orderBy('pastor_id','desc')->get();
	$value = $get->count();
	return $value;
  }
  
  
  public static function totalDonation()
  {
    $get=DB::table('donation')->where('donate_payment_status','=','completed')->orderBy('donate_id','desc')->get();
	$value = $get->count();
	return $value;
  }
  
  
  
  public static function viewGallery($count,$order)
  {
    $value=DB::table('gallery')->where('gallery_status','=',1)->take($count)->orderBy('gallery_id',$order)->get();
	return $value;
  
  }
  
  
   public static function viewallGallery()
  {
    $value=DB::table('gallery')->where('gallery_status','=',1)->orderBy('gallery_id','desc')->get();
	return $value;
  
  }
  
  
  public static function deleteEvents($token){
   
    $image = DB::table('events')->where('event_token', $token)->first();
			$file= $image->event_photo;
			$filename = public_path().'/storage/events/'.$file;
			File::delete($filename); 
    
	DB::table('events')->where('event_token', '=', $token)->delete();	
	
	
  }	
  
  
  public static function dropEvents($token){
   
    $image = DB::table('events')->where('event_token', $token)->first();
			$file= $image->event_photo;
			$filename = public_path().'/storage/events/'.$file;
			File::delete($filename); 
    
	
  }	
  
  
  public static function singleEvents($token)
  {
  
   $value=DB::table('events')->where('event_token','=',$token)->first();
	return $value;
    
  }
  
  
  public static function upcomingEvents()
  {
   $today = date('Y-m-d h:i a');
   $value=DB::table('events')->where('event_status','=',1)->where('event_start_date_time','>',$today)->orderBy('event_start_date_time','asc')->first();
	return $value;
    
  }
  
  public static function countupcomingEvents()
  {
    $today = date('Y-m-d h:i a');
    $get=DB::table('events')->where('event_status','=',1)->where('event_start_date_time','>',$today)->orderBy('event_start_date_time','asc')->get();
	$value = $get->count();
	return $value;
  }
  
  
  public static function updateEvents($token,$data){
    DB::table('events')
      ->where('event_token', $token)
      ->update($data);
  }
  
  
  
  
  
  public static function updateEventbooking($booking_id,$data){
    DB::table('events_booking')
      ->where('booking_id', $booking_id)
      ->update($data);
  }
  
  
  public static function allEvents()
  {
  
   $value=DB::table('events')->join('category','category.cat_id','events.event_cat_id')->where('events.event_status','=',1)->orderBy('events.event_id','desc')->get();
	return $value;
    
  }
  
  
  public static function singleEvent($slug)
  {
    
	$value=DB::table('events')->join('category','category.cat_id','events.event_cat_id')->where('events.event_status','=',1)->where('events.event_slug','=',$slug)->first();
	return $value;
  
  }
  
  public static function recentEvent($slug)
  {
  $value=DB::table('events')->where('event_slug','!=',$slug)->take(5)->orderBy('event_id','desc')->get();
	return $value;
    
  }
  
 
   public static function categoryEvents($cat_id)
  {
  
   $value=DB::table('events')->join('category','category.cat_id','events.event_cat_id')->where('events.event_status','=',1)->where('events.event_cat_id','=',$cat_id)->orderBy('events.event_id','desc')->get();
	return $value;
    
  }
  
  
  public static function tagEvents($tag)
  {
  
   $value=DB::table('events')->join('category','category.cat_id','events.event_cat_id')->where('events.event_status','=',1)->where('events.event_tags','LIKE', "%$tag%")->orderBy('events.event_id','desc')->get();
	return $value;
    
  }
  
  
  public static function getadminGallery()
  {
    
    $value=DB::table('gallery')->orderBy('gallery_id','desc')->get(); 
	return $value;
	
  }
  
  public static function savegalleryData($data){
   
      DB::table('gallery')->insert($data);
     
 
    }
  
   public static function dropGallery($gallery_id)
	{
	    $image = DB::table('gallery')->where('gallery_id', $gallery_id)->first();
        $file= $image->gallery_image;
        $filename = public_path().'/storage/gallery/'.$file;
        File::delete($filename);
		DB::table('gallery')->where('gallery_id', '=', $gallery_id)->delete();
	}
	
	public static function editsingleGallery($gallery_id)
  {
    
    $value=DB::table('gallery')->where('gallery_id','=',$gallery_id)->first(); 
	return $value;
	
  }	
  
   public static function upgalleryData($gallery_id,$data)
  {
    DB::table('gallery')
      ->where('gallery_id', $gallery_id)
	  ->update($data);
  }	
	
   public static function droGalleryPhoto($gallery_id)
    {
     $image = DB::table('gallery')->where('gallery_id', $gallery_id)->first();
        $file= $image->gallery_image;
        $filename = public_path().'/storage/gallery/'.$file;
        File::delete($filename);
    }	
	
  
}
