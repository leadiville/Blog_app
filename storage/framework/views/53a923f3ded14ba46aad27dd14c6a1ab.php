<div>
    <h1>create a new post</h1>
    <div class="form" >
        <form action="<?php echo e(route('blog.create')); ?>" method="GET">
            <div class="field">
                <input type="checkbox" name="is_published">
                <label for="is_published">is_published</label>
            </div>
            <br/>
            <input type="text" placeholder="enter title" name="title">
            <br/>
            <textarea placeholder="enter the body of your message here..." name="body"></textarea>
            <br/>
            <input type="upload" name="upload">
            <br/>
            <input type="number" name="min_to_read" min="1" >
            <br/>
            <button type="submit" name="submit">submit</button>
        </form>
    </div>
</d<?php /**PATH /var/www/html/resources/views/blogs/create.blade.php ENDPATH**/ ?>