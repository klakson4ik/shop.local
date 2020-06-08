<?php


namespace App\Http\Models\Currency;


use App\ModelsDB\Currency;

class CurrencyAdd
{
    public static function addCategories($array){
        dump($array);
        foreach ($array as $value){
            Currency::firstOrCreate([
                'numCode' => $value->NumCode,
                'charCode' => $value->CharCode,
                'name' => $value->Name,
                'value' => $value->Value,
                'previous'  => $value->Previous
            ]);
        }

    }
}
