-- Active: 1692575068306@@127.0.0.1@3306@blog_posts
<?php echo $__env->make('blog/blogParts/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container m-6">
    <h1 class="title">Edit post</h1>
    <hr>
    <?php if($errors->any()): ?>
        <div class="notification is-warning">
            Something has gone wrong...
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ul>
                    <li><?php echo e($error); ?></li>
                </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <form action=<?php echo e(route('blog.update', $post->id)); ?> method="POST" enctype="multipart/form-data" class="form has-text-left m-4">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <div class="field">
            <label class="label" for="is_published">is_published</label>
            <div class="control">
                <input value=<?php echo e($post->is_published); ?> type="checkbox" class="checkbox" name="is_published" >
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input value="<?php echo e($post->title); ?>" type="text" class="input" placeholder="Title..." name="title">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input  value="<?php echo e($post->excerpt); ?>" class="input" type="text" name="excerpt" placeholder="Excerpt...">
            </div>
        </div>
        <div class="field">
            <label for="min_to_read" class="label">min to read</label>
            <div class="control">
                <input name="min_to_read" type="number" value= <?php echo e($post->min_to_read); ?> class="input">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <textarea class="textarea" placeholder="Body..." name="body"><?php echo e($post->body); ?></textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input type="file" name="image_filename" class="file">
            </div>
        </div>
        <button type="submit" class="button mt-4 is-link is-rounded">SUBMIT POST</button>
    </form>
</div>

<?php /**PATH /var/www/html/resources/views/blog/edit.blade.php ENDPATH**/ ?>