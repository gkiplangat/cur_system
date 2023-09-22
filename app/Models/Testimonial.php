<?php

namespace MyJesus\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Testimonial extends Model
{
    
	/* testimonial */
	
  
  public static function gettestData()
  {

    $value=DB::table('testimonial')->orderBy('testimonial_id', 'desc')->get(); 
    return $value;
	
  }
  
  public static function viewallTestimonial()
  {
    $value=DB::table('testimonial')->where('testimonial_status','=',1)->orderBy('testimonial_order','asc')->get();
	return $value;
  
  }
  
  public static function inserttestData($data){
   
      DB::table('testimonial')->insert($data);
     
 
    }
	
   public static function deleteTestdata($testimonial_id){
   
    $image = DB::table('testimonial')->where('testimonial_id', $testimonial_id)->first();
			$file= $image->testimonial_image;
			$filename = public_path().'/storage/testimonial/'.$file;
			File::delete($filename); 
    
	DB::table('testimonial')->where('testimonial_id', '=', $testimonial_id)->delete();	
	
	
  }	
  
  
  public static function edittestData($testimonial_id){
    $value = DB::table('testimonial')
      ->where('testimonial_id', $testimonial_id)
      ->first();
	return $value;
  }
	
	
	
  public static function updatetestData($testimonial_id,$data){
    DB::table('testimonial')
      ->where('testimonial_id', $testimonial_id)
      ->update($data);
  }
  	
  
  public static function dropTest($testimonial_id)
	  {
		 $image = DB::table('testimonial')->where('testimonial_id', $testimonial_id)->first();
			$file= $image->testimonial_image;
			$filename = public_path().'/storage/testimonial/'.$file;
			File::delete($filename);
	  }
  
 public static function viewTestimonial($count)
  {
    $value=DB::table('testimonial')->where('testimonial_status','=',1)->take($count)->orderBy('testimonial_order','asc')->get();
	return $value;
  
  } 
  /* slideshow */
  
  
  
	
	
	
	
	
  
  
  
  
}
