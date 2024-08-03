<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $body = [
            'title' => 'Quản Lý Bài Viết',
        ];

        $news = News::with('category')->get();
        $categories = Category::all();

        return view('backend.news.index')->with(compact('body', 'news', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'summary' => 'required|string|max:500',
            'tags' => 'nullable|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        // Create the news entry
        News::insert([
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'preview' => $imagePath,
            'content' => $request->input('content'),
            'tags' => $request->input('tags'),
            'slug' => Str::slug($request->input('title')),
            'news_status' => $request->input('status'),
            'comment_status' => $request->input('comment_status'),
        ]);


        return redirect()->route('news.index')->with('success', 'Bài viết đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('backend.news.edit', compact('news', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'summary' => 'required|string|max:500',
            'tags' => 'nullable|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $news->preview = 'images/' . $imageName;
        }

        $news->title = $request->input('title');
        $news->category_id = $request->input('category_id');
        $news->summary = $request->input('summary');
        $news->tags = $request->input('tags');
        $news->content = $request->input('content');
        $news->news_status = $request->input('status');

        // Không thay đổi trường preview nếu không có ảnh mới
        if (!$request->hasFile('file') && empty($news->preview)) {
            $news->preview = 'default_preview_image.jpg'; // Đặt giá trị mặc định nếu cần
        }

        $news->save();

        return redirect()->back()->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index')->with('success', 'Bài viết đã được xóa thành công.');
    }

}
