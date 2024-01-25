<?php
namespace Domain\News\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class PostQueryBuilder extends Builder
{

    public function activeItem($slug): PostQueryBuilder
    {
        return $this->active()
            ->where('slug', $slug)
            ->select(['id','title','slug','thumbnail','content','status','created_at']);
    }

    public function activeItems(): PostQueryBuilder
    {
        return $this->active()
            ->select(['id','title','slug','thumbnail','description','status','created_at']);
    }


}