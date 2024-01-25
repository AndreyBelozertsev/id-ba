<?php

namespace Domain\Place\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class CityQueryBuilder extends Builder
{

    public function activeItems(): CityQueryBuilder
    {
        return $this
            ->select(['id','title','slug']);
    }


}