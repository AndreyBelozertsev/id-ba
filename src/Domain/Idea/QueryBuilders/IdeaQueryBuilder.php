<?php
namespace Domain\Idea\QueryBuilders;


use Illuminate\Database\Eloquent\Builder;

class IdeaQueryBuilder extends Builder
{
    public function userListIdeas() :IdeaQueryBuilder
    {
        return $this->with([
            'category' => fn ($query) => $query
                ->active()
                ->select(['title','id'])
            ])
            ->select(['id','title', 'description', 'status', 'created_at', 'user_id', 'idea_category_id']);
    }

    public function activeItem($id): IdeaQueryBuilder
    {
        return $this->where('id', $id)
            ->select(['id','title', 'description', 'content', 'idea_category_id', 'social_link', 'status', 'reason_cancellation', 'status_implementation']);
    }

    public function activeItems(): IdeaQueryBuilder
    {
        return $this->where('status', 'publish')
            ->with([
                'category' => fn ($query) => $query
                    ->active()
                    ->select(['title','id','thumbnail'])
            ])
            ->with([
                'author' => fn ($query) => $query
                    ->active()
                    ->select(['id','family','name','patronymic'])
            ])
            ->with([
                'cities' => fn ($query) => $query
                    ->select(['title'])
            ])
            ->select(['id','title', 'description', 'content', 'user_id', 'idea_category_id', 'status', 'status_implementation','created_at']);
    }

    

    public function filtred(): IdeaQueryBuilder
    {
        return $this->when(request('category'), function(IdeaQueryBuilder $q){
                $q->whereRelation('category', 'id', '=', request('category'));
            })
            ->when(request('status'),function(IdeaQueryBuilder $q){
                    $q->where('status_implementation','=', request('status'));
            });
    }

}