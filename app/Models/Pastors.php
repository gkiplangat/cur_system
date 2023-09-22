<?php

namespace MyJesus\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Pastors extends Model
{
    
	
  
  public static function getpastorData()
  {
    $value=DB::table('pastors')->orderBy('pastor_id','desc')->get();
	return $value;
  
  }
  
  public static function singlePastor($id)
  {
    $value=DB::table('pastors')->where('pastor_id', $id)->where('pastor_status', 1)->first();
	return $value;
  
  }
  
  
  public static function savepastorData($data)
  {
   
      DB::table('pastors')->insert($data);
     
 
  }
  
  
  public static function deletePastors($token){
   
    $image = DB::table('pastors')->where('pastor_token', $token)->first();
			$file= $image->pastor_image;
			$filename = public_path().'/storage/pastors/'.$file;
			File::delete($filename); 
    
	DB::table('pastors')->where('pastor_token', '=', $token)->delete();	
	
	
  }	
  
  
  public static function singlePastors($token)
  {
  
   $value=DB::table('pastors')->where('pastor_token','=',$token)->first();
	return $value;
    
  }
  
  
  public static function dropPastors($token){
   
    $image = DB::table('pastors')->where('pastor_token', $token)->first();
			$file= $image->pastor_image;
			$filename = public_path().'/storage/pastors/'.$file;
			File::delete($filename); 
    
	
  }	
  
  
  public static function updatePastors($token,$data){
    DB::table('pastors')
      ->where('pastor_token', $token)
      ->update($data);
  }
  
  
  
}
