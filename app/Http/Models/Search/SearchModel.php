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

    public static function getQueryArray($pattern){
        $resultArray=[];
        $baseArray = ['computers', 'large_technicals', 'mobiles', 'televisions'];
        foreach ($baseArray as $cat){
            $resultArray[$cat] = DB::select("SELECT * FROM $cat WHERE title LIKE '%$pattern%' ");
        }
        return $resultArray;
    }

}
