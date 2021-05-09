<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Streamzer, l'incontournable de l'anime.">
        <meta name="author" content="5KAGE">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>{{ config('app.name', 'Streamzer') }}</title>
    </head>
    <body>

        <header>
            <nav id="navigation-bar" class="navigation-content navbar bg-dark p-1">
                <a class="navbar-brand" href="{{ route('home') }} ">
                    <img src="/images/logo.png" width="35" height="35" class="d-inline-block align-top" alt="Home - Streamzer">
                    {{ config('app.name', 'Streamzer') }}
                </a>
                <a href="{{ route('admin.home') }}">Administration</a>
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
