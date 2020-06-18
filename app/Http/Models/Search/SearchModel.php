<?php


namespace App\Http\Models\Search;


use Illuminate\Support\Facades\DB;

class SearchModel
{
    public static function createArraySearching(){
        $fullArray=[];
        $baseArray = ['computers', 'large_technicals', 'mobiles', 'televisions'];
        foreach ($baseArray as $cat){
            $fullArray[$cat] = DB::select("SELECT title,alias FROM $cat");
        }
        return $fullArray;

    }


    public static function getList()
    {
        return self::createArraySearching();

    }

}
