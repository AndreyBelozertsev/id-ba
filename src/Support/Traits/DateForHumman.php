<?php

namespace Support\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;


trait DateForHumman
{

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Carbon::parse($attributes[$this->dateFrom()])->translatedFormat('d F Y г.'),
        );
    }

    protected function dateFrom():string
    {
        return 'created_at';
    }
}
