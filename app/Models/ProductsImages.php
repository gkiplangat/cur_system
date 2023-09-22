<?php

namespace MyJesus\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProductsImages extends Model
{
    
	/* product images */
	
  
    protected $table = 'products_images';
	
	public function Products(){
      return $this->belongsTo(Products::class);
   }
	
  
  
  
  
}
