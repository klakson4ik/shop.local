<?php

namespace App\Providers;

use App\Http\Models\Category\CategoryNesting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->menuLoad();
    }

    public function menuLoad(){
        View::composer('partials.header', function ($view){
            $view->with('categoryNested', CategoryNesting::getTree());
        });
    }
}
