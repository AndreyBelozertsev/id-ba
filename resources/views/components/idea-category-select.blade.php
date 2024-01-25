@props([
    'idea_category_id' => null,
])

<x-select {{ $attributes }} >
    <option value="">-</option>
    @foreach ($idea_categories as $category)
        <option @if( $idea_category_id == $category->id ) selected="selected" @endif value="{{ $category->id }}">{{ $category->title }}</option>
    @endforeach
</x-select>

