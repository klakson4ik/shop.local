<?php


namespace App\Http\Models\Currency;


class CurrencyModel
{
    public static function getAllCurrency(){
        $currencyCache =  CurrencyCache::getCurrency();
        $currencyArr = [];

        foreach ($currencyCache->Valute as $curr){
            $currencyArr[] = $curr;
        }

        return $currencyArr;
    }

    public static function getChangeCurrency($dataArray)
    {
        $changeArray = [];
        $currencyCache =  CurrencyCache::getCurrency();
        foreach ($dataArray as $curr){
            foreach ($currencyCache->Valute as $value ){
                if($curr == $value->CharCode){
                    $changeArray[] = $value;
                }
            }
        }
        return $changeArray;
    }
}
