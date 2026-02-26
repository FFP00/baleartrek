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
     <?php $__env->slot('header', null, []); ?> <h2 class="text-xl font-semibold text-gray-800">Detalls Municipi</h2> <?php $__env->endSlot(); ?>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php if(session('error')): ?>
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded shadow-sm">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
        <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">
            <h1 class="text-xl"><strong><?php echo e($municipality->name); ?></strong></h1><br>
            <div class="space-y-1 text-gray-700">
                <p><strong>Illa:</strong> <?php echo e($municipality->island->name); ?></p>
                <p><strong>Zona:</strong> <?php echo e($municipality->zone->name); ?></p>
                <p><span class="font-medium text-gray-600">created at:</span> <?php echo e($municipality->created_at); ?></p>
                <p><span class="font-medium text-gray-600">updated at:</span> <?php echo e($municipality->updated_at); ?></p>
            </div>
            <br>
            <div class="flex justify-between items-center text-sm font-medium">
                <div class="flex gap-2">
                    <a href="<?php echo e(route('municipality.show', $municipality->id)); ?>" class="px-6 py-1.5 bg-emerald-500 text-white rounded">Show</a>
                    <a href="<?php echo e(route('municipality.edit', $municipality->id)); ?>" class="px-6 py-1.5 bg-blue-500 text-white rounded">Edit</a>
                </div>
                <form action="<?php echo e(route('municipality.destroy', $municipality->id)); ?>" method="POST" onsubmit="return confirm('Seguro?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="px-6 py-1.5 bg-red-500 text-white rounded">Delete</button>
                </form>
            </div>
        </div>
    </div></div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/CRUD/municipality_show.blade.php ENDPATH**/ ?>