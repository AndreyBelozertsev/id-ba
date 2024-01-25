<x-app-layout>
<section class="bg-no-repeat bg-cover bg-[52%] sm:bg-[50%] xl:bg-center" style="background-image:url({{asset('images/page_2/section-1/1.jpg') }} )">
    <div class="container py-8 md:pt-16 md:pb-20 ">
        <div class="text-white">
          <h1 class="text-4xl sm:text-6xl md:text-[116px]/[1.2] font-nunito-700">
            <x-idea-count />
          </h1>
          <p class="text-xl xs:text-2xl sm:text-3xl md:text-[66px]/[1.2] max-w-[600px] mb-10 md:mb-32">
            идей уже в Банке!
          </p>
        </div>
        <div class="text-white font-nunito-400">
          <h2 class="text-sm xs:text-lg md:text-2xl lg:text-[40px]/[1.2] mb-3 md:mb-5" id="title-ancor">Найдите важную для Вас:</h2>
          <form class="gap-2 sm:gap-0 p-2 sm:p-0 flex flex-col sm:flex-row justify-between items-center bg-form-bg rounded-md" action="#title-ancor">
            <p class="text-default-text xs:py-1 md:py-2 px-2 lg:px-10 text-sm md:text-lg lg:text-[22px]/[1.2]">Найдите
              идею:</p>
            <div
              class="flex gap-2 flex-col sm:flex-row lg:gap-4 sm:max-w-[50%] xl:max-w-[60%] w-full text-sm lg:text-lg">
              <select class="mx-auto rounded-md text-gray-500 sm:max-w-[50%] w-full xl:p-1 outline-none"
                name="category">
                <option value="" selected>Категория</option>
                @foreach($categories as $category)
                  <option @if(request('category')== $category->id ) selected @endif  value="{{ $category->id  }}">{{ $category->title  }}</option>
                @endforeach
              </select>
              <select class="mx-auto rounded-md text-gray-500 sm:max-w-[50%] w-full xl:p-1 outline-none" name="status">
                <option value="">Статус</option>
                @foreach(config('constant.status_implementation') as $key => $value)
                  <option @if(request('status')== $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>
            <button class="bg-header p-2 sm:p-5 xs:py-1 md:py-2 xs:px-5 md:px-10 rounded-md sm:rounded-l-none sm:rounded-r-md text-sm md:text-lg"
              type="submit">Искать</button>
          </form>
        </div>

      </div>
    </section>
    <section class="py-8" id="ideas-list__block">
      @include('page.idea.partials.ideas-list-template')
    </section>
    <section class="mt-10">
      <x-add-show-idea-section />
    </section>


</x-app-layout>
