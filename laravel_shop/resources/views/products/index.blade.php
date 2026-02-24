<x-store-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filtro de categorías -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-white mb-4">Categorías</h2>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('products.index') }}" class="px-4 py-2 rounded-full {{ !request('category') ? 'bg-neon-blue text-gamer-dark' : 'bg-gamer-card text-gray-400 hover:text-white' }} transition">
                        Todos
                    </a>
                    @foreach($categories as $slug => $category)
                        <a href="{{ route('products.category', $slug) }}" class="px-4 py-2 rounded-full {{ request('category') == $slug ? 'bg-neon-blue text-gamer-dark' : 'bg-gamer-card text-gray-400 hover:text-white' }} transition">
                            {{ $category['name'] }} ({{ $category['count'] }})
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Lista de productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($products as $slug => $product)
                    @php $product = (object) $product; @endphp
                    <div class="group bg-gamer-card rounded-2xl overflow-hidden border border-gray-800 hover:border-neon-blue/50 transition">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <span class="text-xs text-neon-blue uppercase">{{ $product->category }}</span>
                            <h3 class="text-white font-bold text-lg mt-1">{{ $product->name }}</h3>
                            <p class="text-gray-400 text-sm mt-2 line-clamp-2">{{ $product->description }}</p>
                            <div class="flex items-center justify-between mt-4">
                                <span class="text-2xl font-bold text-neon-blue">{{ number_format($product->price, 2) }}€</span>
                                <a href="{{ route('products.show', $product->slug) }}" class="px-4 py-2 bg-neon-blue/10 text-neon-blue rounded-lg hover:bg-neon-blue hover:text-gamer-dark transition">
                                    Ver
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-400">No hay productos disponibles</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-store-layout>
