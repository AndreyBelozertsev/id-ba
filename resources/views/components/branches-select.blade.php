@props(['id' => null])

<x-select name="branch_id">
    <option>-</option>
    @foreach ($branches as $branch)
            <option @if( old($attributes['name'] ? $attributes['name'] : '') == $branch->id || $id == $branch->id ) selected="selected" @endif value="{{ $branch->id }}">{{ $branch->title }}</option>
    @endforeach
</x-select>