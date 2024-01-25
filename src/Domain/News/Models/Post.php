<?php

namespace Domain\News\Models;

use Support\Traits\HasSlug;
use Support\Traits\ScopeActive;
use Support\Traits\DateForHumman;
use Illuminate\Database\Eloquent\Model;
use Domain\News\QueryBuilders\PostQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, HasSlug, ScopeActive, DateForHumman;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'images',
        'content',
        'description',
        'status',
    ];

    public function newEloquentBuilder($query): PostQueryBuilder 
    {
         return new PostQueryBuilder($query);
    }
}
