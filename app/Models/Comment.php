<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment_content', 'news_id', 'comment_status', 'user_id', 'parent_id'];

    // Mối quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mối quan hệ với News
    public function news()
    {
        return $this->belongsTo(News::class);
    }

    // Mối quan hệ với các bình luận con
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
