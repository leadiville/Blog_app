<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Blog Post</h1>
        <span class="underline"></span>
    </header>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="container">
            <div class="card">
                <p class="card-header"><?php echo e($post->title); ?></p>
                <p class="subtitle"><?php echo e($post->excerpt); ?></p>
                <p class="bold"><strong>This post was created on: <?php echo e($post->created_at); ?></strong></p>
                <br />
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/blogs/index.blade.php ENDPATH**/ ?>