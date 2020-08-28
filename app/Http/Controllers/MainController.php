<?php

namespace App\Http\Controllers;

use App\Http\Models\Products\Products;
use Illuminate\Http\Request;
use App\Http\Models\Vendor\Pagination;
use App\Http\Models\Filter\Filter;

class MainController extends Controller
{
    public function index(Request $request){
		 $page = $request->get('page');
       $arrayProducts = Products :: getArrayProducts();
		 $paginationClass = new Pagination($arrayProducts, $page, 10);
		 $sliceProducts = $paginationClass->getSliceArray();
		 $pagination = $paginationClass->getPaginationData();
		 $filterClass = new Filter($arrayProducts);
		 $filters = $filterClass->getFilters(); 
		 return response()->view('pages.main.index',[
					'products' => $sliceProducts,
					'pagination' => $pagination,
					'filters' => $filters
           ]);
    }
}
