<?php if (isset($component)) { $__componentOriginalfa92fd5562a0c82e62f2e625d459a2d3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfa92fd5562a0c82e62f2e625d459a2d3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.store-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('store-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- CONTENEDOR PRINCIPAL CON IMÁGENES LATERALES DE FONDO -->
    <div class="relative min-h-screen">
        <!-- IMAGEN LATERAL IZQUIERDA -->
        <div class="hidden lg:block fixed left-0 top-0 h-screen w-1/4 xl:w-1/5 pointer-events-none z-0 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-neon-blue/30 to-transparent z-10"></div>
            <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?q=80&w=1887&auto=format&fit=crop" 
                 alt="Anime Collection" 
                 class="w-full h-full object-cover opacity-50">
        </div>

        <!-- IMAGEN LATERAL DERECHA -->
        <div class="hidden lg:block fixed right-0 top-0 h-screen w-1/4 xl:w-1/5 pointer-events-none z-0 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-l from-neon-purple/30 to-transparent z-10"></div>
            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=2070&auto=format&fit=crop" 
                 alt="Gaming Setup" 
                 class="w-full h-full object-cover opacity-50">
        </div>

        <!-- CONTENEDOR CENTRAL - MÁS ANCHO -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 lg:px-8" style="width: 90%; max-width: 1400px;">
            
            <!-- HERO SECTION - MÁS ESPACIOSO -->
            <div class="relative mb-16 mt-8">
                <div class="relative rounded-3xl overflow-hidden border border-neon-blue/20 bg-gamer-card/95 backdrop-blur-sm shadow-[0_0_50px_rgba(0,210,255,0.2)]">
                    <div class="absolute inset-0 bg-gradient-to-r from-gamer-dark via-transparent to-gamer-dark opacity-70"></div>
                    
                    <div class="py-20 md:py-24 px-8 flex items-center justify-center relative z-10">
                        <div class="max-w-4xl text-center">
                            <!-- TÍTULO PRINCIPAL - TAMAÑO ORIGINAL -->
                            <h1 class="text-7xl sm:text-8xl md:text-9xl font-black text-white leading-none mb-10 tracking-tighter uppercase italic">
                                <span class="text-neon-blue neon-text-blue block">GAMER</span>
                                <span class="text-neon-purple neon-text-purple block">GUILD</span>
                            </h1>
                            
                            <!-- BOTONES GRANDES -->
                            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-10">
                                <a href="<?php echo e(route('products.index')); ?>" 
                                   class="w-full sm:w-auto px-12 py-6 bg-neon-blue text-gamer-dark font-black uppercase tracking-widest rounded-full hover:scale-110 transition shadow-[0_0_30px_rgba(0,210,255,0.5)] text-center text-lg">
                                    Explorar Catálogo
                                </a>
                                <a href="<?php echo e(route('auctions.index')); ?>" 
                                   class="w-full sm:w-auto px-12 py-6 border-4 border-neon-purple text-neon-purple font-black uppercase tracking-widest rounded-full hover:bg-neon-purple hover:text-white transition shadow-[0_0_30px_rgba(157,0,255,0.3)] text-center text-lg">
                                    Ver Subastas
                                </a>
                            </div>
                            
                            <!-- TEXTO DESCRIPTIVO -->
                            <p class="text-lg sm:text-xl text-gray-300 leading-relaxed font-medium max-w-3xl mx-auto">
                                Tu santuario definitivo para la cultura gamer y otaku. En Gamer Guild nos apasiona ofrecerte lo último en videojuegos, manga de colección, las figuras más detalladas y el mejor cosplay para tus eventos. ¡Únete a nuestra hermandad!
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Productos Destacados - CON MÁS ESPACIO -->
            <div class="mb-20">
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-4xl font-black uppercase italic tracking-tighter text-white border-l-4 border-neon-blue pl-4">
                        Productos <span class="text-neon-blue">Destacados</span>
                    </h2>
                    <a href="<?php echo e(route('products.index')); ?>" class="text-base font-bold text-gray-500 hover:text-neon-blue transition uppercase tracking-widest">Ver todo →</a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('products.partials.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Tendencias -->
            <div class="mb-20">
                <h2 class="text-4xl font-black uppercase italic tracking-tighter text-white border-l-4 border-neon-purple pl-4 mb-10">
                    En <span class="text-neon-purple">Tendencia</span>
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php $__currentLoopData = $trending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('products.partials.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            
            <!-- Artículos Exclusivos -->
            <div class="mb-20">
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-4xl font-black uppercase italic tracking-tighter text-white border-l-4 border-neon-red pl-4">
                        Artículos <span class="text-neon-red">Exclusivos</span>
                    </h2>
                    <a href="<?php echo e(route('products.exclusivos')); ?>" class="text-base font-bold text-gray-500 hover:text-neon-red transition uppercase tracking-widest">Ver todos →</a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php
                        $exclusivos = App\Models\Product::where('is_exclusive', true)
                            ->where('stock', '>', 0)
                            ->take(4)
                            ->get();
                    ?>
                    <?php $__empty_1 = true; $__currentLoopData = $exclusivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php echo $__env->make('products.partials.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-span-full text-center py-16 bg-gamer-card rounded-2xl border border-neon-red/20">
                            <p class="text-gray-400 text-xl">No hay artículos exclusivos disponibles</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfa92fd5562a0c82e62f2e625d459a2d3)): ?>
<?php $attributes = $__attributesOriginalfa92fd5562a0c82e62f2e625d459a2d3; ?>
<?php unset($__attributesOriginalfa92fd5562a0c82e62f2e625d459a2d3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfa92fd5562a0c82e62f2e625d459a2d3)): ?>
<?php $component = $__componentOriginalfa92fd5562a0c82e62f2e625d459a2d3; ?>
<?php unset($__componentOriginalfa92fd5562a0c82e62f2e625d459a2d3); ?>
<?php endif; ?>
<?php /**PATH /home/ctk/Documentos/Proyecto_Daniel/Proyecto-final-main/laravel_shop/resources/views/home.blade.php ENDPATH**/ ?>