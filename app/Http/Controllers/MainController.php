<?php

namespace App\Http\Controllers;

use App\Http\Models\Products\Products;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request){
#				if(isset($request)
		 $page = $request->get('page');
       $products = new Products($page);
		 $sliceProducts = $products->getProducts();
		 $paginate = $products->getPaginate();
       return response()->view('pages.main.index',[
					'products' => $sliceProducts,
					'paginate' => $paginate
           ]);
    }
}
