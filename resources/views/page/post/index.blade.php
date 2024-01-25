<x-app-layout>
<!-- Container for demo purpose -->
<section class="py-8 md:py-16">
    <div class="container">
        <div class="pb-8 font-nunito-700">
            <h1 class="uppercase text-2xl md:text-[42px]/[42px] mb-5 font-nunito-400">Новости</h1>
        </div>
        <!-- Section: Design Block -->
        <div class="mb-32 text-center md:text-left">
            @forelse($posts as $post)
                @php
                    $img = asset('images/no-img.jpg');
                    if($post->thumbnail){
                        $img = Storage::disk('public')->url($post->thumbnail);
                    }
                @endphp
                <div class="grid md:grid-cols-3 mb-12 gap-0">
                    <a class="block w-full bg-cover bg-center min-h-[250px] rounded-t-2xl md:rounded-tr-none md:rounded-l-2xl" 
                        style="background-image: linear-gradient(180deg, rgba(221,217,249,.5) 0%, rgba(201,240,204,.5) 100%),
                        url({{ $img }});" 
                        href="{{ route('post.show', ['slug' => $post->slug]) }}"
                    >
                        <div class="flex bg-block-l rounded-r-lg pl-5 mt-5 font-bold text-sm items-center justify-between h-10 w-3/4">
                            {{ $post->date  }}                 
                        </div>
                    </a>
                    <div class="p-6 bg-block-r md:col-span-2 rounded-b-2xl md:rounded-bl-none md:rounded-r-2xl">
                        <a href="{{ route('post.show', ['slug' => $post->slug]) }}">
                            <h2 class="text-left text-2xl font-nunito-700 mb-2">{{ $post->title }}</h2>
                        </a>
                        <div class="text-left text-sm">
                            {!! $post->description !!}
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
            <div>
                {{ $posts->onEachSide(2)->links() }}
            </div>
        </div>
    </div>
  <!-- Section: Design Block -->
</section>
<!-- Container for demo purpose -->
</x-app-layout>