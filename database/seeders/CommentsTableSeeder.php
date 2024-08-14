<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        // Thêm bình luận mẫu
        Comment::create([
            'comment_content' => 'This is a sample comment.',
            'news_id' => 1, // ID bài viết cần phải tồn tại
            'comment_status' => 1,
            'user_id' => 1, // ID người dùng cần phải tồn tại
            'parent_id' => null,
        ]);

        // Thêm nhiều bình luận khác nếu cần
        Comment::create([
            'comment_content' => 'Another comment.',
            'news_id' => 1,
            'comment_status' => 1,
            'user_id' => 1,
            'parent_id' => null,
        ]);

        // Bạn có thể thêm nhiều bình luận mẫu khác ở đây
    }
}
