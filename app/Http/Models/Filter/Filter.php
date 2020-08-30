<?php

namespace App\Http\Models\Filter;

use Illuminate\Http\Request;
use App\ModelsDB\Category;
use App\Http\Models\Products\Products;

class Filter
{
	const ROOTS_CATEGORIES = "Главные категории";
	const CATEGORIES = "Категории";
	const MIN_MAX_PRICE = "Цена";
	const BRANDS = "Бренд";

	private $tableCategory;
	private $filters;
	private $categories;
	private $standartfilters;
	private $arrayProducts;
	private $typesFilter;
	private $types;

	public function __construct($arrayProducts){
		$this->types = $this->getTypes();
		$this->typesFilter = $this->getTypesFilter();
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
				$array[self::ROOTS_CATEGORIES][] = $category->title;
			}else{
				$array[self::CATEGORIES][] = $category->title;	  
			}
		}
		return $array;
	}

	private function getStandartfilter(){
		$brands = [];
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
		return [self::BRANDS => $brands, self::MIN_MAX_PRICE => $minMaxPrice];
	}

	private function consistFilters(){
		return [self::ROOTS_CATEGORIES => $this->categories[self::ROOTS_CATEGORIES], self::CATEGORIES => $this->categories[self::CATEGORIES], self::BRANDS => $this->standartFilters[self::BRANDS], self::MIN_MAX_PRICE => $this->standartFilters[self::MIN_MAX_PRICE], 'typesFilter' => $this->typesFilter];
	}

	private function getTypes(){
		return ['checkbox', 'scroll'];
	}

	private function getTypesFilter(){
		return [self::ROOTS_CATEGORIES => $this->types[0], self::CATEGORIES => $this->types[0], self::BRANDS => $this->types[0], self::MIN_MAX_PRICE => $this->types[1]];

	}
	
	public function getFilters(){
		return $this->filters;
	}	  

}
