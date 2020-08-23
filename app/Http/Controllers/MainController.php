<?php

namespace App\Http\Controllers;

use App\Http\Models\Products\Products;
use Illuminate\Http\Request;
use App\Http\Models\Vendor\Pagination;

class MainController extends Controller
{
    public function index(Request $request){
#				if(isset($request)
		 $page = $request->get('page');
       $arrayProducts = Products :: getArrayProducts();
		 $paginationClass = new Pagination($arrayProducts, $page, 5);
		 $sliceProducts = $paginationClass->getSliceArray();
		 $pagination = $paginationClass->getPaginationData();
		 
		 return response()->view('pages.main.index',[
					'products' => $sliceProducts,
					'pagination' => $pagination
           ]);
    }
}
