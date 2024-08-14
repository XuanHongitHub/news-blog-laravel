<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Ví dụ trong controller
    public function store(Request $request)
    {
        $request->validate([
            'news_id' => 'required|integer',
            'parent_id' => 'nullable|integer',
            'comment_content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->news_id = $request->input('news_id');
        $comment->parent_id = $request->input('parent_id');
        $comment->user_id = auth()->id();
        $comment->comment_content = $request->input('comment_content');
        $comment->comment_status = '1'; // Hoặc theo trạng thái bạn định nghĩa
        $comment->save();

        // Tải lại thông tin của bình luận và người dùng liên quan
        $comment = $comment->load('user');

        return response()->json([
            'success' => true,
            'comment' => $comment,
        ]);
    }

    public function getReplies($commentId, Request $request)
    {
        $perPage = 4;
        $page = $request->query('page', 1);

        $replies = Comment::with('user')
            ->where('parent_id', $commentId)
            ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'success' => true,
            'replies' => $replies,
        ]);
    }


    public function reply(Request $request)
    {
        $validated = $request->validate([
            'news_id' => 'required|exists:news,id',
            'comment_content' => 'required|string',
            'parent_id' => 'required|exists:comments,id',
        ]);

        $reply = Comment::create([
            'news_id' => $validated['news_id'],
            'user_id' => Auth::id(),
            'comment_content' => $validated['comment_content'],
            'parent_id' => $validated['parent_id'],
        ]);

        return response()->json([
            'success' => true,
            'comment' => $reply
        ]);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (auth()->id() === $comment->user_id || auth()->user()->is_admin) {
            $comment->replies()->delete();
            $comment->delete();

            return response()->json([
                'success' => true,
                'message' => 'Bình luận đã được xóa thành công.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Bạn không có quyền xóa bình luận này.',
            ], 403);
        }
    }
    public function destroyReply($id)
    {
        $reply = Comment::findOrFail($id);

        if (auth()->id() === $reply->user_id || auth()->user()->is_admin) {
            $reply->delete();

            return response()->json([
                'success' => true,
                'message' => 'Phản hồi đã được xóa thành công.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Bạn không có quyền xóa phản hồi này.',
            ], 403);
        }
    }

}