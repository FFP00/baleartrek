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
            Detalls de l'Usuari
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-4">

                <div>
                    <p class="text-gray-600"><strong>ID:</strong> <?php echo e($user->id); ?></p>
                    <p class="text-gray-600"><strong>Nom:</strong> <?php echo e($user->name); ?></p>
                    <p class="text-gray-600"><strong>Llinatge:</strong> <?php echo e($user->lastname); ?></p>
                    <p class="text-gray-600"><strong>DNI:</strong> <?php echo e($user->dni); ?></p>
                    <p class="text-gray-600"><strong>Email:</strong> <?php echo e($user->email); ?></p>
                    <p class="text-gray-600"><strong>Telèfon:</strong> <?php echo e($user->phone); ?></p>

                    <p class="text-gray-600">
                        <strong>Rol:</strong> <?php echo e($user->role->name ?? 'Sense rol'); ?>

                    </p>

                    <p class="text-gray-600">
                        <strong>Estat:</strong>
                        <span class="<?php echo e($user->status == 'y' ? 'text-green-600' : 'text-red-600'); ?>">
                            <?php echo e($user->status == 'y' ? 'Actiu' : 'Inactiu'); ?>

                        </span>
                    </p>

                    <p class="text-gray-600"><strong>Creat:</strong> <?php echo e($user->created_at); ?></p>
                    <p class="text-gray-600"><strong>Actualitzat:</strong> <?php echo e($user->updated_at); ?></p>
                </div>

                <div class="pt-4 flex gap-3">
                    <a href="<?php echo e(route('users.index')); ?>"
                       class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                        Tornar al llistat
                    </a>

                    <a href="<?php echo e(route('users.edit', $user->id)); ?>"
                       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Editar
                    </a>
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