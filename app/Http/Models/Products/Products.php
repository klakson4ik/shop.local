<?php

namespace App\Http\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
		
	const NUMBER_PAGINATION = 10;



    public static function createArrayProducts(){
        $fullArray=[];
        $baseArray = ['Computer', 'Large_technicals', 'Mobiles', 'Televisions'];
        foreach ($baseArray as $cat){
				$temp = 'App\ModelsDB\\' .$cat;
            $class = new $temp();
				$category = $class::paginate(self::NUMBER_PAGINATION); 
				dd($category);
        }
       dd($fullArray);

    }
}
