<section>
    <header>
        <h2 class="text-xl font-medium text-btn-sec-21">
            Моя информация
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Если Вы в профиле указали некорректные данные, то напишите обращение с почты <b>{{ $user->email }}</b> на почту службы поддержки.
        </p>
    </header>
    <div class="mt-6 space-y-6">
        <div>
            <p class="text-btn-sec-21 text-base mb-1">ФИО: 
                <span class="font-nunito-700">{{ $user->family .' '. $user->name .' '. $user->patronymic }}</span>
            </p>
        </div>
        <div>
            <p class="text-btn-sec-21 text-base mb-1">Дата рождения: 
                <span class="font-nunito-700">{{ $user->date }}</span>
            </p>
        </div>
        <div>
            <p class="text-btn-sec-21 text-base mb-1">email: 
                <span class="font-nunito-700">{{ $user->email }}</span>
            </p>
        </div>

        <div>
            <p class="text-btn-sec-21 text-base mb-1">Телефон: 
                <span class="font-nunito-700"> +{{ $user->phone }}</span>
            </p>
        </div>
        <div>
            <p class="text-btn-sec-21 text-base mb-1">Сфера деятельности: 
                <span class="font-nunito-700">{{ $user->branch?->title }}</Сфера>
            </p>
        </div>
    </div>
</section>
