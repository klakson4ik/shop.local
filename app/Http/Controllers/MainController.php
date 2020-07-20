<?php

namespace App\Http\Controllers;

use App\Http\Models\Products\Products;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products = Products::createArrayProducts();
        $final = [];
        foreach ($products as $cat){
            foreach ($cat as $product){
                if (count($final)<10)
                    $final[] = $product;
                else
                    break;
            }
        }
        return response()->view('pages.main.index',[
            'products' => $final
            ]);
    }
}
