<?php

namespace MyJesus\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Auth;

class Products extends Model
{
    
	protected $table = 'products';
	
	
  public function ProductsImages()
  {
        return $this->hasMany(ProductsImages::class, 'product_token', 'product_token');
  }
  
  public static function getproductData()
  {
    $value=DB::table('products')->join('category','category.cat_id','products.product_category')->where('products.drop_status','=','no')->orderBy('products.product_id','desc')->get();
	return $value;
  
  }
  
  
  public static function getcheckoutCount($purchase_token,$user_id,$payment_status)
  {

    $get=DB::table('products_checkout')->where('purchase_token','=', $purchase_token)->where('user_id','=', $user_id)->where('payment_status','=', $payment_status)->get();
	$value = $get->count(); 
    return $value;
	
  }
  
  public static function getreviewCount($product_token)
  {

    $get=DB::table('products_rating')->where('product_token','=', $product_token)->get();
	$value = $get->count(); 
    return $value;
	
  }
  
  public static function getreviewView($product_token)
  {
    $value = DB::table('products_rating')->where('product_token','=', $product_token)->get();
	return $value;
  }
  
  
   public static function savedonateData($savedata)
  {
   
      DB::table('donation')->insert($savedata);
     
 
  }
  
  
  public static function saveratingData($savedata)
  {
   
      DB::table('products_rating')->insert($savedata);
     
 
  }
  
  
  public static function savecheckoutData($savedata)
  {
   
      DB::table('products_checkout')->insert($savedata);
     
 
  }
  
  public static function updateitemData($item_token,$data)
  {
    DB::table('product')
      ->where('product_token', $item_token)
      ->update($data);
  }
  
  public static function singleorderupData($order,$orderdata)
  {
    DB::table('products_order')
      ->where('product_order_id', $order)
	  ->update($orderdata);
  }
  
  public static function singleorderData($order)
  {
    $value = DB::table('products_order')
      ->where('product_order_id', $order)
      ->first();
	return $value;
  }
  
  public static function deleteorderData($token){
  
   
    
	DB::table('products_order')->where('purchase_token', '=', $token)->delete();	
	DB::table('products_checkout')->where('purchase_token', '=', $token)->delete();
	
  }	
  
  
  public static function singleorderDelete($order_id){
  
   
    
	DB::table('products_order')->where('product_order_id', '=', $order_id)->delete();	
	
	
  }	
  
  
  public static function reviewDelete($rating_id)
  {
 
    
	DB::table('products_rating')->where('rating_id', '=', $rating_id)->delete();	
	
	
  }	
  
  
  public static function savecommentData($data){
   
      DB::table('products_comment')->insert($data);
     
 
    }
	
	 public static function getcommentData($product_token)
  {

    $value=DB::table('products_comment')->join('users','users.id','products_comment.user_id')->where('products_comment.product_token','=',$product_token)->orderBy('products_comment.product_comment_id', 'desc')->get(); 
    return $value;
	
  }
  
  public static function deleteCommentdata($comment_id){
  
   
    
	DB::table('products_comment')->where('product_comment_id', '=', $comment_id)->delete();	
	
	
  }	
  
  
  public static function updatecommentData($comment_id, $data){
    DB::table('products_comment')
      ->where('product_comment_id', $comment_id)
      ->update($data);
  }
  
  
	public static function getcountcommentNew()
  {

    $value=DB::table('products_comment')->orderBy('product_comment_id', 'desc')->get()->groupBy('product_token'); 
    return $value;
	
  }	
  
  
  public static function getorderCount($product_token,$product_user_id,$product_order_status)
  {

    $get=DB::table('products_order')->where('product_token','=', $product_token)->where('product_user_id','=', $product_user_id)->where('product_order_status','=', $product_order_status)->get();
	$value = $get->count(); 
    return $value;
	
  }
  
  public static function savecartData($savedata)
  {
   
      DB::table('products_order')->insert($savedata);
     
 
  }
  
  public static function getmyCheckout()
  {
   $user_id = Auth::user()->id; 
   $value=DB::table('products_checkout')->where('user_id','=',$user_id)->orderBy('products_checkout_id','desc')->get();
	return $value;
    
  }
  
  
  public static function getallCheckout()
  {
    
   $value=DB::table('products_checkout')->orderBy('products_checkout_id','desc')->get();
	return $value;
    
  }
  
  public static function getallReviews()
  {
    
   $value=DB::table('products_rating')->join('products','products.product_token','products_rating.product_token')->join('users','users.id','products_rating.user_id')->orderBy('products_rating.rating_id','desc')->get();
	return $value;
    
  }
  
  
  public static function getmyDonation()
  {
   $user_id = Auth::user()->id; 
   $value=DB::table('donation')->where('user_id','=',$user_id)->orderBy('donate_id','desc')->get();
	return $value;
    
  }
  
  
  
   public static function getRateCount($product_token,$user_id)
  {
   
   $get=DB::table('products_rating')->where('product_token','=',$product_token)->where('user_id','=',$user_id)->get();
   $value = $get->count(); 
	return $value;
    
  }
  
  
  public static function getRate($product_token,$user_id)
  {
   
   $value=DB::table('products_rating')->join('products','products.product_token','products_rating.product_token')->where('products_rating.product_token','=',$product_token)->where('products_rating.user_id','=',$user_id)->first();
	return $value;
    
  }
  
  
  public static function getmyOrders($order_id)
  {
   $user_id = Auth::user()->id; 
   $value=DB::table('products_order')->join('products','products.product_token','products_order.product_token')->where('products_order.product_user_id','=',$user_id)->where('products_order.purchase_token','=',$order_id)->get();
	return $value;
    
  }
  
  
   public static function getallOrders($order_id)
  {
   
   $value=DB::table('products_order')->join('products','products.product_token','products_order.product_token')->where('products_order.purchase_token','=',$order_id)->get();
	return $value;
    
  }
  
  
   public static function getcartData()
  {
    $user_id = Auth::user()->id;
    $value=DB::table('products_order')->join('products','products.product_token','products_order.product_token')->where('products_order.product_user_id','=',$user_id)->where('products.product_status','=',1)->where('products.drop_status','=','no')->where('products_order.product_order_status','=','pending')->orderBy('products_order.product_order_id', 'desc')->get(); 
    return $value;
	
  }
  
  
  public static function checkRating($product_token,$user_id)
  {
    $get=DB::table('products_rating')->where('product_token','=',$product_token)->where('user_id','=',$user_id)->get();
	$value = $get->count();
    return $value;
  }
  
  public static function getcartCount()
  {
    $user_id = Auth::user()->id;
    $get=DB::table('products_order')->join('products','products.product_token','products_order.product_token')->where('products_order.product_user_id','=',$user_id)->where('products.product_status','=',1)->where('products.drop_status','=','no')->where('products_order.product_order_status','=','pending')->orderBy('products_order.product_order_id', 'desc')->get(); 
	$value = $get->count();
    return $value;
	
  }
  
  
  public static function deletecartdata($ord_id){
    
	
	
	DB::table('products_order')->where('product_order_id', '=', $ord_id)->delete();	
	
	
  }
  
  
  
  public static function updatecartData($product_token,$product_user_id,$product_order_status,$updatedata)
  {
    DB::table('products_order')
      ->where('product_token', $product_token)
	  ->where('product_user_id', $product_user_id)
	  ->where('product_order_status', $product_order_status)
      ->update($updatedata);
  }
	
	
	public static function getcommentProducts($product_token)
  {

    $value=DB::table('products_comment')->join('users','users.id','products_comment.user_id')->where('products_comment.product_token','=',$product_token)->where('products_comment.product_comment_status','=',1)->orderBy('products_comment.product_comment_id', 'desc')->get(); 
    return $value;
	
  }
  
  
  public static function getrateProducts($product_token)
  {

    $value=DB::table('products_rating')->join('users','users.id','products_rating.user_id')->where('products_rating.product_token','=',$product_token)->orderBy('products_rating.rating_id', 'desc')->get(); 
    return $value;
	
  }
	
	
  public static function getcommentCount($product_token)
  {

    $get=DB::table('products_comment')->where('product_token','=',$product_token)->where('product_comment_status','=',1)->orderBy('product_comment_id', 'desc')->get(); 
    $value = $get->count(); 
	return $value;
	
  }	
  
  public static function totalProducs()
  {
    $get=DB::table('products')->where('drop_status','=','no')->orderBy('product_id','desc')->get();
	$value = $get->count();
	return $value;
  
  }
  	
  public static function totalOrders()
  {
    $get=DB::table('products_checkout')->orderBy('products_checkout_id','desc')->get();
	$value = $get->count();
	return $value;
  
  }	
	
  
  public static function saveproductData($data)
  {
   
      DB::table('products')->insert($data);
     
 
  }
  
  
  public static function saveproductImages($imgdata)
  {
   
      DB::table('products_images')->insert($imgdata);
     
 
  }
  
  public static function deleteProducts($token,$data){
   
    $image = DB::table('products')->where('product_token', $token)->first();
			$file= $image->product_featured_image;
			$filename = public_path().'/storage/products/'.$file;
			File::delete($filename); 
    
	
	$getall = DB::table('products_images')->where('product_token', $token)->get();	
	foreach($getall as $get)
	{
	    $file_main= $get->product_image;
        $filename_main = public_path().'/storage/products/'.$file_main;
        File::delete($filename_main);
	}	
		
	
	DB::table('products')
      ->where('product_token', $token)
      ->update($data);	
	
	
  }	
  
  public static function singleProducts($token)
  {
  
   $value=DB::table('products')->where('product_token','=',$token)->first();
	return $value;
    
  }
  
  public static function getcheckoutData($token)
  {
     $value=DB::table('products_checkout')->where('purchase_token','=',$token)->first();
	return $value;
  }
  
  public static function getdonateData($token)
  {
     $value=DB::table('donation')->where('purchase_token','=',$token)->first();
	return $value;
  }
  
  
  public static function singleordupdateData($purchased_token,$orderdata)
  {
    DB::table('products_order')
      ->where('purchase_token', $purchased_token)
	  ->update($orderdata);
  }
  
  
  public static function singledonateData($purchased_token,$orderdata)
  {
    DB::table('donation')
      ->where('purchase_token', $purchased_token)
	  ->update($orderdata);
  }
  
  
  public static function updatecheckoutData($purchase_token,$user_id,$payment_status,$updatedata)
  {
    DB::table('products_checkout')
      ->where('purchase_token', $purchase_token)
	  ->where('user_id', $user_id)
	  ->where('payment_status', $payment_status)
      ->update($updatedata);
  }
  
  
  public static function singlecheckoutData($purchased_token,$checkoutdata)
  {
    DB::table('products_checkout')
      ->where('purchase_token', $purchased_token)
	  ->update($checkoutdata);
  }
  
  
   public static function getProductimages($token)
  {
    $value=DB::table('products_images')->where('product_token','=',$token)->orderBy('product_image_id','desc')->get();
	return $value;
  
  }
  
  
   public static function deleteimgdata($token){
    
	$image = DB::table('products_images')->where('product_image_id', '=', $token)->first();
    $file= $image->product_image;
    $filename = public_path().'/storage/products/'.$file;
    File::delete($filename);
	
	DB::table('products_images')->where('product_image_id', '=', $token)->delete();	
	
	
  }
  
  
  public static function updateProducts($token,$data){
    DB::table('products')
      ->where('product_token', $token)
      ->update($data);
  }
  
  public static function dropProducts($token){
   
    $image = DB::table('products')->where('product_token', $token)->first();
			$file= $image->product_featured_image;
			$filename = public_path().'/storage/products/'.$file;
			File::delete($filename); 
    
	
  }	
  
  /*public static function viewProducts($count,$order)
  {
    $value=DB::table('products')->where('product_status','=',1)->where('drop_status','=','no')->take($count)->orderBy('product_id',$order)->get();
	return $value;
  
  }*/
  
  
  public static function updaterateData($product_token,$user_id,$updatedata)
  {
    DB::table('products_rating')
      ->where('product_token', $product_token)
	  ->where('user_id', $user_id)
	  ->update($updatedata);
  }
  
 
	
  
}
