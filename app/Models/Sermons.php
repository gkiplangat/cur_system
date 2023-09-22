<?php

namespace MyJesus\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Sermons extends Model
{
    
	
  
  public static function getsermonData()
  {
    $value=DB::table('sermons')->join('pastors','pastors.pastor_id','sermons.sermon_pastor')->where('sermons.sermon_status','=',1)->orderBy('sermons.sermon_id','desc')->get();
	return $value;
  
  }
  
  public static function tagSermons($tag)
  {
  
   $value=DB::table('sermons')->join('pastors','pastors.pastor_id','sermons.sermon_pastor')->where('sermons.sermon_status','=',1)->where('sermons.sermon_tag','LIKE', "%$tag%")->orderBy('sermons.sermon_id','desc')->get();
	return $value;
    
  }
  
  public static function totalSermons()
  {
    $get=DB::table('sermons')->orderBy('sermon_id','desc')->get();
	$value = $get->count();
	return $value;
  }
  
  
  public static function singleSermon($slug)
  {
  
   $value=DB::table('sermons')->join('pastors','pastors.pastor_id','sermons.sermon_pastor')->where('sermons.sermon_slug','=',$slug)->first();
	return $value;
    
  }
  
  public static function recentSermon($slug)
  {
  $value=DB::table('sermons')->where('sermon_status','=',1)->where('sermon_slug','!=',$slug)->take(5)->orderBy('sermon_id','desc')->get();
	return $value;
    
  }
  
  
  public static function savesermonData($data)
  {
   
      DB::table('sermons')->insert($data);
     
 
  }
  
  public static function deleteSermons($token){
   
    $image = DB::table('sermons')->where('sermon_token', $token)->first();
			
			$image_file= $image->sermon_image;
			$mp3_file= $image->sermon_mp3;
			$pdf_file= $image->sermon_pdf;
			$image_filename = public_path().'/storage/sermons/'.$image_file;
			$mp3_filename = public_path().'/storage/sermons/'.$mp3_file;
			$pdf_filename = public_path().'/storage/sermons/'.$pdf_file;
			File::delete($image_filename);
			File::delete($mp3_filename);
			File::delete($pdf_filename);  
    
	DB::table('sermons')->where('sermon_token', '=', $token)->delete();	
	
	
  }	
  
  
  public static function singleSermons($token)
  {
  
   $value=DB::table('sermons')->where('sermon_token','=',$token)->first();
	return $value;
    
  }
  
  
  public static function dropSermons($token){
   
    $image = DB::table('sermons')->where('sermon_token', $token)->first();
			$file= $image->sermon_image;
			$filename = public_path().'/storage/sermons/'.$file;
			File::delete($filename); 
    
	
  }	
  
  
  public static function dropmp3Sermons($token)
  {
   
    $image = DB::table('sermons')->where('sermon_token', $token)->first();
			$file= $image->sermon_mp3;
			$filename = public_path().'/storage/sermons/'.$file;
			File::delete($filename); 
    
	
  }	
  
  public static function droppdfSermons($token)
  {
   
    $image = DB::table('sermons')->where('sermon_token', $token)->first();
			$file= $image->sermon_pdf;
			$filename = public_path().'/storage/sermons/'.$file;
			File::delete($filename); 
    
	
  }	
  
  
   public static function updateSermons($token,$data){
    DB::table('sermons')
      ->where('sermon_token', $token)
      ->update($data);
  }
  
  
   public static function viewSermons($count,$order)
  {
    $value=DB::table('sermons')->where('sermon_status','=',1)->take($count)->orderBy('sermon_id',$order)->get();
	return $value;
  
  }
	
  
}
