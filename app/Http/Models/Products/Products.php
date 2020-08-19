<?php

namespace App\Http\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\ModelsDB\Computer;

class Products extends Model
{
		
	const NUMBER_PAGINATION = 10;
	private $products = [];
	private $page;


	public function __constuct($page){
 		$tableArray = ['computers', 'large_technicals', 'mobiles', 'televisions'];
  		foreach ($tableArray as $table){
   		$dataDB = DB::select("SELECT id,title,alias,price,quantity,description,brand FROM $table");
			foreach($DataDB as $product){
				$this->products[] = $product;
			}
		$this->page = $page;
	}

		
	public function getProducts(){
		return = array_slice($this->products, $this->page*self::NUMBER_PAGINATION, self::NUMBER_PAGINATION);
	}


	public function getPaginate(){
		$paginate['page'] = $this->page;
		return $paginate;
	}
  
}
