<x-store-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-black text-white mb-2">
                        <span class="text-neon-purple">👥 Gestión de Usuarios</span>
                    </h1>
                    <p class="text-gray-400">Administra los usuarios de la tienda</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('admin.users.create') }}" class="px-6 py-2 bg-neon-purple text-white font-bold rounded-lg hover:scale-105 transition shadow-[0_0_20px_rgba(157,0,255,0.4)] flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Nuevo Usuario
                    </a>
                    <a href="{{ route('admin.bans.index') }}" class="px-4 py-2 bg-neon-red/10 text-neon-red rounded-lg hover:bg-neon-red hover:text-white transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                        </svg>
                        Ver Baneos
                    </a>
                </div>
            </div>

            @include('admin.users.partials.list')
        </div>
    </div>
</x-store-layout>
