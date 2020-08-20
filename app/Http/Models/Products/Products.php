<?php

namespace App\Http\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
		
	const NUMBER_PAGINATION = 10;
	private $products;
	private $page;


	public function __construct($page){
		$this->products = $this->consistArrayProducts();
		$this->page = $page;
		$this->this->getParams();
	}

	private function consistArrayProducts(){
		$array = [];
 		$tableArray = ['computers', 'large_technicals', 'mobiles', 'televisions'];
  		foreach ($tableArray as $table){
   		$dataDB = DB::select("SELECT id,title,alias,price,quantity,description,brand FROM $table");
			foreach($dataDB as $product){
				$array[] = $product;
			}
		}
		return $array;
	}
		
	public function getProducts(){
		$sliceArray= array_slice($this->products, $this->page*self::NUMBER_PAGINATION, self::NUMBER_PAGINATION);
		return $sliceArray;
	}


	public function getPaginate(){
		$paginate['page'] = $this->page;
		return $paginate;
	}

   private function getParams(){
       $url = $_SERVER['REQUEST_URI'];
       $url = explode('?', $url);
       $uri = $url[0] . '?';
       if(isset($url[1]) && $url[1] != ''){
           $params = explode('&', $url[1]);
           foreach($params as $param){
               if(!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
           }
       }
		 dd($uri);
       return $uri;
   }
}
