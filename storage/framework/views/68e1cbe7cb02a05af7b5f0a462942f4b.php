<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php echo $__env->make('blog/blogParts/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-gray p-0 has-text-right">
                <a href="<?php echo e(route('blog.index')); ?>" class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Show all blog posts</a>
            </h2>
            <div class="p-3 text-gray-900 dark:text-gray-100">
                <?php echo e(__("You're logged in")); ?> as <?php echo e(Auth::user()->name); ?>.
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <?php $__currentLoopData = Auth::user()->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a class="text-gray-100" href="<?php echo e(route('blog.show', $userPost->id)); ?>"><?php echo e($userPost->title); ?></a>
                        <?php echo e($userPost->created_at->format('d/m/Y')); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="p-6 text-gray-900 dark:text-gray-100">

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/dashboard.blade.php ENDPATH**/ ?>