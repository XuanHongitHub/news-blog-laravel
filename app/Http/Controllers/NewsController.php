<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Models\Comment;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $body['title'] = 'Trang chủ';

        $mainPost = News::latest()->first();
        $subPostsFirstPart = News::latest()->skip(1)->take(3)->get();
        $subPostsSecondPart = News::latest()->skip(4)->take(3)->get();

        $techPosts = News::where('category_id', 1)
            ->orderBy('created_at', 'desc')
            ->take(15)
            ->get();
        $travelPosts = News::where('category_id', 12)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        $lifePosts = News::where('category_id', 9)
            ->orderBy('created_at', 'desc')
            ->take(15)
            ->get();
        $data = [
            'mainPost' => $mainPost,
            'subPostsFirstPart' => $subPostsFirstPart,
            'subPostsSecondPart' => $subPostsSecondPart,
            'techPosts' => $techPosts,
            'travelPosts' => $travelPosts,
            'lifePosts' => $lifePosts,
            'body' => $body,
        ];
        return view('frontend.pages.home', $data);
    }
    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->with('category')
            ->firstOrFail();

        $comments = Comment::where('news_id', $news->id)
            ->whereNull('parent_id')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        $commentIds = $comments->pluck('id');
        $replies = Comment::whereIn('parent_id', $commentIds)
            ->with('user')
            ->get()
            ->groupBy('parent_id');

        $news->increment('views');
        $data = [
            'body' => ['title' => $news->title],
            'news' => $news,
            'comments' => $comments,
            'replies' => $replies,
            'category_arr' => $news->category
        ];

        return view('frontend.pages.single-post', $data);
    }

    public function single_category($slug = '')
    {
        $category_arr = DB::table('categories')->where('slug', $slug)->first();

        if (!$category_arr) {
            abort(404, 'Category not found');
        }

        $list_news = DB::table('news')
            ->where('category_id', $category_arr->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

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

        $list_news = News::orderBy('created_at', 'desc')
            ->paginate(10);

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