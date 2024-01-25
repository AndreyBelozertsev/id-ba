<?php

namespace App\View\Components;

use Closure;
use Domain\User\Models\Branch;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class BranchesSelect extends Component
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
        return view('components.branches-select', ['branches' => $this->getData() ]);
    }

    protected function getData() : Collection
    {
        return Branch::all();
    }
}
