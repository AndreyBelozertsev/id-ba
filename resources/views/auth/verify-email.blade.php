<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        Спасибо за регистрацию, необходимо подтвердить электронную почту!
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            На электронную почту указанную при регистрации, была отправлена ссылка для подтверждения.
        </div>
    @endif

    <div class="mt-4 flex flex-col items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    Отправить письмо
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Выйти
            </button>
        </form>
    </div>
</x-guest-layout>
