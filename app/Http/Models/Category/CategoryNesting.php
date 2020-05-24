<?php


namespace App\Http\Models\Category;


use App\ModelsDB\Category;

class CategoryNesting
{
    public static function getTree()
    {
        $tree = [];
        $data = Category::all()->toArray();
        foreach ($data as $id=>&$node) {
            if (empty($node['parent_id']))
                $tree[$id] = &$node;
            else
                $data[$node['parent_id'] - 1]['children'][$id] = &$node;
        }
        return $tree;
    }
}
