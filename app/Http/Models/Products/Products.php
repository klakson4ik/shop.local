<?php

namespace App\Http\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\ModelsDB\Computer;

class Products extends Model
{
		
	const NUMBER_PAGINATION = 10;




#    public static function createArrayProducts(){
			#	$fullArray = new Paginator();
#				$fullArray = [];
#        $baseArray = ['Computer', 'LargeTechnical', 'Mobile', 'Television'];
#        foreach ($baseArray as $cat){
#				$temp = 'App\ModelsDB\\' .$cat;
#            $class = new $temp();
#				$category = $class::paginate(self::NUMBER_PAGINATION); 
#				dd($category);
#				$products = $class::all();
			#	dd($products);
#				foreach( $products as $product){
#					$fullArray->push($product);
#				}
# 			}       
#       dd($fullArray);

 #   }

 public static function createArrayProducts($page){
 	$fullArray=[];
 	$baseArray = ['computers', 'large_technicals', 'mobiles', 'televisions'];
   foreach ($baseArray as $cat){
		return Computer::paginate(10);
   	$products = DB::select("SELECT id,title,alias,price,quantity,description,brand FROM $cat");
		foreach($products as $product){
			$fullArray[] = $product;
			
		}

   }

#	return array_slice($fullArray, $page*self::NUMBER_PAGINATION, self::NUMBER_PAGINATION);
	return new Paginator($fullArray, self::NUMBER_PAGINATION);

  
}
	
	

	
}
