<?php
namespace Domain\Expert\QueryBuilders;


use Illuminate\Database\Eloquent\Builder;

class ExpertQueryBuilder extends Builder
{
    public function activeItems() :ExpertQueryBuilder
    {
        return $this->active()
        ->select(['name', 'family', 'patronymic', 'thumbnail', 'position','sort']);
    }
}

