<?php

namespace App\Http\Controllers;

use App\Http\Models\Products\Products;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request){
		  $page = $request->get('page');
        $products = Products::createArrayProducts($page);
        return response()->view('pages.main.index',[
            'products' => $products,
				'paginator' => $products
            ]);
    }
}
