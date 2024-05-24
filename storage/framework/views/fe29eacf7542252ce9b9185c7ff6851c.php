<div>
    <form action="<?php echo e(isset($blogpost) ? route('blogpost.update', $blogpost->id) : route('blogpost.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if(isset($blogpost)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <label for="title"> Post title: </label>
        <input type="text" name="title" id="title" value="<?php echo e(isset($blogpost) ? $blogpost->title : ''); ?>"/>

        <label for="intro"> Post intro: </label>
        <input type="text" name="intro" id="intro" value="<?php echo e(isset($blogpost) ? $blogpost->intro : ''); ?>"/>

        <label for="content"> Post content: </label>
        <input type="text" name="content" id="content" value="<?php echo e(isset($blogpost) ? $blogpost->content : ''); ?>"/>

        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">

        <button type="submit">Submit</button>
    </form>
</div>
<?php /**PATH /var/www/resources/views/blogpost/create.blade.php ENDPATH**/ ?>