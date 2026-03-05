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
        <div class="max-w-[95%] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-black text-white mb-2">
                        <span class="text-neon-purple">👥 Gestión de Usuarios</span>
                    </h1>
                    <p class="text-gray-400">Administra los usuarios de la tienda</p>
                </div>
                <div class="flex space-x-4">
                    <a href="<?php echo e(route('admin.users.create')); ?>" class="px-6 py-2 bg-neon-purple text-white font-bold rounded-lg hover:scale-105 transition shadow-[0_0_20px_rgba(157,0,255,0.4)] flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Nuevo Usuario
                    </a>
                    <a href="<?php echo e(route('admin.bans.index')); ?>" class="px-4 py-2 bg-neon-red/10 text-neon-red rounded-lg hover:bg-neon-red hover:text-white transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                        </svg>
                        Ver Baneos
                    </a>
                </div>
            </div>

            <?php if(session('success')): ?>
                <div class="bg-green-900/50 border border-green-500 text-green-200 px-4 py-3 rounded-lg mb-6">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="bg-red-900/50 border border-neon-red text-red-200 px-4 py-3 rounded-lg mb-6">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <div class="bg-gamer-card rounded-2xl border border-neon-purple/20 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-800 border-b border-neon-purple/20">
                        <tr>
                            <th class="px-6 py-4 text-left text-neon-purple">ID</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Usuario</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Email</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Registro</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Rol</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Estado</th>
                            <th class="px-6 py-4 text-left text-neon-purple">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-800 hover:bg-gray-800/50 transition">
                                <td class="px-6 py-4 text-gray-300"><?php echo e($user->id); ?></td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-neon-purple to-neon-blue flex items-center justify-center text-white font-bold text-sm">
                                            <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                                        </div>
                                        <span class="text-white font-medium"><?php echo e($user->name); ?></span>
                                        <?php if($user->isSuperAdmin()): ?>
                                            <span class="px-2 py-0.5 bg-neon-red text-white text-xs rounded-full">SUPER ADMIN</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-400"><?php echo e($user->email); ?></td>
                                <td class="px-6 py-4 text-gray-400"><?php echo e($user->created_at->format('d/m/Y')); ?></td>
                                <td class="px-6 py-4">
                                    <?php if($user->is_admin): ?>
                                        <span class="text-neon-purple font-bold">Administrador</span>
                                    <?php else: ?>
                                        <span class="text-gray-400">Usuario</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if($user->isBanned()): ?>
                                        <span class="px-3 py-1 bg-neon-red/20 text-neon-red rounded-full text-xs">Baneado</span>
                                    <?php else: ?>
                                        <span class="px-3 py-1 bg-green-600/20 text-green-400 rounded-full text-xs">Activo</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <?php if($user->canBeModifiedBy(auth()->user())): ?>
                                            <a href="<?php echo e(route('admin.users.edit', $user)); ?>" 
                                               class="px-3 py-1 bg-neon-blue/10 text-neon-blue rounded-lg hover:bg-neon-blue hover:text-gamer-dark transition text-sm">
                                                Editar
                                            </a>
                                        <?php endif; ?>
                                        
                                        <?php if(auth()->user()->isSuperAdmin() && !$user->isSuperAdmin()): ?>
                                            <form action="<?php echo e(route('admin.users.toggle-admin', $user)); ?>" method="POST" class="inline">
                                                <?php echo csrf_field(); ?>
                                                <?php if($user->is_admin): ?>
                                                    <button type="submit" class="px-3 py-1 bg-yellow-600/10 text-yellow-500 rounded-lg hover:bg-yellow-600 hover:text-white transition text-sm">
                                                        Quitar Admin
                                                    </button>
                                                <?php else: ?>
                                                    <button type="submit" class="px-3 py-1 bg-neon-purple/10 text-neon-purple rounded-lg hover:bg-neon-purple hover:text-white transition text-sm">
                                                        Hacer Admin
                                                    </button>
                                                <?php endif; ?>
                                            </form>
                                        <?php endif; ?>
                                        
                                        <?php if($user->canBeDeletedBy(auth()->user()) && $user->id !== auth()->id()): ?>
                                            <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" 
                                                  method="POST" 
                                                  class="inline"
                                                  onsubmit="return confirm('¿Eliminar este usuario?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="px-3 py-1 bg-neon-red/10 text-neon-red rounded-lg hover:bg-neon-red hover:text-white transition text-sm">
                                                    Eliminar
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                        
                                        <?php if(!$user->isBanned() && !$user->isSuperAdmin()): ?>
                                            <a href="<?php echo e(route('admin.bans.create', ['user_id' => $user->id])); ?>" 
                                               class="px-3 py-1 bg-gray-600/10 text-gray-400 rounded-lg hover:bg-gray-600 hover:text-white transition text-sm">
                                                Banear
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <?php echo e($users->links()); ?>

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
<?php endif; ?><?php /**PATH /home/ctk/Documentos/Proyecto_Daniel/Proyecto-final-main/laravel_shop/resources/views/admin/users/index.blade.php ENDPATH**/ ?>