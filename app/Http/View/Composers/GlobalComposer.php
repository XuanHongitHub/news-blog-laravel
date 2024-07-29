<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\News;
use DB;

class GlobalComposer
{
    public function compose(View $view)
    {
        $popularPosts = News::where('news_status', '1')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        $trendingPosts = News::where('news_status', '1')
            ->orderBy('views', 'asc')
            ->take(6)
            ->get();

        $latestPosts = News::latest()->take(3)->get();

        $categories_sidebar = DB::table('categories')
            ->where('status', '=', '1')
            ->orderby('ordinal', 'asc')
            ->limit(7)
            ->get();

        $categories_nav = DB::table('categories')->select('id', 'slug', 'category_name')
            ->orderby('ordinal', 'asc')
            ->where('status', '=', '1')
            ->limit(5)
            ->get();

        $techPosts = News::where('category_id', 1)
            ->latest()
            ->get();

        $techPost = $techPosts->all();


        $view->with(compact('popularPosts', 'trendingPosts', 'latestPosts', 'categories_sidebar', 'categories_nav', 'techPost', ));
    }
}
