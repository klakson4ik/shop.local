<?php


namespace App\Http\Models\Search;


class SearchModel
{
    public static function createArraySearching(){
        $fullArray=[];
        $baseArray = ['Computer', 'LargeTechnical', 'Mobile', 'Television', 'Category'];
        foreach ($baseArray as $cat){
            $temp = 'App\ModelsDB\\' . $cat;
            $class = new $temp();
            $array = $class :: all();
            $fullArray[] = $array;

//            $value = $class::where('title', $obj['title'])->first()->id;
//            $category = Category::where('title', $obj[$endKey])->first()->id;
        }
        dd($fullArray);

    }

    public static function getList()
    {
        return self::createArraySearching();

    }

}
