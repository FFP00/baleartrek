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
            Llistat de Comentaris
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            
            <?php if(session('success')): ?>
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow-sm">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            
            <?php if($errors->any()): ?>
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc ms-5">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="flex flex-col ">
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-100">

                        <h1 class="text-xl">
                            <strong><?php echo e($comment->comment); ?></strong>
                            
                        </h1>
                        <br>

                        <div class="space-y-1 text-gray-700">
                            <p><strong>Usuari: </strong><?php echo e($comment->user->name); ?></p>
                            <p><strong>Puntuació:</strong> <?php echo e($comment->score); ?></p>
                            <p><strong>ID Reunió:</strong> <?php echo e($comment->meeting_id); ?></p>
                            
                            <p>
                                <strong>Estado:</strong> 
                                <?php if($comment->status == 'y'): ?>
                                    <span class="text-emerald-500 font-semibold">Activo</span>
                                <?php else: ?>
                                    <span class="text-red-500 font-semibold">Inactivo</span>
                                <?php endif; ?>
                            </p>

                            <p><span class="font-medium text-gray-600">created at:</span> <?php echo e($comment->created_at); ?></p>
                            <p><span class="font-medium text-gray-600">updated at:</span> <?php echo e($comment->updated_at); ?></p>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-4 mt-6 mb-6">
                            <?php $__empty_1 = true; $__currentLoopData = $comment->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="relative group">
                                    <img src="<?php echo e(str_starts_with($image->url, 'http') ? $image->url : asset('storage/' . $image->url)); ?>" 
                                        alt="Imagen comentario" 
                                        class="h-24 w-24 object-cover rounded-lg border shadow-sm hover:scale-105 transition-transform">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-sm text-gray-500 italic">Aquest comentari no té imatges.</p>
                            <?php endif; ?>
                        </div>

                        <br>
                        <div class="flex justify-between items-center">
                            <div class="flex gap-2">
                                <a href="<?php echo e(route('comments.show', $comment->id)); ?>" 
                                   class="px-6 py-1.5 bg-emerald-500 text-white font-medium rounded hover:bg-emerald-600 transition text-sm">
                                    Show
                                </a>
                                <a href="<?php echo e(route('comments.edit', $comment->id)); ?>" 
                                   class="px-6 py-1.5 bg-blue-500 text-white font-medium rounded hover:bg-blue-600 transition text-sm">
                                    Edit
                                </a>
                            </div>


                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div class="mt-8">
                <?php echo e($comments->links()); ?>

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
<?php endif; ?><?php /**PATH /var/www/html/resources/views/CRUD/comment_index.blade.php ENDPATH**/ ?>