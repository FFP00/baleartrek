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
        <h2 class="text-xl font-semibold text-gray-800">Crear Excursió</h2>
     <?php $__env->endSlot(); ?>

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
                <form action="<?php echo e(route('treks.store')); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>

                    <div>
                        <label class="block font-medium">Número de Registre</label>
                        <input type="text" name="regNumber" value="<?php echo e(old('regNumber')); ?>" 
                               class="w-full border-gray-300 rounded <?php $__errorArgs = ['regNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>

                    <div>
                        <label class="block font-medium">Nom</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                               class="w-full border-gray-300 rounded <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>

                    <div>
                        <label class="block font-medium">Municipi</label>
                        <select name="municipality_id" class="w-full border-gray-300 rounded">
                            <?php $__currentLoopData = $municipalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($municipality->id); ?>" <?php echo e(old('municipality_id') == $municipality->id ? 'selected' : ''); ?>>
                                    <?php echo e($municipality->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium">Estat</label>
                        <select name="status" class="w-full border-gray-300 rounded">
                            <option value="y" <?php echo e(old('status') == 'y' ? 'selected' : ''); ?>>Activa</option>
                            <option value="n" <?php echo e(old('status') == 'n' ? 'selected' : ''); ?>>Inactiva</option>
                        </select>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <label class="block font-medium mb-2">Llocs d'Interès (Ruta)</label>
                        
                        <div id="places-container" class="space-y-2">
                            </div>

                        <button type="button" id="add-place" class="mt-3 text-sm bg-gray-50 px-4 py-2 rounded border border-gray-200 hover:bg-gray-100 transition">
                            + Afegir lloc d'interès
                        </button>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-medium transition">
                            Crear Excursió
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <template id="place-row-template">
        <div class="flex items-center gap-2 p-2 bg-gray-50 rounded border border-gray-100 place-row">
            <span class="font-bold text-gray-400 w-6 order-label">1.</span>
            <select name="places[]" class="flex-1 border-gray-300 rounded text-sm">
                <option value="">Selecciona un lloc...</option>
                <?php $__currentLoopData = $interestingPlaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($place->id); ?>"><?php echo e($place->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="button" class="remove-place text-red-500 hover:text-red-700 px-2 font-bold text-xl">&times;</button>
        </div>
    </template>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('places-container');
            const btnAdd = document.getElementById('add-place');
            const template = document.getElementById('place-row-template');

            function reorderLabels() {
                container.querySelectorAll('.place-row').forEach((row, index) => {
                    row.querySelector('.order-label').innerText = (index + 1) + '.';
                });
            }

            btnAdd.addEventListener('click', () => {
                const clone = template.content.cloneNode(true);
                container.appendChild(clone);
                reorderLabels();
            });

            container.addEventListener('click', (e) => {
                if (e.target.classList.contains('remove-place')) {
                    e.target.closest('.place-row').remove();
                    reorderLabels();
                }
            });
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
<?php endif; ?><?php /**PATH /var/www/html/resources/views/CRUD/trek_create.blade.php ENDPATH**/ ?>