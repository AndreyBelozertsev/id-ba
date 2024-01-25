<?php
namespace Domain\User\QueryBuilders;


use Illuminate\Database\Eloquent\Builder;

class UserQueryBuilder extends Builder
{
    public function activeIdeas() :UserQueryBuilder
    {
        return $this->with([
            'ideas' => fn ($query) => $query
                ->select(['title', 'slug', 'status', 'thumbnail', 'created_at'])
        ]);
    }
}