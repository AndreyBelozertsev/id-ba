<x-app-layout>
    <section class="py-8 md:py-16">
        <div class="container">
            <div class="pb-8 font-nunito-700">
                <h1 class="uppercase text-2xl md:text-[42px]/[42px] mb-5 font-nunito-400">{{ $page->title }}</h1>
            </div>
            <div class="content">{!! $page->content !!}</div>
        </div>
    </section>
</x-app-layout>