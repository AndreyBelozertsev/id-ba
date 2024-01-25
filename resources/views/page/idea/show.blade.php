<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="xl:max-w-[60%] mx-auto bg-form-bg rounded-2xl py-8 px-10 grid gap-4">
                        <div class="mt-4">
                            <span class="block text-btn-sec-21 font-nunito-700 text-xl md:text-2xl mb-1">{{ $idea->title }}</span>  
                            <div class="mb-2">
                                @if($idea->status == 'moderation')
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        {{ config('constant.status.moderation') }}
                                    </span>
                                @elseif ($idea->status == 'publish')
                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        {{ config('constant.status.publish') }}
                                    </span>
                                @elseif ($idea->status == 'canceled')
                                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                        {{ config('constant.status.canceled') }}
                                    </span>
                                @endif  
                            </div>   
                        </div>
                        <div class="mt-4">
                            <p class="text-btn-sec-21 text-base mb-1">Краткое описание:
                                <span class="font-nunito-700"></span>
                            </p>
                            <x-text-textarea rows="5" disabled class="mt-1 block w-full" >
                                {{ $idea->description }}
                            </x-text-textarea>
                        </div>
                        <div class="mt-4">
                            <p class="text-btn-sec-21 text-base mb-1">Подробное описание:
                                <span class="font-nunito-700"></span>
                            </p>
                            <x-text-textarea rows="5" disabled class="mt-1 block w-full" >
                                {{ $idea->content }}
                            </x-text-textarea>
                        </div>
                        <div class="mt-4">
                            <p class="text-btn-sec-21 text-base mb-1">Категория:
                                <span class="font-nunito-700"></span>
                            </p>
                            <x-idea-category-select :idea_category_id="$idea->idea_category_id" disabled />
                        </div>
                        @if($idea->social_link)
                            <div class="mt-4">
                                <p class="text-btn-sec-21 text-base mb-1">Ссылка на социальную сеть проекта:
                                    <span class="font-nunito-700">{{ $idea->social_link }}</span>
                                </p>
                            </div>
                        @endif
                        <div class="mt-2">
                            @foreach($idea->cities as $city)
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                    {{ $city->title }}
                                </span>
                            @endforeach
                        </div>
                        <form method="post" action="{{ route('idea.status-implementation.update',['id' => $idea->id]) }}" class="mt-4">
                            @csrf
                            @method('put')
                            <p class="text-btn-sec-21 text-base mb-2">Статус реализации:
                                <span class="font-nunito-700"></span>
                            </p>
                            <div class="grid gap-8 grid-cols-2">
                                <div>
                                    <x-select name="status_implementation">
                                        <option @if( $idea->status_implementation == 'receive' ) selected="selected" @endif value="receive">Проект принят</option>
                                        <option @if( $idea->status_implementation == 'process' ) selected="selected" @endif value="process">В процессе реализации</option>
                                        <option @if( $idea->status_implementation == 'completed' ) selected="selected" @endif value="completed">Реализован</option>
                                    </x-select>
                                    <x-input-error :messages="$errors->get('status_implementation')" class="mt-2" />
                                </div>
                                <button type="submit" class=" py-2 px-4 rounded-md bg-p2_sec-2 text-base text-white">
                                    Обновить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>