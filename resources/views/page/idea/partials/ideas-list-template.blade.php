@if($ideas->isNotEmpty())
<div class="pb-8">
    <div class="container">
    <h2 class="uppercase text-3xl text-center font-nunito-400 mb-8">
        САМЫЕ <span class="font-nunito-700">СВЕЖИЕ <span class="text-btn-sec-21">ИДЕИ</span></span>
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8 text-white">
        @foreach ($ideas as $idea)
            @php
                $img = ($loop->iteration % 2) ? '1.jpg' : '2.jpg';
            @endphp
            <div class="bg-no-repeat bg-cover bg-center p-3 rounded-md" style='background-image:url({{ asset("images/page_2/section-2/$img") }} )'>
                <div class="flex justify-between items-start mb-3">
                    <div class="flex gap-1 items-center">
                        <img class="w-6 h-6" src="{{ Storage::disk('public')->url( $idea->category->thumbnail) }}" alt="{{ $idea->category->title  }}">
                        <h6 class="uppercase text-[11px]/[11px]">
                            {{ $idea->category->title  }}
                        </h6>
                    </div>
                    <div class="text-[11px]/[11px] text-right">                        
                        <p>{{ $idea->date }}</p>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center">
                        <p class="font-nunito-700 text-[11px]/[11px]">{{ $idea->author->family . " " . $idea->author->name . " " . $idea->author->patronymic }}</p>
                    </div>
                    <p class="text-[15px]/[15px]">{{ $idea->title }}</p>
                    <div class="flex flex-col items-end gap-1">
                        @foreach ($idea->cities as $city)
                            @if($loop->iteration > 2)
                                <span class="bg-purple-100 text-purple-800 text-[.75rem] font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">...</span>
                                @break    
                            @endif
                            <span class="bg-purple-100 text-purple-800 text-[.6rem] font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">{{ $city->title }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="ideas-list__paginate">   
            {{ $ideas->onEachSide(2)->withQueryString()->fragment('ideas-list')->links() }}
        </div>
    </div>
</div>

<div class="pt-16 pb-8 swipe-4 relative" style="background-image:linear-gradient(180deg, rgba(221,217,249,1) 0%, rgba(201,240,204,1) 100%)">
    <div class="container">
        <div class="swiper-button-prev bg-p2_sec-2 rounded-lg w-[60px] h-[60px] flex justify-center items-center text-white bottom-14 top-auto swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-6333db9876db7e5b" aria-disabled="true">
        </div>
        <div class="swiper-button-next bg-p2_sec-2 rounded-lg w-[60px] h-[60px] flex justify-center items-center text-white bottom-14 top-auto" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-6333db9876db7e5b" aria-disabled="false">
        </div>
    </div>
    <div class="container">
        <div class="swiper swiper4">
            <div class="swiper-wrapper text-default-text">
                @foreach ($ideas as $idea)
                    <div class="swiper-slide">
                        <div class="lg:grid grid-cols-12 gap-8 p-5 xs:p-10 2xl:py-9 lg:pr-9 xl:pl-6 rounded-2xl bg-white">
                            <div class="col-span-12 mb-5 2xl:mb-0">
                                <h2 class="uppercase text-2xl sm:text-3xl md:text-[42px]/[1.2] mb-5 sm:mb-8 font-nunito-400">Описание <span
                                    class="font-nunito-700 text-btn-sec-21">идеи</span>:</h2>
                                </h2>
                                <p class="text-lg xs:text-2xl sm:text-[32px]/[1.2] font-nunito-700 mb-5 md:mb-6">
                                   {{ $idea->title }}
                                </p>
                                <div class="mb-5 sm:mb-6">
                                    <p class="text-xl sm:text-[26px]/[1.2] uppercase font-nunito-700 text-btn-sec-21 mb-1 xs:mb-3">АВТОР ИДЕИ:</p>
                                    <p class="font-nunito-700 text-base sm:text-xl xs:mb-1">{{ $idea->author->family . " " . $idea->author->name . " " . $idea->author->patronymic }}</p>
                                    @foreach($idea->cities as $city)
                                        <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $city->title }}</span>
                                    @endforeach
                                </div>
                                <div class="mb-5 lgmb-8">
                                    <p class="text-xl sm:text-[26px]/[1.2] uppercase font-nunito-700 text-btn-sec-21 mb-1 xs:mb-3">СУТЬ ИДЕИ:</p>
                                    <p class="text-sm xs:text-base sm:text-xl mb-3">
                                    {{ $idea->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
 
@else
    <div class="py-8" id="ideas-list">
        <div class="container">
            <div class=" justify-center">
                <p class="text-default-text pb-8 text-sm md:text-lg lg:text-[22px]/[1.2]">К сожалению, по запросу ни чего не найдено</p>
                <a class="font-nunito-700 py-2 px-8 bg-btn rounded-md text-center min-w-[170px] text-white" href="{{ route('idea.create') }}">
                Предложить идею
                </a>
            </div>
        </div>
    </div>
@endif