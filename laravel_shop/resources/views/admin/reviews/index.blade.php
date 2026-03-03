<x-store-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-4xl font-black text-white mb-2">
                    <span class="text-neon-purple">⭐ Gestión de Valoraciones</span>
                </h1>
                <p class="text-gray-400">Administra las valoraciones de los productos</p>
            </div>

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

            <div class="bg-gamer-card rounded-2xl border border-neon-purple/20 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-800 border-b border-neon-purple/20">
                        <tr>
                            <th class="px-6 py-4 text-left text-neon-purple">ID</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Producto</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Usuario</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Valoración</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Comentario</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Estado</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Fecha</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                            <tr class="border-b border-gray-800 hover:bg-gray-800/50 transition">
                                <td class="px-6 py-4 text-gray-300">{{ $review->id }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('products.show', $review->product->slug) }}" class="text-neon-blue hover:underline">
                                        {{ $review->product->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-white">{{ $review->user->name }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-500' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @endfor
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-300 max-w-xs truncate">{{ $review->comment ?: 'Sin comentario' }}</td>
                                <td class="px-6 py-4">
                                    @if($review->is_approved)
                                        <span class="px-3 py-1 bg-green-600/20 text-green-400 rounded-full text-xs">Aprobada</span>
                                    @else
                                        <span class="px-3 py-1 bg-yellow-600/20 text-yellow-400 rounded-full text-xs">Pendiente</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-400 text-sm">{{ $review->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        @if(!$review->is_approved)
                                            <form action="{{ route('admin.reviews.approve', $review) }}" method="POST" class="inline admin-form">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-green-600/10 text-green-400 rounded-lg hover:bg-green-600 hover:text-white transition text-sm">
                                                    Aprobar
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="inline admin-form" onsubmit="return confirm('¿Eliminar esta valoración?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-neon-red/10 text-neon-red rounded-lg hover:bg-neon-red hover:text-white transition text-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $reviews->links() }}
            </div>
        </div>
    </div>
</x-store-layout>

<script>
// Desactivar cualquier JavaScript que pueda estar interceptando los formularios de admin
document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar todos los formularios con clase 'admin-form'
    const adminForms = document.querySelectorAll('form.admin-form');
    
    adminForms.forEach(form => {
        // Eliminar cualquier evento anterior
        form.onsubmit = null;
        
        // Asegurar que el formulario se envíe normalmente
        form.addEventListener('submit', function(e) {
            // No prevenir el evento por defecto
            return true;
        });
    });
});
</script>
