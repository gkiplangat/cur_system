<?php

namespace MyJesus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MyJesus\Http\Controllers\Controller;
use Session;
use MyJesus\Models\Products;
use MyJesus\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
	
	public function products()
    {
        
		$product['view'] = Products::getproductData();
		$comments = Products::getcountcommentNew();
		return view('admin.products',[ 'product' => $product, 'comments' => $comments]);
    }
	
	public function add_product()
	{
	 
	 $category['view'] = Category::quickbookData();
	  return view('admin.add-product',[ 'category' => $category]);
	
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
	
	public function full_details_order($order_id)
	{
	  
	  
	  $order['product'] = Products::getallOrders($order_id);
	   $data = array('order' => $order);
	   return view('admin.order-details')->with($data);
	  
	}
	
	public function view_orders()
	{
	  
	  $order['product'] = Products::getallCheckout();
	    $data = array('order' => $order);
	   return view('admin.orders')->with($data);
	
	}
	
	
	public function view_reviews()
	{
	  
	  $review['view'] = Products::getallReviews();
	    $data = array('review' => $review);
	   return view('admin.reviews')->with($data);
	
	}
	
	public function orders_delete($token)
	{
	  
	  Products::deleteorderData($token);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');
	   
	}
	
	
	public function single_order_delete($delete,$order_id)
	{
	   
	   Products::singleorderDelete($order_id);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');
	
	}
	
	
	public function view_reviews_delete($rating_id)
	{
	   
	   Products::reviewDelete($rating_id);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');
	
	}
	
	
	public function update_products(Request $request)
	{
	
	   $product_name = $request->input('product_name');
	   $product_slug = $this->slug($product_name);
	   $product_short_desc = $request->input('product_short_desc');
	   $product_desc = $request->input('product_desc');
	   $product_category = $request->input('product_category');
	   $product_regular_price = $request->input('product_regular_price');
	   $product_offer_price = $request->input('product_offer_price');
	   $product_tag = $request->input('product_tag');
	   $product_stock = $request->input('product_stock');
	   $image_size = $request->input('image_size');	
	   $product_token = $this->generateRandomString();
	   $product_status = $request->input('product_status');
	   $product_shipping = $request->input('product_shipping');
	   
	   
	   
	   $product_approve_status = "Thanks for your submission. Your details updated successfully.";
	   $product_update_date = date('Y-m-d H:i:s');	   
	   
	   $request->validate([
							'product_name' => 'required',
							'product_featured_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							'product_image.*' => 'image|mimes:jpeg,jpg,png|max:'.$image_size,
							
							
         ]);
		 $rules = array(
				
				'product_name' => ['required',  Rule::unique('products') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
				
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
	        
		  
			   if ($request->hasFile('product_featured_image')) 
				  {
					$image = $request->file('product_featured_image');
					$img_name = time() . '.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/products');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$product_featured_image = $img_name;
				  }
				  else
				  {
					 $product_featured_image = "";
				  }
			   
			   $data = array('product_token' => $product_token, 'product_slug' => $product_slug, 'product_category' => $product_category, 'product_name' => $product_name, 'product_short_desc' => $product_short_desc, 'product_desc' => $product_desc, 'product_featured_image' => $product_featured_image, 'product_regular_price' => $product_regular_price, 'product_offer_price' => $product_offer_price, 'product_stock' => $product_stock, 'product_tag' => $product_tag, 'product_update_date' => $product_update_date, 'product_status' => $product_status, 'product_shipping' => $product_shipping);
			   
			   Products::saveproductData($data);
			   
			   if ($request->hasFile('product_image')) 
				{
					$files = $request->file('product_image');
					foreach($files as $file)
					{
						$extension = $file->getClientOriginalExtension();
						$fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
						$folderpath  = public_path('/storage/products');
						$file->move($folderpath , $fileName);
						$imgdata = array('product_token' => $product_token, 'product_image' => $fileName);
						Products::saveproductImages($imgdata);
					}
			    }
			   
			   
			   return redirect('/admin/products')->with('success', $product_approve_status);
			
			   
			   
		}
		
				
	
	
	}
	
	public function products_delete($token)
	{
	   $data = array('drop_status' => 'yes');
	   Products::deleteProducts($token,$data);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');
	
	}
	
	
	public function edit_product($token)
	{
	  $category['view'] = Category::quickbookData();
	  $edit['view'] = Products::singleProducts($token);
	  $product_token = $edit['view']->product_token;
	  $product['images'] = Products::getProductimages($product_token);
	  return view('admin.edit-product',[ 'category' => $category, 'edit' => $edit, 'product' => $product]);
	}
	
	public function drop_image_product($dropimg,$token)
	{
	   
	   $token = base64_decode($token); 
	   Products::deleteimgdata($token);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');
	
	}
	
	
	public function edit_products(Request $request)
	{
	
	   $product_name = $request->input('product_name');
	   $product_slug = $this->slug($product_name);
	   $product_short_desc = $request->input('product_short_desc');
	   $product_desc = $request->input('product_desc');
	   $product_category = $request->input('product_category');
	   $product_regular_price = $request->input('product_regular_price');
	   $product_offer_price = $request->input('product_offer_price');
	   $product_tag = $request->input('product_tag');
	   $product_stock = $request->input('product_stock');
	   $image_size = $request->input('image_size');
	   $save_product_featured_image = $request->input('save_product_featured_image');
	   $product_token = $request->input('product_token');
	   $product_status = $request->input('product_status');
	   $product_shipping = $request->input('product_shipping');		
	   $product_approve_status = "Thanks for your submission. Your details updated successfully.";
	   $product_update_date = date('Y-m-d H:i:s');	   
	   
	   $request->validate([
							'product_name' => 'required',
							'product_featured_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							'product_image.*' => 'image|mimes:jpeg,jpg,png|max:'.$image_size,
							
							
         ]);
		 $rules = array(
				
				
				'product_name' => ['required', Rule::unique('products') ->ignore($product_token, 'product_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
				
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
	        
		  
			   if ($request->hasFile('product_featured_image')) 
				  {
				    Products::dropProducts($product_token);
					$image = $request->file('product_featured_image');
					$img_name = time() . '.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/products');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$product_featured_image = $img_name;
				  }
				  else
				  {
					 $product_featured_image = $save_product_featured_image;
				  }
			   
			   $data = array('product_slug' => $product_slug, 'product_category' => $product_category, 'product_name' => $product_name, 'product_short_desc' => $product_short_desc, 'product_desc' => $product_desc, 'product_featured_image' => $product_featured_image, 'product_regular_price' => $product_regular_price, 'product_offer_price' => $product_offer_price, 'product_stock' => $product_stock, 'product_tag' => $product_tag, 'product_update_date' => $product_update_date, 'product_status' => $product_status, 'product_shipping' => $product_shipping);
			   
			   Products::updateProducts($product_token,$data);
			   
			   if ($request->hasFile('product_image')) 
				{
					$files = $request->file('product_image');
					foreach($files as $file)
					{
						$extension = $file->getClientOriginalExtension();
						$fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
						$folderpath  = public_path('/storage/products');
						$file->move($folderpath , $fileName);
						$imgdata = array('product_token' => $product_token, 'product_image' => $fileName);
						Products::saveproductImages($imgdata);
					}
			    }
			   
			   return redirect('/admin/products')->with('success', $product_approve_status);
			
			   
			   
		}
		
				
	
	
	}
	
	
	/* comments */
	
	
	public function comments($product_token)
	{
	  $commentData['product'] = Products::getcommentData($product_token);
	  return view('admin.product-comment',[ 'commentData' => $commentData]);
	}
	
	
	public function delete_comment($delete,$comment_id){

      
	  
      Products::deleteCommentdata($comment_id);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
  
  public function comment_status($status,$comment_id)
  {
     if($status == 0)
	 {
	   $status_value = 1;
	 }
	 else
	 {
	   $status_value = 0;
	 }
	 
	 $data = array( 'product_comment_status' => $status_value);
	 
	 Products::updatecommentData($comment_id, $data);
     return redirect()->back()->with('success', 'Update successfully.');
  
  }
  
  
	/* comments */
	
	
	
	
	
}
