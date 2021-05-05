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

        <title>Streamzer</title>
    </head>
    <body>

        <header>
            <nav id="navigation-bar" class="navigation-content navbar bg-dark ">
                <a class="navbar-brand" href="{{ route('home') }} ">
                    <img src="/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Home - Streamzer">
                    Streamzer
                </a>
                <a href="{{ route('admin-home') }}">Administration</a>
            </nav>
        </header>

        @yield('content')

        <footer class="text-muted py-1">
            <div class="container">
                <p class="mb-1"><a href="https://5kage.xyz"> 5KAGE </a> // Streamzer 📺</p>
            </div>
        </footer>
    </body>
</html>
