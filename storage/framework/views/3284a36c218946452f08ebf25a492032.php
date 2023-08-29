<?php echo $__env->make('blog/blogParts/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content has-text-left pt-6 is-capitalized">
    <a class="content is-small has-text-primary has-icon-left mb-6" href=<?php echo e(route('blog.index')); ?>><i>Go to all
            Posts</i></a>

    <header class="header mt-6">
        <p class="title m-4"><?php echo e($selected_post->title); ?></p>
    </header>


    <p class="content is-small mt-6 mb-6">Made by: <strong class="has-text-primary"> <?php echo e($selected_post->user->name); ?>

        </strong> <?php echo e($selected_post->created_at); ?></p>
    <p class='content is-small'>Categories: </p>
    <?php if(count($selected_post->categories) > 0): ?>
        <?php $__currentLoopData = $selected_post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul>
                <li class="content is-small has-text-primary">
                    <?php echo e($category->title); ?>

                </li>
            </ul>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?> 
        <p class="content is-small has-text-danger pl-6 ">This post does not belong to any category yet!</p>
    <?php endif; ?>

    <p class="subtitle mt-4 mb-4"><strong><?php echo e($selected_post->excerpt); ?></strong></p>
    <p class="content is-small mt-2 mb-2"><?php echo e($selected_post->body); ?></p>
    <br />
    <img class="image" src=<?php echo e(asset('images/' . $selected_post->image_filename)); ?>

        alt="image for <?php echo e($selected_post->title); ?>" width='400' height='350'>
    <?php if(Auth::id() === $selected_post->user_id): ?>
        <div class="content is-flex pb-6">
            <a class="button mt-2 card-item has-text-primary"
                href=<?php echo e(Auth::id() === $selected_post->user_id ? route('blog.edit', $selected_post->id) : null); ?>><sup>Edit</sup></a>

            <form method="POST" action="<?php echo e(route('blog.destroy', $selected_post->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="button m-2 card-item has-text-danger">Delete</button>
            </form>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/resources/views/blog/show.blade.php ENDPATH**/ ?>