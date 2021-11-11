<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="h-screen">
        <nav class="bg-gray-200" style="height: 10%;">
            <div class="grid px-3 grid-cols-3 items-center h-full">
                <div class="col-span-1">
                    <a class="text-center font-bold" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="col-span-2 flex justify-end">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="relative">
                        <button @click="isOpen = !isOpen" class="z-10 block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline focus:border-white">
                            <img class="h-full w-full object-cover" src="data:image/png;base64,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" />
                        </button>
                        <button v-if="isOpen" @click="isOpen = false" class="z-10 fixed top-0 right-0 bottom-0 left-0 bg-red-500 h-full w-full"></button>
                            <div v-if="isOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg p-4 shadow-xl z-10">
                                <a href="#" class="block px-4 py-4 text-gray-800 hover:bg-indigo-500 hover:text-white-500">Support</a>
                                <a href="#" class="block px-4 py-4 text-gray-800 hover:bg-indigo-500 hover:text-white-500">Support</a>
                                <a href="#" class="block px-4 py-4 text-gray-800 hover:bg-indigo-500 hover:text-white-500">Sign out</a>
                            </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        
                                        <router-link to ="settings" class="dropdown-item">Settings</router-link>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>


                </div>
            </div>
        </nav>

        <main class="relative mx-4 h-5/6">
            <router-view></router-view>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
