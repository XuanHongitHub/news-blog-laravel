<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $body = [
            'title' => 'Trang chủ',
        ];

        $comments = Comment::all();

        return view('backend.comments.index')->with(compact('body', 'comments'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('backend.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'comment_status' => 'required|boolean',
        ]);

        $comment->update($request->only('comment_content', 'comment_status'));

        return redirect()->route('comments.index')->with('success', 'Cập nhật bình luận thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Xóa bình luận thành công.');
    }
}
