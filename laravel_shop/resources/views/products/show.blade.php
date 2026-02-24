<x-store-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gamer-card rounded-2xl overflow-hidden border border-neon-blue/20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
                    <div>
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full rounded-lg">
                    </div>
                    <div>
                        <span class="text-neon-blue text-sm uppercase">{{ $product->category }}</span>
                        <h1 class="text-4xl font-black text-white mt-2">{{ $product->name }}</h1>
                        <p class="text-gray-400 mt-4">{{ $product->description }}</p>
                        <div class="mt-6">
                            <span class="text-3xl font-black text-neon-blue">{{ number_format($product->price, 2) }}€</span>
                        </div>
                        <div class="mt-6">
                            <span class="text-gray-400">Stock: {{ $product->stock }} unidades</span>
                        </div>
                        <div class="mt-8 flex gap-4">
                            <button class="px-8 py-4 bg-neon-blue text-gamer-dark font-black rounded-full hover:scale-105 transition">
                                Añadir al carrito
                            </button>
                            <a href="{{ route('products.index') }}" class="px-8 py-4 border border-neon-purple text-neon-purple font-black rounded-full hover:bg-neon-purple hover:text-white transition">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-store-layout>
