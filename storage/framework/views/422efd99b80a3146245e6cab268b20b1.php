<h1>Cím: <?php echo e($blogpost->title); ?></h1>
<h3>Intro: <?php echo e($blogpost->intro); ?></h3>
<p>Content: <?php echo e($blogpost->content); ?></p>
<small>Author: <?php echo e($blogpost->user->name); ?></small>

<a href="<?php echo e(route("blogpost.edit", [$blogpost])); ?>">Edit</a>
<form action="<?php echo e(route('blogpost.destroy', $blogpost->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit">Destroy</button>
</form>


<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="border: 1px solid blue;">
            <p><?php echo e($comment->content); ?></p>
            <span><?php echo e($comment->id); ?></span>
        </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo e($comments->links()); ?>



<form action="<?php echo e(route('comment.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <label for="content"> Komment: </label>
    <textarea name="content" id="content"></textarea>
    <input type="hidden" name="blogpost_id" id="blogpost_id" value="<?php echo e($blogpost->id); ?>">
    <button type="submit">Submit comment</button>
</form>

<?php /**PATH /var/www/resources/views/blogpost/show.blade.php ENDPATH**/ ?>