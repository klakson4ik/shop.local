<?php

namespace App\Http\Controllers;

use App\Http\Models\Search\SearchModel;
use Illuminate\Http\Request;

class SearchingController extends Controller
{
    public static function getResultSearch(Request $request){
        $resultArray = SearchModel::getQueryArray($request->get('query'));
        dd($resultArray);
    }
}
