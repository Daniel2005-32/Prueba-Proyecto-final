<x-store-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-4xl font-black text-white mb-2">
                    <span class="text-neon-blue">📦 Gestión de Pedidos</span>
                </h1>
                <p class="text-gray-400">Administra todos los pedidos de la tienda</p>
            </div>

            @if(session('success'))
                <div class="bg-green-900/50 border border-green-500 text-green-200 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gamer-card rounded-2xl border border-neon-blue/20 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-800 border-b border-neon-blue/20">
                        <tr>
                            <th class="px-6 py-4 text-left text-neon-blue">ID</th>
                            <th class="px-6 py-4 text-left text-neon-blue">Cliente</th>
                            <th class="px-6 py-4 text-left text-neon-blue">Total</th>
                            <th class="px-6 py-4 text-left text-neon-blue">Fecha</th>
                            <th class="px-6 py-4 text-left text-neon-blue">Estado</th>
                            <th class="px-6 py-4 text-left text-neon-blue">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="border-b border-gray-800 hover:bg-gray-800/50 transition">
                                <td class="px-6 py-4 text-gray-300">#{{ $order->id }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-neon-blue to-neon-purple flex items-center justify-center text-white font-bold text-sm">
                                            {{ strtoupper(substr($order->user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <span class="text-white font-medium">{{ $order->user->name }}</span>
                                            <p class="text-gray-500 text-xs">{{ $order->user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-neon-blue font-bold">{{ number_format($order->total, 2) }}€</span>
                                </td>
                                <td class="px-6 py-4 text-gray-400 text-sm">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4">
                                    @if($order->status == 'pending')
                                        <span class="px-3 py-1 bg-yellow-600/20 text-yellow-400 rounded-full text-xs">Pendiente</span>
                                    @elseif($order->status == 'completed')
                                        <span class="px-3 py-1 bg-green-600/20 text-green-400 rounded-full text-xs">Completado</span>
                                    @else
                                        <span class="px-3 py-1 bg-red-600/20 text-red-400 rounded-full text-xs">Cancelado</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.orders.show', $order) }}" 
                                           class="px-3 py-1 bg-neon-blue/10 text-neon-blue rounded-lg hover:bg-neon-blue hover:text-gamer-dark transition text-sm">
                                            Ver detalles
                                        </a>
                                        <form action="{{ route('admin.orders.destroy', $order) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('¿Eliminar este pedido?')"
                                              class="inline">
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
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-store-layout>
