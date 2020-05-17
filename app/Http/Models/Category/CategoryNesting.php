<?php


namespace App\Http\Models\Category;


use App\ModelsDB\Category;
use Illuminate\Support\Facades\DB;

class CategoryNesting
{
    public static function getTree()
    {
        $tree = [];
        $data = Category::all()->toArray();
        foreach ($data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $data[$node['parent_id'] - 1]['childs'][$id] = &$node;
        }
        return $tree;
    }
}
