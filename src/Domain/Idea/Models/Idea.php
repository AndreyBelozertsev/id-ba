<?php
namespace Domain\Idea\Models;

use Support\Traits\HasSlug;
use Domain\User\Models\User;
use Support\Traits\UsesUuid;

use Domain\Place\Models\City;
use Support\Traits\DateForHumman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Domain\Idea\QueryBuilders\IdeaQueryBuilder;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Idea extends Model
{
    use HasFactory, SoftDeletes, UsesUuid, DateForHumman;

    protected $fillable = [
        'title',
        'social_link',
        'description',
        'content',
        'idea_category_id',
        'status_implementation',
        'status',
        'user_id',
    ];

    public function newEloquentBuilder($query): IdeaQueryBuilder 
    {
         return new IdeaQueryBuilder($query);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(IdeaCategory::class, 'idea_category_id', 'id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class);
    }
}