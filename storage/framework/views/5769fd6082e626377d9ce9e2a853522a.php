<?php echo $__env->make('/blog/blogParts/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content has-text-left pt-6 p-2">
    <a class="content is-small has-text-primary is-dark ml-0" href="<?php echo e(route('dashboard')); ?>"><i>Go to Dashboard</i></a>

</div>
<header class="header m-6">
    <h1 class="title">All Articles</h1>
    <hr>
</header>
<?php if(session()->has('message')): ?>
    <div class="notification is-danger">
        <button class="delete"></button>
        <?php echo e(session()->get('message')); ?>

    </div>
<?php else: ?>
<?php endif; ?>

<section class="container has-text-left">
    <a class="button is-primary is-rounded has-text-black ml-6" href="<?php echo e(route('blog.create')); ?>">New
        Article</a>
</section>

<?php if(isset($posts)): ?>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card m-6 p-6 has-text-left">
            <p class="subtitle card-item is-capitalized"><a
                    href=<?php echo e(route('blog.show', $post->id)); ?>><strong><?php echo e($post->title); ?></strong></a></p>
            <p class="content card-item is-capitalized"><?php echo e($post->excerpt); ?></p>
            <p class="content is-small card-item"><strong>Made by: <i
                        class="has-text-primary"><?php echo e($post->user->name); ?></i>
                    on:
                    <?php echo e($post->created_at->format('d/m/Y')); ?></strong></p>
            </p>

            <br />
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="card is-warning p-6 m-6">
        <div class="card-head">
            <p class="has-text-danger">No Posted Article Yet</p>
        </div>
        <div class="card-body">
            <p class="content is-small mt-4">There are no posts yet. Click on the "New Article" button to create a new
                post...</p>
        </div>
    </div>
<?php endif; ?>

<?php echo $__env->make('blog/blogParts/foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/resources/views/blog/index.blade.php ENDPATH**/ ?>