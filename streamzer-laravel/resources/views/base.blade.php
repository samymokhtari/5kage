<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Streamzer, l'incontournable de l'anime.">
        <meta name="author" content="5KAGE">
        <link rel="icon" href="/favicon.ico" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>{{ config('app.name', 'Streamzer') }}</title>
    </head>
    <body>
        <header>
            <nav id="navigation-bar" class="navbar navbar-dark navbar-expand-lg bg-custom-dark py-1 px-5">
                <div class="container-fluid">
                    <a class="navbar-brand pr-5" href="{{ route('home') }} ">
                        <img src="/images/logo.png"  height="50" class="d-inline-block align-top" alt="Home - Streamzer">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="w-100 navbar-nav flex-nowrap">
                            
                            @if (!(Route::has('login')))
                            <li class="nav-item">
                                <a href="{{ route('movies') }}">Films</a>
                            </li class="nav-item">
                            <li class="nav-item">
                                <a href="{{ route('series') }}">Séries</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about') }}">À propos</a>
                            </li>
                            @endif
                            <li class="admin-link d-md-inline-block">
                                <ul class="admin-link d-lg-flex d-md-inline-block justify-content-end m-0 p-0">
                                    @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
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
                                                    {{ __('auth.logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                        @if (Auth::user()->is_admin)
                                        <li class="nav-item dropdown">
                                            <a href="{{ route('admin.home') }}">Administration</a>
                                        </li>
                                        @endif
                                    @endguest
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container">
            @yield('content')
        </main>
        

        <footer class="text-muted text-center py-1">
            <div class="container">
                <p class="mb-1"><a href="https://5kage.xyz"> 5KAGE </a> | 2021 | Streamzer | A propos | 1.0 </p>
            </div>
        </footer>
    </body>
</html>
