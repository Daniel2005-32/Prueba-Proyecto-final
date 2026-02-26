<x-store-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Cabecera -->
            <div class="mb-8">
                <h1 class="text-4xl font-black text-white mb-2">
                    <span class="text-neon-blue">👤 Mi Perfil</span>
                </h1>
                <p class="text-gray-400">Gestiona tu información personal</p>
            </div>

            <!-- Mensajes de éxito/error -->
            @if(session('success'))
                <div class="bg-green-900/50 border border-green-500 text-green-200 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-900/50 border border-neon-red text-red-200 px-4 py-3 rounded-lg mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Grid de información -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Columna izquierda - Avatar -->
                <div class="bg-gamer-card rounded-2xl border border-neon-blue/20 p-6">
                    <div class="flex flex-col items-center">
                        <div class="w-32 h-32 rounded-full bg-gradient-to-br from-neon-blue to-neon-purple mb-4 flex items-center justify-center overflow-hidden">
                            @if($user->avatar)
                                <img src="{{ asset('avatars/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-5xl text-white font-black">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            @endif
                        </div>
                        <h2 class="text-xl font-bold text-white mb-1">{{ $user->name }}</h2>
                        <p class="text-gray-400 text-sm mb-4">{{ $user->email }}</p>
                        
                        <!-- Formulario para subir avatar -->
                        <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" class="w-full">
                            @csrf
                            <label class="block mb-2 text-sm text-gray-400">Cambiar avatar</label>
                            <input type="file" name="avatar" accept="image/*" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-neon-blue file:text-gamer-dark hover:file:bg-neon-blue/80">
                            <button type="submit" class="w-full mt-3 px-4 py-2 bg-neon-purple/20 text-neon-purple text-sm font-bold rounded-lg hover:bg-neon-purple hover:text-white transition">
                                Subir avatar
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Columna derecha - Información y acciones -->
                <div class="md:col-span-2 space-y-6">
                    <!-- Información personal -->
                    <div class="bg-gamer-card rounded-2xl border border-neon-blue/20 p-6">
                        <h3 class="text-xl font-bold text-white mb-4">Información personal</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between pb-3 border-b border-gray-800">
                                <span class="text-gray-400">Nombre</span>
                                <span class="text-white font-medium">{{ $user->name }}</span>
                            </div>
                            <div class="flex items-center justify-between pb-3 border-b border-gray-800">
                                <span class="text-gray-400">Email</span>
                                <span class="text-white font-medium">{{ $user->email }}</span>
                            </div>
                            <div class="flex items-center justify-between pb-3 border-b border-gray-800">
                                <span class="text-gray-400">Miembro desde</span>
                                <span class="text-white font-medium">{{ $user->created_at->format('d/m/Y') }}</span>
                            </div>
                            @if($user->is_admin)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-400">Rol</span>
                                    <span class="text-neon-purple font-bold">👑 Administrador</span>
                                </div>
                            @endif
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('profile.edit') }}" class="inline-block px-6 py-3 bg-neon-blue text-gamer-dark font-bold rounded-lg hover:scale-105 transition shadow-[0_0_20px_rgba(0,210,255,0.4)]">
                                Editar perfil
                            </a>
                        </div>
                    </div>

                    <!-- Estadísticas del usuario (opcional) -->
                    <div class="bg-gamer-card rounded-2xl border border-neon-blue/20 p-6">
                        <h3 class="text-xl font-bold text-white mb-4">Estadísticas</h3>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-4 bg-gray-800/50 rounded-lg">
                                <div class="text-3xl font-bold text-neon-blue">{{ App\Models\Order::where('user_id', $user->id)->count() }}</div>
                                <div class="text-sm text-gray-400">Pedidos realizados</div>
                            </div>
                            <div class="text-center p-4 bg-gray-800/50 rounded-lg">
                                <div class="text-3xl font-bold text-neon-purple">{{ App\Models\Message::where('user_id', $user->id)->count() }}</div>
                                <div class="text-sm text-gray-400">Mensajes en el chat</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-store-layout>
