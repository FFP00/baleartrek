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
            Detalles de l'Excursió
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">

                    <h1 class="text-xl">
                        <strong><?php echo e($trek->name); ?></strong>
                    </h1>
                    <br>

                    <div class="space-y-1 text-gray-700">
                        <p><strong>Registre: </strong><?php echo e($trek->regNumber); ?></p>
                        <p><strong>Municipi: </strong><?php echo e($trek->municipality->name); ?></p>
                        <p><strong>Estat: </strong><?php echo e($trek->status == 'y' ? 'Activa' : 'Inactiva'); ?></p>
                        <p><strong>Puntuació Mitjana: </strong><?php echo e($trek->totalScore); ?> (<?php echo e($trek->countScore); ?> vots)</p>
                        
                        <br>
                        <p><strong>Llocs d'Interès Remarcables:</strong></p>
                        <ul class="list-disc ml-8 mt-2">
                            <?php $__empty_1 = true; $__currentLoopData = $trek->interestingPlaces->sortBy('pivot.order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li>
                                    <strong>Ordre <?php echo e($place->pivot->order); ?>:</strong> <?php echo e($place->name); ?> 
                                    <span class="text-sm text-gray-500">(<?php echo e($place->gps); ?>)</span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li class="text-gray-500 italic">No hi ha llocs assignats a aquesta excursió.</li>
                            <?php endif; ?>
                        </ul>
                        
                        <br>
                        <p><span class="font-medium text-gray-600">created at:</span> <?php echo e($trek->created_at); ?></p>
                        <p><span class="font-medium text-gray-600">updated at:</span> <?php echo e($trek->updated_at); ?></p>
                    </div>

                    <br>
                    <div class="flex justify-between items-center text-sm font-medium border-t pt-4">
                        <div class="flex gap-2">
                            <a href="<?php echo e(route('treks.index')); ?>" 
                                class="px-6 py-1.5 bg-emerald-500 text-white rounded hover:bg-emerald-600 transition">
                                Tornar
                            </a>
                            <a href="<?php echo e(route('treks.edit', $trek->id)); ?>" 
                                class="px-6 py-1.5 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                Edit
                            </a>
                        </div>

                        <form action="<?php echo e(route('treks.destroy', $trek->id)); ?>" method="POST"
                                onsubmit="return confirm('¿Seguro que quieres eliminar esta excursión?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" 
                                    class="px-6 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 transition">
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
<?php endif; ?><?php /**PATH /var/www/html/resources/views/CRUD/trek_show.blade.php ENDPATH**/ ?>