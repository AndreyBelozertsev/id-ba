<?php

namespace App\View\Components;

use Closure;
use Domain\Idea\Models\Idea;
use Illuminate\Support\Number;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class IdeaCount extends Component
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
        return view('components.idea-count',['count' => $this->getData()]);
    }

    protected function getData() :string
    {
        return Number::format( Idea::activeItems()->count(), locale:'de' );
    }
}
