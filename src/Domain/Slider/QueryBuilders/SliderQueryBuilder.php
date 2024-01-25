<?php

namespace Domain\Slider\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class SliderQueryBuilder extends Builder
{

    public function activeItems(): SliderQueryBuilder
    {
        return $this->active()
            ->orderBy('sort', 'asc')
            ->select(['name','position','content','thumbnail']);
    }


}