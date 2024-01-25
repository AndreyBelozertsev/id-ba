<section class="">
    <header>
        <h2 class="text-xl font-medium text-btn-sec-21">
            Мои идеи
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Все начинается с идеи ...
        </p>
    </header>
    <div class="mt-6 space-y-6">
        <a href="{{ route('idea.create') }}" class="inline-flex items-center border border-transparent transition ease-in-out duration-150 font-nunito-700 py-2 px-8 bg-btn rounded-md text-center text-white max-w-[170px]'">
            Добавить новую идею
        </a>
    </div>


    <div class="py-10 lg:p-10 flex flex-col gap-6">
        @foreach($ideas as $idea)
            <div class=" w-full lg:max-w-full lg:flex">
                <div class="border border-gray-400 bg-white  p-4 flex flex-col justify-between leading-normal w-full rounded-md">
                    <div class="mb-8">
                        @if($idea->category)
                            <div class="flex items-center mb-2">
                                <span class="bg-purple-100 text-purple-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">
                                    {{ $idea->category->title }}
                                </span>
                            </div>
                        @endif
                        <div class="text-gray-900 font-bold text-xl mb-2">
                            @if($idea->status == 'publish')
                                <a href="{{ route('idea.show',[ 'id' => $idea->id ]) }}">{{ $idea->title }}</a>
                            @else ($idea->status == 'publish')
                                <a href="{{ route('idea.edit',[ 'id' => $idea->id ]) }}">{{ $idea->title }}</a>
                            @endif
                        </div>
                        <div class="mb-2">
                            <p class="text-gray-700 text-base">{{ $idea->description }}</p>
                        </div>
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
                        <div class="flex items-center">
                            <div class="text-sm">
                                <p class="text-gray-900 leading-none"><b>{{ $user->family }}</b> {{ $user->name . ' ' . $user->patronymic }}</p>
                                <p class="text-gray-600">{{ $idea->date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</section>