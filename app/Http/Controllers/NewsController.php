<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $body['title'] = 'Trang chủ';
        $latestPosts = News::latest()->take(3)->get();
        $mainPost = News::latest()->first();
        $subPostsFirstPart = News::latest()->skip(1)->take(3)->get();
        $subPostsSecondPart = News::latest()->skip(4)->take(3)->get();
        $trendingPosts = News::orderBy('views', 'desc')->take(6)->get();
        $latestTechPost = News::where('category_id', 1)->latest()->first();
        $data = [
            'latestPosts' => $latestPosts,
            'mainPost' => $mainPost,
            'subPostsFirstPart' => $subPostsFirstPart,
            'subPostsSecondPart' => $subPostsSecondPart,
            'trendingPosts' => $trendingPosts,
            'latestTechPost' => $latestTechPost,
            'body' => $body,
        ];
        return view('frontend.pages.home', $data);
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

        $list_news = DB::table('news')->where('category_id', $category_arr->id)->paginate(5);

        $body['title'] = $category_arr->category_name;
        $data = [
            'slug' => $slug,
            'list_news' => $list_news,
            'category_arr' => $category_arr,
            'body' => $body,
        ];

        return view('frontend.pages.single-category', $data);
    }

    public function allPosts()
    {
        $body['title'] = 'Tin Mới';

        $list_news = News::paginate(10); // Lấy 10 bài viết mỗi trang
        return view('frontend.pages.all-posts', compact('list_news', 'body'));
    }

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