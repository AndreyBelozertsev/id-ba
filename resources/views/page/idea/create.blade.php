<x-app-layout>
    <section calss="py-12">
        <div class="container">
            <h1 class="mt-3 text-center text-3xl md:text-4xl xl:text-[46px]/[1.2] mb-8 pt-12">
                <span class="font-nunito-700 text-btn-sec-21"><x-idea-count /> идей</span> в Банке. <span
                class="font-nunito-700">Добавьте</span> свою:
            </h1>
        </div>
        <div class="container pt-12">
            <form class="xl:max-w-[60%] mx-auto bg-form-bg rounded-2xl py-8 px-10 grid gap-8" method="post" action="{{ route('idea.store') }}">
                @csrf
                <div class="mt-4">
                    <x-input-label for="title" :value="'Заголовок'" :required='true' />
                    <x-text-input id="title" name="title" type="text" value="{{ old('title') }}" autocomplete="title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="description" :value="'Краткое описание'" :required='true' />
                    <x-text-textarea rows="5" id="description" name="description" class="mt-1 block w-full" >
                        {{ old('description') }}
                    </x-text-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="content" :value="'Подробное описание'" :required='true' />
                    <x-text-textarea rows="5" id="content" name="content" class="mt-1 block w-full">
                        {{ old('content') }}
                    </x-text-textarea>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="idea_category_id" :value="'Категория'" :required='true' />
                    <x-idea-category-select id="idea_category_id" :idea_category_id="old('idea_category_id') ?? request()->get('category_id') ?? ''" name="idea_category_id" />
                    <x-input-error :messages="$errors->get('idea_category_id')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="social_link" :value="'Ссылка на социальную сеть проекта'" />
                    <x-text-input id="social_link" class="block mt-1 w-full" type="text" name="social_link" :value="old('social_link')" autocomplete="social_link" />
                    <x-input-error :messages="$errors->get('social_link')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="cities" :value="'География реализации'" :required='true' />
                    <x-cities-select id="cities" :city_ids="old('cities') ?? []" name="cities" />
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
                <!-- Agree -->
                <div class="mt-4 flex gap-2">
                    
                    <input id="agree" class="mt-1"
                                    type="checkbox"
                                    name="agree" required/>
                    <x-input-label for="agree" >
                        Согласен с <a class="text-header" href="{{ route('regulations.index') }}">положением</a> проекта
                    </x-input-label>
                    <x-input-error :messages="$errors->get('agree')" class="mt-2" />
                </div>
                <x-primary-button>Отправить</x-primary-button>
            </form>
        </div>
    </section>
</x-app-layout>