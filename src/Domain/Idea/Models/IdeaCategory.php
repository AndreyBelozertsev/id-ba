<?php

namespace Domain\Idea\Models;

use Support\Traits\HasSlug;
use Support\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Idea\QueryBuilders\IdeaCategoryQueryBuilder;

class IdeaCategory extends Model
{
    use HasFactory, HasSlug, ScopeActive;

    protected $fillable = [
        'title',
        'thumbnail',
        'content',
    ];

    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class);
    }

    public function newEloquentBuilder($query): IdeaCategoryQueryBuilder 
    {
         return new IdeaCategoryQueryBuilder($query);
    }
}
