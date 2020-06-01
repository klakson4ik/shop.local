<?php


namespace App\Http\Models\Currency;


class CurrencyModel
{
    public static function getAllCurrency(){
        return CurrencyCache::getCurrency();
    }
}
