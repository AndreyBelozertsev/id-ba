@props(
    [
        'city_ids' => []
    ]
)
<ul>
    @foreach ($cities as $city)
        <li class="pb-2">
            +<label>
                <input @if(in_array($city->id, $city_ids)) checked="checked" @endif type="checkbox" name="{{ $attributes['name'] }}[]" value="{{ $city->id  }}" />
                {{ $city->title }}
            </label>
        
            @if ($city->child->isNotEmpty())
                <ul class="pl-8">
                    @foreach($city->child as $child)
                        <li>
                            <label>
                                <input @if(in_array($child->id, $city_ids)) checked="checked" @endif type="checkbox" name="{{ $attributes['name'] }}[]" value="{{ $child->id }}" />
                                {{ $child->title }}
                            </label>
                        </li>
                    @endforeach
                </ul>    
            @endif
        </li>
    @endforeach
</ul>
