<nav class="navbar">
    <div class="container font-nunito-400">
        <div class="navbar__wrap border-solid border-b-2 border-default">
          <a class="logo relative w-[150px] lg:w-[200px] xl:w-[170px]" href="{{ route('home') }}">
            <x-application-logo />
            <span class="absolute text-lg hidden lg:inline">Республики Крым</span>
          </a>
          <div class="hamb">
            <div class="hamb__field" id="hamb">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
            </div>
          </div>
          <ul class="menu container flex justify-end gap-8 text-lg text-default-text" id="menu">
            <li><a href="{{ route('home') }}" class="px-1 hover:text-header @if( request()->routeIs('home') ) menu_active @endif">Главная</a></li>
            <li><a href="{{ route('about.index') }}" class="px-1 hover:text-header @if( request()->routeIs('about.index') ) menu_active @endif">О проекте</a></li>
            <li><a href="{{ route('idea.index') }}" class="px-1 hover:text-header @if( request()->routeIs('idea.index') ) menu_active @endif">Идеи</a></li>
            @auth('web') 
                <li><a href="{{ route('profile.edit') }}" class="px-1 hover:text-header @if( request()->routeIs('profile.edit') ) menu_active @endif">Кабинет</a></li>
                <li>
                    <form class="flex justify-center lg:block" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="px-1 hover:text-header" type="submit">Выйти</button>
                    </form>
                </li>
            @endauth
            @guest('web')
                <li><a href="{{ route('login') }}" class="px-1 hover:text-header @if( request()->routeIs('login') ) menu_active @endif">Войти</a></li>
                <li><a href="{{ route('register') }}" class="px-1 hover:text-header @if( request()->routeIs('register') ) menu_active @endif">Зарегистрироваться</a></li>
            @endguest
          </ul>
        </div>
    </div>
    <div class="popup" id="popup"></div>
</nav>