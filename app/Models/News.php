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
