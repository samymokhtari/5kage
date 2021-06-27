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
                            <li class="nav-item">
                                <a href="{{ route('movies') }}">Films</a>
                            </li class="nav-item">
                            <li class="nav-item">
                                <a href="{{ route('series') }}">Séries</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about') }}">À propos</a>
                            </li>
                            <li class="admin-link d-md-inline-block">
                                <ul class="admin-link d-lg-flex d-md-inline-block justify-content-end m-0 p-0">
                                    <li class="m-0 p-0">
                                        <a href="{{ route('admin.home') }}">Administration</a>
                                    </li>
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
                <p class="mb-1"><a href="https://5kage.xyz"> 5KAGE </a> // Streamzer 📺</p>
            </div>
        </footer>
    </body>
</html>
