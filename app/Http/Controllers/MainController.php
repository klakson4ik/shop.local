<?php

namespace App\Http\Controllers;

use App\ModelsDB\Mobile;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $telephone = Mobile::all();
        return view('pages.main.index',[
            'products' => $telephone
            ]);
    }
}
