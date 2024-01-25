
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Family -->
        <div>
            <x-input-label for="family" :value="'Фамилия'" :required='true' />
            <x-text-input id="family" class="block mt-1 w-full" type="text" name="family" :value="old('family')" required autofocus autocomplete="family" />
            <x-input-error :messages="$errors->get('family')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="'Имя'" :required='true'  />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Patronymic -->
        <div>
            <x-input-label for="patronymic" :value="'Отчество'" :required='true'  />
            <x-text-input id="patronymic" class="block mt-1 w-full" type="text" name="patronymic" :value="old('patronymic')" autofocus autocomplete="patronymic" />
            <x-input-error :messages="$errors->get('patronymic')" class="mt-2" />
        </div>

        <!-- Birthday -->
        <div>
            <x-input-label for="birthday" :value="'Дата рождения'" :required='true'  />
            <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')" required autofocus autocomplete="birthday" />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="'Номер телефона'" :required='true'  />
            <x-text-input id="phone" class="phone-number block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="'Email'" :required='true'  />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- social_link -->
        <div class="mt-4"> 
            <x-input-label for="social_link" :value="'Ссылка на социальную сеть'" :required='true'  />
            <x-text-input id="social_link" class="block mt-1 w-full" type="text" name="social_link" :value="old('social_link')" required autocomplete="social_link" />
            <x-input-error :messages="$errors->get('social_link')" class="mt-2" />
        </div>


        <!-- Branch -->
        <div class="mt-4">
            <x-input-label for="branch_id" :value="'Род занятий'" :required='true'  />
            <x-branches-select id="branch_id" name="branch_id" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('branch')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Пароль'" :required='true'  />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="'Повторите пароль'" :required='true'  />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Agree -->
        <div class="mt-4 flex gap-2">
            
            <input id="agree" class="mt-1"
                            type="checkbox"
                            name="agree" required/>
            <x-input-label for="agree" >
                Согласен с <a class="text-header" href="{{ route('personal.index') }}">условиями</a> обработки персональных данных
            </x-input-label>
            <x-input-error :messages="$errors->get('agree')" class="mt-2" />
        </div>

        <div class="flex flex-col items-center justify-end mt-4">
            <x-primary-button class="mb-4">
                Зарегистрироваться
            </x-primary-button>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                Уже зарегистрирован?
            </a>
        </div>
    </form> 
</x-guest-layout>
