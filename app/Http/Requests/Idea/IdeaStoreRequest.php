<?php

namespace App\Http\Requests\Idea;

use Domain\Place\Models\City;
use Domain\Idea\Models\IdeaCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class IdeaStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string','max:500'],
            'content' => ['required', 'string', 'max:1000'],
            'social_link' => ['sometimes','nullable', 'url', 'max:255'],
            'cities'    => ['required', 'array', 'min:1'],
            'cities.*'  => ['required', 'distinct', 'numeric', 'max:' . City::max('id')],
            'idea_category_id' => ['required',  'numeric', 'max:' . IdeaCategory::max('id')],
            'status_implementation' => ['required', 'in:receive,process,completed']
        ];
    }

}
