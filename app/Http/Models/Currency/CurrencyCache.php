<?php


namespace App\Http\Models\Currency;


use App\ModelsDB\Currency;

class CurrencyCache
{
    public static function setCacheCurrency(){
        $json_daily_file = 'storage/framework/cache/daily.json';
        if (!is_file($json_daily_file) || filemtime($json_daily_file) < time() - 60) {
            if ($json_daily = file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js')) {
                file_put_contents($json_daily_file, $json_daily);
            }
        }

    }

    public static function updateDB(){
        $json = json_decode(file_get_contents('storage/framework/cache/daily.json'));
        $curr = Currency::all();
        foreach ($curr as $value)
        {
            $charCode = $value->charCode;
            $body = [
                'numCode' => $json->Valute->$charCode->NumCode,
                'name' => $json->Valute->$charCode->Name,
                'value' => $json->Valute->$charCode->Value,
                'previous' => $json->Valute->$charCode->Previous,
            ];
            $value->update($body);
        }
    }

    public static function getCurrency()
    {
        dd(file_get_contents('storage/framework/cache/daily.json'));
//        $arr = file_get_contents('storage/framework/cache/data/daily.json');
//        return $arr;
    }
}
