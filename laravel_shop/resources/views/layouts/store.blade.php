<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'GameAnimeStore') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Estilos adicionales para el tema gaming -->
    <style>
        /* Aquí puedes agregar estilos personalizados si es necesario */
        .neon-text-blue {
            text-shadow: 0 0 10px rgba(0, 210, 255, 0.7);
        }
        .neon-text-purple {
            text-shadow: 0 0 10px rgba(157, 0, 255, 0.7);
        }
        .neon-text-red {
            text-shadow: 0 0 10px rgba(255, 0, 85, 0.7);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gamer-dark text-white">
    <!-- Navbar de la tienda -->
    <nav class="bg-gamer-card border-b border-neon-blue/20 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-black uppercase tracking-tighter">
                        <span class="text-neon-blue">Game</span>
                        <span class="text-neon-purple">Anime</span>
                        <span class="text-white">Store</span>
                    </a>
                </div>

                <!-- Menu Items (Inicio, Productos, Categorías, Ofertas, Contacto) -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-sm font-bold uppercase tracking-wider hover:text-neon-blue transition {{ request()->routeIs('home') ? 'text-neon-blue' : 'text-gray-300' }}">
                        Inicio
                    </a>
                    <a href="{{ route('products.index') }}" class="text-sm font-bold uppercase tracking-wider hover:text-neon-blue transition {{ request()->routeIs('products.*') ? 'text-neon-blue' : 'text-gray-300' }}">
                        Productos
                    </a>
                    <a href="{{ route('categories.index') }}" class="text-sm font-bold uppercase tracking-wider hover:text-neon-blue transition {{ request()->routeIs('categories.*') ? 'text-neon-blue' : 'text-gray-300' }}">
                        Categorías
                    </a>
                    <a href="{{ route('offers') }}" class="text-sm font-bold uppercase tracking-wider hover:text-neon-blue transition {{ request()->routeIs('offers') ? 'text-neon-blue' : 'text-gray-300' }}">
                        Ofertas
                    </a>
                    <a href="{{ route('contact') }}" class="text-sm font-bold uppercase tracking-wider hover:text-neon-blue transition {{ request()->routeIs('contact') ? 'text-neon-blue' : 'text-gray-300' }}">
                        Contacto
                    </a>
                </div>

                <!-- User Menu / Login -->
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-bold uppercase tracking-wider bg-neon-blue/20 text-neon-blue rounded-lg hover:bg-neon-blue hover:text-gamer-dark transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-bold uppercase tracking-wider text-gray-300 hover:text-neon-blue transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-bold uppercase tracking-wider bg-neon-purple/20 text-neon-purple rounded-lg hover:bg-neon-purple hover:text-white transition">
                            Registro
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer (opcional) -->
    <footer class="bg-gamer-card border-t border-neon-blue/20 mt-20 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-gray-400">
                <p>© {{ date('Y') }} GameAnimeStore. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>