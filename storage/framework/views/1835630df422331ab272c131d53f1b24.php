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
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Llistat de Llocs d'Interès
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            
            <?php if(session('success')): ?>
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow-sm">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="flex flex-col ">
                <?php $__currentLoopData = $interestingPlaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">

                        <h1 class="text-xl">
                            <strong><?php echo e($place->name); ?></strong>
                        </h1>
                        <br>

                        <div class="space-y-1 text-gray-700">
                            <p><strong>GPS: </strong><?php echo e($place->gps); ?></p>
                            <p><strong>Tipus de Lloc:</strong> <?php echo e($place->placeType->name); ?></p>

                            <p><span class="font-medium text-gray-600">created at:</span> <?php echo e($place->created_at); ?></p>
                            <p><span class="font-medium text-gray-600">updated at:</span> <?php echo e($place->updated_at); ?></p>
                        </div>
                        
                        <br>
                        <div class="flex justify-between items-center text-sm font-medium">
                            <div class="flex gap-2">
                                <a href="<?php echo e(route('interesting_places.show', $place->id)); ?>" 
                                   class="px-6 py-1.5 bg-emerald-500 text-white rounded hover:bg-emerald-600 transition">
                                    Show
                                </a>
                                <a href="<?php echo e(route('interesting_places.edit', $place->id)); ?>" 
                                   class="px-6 py-1.5 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>
                            </div>

                            <form action="<?php echo e(route('interesting_places.destroy', $place->id)); ?>" method="POST"
                                  onsubmit="return confirm('¿Seguro que quieres eliminar este lugar?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" 
                                        class="px-6 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div class="mt-8">
                <?php echo e($interestingPlaces->links()); ?>

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
<?php endif; ?><?php /**PATH /var/www/html/resources/views/CRUD/interesting_place_index.blade.php ENDPATH**/ ?>