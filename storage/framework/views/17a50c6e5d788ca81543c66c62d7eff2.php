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
            Llista d'Usuaris
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            
            <?php if(session('success')): ?>
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="mb-4">
                <a href="<?php echo e(route('users.create')); ?>"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Crear Usuari
                </a>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="p-2">ID</th>
                            <th class="p-2">Nom</th>
                            <th class="p-2">Llinatge</th>
                            <th class="p-2">DNI</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">Telèfon</th>
                            <th class="p-2">Rol</th>
                            <th class="p-2">Estat</th>
                            <th class="p-2">Creat</th>
                            <th class="p-2">Actualitzat</th>
                            <th class="p-2">Accions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b">
                                <td class="p-2"><?php echo e($user->id); ?></td>
                                <td class="p-2"><?php echo e($user->name); ?></td>
                                <td class="p-2"><?php echo e($user->lastname); ?></td>
                                <td class="p-2"><?php echo e($user->dni); ?></td>
                                <td class="p-2"><?php echo e($user->email); ?></td>
                                <td class="p-2"><?php echo e($user->phone); ?></td>
                                <td class="p-2"><?php echo e($user->role->name ?? 'Sense rol'); ?></td>

                                <td class="p-2">
                                    <span class="<?php echo e($user->status === 'y' ? 'text-green-600' : 'text-red-600'); ?>">
                                        <?php echo e($user->status === 'y' ? 'Actiu' : 'Inactiu'); ?>

                                    </span>
                                </td>

                                <td class="p-2"><?php echo e($user->created_at); ?></td>
                                <td class="p-2"><?php echo e($user->updated_at); ?></td>

                                <td class="p-2 flex gap-2">
                                    <a href="<?php echo e(route('users.edit', $user->id)); ?>"
                                       class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        Editar
                                    </a>

                                    <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST"
                                          onsubmit="return confirm('Segur que vols eliminar aquest usuari?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                
                <div class="mt-4">
                    <?php echo e($users->links()); ?>

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
<?php /**PATH /var/www/html/resources/views/CRUD/user_index.blade.php ENDPATH**/ ?>