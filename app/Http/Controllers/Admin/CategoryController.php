<?php

namespace MyJesus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MyJesus\Http\Controllers\Controller;
use Session;
use MyJesus\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
	
	
	/* category */
	
	public function category()
    {
        
		
		$categoryData['category'] = Category::getcategoryData();
		return view('admin.category',[ 'categoryData' => $categoryData]);
    }
    
	
	public function add_category()
	{
	   
	   return view('admin.add-category');
	}
	
	
	public function category_slug($string){
		   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   return $slug;
    }
	
	
	
	public function save_category(Request $request)
	{
 
    
         $category_name = $request->input('category_name');
		 $category_slug = $this->category_slug($category_name);
		 $category_status = $request->input('category_status');
		 if(!empty($request->input('display_order')))
		 {
		 $display_order = $request->input('display_order');
		 }
		 else
		 {
		   $display_order = 0;
		 }
		 
		 
         
		 $request->validate([
							'category_name' => 'required',
							'category_status' => 'required',
							
         ]);
		 $rules = array(
				'category_name' => ['required', 'max:255', Rule::unique('category') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
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
		
		
		 
		$data = array('category_name' => $category_name, 'category_slug' => $category_slug, 'category_status' => $category_status, 'display_order' => $display_order);
        Category::insertcategoryData($data);
            return redirect()->back()->with('success', 'Insert successfully.');
            
 
       } 
     
    
  }
  
  
  
  public function delete_category($cat_id){

      $data = array('drop_status'=>'yes');
	  
        
      Category::deleteCategorydata($cat_id,$data);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
  
  
     
  
  
  public function edit_category($cat_id)
	{
	   
	   $edit['category'] = Category::editcategoryData($cat_id);
	   return view('admin.edit-category', [ 'edit' => $edit, 'cat_id' => $cat_id]);
	}
	
	
	
	public function update_category(Request $request)
	{
	
	    $category_name = $request->input('category_name');
		 $category_slug = $this->category_slug($category_name);
		 $category_status = $request->input('category_status');
		 if(!empty($request->input('display_order')))
		 {
		 $display_order = $request->input('display_order');
		 }
		 else
		 {
		   $display_order = 0;
		 }
		 
		 
		 
		 
		 
         $cat_id = $request->input('cat_id');
		 $request->validate([
							'category_name' => 'required',
							'category_status' => 'required',
							
         ]);
		 $rules = array(
				'category_name' => ['required', 'max:255', Rule::unique('category') ->ignore($cat_id, 'cat_id') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
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
		
		
		
		
		
		$data = array('category_name' => $category_name, 'category_slug' => $category_slug, 'category_status' => $category_status, 'display_order' => $display_order);
        Category::updatecategoryData($cat_id, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	}
	
	
	/* category */
	
	
		
	
}
