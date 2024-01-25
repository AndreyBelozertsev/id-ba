@if($posts->isNotEmpty())
    <div class="container">
        <div class="flex justify-between flex-col items-baseline sm:flex-row sm:items-center mb-6">
            <h2 class="uppercase text-2xl md:text-[42px]/[42px] font-nunito-400">НАШИ <span
                class="font-nunito-700 text-btn-sec-22">НОВОСТИ</span>:</h2>
            <a class="text-header text-lg" href="{{ route('post.index')}}">Все новости ></a>
        </div>
        <div class="grid grid-cols-12 gap-8">
            @foreach($posts as $post)
                <div class="col-span-10 md:col-span-6 2xl:col-span-4 pb-4">
                    <p class="text-sm text-gray-400 mb-3">{{ $post->date }}</p>
                    <a href="{{ route('post.show', ['slug'=> $post->slug] )}}" class="text-lg">
                        {{ $post->title }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif