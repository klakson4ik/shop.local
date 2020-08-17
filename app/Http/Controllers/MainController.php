<?php

namespace App\Http\Controllers;

use App\Http\Models\Products\Products;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request){
		 $page=array_key_exists($request->get('page')) ? $request->get('page') : 0;
       $products = Products::createArrayProducts($page);
       return response()->view('pages.main.index',[
           'products' => $products,
           ]);
    }
}
