<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ env('APP_NAME') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" class="xl:max-w-[60%] mx-auto bg-form-bg rounded-2xl py-8 px-10 grid gap-8" action="{{ route('idea.update',['id' => $idea->id]) }}">
                        @csrf
                        @method('put')
                        <div class="mb-1 text-end">
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
                        @if($idea->status == 'canceled' && $idea->reason_cancellation)
                            <p class="text-btn-sec-21 text-base text-red-500">Причина отказа:
                                <span class="text-red-500">{{ $idea->reason_cancellation }}</span>
                            </p>
                        @endif
                        <div class="mt-2">
                            <x-input-label for="title" :value="'Заголовок'" :required='true' />
                            <x-text-input id="title" name="title" type="text" value="{{ old('title') ?? $idea->title ?? '' }}" autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="description" :value="'Краткое описание'" :required='true' />
                            <x-text-textarea rows="5" id="description" name="description" class="mt-1 block w-full" >
                                {{ old('description') ?? $idea->description ?? '' }}
                            </x-text-textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="content" :value="'Подробное описание'" :required='true' />
                            <x-text-textarea rows="5" id="content" name="content" class="mt-1 block w-full">
                                {{ old('content') ?? $idea->content ?? '' }}
                            </x-text-textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="idea_category_id" :value="'Категория'" :required='true' />
                            <x-idea-category-select id="idea_category_id" :idea_category_id="old('idea_category_id') ?? $idea->idea_category_id ?? request()->get('category_id') ?? ''" name="idea_category_id" />
                            <x-input-error :messages="$errors->get('idea_category_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="social_link" :value="'Ссылка на социальную сеть проекта'" />
                            <x-text-input id="social_link" class="block mt-1 w-full" type="text" name="social_link" :value="old('social_link') ?? $idea->social_link ?? request()->get('social_link') ?? ''" autocomplete="social_link" />
                            <x-input-error :messages="$errors->get('social_link')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="cities" :value="'География реализации'" :required='true' />
                            <x-cities-select id="cities" :city_ids="old('cities') ?? $idea->cities?->pluck('id')->toArray() ?? []" name="cities" />
                            <x-input-error :messages="$errors->get('cities')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="status_implementation" :value="'Статус реализации'" :required='true' />
                            <x-select name="status_implementation">
                                <option @if( old('status_implementation') == 'receive' ) selected="selected" @endif value="receive">Проект принят</option>
                                <option @if( old('status_implementation') == 'process' ) selected="process" @endif value="process">В процессе реализации</option>
                            </x-select>
                            <x-input-error :messages="$errors->get('status_implementation')" class="mt-2" />
                        </div>
                        <x-primary-button>Отправить</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>