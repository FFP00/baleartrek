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
     <?php $__env->slot('header', null, []); ?> <h2 class="text-xl font-semibold text-gray-800">Editar Excursió</h2> <?php $__env->endSlot(); ?>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="<?php echo e(route('treks.update', $trek->id)); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                    <div>
                        <label class="block font-medium">Nom</label>
                        <input type="text" name="name" value="<?php echo e(old('name', $trek->name)); ?>" class="w-full border-gray-300 rounded">
                    </div>
                    <div>
                        <label class="block font-medium">Estat</label>
                        <select name="status" class="w-full border-gray-300 rounded">
                            <option value="y" <?php echo e($trek->status == 'y' ? 'selected' : ''); ?>>Activa</option>
                            <option value="n" <?php echo e($trek->status == 'n' ? 'selected' : ''); ?>>Inactiva</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium">Municipi</label>
                        <select name="municipality_id" class="w-full border-gray-300 rounded">
                            <?php $__currentLoopData = $municipalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($municipality->id); ?>" <?php echo e($trek->municipality_id == $municipality->id ? 'selected' : ''); ?>>
                                    <?php echo e($municipality->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Actualitzar</button>
                </form>
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
<?php endif; ?><?php /**PATH /var/www/html/resources/views/CRUD/trek_edit.blade.php ENDPATH**/ ?>