<nav class="sticky top-2 py-2 mx-4 bg-white border border-black border-opacity-5 rounded-full shadow-md">

    <div class=" flex justify-between items-center md:gap-6 gap-0">

        <!-- LOGO -->
        <a href="/fardelliditalia" class="">
            <img src="/img/logo2.png" alt="" class="shadow-lg aspect-square ml-3 md:w-12 w-8 md:h-12 h-8 border border-white hover:border-black rounded-full">
        </a>

        <!-- PAGINE -->
        <a href="/" class="@if (Request::is('/')) {{'hidden'}} @endif md:px-4 px-2 md:text-lg text-sm tracking-wide border border-slate-300 rounded-full p-1 hover:border-violet-300 hover:bg-violet-100 shadow-lg">HomE</a>
        @if (!Route::is('posts.show'))
            <a href="/manifesto" class="@if (Request::is('manifesto')) {{'hidden'}} @endif md:px-4 px-2 md:text-lg text-sm tracking-wide border border-slate-300 rounded-full p-1 hover:border-violet-300 hover:bg-violet-100 shadow-lg">ManifestO</a>
        @endif
        <a href="/posts" class="@if (Request::is('posts')) {{ 'hidden' }} @endif md:px-4 px-2 md:text-lg text-sm tracking-wide border border-slate-300 rounded-full p-1 hover:border-violet-300 hover:bg-violet-100 shadow-lg">PosTs</a>

        <!-- MENU UTENTE -->
        <div class="mr-3">
            @if (Route::has('login'))
            @auth
            <x-fardelli.dropdown>

                <x-slot name="trigger">
                    <div class="flex items-center">
                        <div class="md:text-lg text-sm">{{ Auth::user()->name }}</div>
                        <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </x-slot>

                <x-slot name="content">
                    @if (auth()->user()->is_admin)
                        <a href="/dashboard" class="block rounded-md p-2 bg-violet-200 border border-violet-400 hover:text-white font-medium text-sm tracking-wide">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="block rounded-md p-2 bg-violet-200 border border-violet-400 hover:text-white font-medium text-sm tracking-wide">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </x-slot>
            </x-fardelli.dropdown>

            @else

            <x-fardelli.dropdown>

                <x-slot name="trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" class="sm:h-6 h-4 sm:w-6 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </x-slot>

                <x-slot name="content">
                    <a href="{{ route('login') }}" class="block rounded-md p-2 bg-violet-200 border border-violet-400 hover:bg-violet-500 hover:text-white font-medium text-sm tracking-wide">Accedi</a>
                    <a href="{{ route('register') }}" class="block rounded-md p-2 bg-violet-200 border border-violet-400 hover:bg-violet-500 hover:text-white font-medium text-sm tracking-wide">Registrati</a>
                </x-slot>

            </x-fardelli.dropdown>


            @endauth
            @endif
        </div>

    </div>


</nav>