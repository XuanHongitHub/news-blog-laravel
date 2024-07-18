<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use DB;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories_nav = DB::table('categories')->select('id', 'slug', 'category_name')
            ->orderby('ordinal', 'asc')
            ->where('status', '=', '1')
            ->limit(5)
            ->get();

        $view->with('categories_nav', $categories_nav);
    }
}
