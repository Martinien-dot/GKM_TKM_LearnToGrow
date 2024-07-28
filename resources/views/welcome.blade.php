<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Titre par défaut')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <a href="{{ url('/') }}" class="text-2xl font-bold">Nom du site</a>
            </div>
            <nav>
                <ul class="flex space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a href="{{ url('/dashboard') }}" class="text-lg">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="text-lg"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="text-lg">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="text-lg">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <main class="flex-grow container mx-auto py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Nom du site. Tous droits réservés.
        </div>
    </footer>
</body>
</html>
