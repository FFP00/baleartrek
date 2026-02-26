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
            Editar Comentari
        </h2>
     <?php $__env->endSlot(); ?>

    
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            
            <?php if($errors->any()): ?>
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc ms-5">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="<?php echo e(route('comments.update', $comment->id)); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    
                    <div>
                        <label class="block font-medium">Comentari</label>
                        
                        <textarea id="comment" name="comment" rows="3" 
                                  class="w-full border-gray-300 rounded <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('comment', $comment->comment)); ?></textarea>
                        <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-sm"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div>
                        <label class="block font-medium">Estat</label>
                        <select name="status" class="w-full border-gray-300 rounded">
                            <option value="y" <?php echo e($comment->status == 'y' ? 'selected' : ''); ?>>Actiu</option>
                            <option value="n" <?php echo e($comment->status == 'n' ? 'selected' : ''); ?>>Inactiu</option>
                        </select>
                    </div>

                    
                    <div>
                        <label class="block font-medium text-gray-500">Puntuació</label>
                        <input type="number" name="score"
                            value="<?php echo e($comment->score); ?>"
                            readonly
                            class="w-full border-gray-300 rounded bg-gray-100 cursor-not-allowed text-gray-500 shadow-none">
                        <p class="text-xs text-gray-400 mt-1 italic">El valor de 'score' no es pot modificar.</p>
                    </div>

                    
                    <div>
                        <label class="block font-medium text-gray-500">Usuari</label>
                        <div class="w-full border border-gray-200 rounded p-2 bg-gray-50 text-gray-600">
                            <?php echo e($comment->user->name); ?>

                        </div>
                        <input type="hidden" name="user_id" value="<?php echo e($comment->user_id); ?>">
                    </div>

                    
                    <div>
                        <label class="block font-medium text-gray-500">Meeting</label>
                        <div class="w-full border border-gray-200 rounded p-2 bg-gray-50 text-gray-600">
                            ID: <?php echo e($comment->meeting_id); ?>

                        </div>
                        <input type="hidden" name="meeting_id" value="<?php echo e($comment->meeting_id); ?>">
                    </div>

                    
                    <div>
                        <label class="block font-medium">Imatges associades</label>
                        <input type="file" name="images[]" multiple accept="image/*"
                            class="w-full border-gray-300 rounded p-2">
                        <p class="text-xs text-gray-500 mt-1">Pots seleccionar diverses imatges alhora.</p>
                    </div>

                    
                    <div class="pt-4">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Actualitzar
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    
    <script>
        ClassicEditor
            .create(document.querySelector('#comment'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList']
            })
            .catch(error => {
                console.error(error);
            });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/CRUD/comment_edit.blade.php ENDPATH**/ ?>