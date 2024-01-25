<?php
namespace Domain\Idea\QueryBuilders;


use Illuminate\Database\Eloquent\Builder;

class IdeaCategoryQueryBuilder extends Builder
{
    public function activeItems() :IdeaCategoryQueryBuilder
    {
        return $this->active()
            ->orderBy('sort', 'asc')
            ->select(['id','title', 'slug', 'content','thumbnail' ]);
    }

    public function activeItem($slug): IdeaCategoryQueryBuilder
    {
        return $this->active()
            ->where('slug', $slug)
            ->select(['title','slug','content','sort','thumbnail']);
    }
}
