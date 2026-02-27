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
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-black text-white mb-2">
                        <span class="text-neon-red">🚫 Gestión de Baneos</span>
                    </h1>
                    <p class="text-gray-400">Administra los usuarios baneados del sistema</p>
                </div>
                <a href="<?php echo e(route('admin.bans.create')); ?>" 
                   class="px-6 py-3 bg-neon-red text-white font-bold rounded-lg hover:scale-105 transition">
                    + Nuevo Baneo
                </a>
            </div>

            <?php if(session('success')): ?>
                <div class="bg-green-900/50 border border-green-500 text-green-200 px-4 py-3 rounded-lg mb-6">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="bg-gamer-card rounded-2xl border border-neon-red/20 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-800 border-b border-neon-red/20">
                        <tr>
                            <th class="px-6 py-4 text-left text-neon-red">ID</th>
                            <th class="px-6 py-4 text-left text-neon-red">Usuario</th>
                            <th class="px-6 py-4 text-left text-neon-red">Motivo</th>
                            <th class="px-6 py-4 text-left text-neon-red">Duración</th>
                            <th class="px-6 py-4 text-left text-neon-red">Tiempo restante</th>
                            <th class="px-6 py-4 text-left text-neon-red">Baneado por</th>
                            <th class="px-6 py-4 text-left text-neon-red">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $bans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-800 hover:bg-gray-800/50 transition">
                                <td class="px-6 py-4 text-gray-300"><?php echo e($ban->id); ?></td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-neon-red flex items-center justify-center text-white font-bold text-sm">
                                            <?php echo e(strtoupper(substr($ban->user->name, 0, 1))); ?>

                                        </div>
                                        <span class="text-white font-medium"><?php echo e($ban->user->name); ?></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-300"><?php echo e($ban->reason); ?></td>
                                <td class="px-6 py-4">
                                    <?php if($ban->is_permanent): ?>
                                        <span class="px-3 py-1 bg-neon-red/20 text-neon-red rounded-full text-xs">Permanente</span>
                                    <?php elseif($ban->banned_until): ?>
                                        <span class="px-3 py-1 bg-yellow-600/20 text-yellow-500 rounded-full text-xs">
                                            Hasta <?php echo e($ban->banned_until->format('d/m/Y H:i')); ?>

                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if($ban->isActive()): ?>
                                        <span class="text-neon-red font-bold"><?php echo e($ban->timeLeft()); ?></span>
                                    <?php else: ?>
                                        <span class="text-green-500">Expirado</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-gray-300"><?php echo e($ban->banner?->name ?? 'Sistema'); ?></td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <?php if($ban->isActive()): ?>
                                            <form action="<?php echo e(route('admin.bans.unban', $ban->user)); ?>" method="POST" class="inline">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="px-3 py-1 bg-green-600/10 text-green-500 rounded-lg hover:bg-green-600 hover:text-white transition text-sm">
                                                    Desbanear
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                        <form action="<?php echo e(route('admin.bans.destroy', $ban)); ?>" 
                                              method="POST" 
                                              onsubmit="return confirm('¿Eliminar este registro de baneo?')"
                                              class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="px-3 py-1 bg-neon-red/10 text-neon-red rounded-lg hover:bg-neon-red hover:text-white transition text-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <?php echo e($bans->links()); ?>

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
<?php /**PATH /home/ctk/Documentos/Proyecto_Daniel/Proyecto-final-main/laravel_shop/resources/views/admin/bans/index.blade.php ENDPATH**/ ?>