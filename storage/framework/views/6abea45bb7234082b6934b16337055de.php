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
        <h2 class="text-xl font-semibold text-gray-800">Detalles de la Trobada</h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">
                <h1 class="text-xl"><strong>Trobada: <?php echo e($meeting->trek->name); ?></strong></h1>
                <br>
                <div class="space-y-1 text-gray-700">
                    <p><strong>Guia: </strong><?php echo e($meeting->user->name); ?></p>
                    <p><strong>Dia de l'excursió: </strong><?php echo e($meeting->day); ?></p>
                    <p><strong>Hora: </strong><?php echo e($meeting->time); ?></p>
                    <p><strong>Inici Inscripció: </strong><?php echo e($meeting->appDateIni); ?></p>
                    <p><strong>Fi Inscripció: </strong><?php echo e($meeting->appDateEnd); ?></p>
                    <p><strong>Puntuació acumulada: </strong><?php echo e($meeting->totalScore); ?> (<?php echo e($meeting->countScore); ?> vots)</p>
                    <br>
                    <p><span class="font-medium text-gray-600">created at:</span> <?php echo e($meeting->created_at); ?></p>
                    <p><span class="font-medium text-gray-600">updated at:</span> <?php echo e($meeting->updated_at); ?></p>
                </div>
                <br>
                <div class="flex justify-between items-center text-sm font-medium border-t pt-4">
                    <div class="flex gap-2">
                        <a href="<?php echo e(route('meetings.index')); ?>" class="px-6 py-1.5 bg-emerald-500 text-white rounded">Tornar</a>
                        <a href="<?php echo e(route('meetings.edit', $meeting->id)); ?>" class="px-6 py-1.5 bg-blue-500 text-white rounded">Edit</a>
                    </div>
                    <form action="<?php echo e(route('meetings.destroy', $meeting->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="px-6 py-1.5 bg-red-500 text-white rounded">Delete</button>
                    </form>
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
<?php endif; ?><?php /**PATH /var/www/html/resources/views/CRUD/meeting_show.blade.php ENDPATH**/ ?>