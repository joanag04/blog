<?php echo $__env->make('partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<section class="singlepost">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container singlepost__container">
        <h2><?php echo e($post->title); ?></h2>
        <div class="post__author">
            <div class="post__author-avatar">
                <img src="<?php echo e(asset('images/avatars/' . $post->user->avatar)); ?>">
            </div>
            <div class="post__author-info">
                <h5><?php echo e($post->user->firstname); ?> <?php echo e($post->user->lastname); ?></h5>
                <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
            </div>
        </div>
        <div class="singlepost__thumbnail">
            <img src="<?php echo e(asset('images/thumbnails/' . $post->thumbnail)); ?>">
        </div>
            <p>
            <?php echo e($post->body); ?>

            </p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<!-- END OF SINGLE POST SECTION -->

<?php echo $__env->make('partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;
<?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/post.blade.php ENDPATH**/ ?>