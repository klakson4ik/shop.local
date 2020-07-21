<?php

namespace App\Http\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    public static function createArrayProducts(){
        $fullArray=[];
        $baseArray = ['computers', 'large_technicals', 'mobiles', 'televisions'];
        foreach ($baseArray as $cat){
            $fullArray[$cat] = DB::select("SELECT id,title,alias,price,quantity,description,brand FROM $cat");
        }
        return $fullArray;

    }
}
