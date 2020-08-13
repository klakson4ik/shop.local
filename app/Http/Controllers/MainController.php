<?php

namespace App\Http\Controllers;

use App\Http\Models\Products\Products;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products = Products::createArrayProducts();
        return response()->view('pages.main.index',[
            'products' => $products
            ]);
    }
}
