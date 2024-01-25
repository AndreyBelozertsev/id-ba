<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Domain\Idea\Models\IdeaCategory;
use Illuminate\Database\Eloquent\Collection;

class IdeaCategorySelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.idea-category-select', ['idea_categories' => $this->getData()] );
    }

    protected function getData() : Collection
    {
        return IdeaCategory::all();
    }
}
