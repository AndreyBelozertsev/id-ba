<?php

namespace App\View\Components;

use Closure;
use Domain\News\Models\Post;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class PostsList extends Component
{

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posts-list', ['posts' => $this->getData()]);
    }

    protected function getData() :Collection
    {
        return Post::activeItems()->latest()->limit(3)->get();;
    }

}
