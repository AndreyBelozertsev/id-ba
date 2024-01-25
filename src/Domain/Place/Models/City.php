<?php

namespace Domain\Place\Models;

use Domain\Idea\Models\Idea;
use Illuminate\Database\Eloquent\Model;
use Domain\Place\QueryBuilders\CityQueryBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */

    protected $fillable = [
        'title',
        'sort',
    ];

    public function ideas(): BelongsToMany
    {
        return $this->belongsToMany(Idea::class);
    }

    public function child()
    {
        return $this->hasMany(self::class);
    }

    public function newEloquentBuilder($query): CityQueryBuilder 
    {
         return new CityQueryBuilder($query);
    }
}
