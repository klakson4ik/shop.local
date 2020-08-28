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
	private $standartfilters;
	private $arrayProducts;
	private $typeFilter;

	public function __construct($arrayProducts){
		$this->typeFilter = $this->getTypeFilter();
		$this->tableCategory = Category :: all();
		$this->categories = $this->getCategory();
		$this->arrayProducts = $arrayProducts;
		$this->standartFilters = $this->getStandartFilter();
		$this->filters = $this->consistFilters();
	}

	private function getCategory(){
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
		$brands = ['type' => $this->typeFilter[0]];
		$defaultPrice = $this->arrayProducts[0]->price;
		$minMaxPrice = ['min' => $defaultPrice, 'max' => $defaultPrice];		  
		foreach($this->arrayProducts as $product){
			if(!in_array($product->brand, $brands) && $product->brand != NULL){
				$brands[] = $product->brand;
			}

			if($product->price < $minMaxPrice['min']){
				$minMaxPrice['min'] = $product->price;		  
			}

			if($product->price > $minMaxPrice['max']){
				$minMaxPrice['max'] = $product->price;
			}	  
		}
		dd($brands);
		return ['brands' => $brands, 'minMaxPrice' => $minMaxPrice];
	}

	private function consistFilters(){
		return ['rootsCategories' => $this->categories['rootsCategories'], 'categories' => $this->categories['categories'], 'brands' => $this->standartFilters['brands'], 'minMaxPrice' => $this->standartFilters['minMaxPrice']];
	}

	private function getTypeFilter(){
		return ['checkbox', 'scroll'];
	}
	
	public function getFilters(){
		return $this->filters;
	}	  

}
