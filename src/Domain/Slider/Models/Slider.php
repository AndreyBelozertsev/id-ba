<?php
namespace Domain\Slider\Models;



use Support\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use Domain\Slider\QueryBuilders\SliderQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory, ScopeActive;

    protected $fillable = [
        'name',
        'position',
        'content',
        'thumbnail',
        'sort',
        'status'
    ];

    public function newEloquentBuilder($query): SliderQueryBuilder 
    {
         return new SliderQueryBuilder($query);
    }
}
