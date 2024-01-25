<?php

namespace Domain\Expert\Models;

use Support\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use Domain\Expert\QueryBuilders\ExpertQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expert extends Model
{
    use HasFactory, ScopeActive;

    protected $fillable = [
        'name',
        'family',
        'patronymic',
        'thumbnail',
        'position',
        'status',
        'sort',
    ];

    public function newEloquentBuilder($query): ExpertQueryBuilder 
    {
         return new ExpertQueryBuilder($query);
    }
}