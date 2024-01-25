<div class="container font-nunito-400">
    <div class="grid xl:grid-cols-2 gap-5 text-default-text">
        <div class="bg-block-l p-5 rounded-2xl relative overflow-hidden">
            <h3 class="text-2xl mb-3">
                Посмотреть <span class="font-nunito-700">идеи</span>
            </h3>
            <p class="text-lg max-w-[290px] mb-14">
                Здесь Вы можете посмотреть идеи других участников проекта
            </p>
            <a class="items-center bg-btn-sec-21 text-center text-base rounded text-white p-3 inline-block" 
                href="{{ route('idea.index') }}"
            >
                Посмотреть
            </a>
            <img class="absolute h-[60%] -right-10 md:right-5 xl:-right-10 2xl:right-5 bottom-0 md:h-[90%]"
                src="{{ asset('images/section-2/12.png') }}" alt="people">
        </div>
        <div class="bg-block-r p-5 rounded-2xl relative overflow-hidden">
            <h3 class="text-2xl mb-3">
                Предложить <span class="font-nunito-700">идею</span>
            </h3>
            <p class="text-lg max-w-[290px] mb-14">
                Здесь Вы можете предложить свою идею
            </p>
            <a class="items-center bg-btn-sec-22 text-center text-base rounded text-white p-3 inline-block"
                href="{{ route('idea.create') }}"
            >
                Предложить
            </a>
            <img class="absolute h-[60%] -right-10 md:right-5 xl:-right-10 2xl:right-5 bottom-0 md:h-[90%]" 
                src="{{ asset('images/section-2/22.png') }}" alt="people">
        </div>
    </div>
</div>