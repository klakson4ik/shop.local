<?php


namespace App\Http\Models\Currency;


class CurrencyCache
{
    public static function getCurrency(){
        $json_daily_file = 'storage/framework/cache/data/daily.json';
        if (!is_file($json_daily_file) || filemtime($json_daily_file) < time() - 3600) {
            if ($json_daily = file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js')) {
                file_put_contents('storage/framework/cache/data/daily.json', $json_daily);
            }
        }

        return json_decode(file_get_contents($json_daily_file));

    }
}
