<?php

namespace App\Http\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{

	public static function getArrayProducts(){
		$array = [];
 		$tableArray = ['computers', 'large_technicals', 'mobiles', 'televisions'];
  		foreach ($tableArray as $table){
   		$dataDB = DB::select("SELECT id,title,alias,price,quantity,description,brand FROM $table");
			foreach($dataDB as $product){
				$array[] = $product;
			}
		}
		return $array;
	}		
}
