<?php

namespace App\Http\Controllers\Widgets;

use App\Http\Models\Search\SearchModel;

class SearchWidgetController
{
    public static function getListSearching()
    {
        return SearchModel::getList();
    }
}
