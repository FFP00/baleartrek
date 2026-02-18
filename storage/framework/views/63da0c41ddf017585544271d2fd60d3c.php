<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-xl font-semibold text-gray-800">
            Detalles de el Usuario
        </h2>
     <?php $__env->endSlot(); ?>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex flex-col">
    <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">

                        <h1 class="text-xl">
                            <strong><?php echo e($user->name); ?> <?php echo e($user->lastname); ?></strong>
                        </h1>
                        <br>

                        <div class="space-y-1 text-gray-700">
                            <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                            <p><strong>DNI:</strong> <?php echo e($user->dni); ?></p>
                            <p><strong>Teléfono:</strong> <?php echo e($user->phone ?? 'N/A'); ?></p>
                            <p><strong>Rol:</strong> <?php echo e($user->role->name); ?></p>
                            
                            <p>
                                <strong>Estado:</strong> 
                                <?php if($user->status == 'y'): ?>
                                    <span class="text-emerald-500 font-semibold">Activo</span>
                                <?php else: ?>
                                    <span class="text-red-500 font-semibold">Inactivo</span>
                                <?php endif; ?>
                            </p>

                            <p><span class="font-medium text-gray-600">created at:</span> <?php echo e($user->created_at); ?></p>
                            <p><span class="font-medium text-gray-600">updated at:</span> <?php echo e($user->updated_at); ?></p>
                        </div>

                        <br>
                        <div class="flex justify-between items-center">
                            <div class="flex gap-2">
                                <a href="<?php echo e(route('users.show', $user->id)); ?>" 
                                   class="px-6 py-1.5 bg-emerald-500 text-white font-medium rounded hover:bg-emerald-600 transition text-sm">
                                    Show
                                </a>
                                <a href="<?php echo e(route('users.edit', $user->id)); ?>" 
                                   class="px-6 py-1.5 bg-blue-500 text-white font-medium rounded hover:bg-blue-600 transition text-sm">
                                    Edit
                                </a>
                            </div>

                            <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST"
                                  onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" 
                                        class="px-6 py-1.5 bg-red-500 text-white font-medium rounded hover:bg-red-600 transition text-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/CRUD/user_show.blade.php ENDPATH**/ ?>