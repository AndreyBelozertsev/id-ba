<?php

namespace App\View\Components;

use Closure;
use Domain\Place\Models\City;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class CitiesSelect extends Component
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
        return view('components.cities-select',['cities' => $this->getData() ]);
    }

    protected function getData() : Collection
    {
        return City::where('city_id',null)->with('child')->get();
    }

}
