<x-app-layout>
    <section class="bg-no-repeat bg-cover bg-[52%] sm:bg-[50%] xl:bg-center" style="background-image:url(/images/section-1/bg.jpg)">
      <div class="container">
        <div class="grid grid-cols-12 py-8 md:py-16">
          <div class="col-span-11 sm:col-span-8 lg:col-span-6 text-white">
            <h1 class="text-2xl md:text-[42px]/[42px] font-nunito-700 mb-3 md:mb-5">
              Все начинается с идеи!
            </h1>
            <p class="text-sm sm:text-base max-w-[220px] sm:max-w-full mb-10 md:mb-28">
              Опишите Вашу идею максимально подробно и получите возможность ее реализовать!
            </p>
            <a class="font-nunito-700 py-2 px-8 bg-btn rounded-md text-center max-w-[170px]" href="{{ route('about.index') }}">Подробности</a>
          </div>
        </div>
      </div>
    </section>
    <section class="mt-5">
      <x-add-show-idea-section />
    </section>
    @if($slides->isNotEmpty())
    <section class="mt-12 xl:mt-36">
      <div class="container font-nunito-400">
        <div class="swiper swiper1">
          <div class="swiper-wrapper">
            @foreach ($slides as $slide)
              <div class="grid-cols-2 gap-4 swiper-slide">
                <div class="flex justify-center rounded-2xl col-span-2 lg:col-span-1">
                  <img data-src="{{ Storage::disk('public')->url($slide->thumbnail) }}" src="{{ asset('images/1x1.png') }}" alt="president">
                </div>
                <div class="col-span-2 lg:col-span-1 pt-12 relative">
                    <blockquote>
                        <p class="italic text-lg mb-5">{{ $slide->content }}</p>
                        <cite class="font-nunito-700 not-italic text-base">{{ $slide->name }}</cite>
                        <p class="text-base">{{ $slide->position }}</p>
                    </blockquote>
                    <div class="absolute right-[14%] sm:right-[10%] bottom-[100%] lg:right-14 lg:bottom-10">
                      <div class="bg-btn-sec-22 text-[30px]/[18px] rounded text-white w-10 h-10 swiper-button-prev left-[-50px]">
                        <
                      </div>
                      <div class="bg-btn-sec-21 text-[30px]/[18px] rounded text-white w-10 h-10 swiper-button-next left-1">
                        >
                      </div>
                    </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    @endif
    @if($idea_categories->isNotEmpty())
      <section class="mt-12 xl:mt-36 font-nunito-700 text-default-text">
        <div class="container">
          <h2 class="uppercase text-2xl md:text-[42px]/[42px] mb-5 font-nunito-400">НАШИ 
            <span class="font-nunito-700 text-btn-sec-22">НАПРАВЛЕНИЯ</span>:</h2>
        </div>
        <div class="p-10" style="background-image:linear-gradient(180deg, rgba(221,217,249,1) 0%, rgba(201,240,204,1) 100%)">
          <div class="container">
            <div class="grid grid-cols-12 gap-3 xl:gap-6 text-white uppercase text-base text-center">
              @foreach($idea_categories as $category)
                <a class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-3 rounded-2xl bg-no-repeat bg-center bg-cover pt-4 pb-5 flex flex-col items-center"
                  href="{{ route('idea.index',['category' => $category->id]) }}"
                  style="background-image:url({{ asset('images/section-4/idea-bg.jpg') }})"
                  >
                    <div class="max-w-[100px]">
                      <img class="mb-4 w-full" data-src="{{ Storage::disk('public')->url($category->thumbnail) }}" src="{{ asset('images/1x1.png') }}" alt="{{ $category->title }}">
                      </div>  
                    <h4>{{ $category->title }}</h4>
                </a>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    @endif
    @if( $idea_categories->isNotEmpty() )
      <section class="mt-10">
        <div class="container font-nunito-400">
          <div thumbsSlider="" class="swiper mySwiper text-xl">
            <div class="swiper-wrapper">
              @foreach($idea_categories as $category)
                <div class="swiper-slide">
                  {{ $category->title }}
                </div>
              @endforeach
            </div>
          </div>
          <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
              @foreach($idea_categories as $category)
                <div class="swiper-slide grid grid-cols-12 gap-[30px]">
                  <div class="col-start-2 col-end-12 lg:col-span-5 xl:col-span-4 rounded-2xl bg-no-repeat bg-cover bg-center p-14 flex flex-col items-center text-center"
                    style="background-image:url({{ asset('images/section-4/idea-bg.jpg') }})">
                      <div class="max-w-[150px]">
                        <img class="mb-10 w-full" data-src="{{ Storage::disk('public')->url($category->thumbnail) }}" src="{{ asset('images/1x1.png') }}" alt="{{ $category->title }}">
                      </div>
                      <h4 class="text-white uppercase text-lg md:text-2xl font-nunito-700">{{ $category->title }}</h4>
                  </div>
                  <div class="col-span-12 lg:col-span-7 xl:col-span-8 lg:pl-4">
                    <p class="text-sm lg:text-xl pb-10 pr-2 lg:pb-14 xl:pb-0">
                      {{ $category->content }}
                    </p>
                    <a class="font-nunito-700 py-2 px-8 bg-btn rounded-md text-center min-w-[170px] text-white absolute right-0 bottom-0"
                        href="{{ route('idea.create',['category_id' => $category->id]) }}">
                        Предложить идею
                    </a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    @endif
    @if( $experts->isNotEmpty() )
      <section class="mt-12 xl:mt-36 py-10" style="background-image: linear-gradient(180deg, rgba(221,217,249,1) 0%, rgba(201,240,204,1) 100%)">
        <div class="container text-default-text">
          <h2 class="uppercase text-2xl md:text-[42px]/[42px] mb-10 font-nunito-400">НАШИ <span
              class="font-nunito-700 text-btn-sec-21">ЭКСПЕРТЫ</span>:</h2>
          </h2>
          <div class="relative">
            <div class="absolute right-0 top-[-70px]">
              <div class="bg-btn-sec-22 text-[24px]/[24px] flex items-center rounded text-white swiper3-button-prev w-10 h-10 top-6 right-12 left-auto">
                <
              </div>
              <div class="bg-btn-sec-21 text-[24px]/[24px] flex items-center rounded text-white w-10 h-10 swiper3-button-next top-6 right-0">
                >
              </div>
            </div>
          </div>
          <div class="swiper swiper3 pt-20">
            <div class="swiper-wrapper">
              @foreach ($experts as $expert)
                <div class="swiper-slide">
                  <div class="bg-white rounded-3xl inner">
                    <img class="rounded-3xl w-full" data-src="{{ Storage::disk('public')->url($expert->thumbnail) }}" src="{{ asset('images/1x1.png') }}" alt="person">
                    <div class="text-lg p-[18px]">
                      <h6 class="font-nunito-700">{{ $expert->family . ' ' . $expert->name . ' ' . $expert->patronymic }}</h6>
                      <p>{{ $expert->position }}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    @endif
    <section class="mt-12 xl:mt-36">
      <x-posts-list />
    </section>
    <section class="mt-5">
      <x-add-show-idea-section />
    </section>
</x-app-layout>
