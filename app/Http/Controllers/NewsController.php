<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $body['title'] = 'Trang chủ';

        return view('frontend.pages.home')->with(compact('body'));
    }
    function single_post($slug = '')
    {
        $category_arr = DB::table('news')
            ->select('categories.category_name')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->where('news.slug', $slug)
            ->first();
        $news = DB::table('news')->where('slug', $slug)->first();
        $body['title'] = $news->title;
        $data = ['slug' => $slug, 'news' => $news, 'category_arr' => $category_arr, 'body' => $body];
        return view('frontend.pages.single-post', $data);
    }


    public function single_category($slug = '')
    {

        $category_arr = DB::table('categories')->where('slug', $slug)->first();

        if (!$category_arr) {
            abort(404, 'Category not found');
        }

        $list_news = DB::table('news')->where('category_id', $category_arr->id)->get();

        $body['title'] = $category_arr->category_name;
        $data = [
            'slug' => $slug,
            'list_news' => $list_news,
            'category_arr' => $category_arr,
            'body' => $body,
        ];

        return view('frontend.pages.single-category', $data);
    }

    // function single_category($category_id = 0){
    //     $body['title'] = 'Tin tức';

    //     $category_arr = DB::table('categories')->where('id', $category_id)->first();
    //     $list_news = DB::table('news')->where('category_id', $category_id)->get();
    //     $data = ['category_id'=>$category_id, 'list_news'=>$list_news, 'category_arr'=>$category_arr];
    //     return view('frontend.pages.single-category', $data)->with(compact('body'));
    // }

    public function searchResults(Request $request)
    {
        $query = $request->input('query');
        $body['title'] = 'Kết quả tìm kiếm cho: ' . $query;

        $results = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.category_name')
            ->where('news.title', 'LIKE', '%' . $query . '%')
            ->orWhere('news.summary', 'LIKE', '%' . $query . '%')
            ->orWhere('news.content', 'LIKE', '%' . $query . '%')
            ->get();
        $data = ['query' => $query, 'results' => $results];
        return view('frontend.pages.search-result', compact('data', 'body'));
    }
}