<?php

namespace MyJesus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MyJesus\Http\Controllers\Controller;
use Session;
use MyJesus\Models\Testimonial;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
	
	
	
	public function testimonial()
    {
      	$testimonialData['display'] = Testimonial::gettestData();
		return view('admin.testimonial',[ 'testimonialData' => $testimonialData]);
    }
    
	
	public function add_testimonial()
	{
	   
	   return view('admin.add-testimonial');
	}
	
	
	public function slug($string){
		   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   return $slug;
    }
	
	
	
	public function save_testimonial(Request $request)
	{
         
		 $testimonial_name = $request->input('testimonial_name');
		 $testimonial_desc = $request->input('testimonial_desc');
         if(!empty($request->input('testimonial_order')))
		 {
         $testimonial_order = $request->input('testimonial_order');
		 }
		 else
		 {
		 $testimonial_order = 0;
		 }
		 $testimonial_status = $request->input('testimonial_status');
		 $image_size = $request->input('image_size');
		 
		 
		 
		
         
		 $request->validate([
		                    'testimonial_image' => 'required|mimes:jpeg,jpg,png|max:'.$image_size,
							'testimonial_name' => 'required',
							'testimonial_desc' => 'required',
							'testimonial_status' => 'required',
							
							
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
		
		   if ($request->hasFile('testimonial_image')) 
		   {
		   
			$image = $request->file('testimonial_image');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/testimonial');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$testimonial_image = $img_name;
		  }
		  else
		  {
		     $testimonial_image = "";
		  }
		 
		$data = array('testimonial_image' => $testimonial_image, 'testimonial_name' => $testimonial_name, 'testimonial_desc' => $testimonial_desc, 'testimonial_order' => $testimonial_order, 'testimonial_status' => $testimonial_status);
        Testimonial::inserttestData($data);
        return redirect('/admin/testimonial')->with('success', 'Insert successfully.');
            
 
       } 
     
    
  }
  
  
  
  public function delete_testimonial($testimonial_id){

      
	  
      Testimonial::deleteTestdata($testimonial_id);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
  
  
  public function edit_testimonial($testimonial_id)
	{
	   
	   $edit['view'] = Testimonial::edittestData($testimonial_id);
	   return view('admin.edit-testimonial', [ 'edit' => $edit, 'testimonial_id' => $testimonial_id]);
	}
	
	
	
	public function update_testimonial(Request $request)
	{
	
	   $testimonial_name = $request->input('testimonial_name');
		 $testimonial_desc = $request->input('testimonial_desc');
         if(!empty($request->input('testimonial_order')))
		 {
         $testimonial_order = $request->input('testimonial_order');
		 }
		 else
		 {
		 $testimonial_order = 0;
		 }
		 $testimonial_status = $request->input('testimonial_status');
		 $image_size = $request->input('image_size');
		 $save_testimonial_image = $request->input('save_testimonial_image');
		 $testimonial_id = $request->input('testimonial_id');
		 
         
		 $request->validate([
		                    
							
							'testimonial_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							'testimonial_name' => 'required',
							'testimonial_desc' => 'required',
							'testimonial_status' => 'required',
							
							
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
		
		   
		 if ($request->hasFile('testimonial_image')) 
		   {
		    Testimonial::dropTest($testimonial_id);
			$image = $request->file('testimonial_image');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/testimonial');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$testimonial_image = $img_name;
		  }
		  else
		  {
		     $testimonial_image = $save_testimonial_image;
		  }
		 
		$data = array('testimonial_image' => $testimonial_image, 'testimonial_name' => $testimonial_name, 'testimonial_desc' => $testimonial_desc, 'testimonial_order' => $testimonial_order, 'testimonial_status' => $testimonial_status);  
		   
		   
        Testimonial::updatetestData($testimonial_id,$data);
        return redirect('/admin/testimonial')->with('success', 'Update successfully.');
            
 
       } 
      
     
       
	
	
	}
	
  
	
	
	
}
