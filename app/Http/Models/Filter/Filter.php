<?php

namespace App\Http\Models\Filter;

use Illuminate\Http\Request;
use App\ModelsDB\Category;
use App\Http\Models\Products\Products;

class Filter
{
	private $tableCategory;
	private $filters;
	private $categories;
	private $standartfilter;

	public function __construct(){
		$this->tableCategory = Category :: all();
		$this->categories = $this->getRootCategory();
		$this->standartFilter = $this->getStandartFilter();
	}

	private function getRootCategory(){
		$array = [];
		foreach($this->tableCategory as $category){
			if($category->parent_id == NULL){
				$array['rootsCategories'][] = $category;
			}else{
				$array['categories'][] = $category;	  
			}
		}
		return $array;
	}

	private function getStandartfilter(){
		$data = Products :: getArrayProducts();
		$brand = [];		  
		foreach($data as $product){
			if(!in_array($product['brand'], $brand){
				$brand[] = $product['brand'];
			}
		}
		dd($brand);
	}

	public function getDefualtFilter(){
		return $this->filters;
	}	  
}
