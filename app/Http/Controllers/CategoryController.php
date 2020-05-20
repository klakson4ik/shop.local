<?php

namespace App\Http\Controllers;

use App\Http\Models\Category\CategoryNesting;
use App\Http\Models\Category\CategoryCreate;
use App\ModelsDB\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class gtCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->view('pages.category.index', [
            'categories' => Category::get()
        ]);



    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function create()
    {

        return  response()->json([
                'category' => [],
                'delimiter' => ''
            ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = $request->post();
        if(!empty($array)){
            CategoryCreate::getNewBranch( $array );
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $categoryTree = CategoryNesting::getTree();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
