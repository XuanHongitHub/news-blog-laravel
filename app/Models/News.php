<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = [
        'category_id',
        'language',
        'title',
        'summary',
        'preview',
        'content',
        'user_id',
        'views',
        'tags',
        'slug',
        'news_status',
        'comment_status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
