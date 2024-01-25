<x-app-layout>
    <section class=" text-default-text py-8 md:py-16">
        <div class="container">
            <div class="pb-8 font-nunito-700">
                <h1 class="uppercase text-2xl md:text-[42px]/[42px] mb-5 font-nunito-400">{{ $post->title }}</h1>
            </div>
            <div class="content pb-4">
                {!! $post->content !!}
            </div>
            <div class="bold text-sm text-gray-400">
                {{ $post->date }}
            </div>
        </div>
    </section>
</x-app-layout>