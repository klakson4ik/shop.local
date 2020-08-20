<?php

namespace App\Http\Controllers;

use App\Http\Models\Products\Products;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request){
#				if(isset($request)
		 $page = $request->get('page');
       $data= new Products($page);
		 $sliceProducts = $data->getProducts();
		 $paginate = $data->getPaginate();
       return response()->view('pages.main.index',[
					'products' => $sliceProducts,
					'paginate' => $paginate
           ]);
    }
}
