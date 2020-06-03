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
}
