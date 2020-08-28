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
	private $arrayProducts;

	public function __construct($arrayProducts){
		$this->tableCategory = Category :: all();
		$this->categories = $this->getRootCategory();
		$this->arrayProducts = $arrayProducts;
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
		$brand = [];
		$maxMinPrice = ['min' => 0, 'max' => 0];		  
		foreach($this->arrayProducts as $product){
			if(!in_array($product->brand, $brand) && $product->brand != NULL){
				$brand[] = $product->brand;
			}
		}
		return $array;
	}
	
	public function getDefualtFilter(){
		return $this->filters;
	}	  

}
