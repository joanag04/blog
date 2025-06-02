<?php echo $__env->make('partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<header class="category__title">
<?php $__currentLoopData = $categories_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h2><?php echo e($category_title->title); ?></h2>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</header>
<!-- END OF TITLE-->

<section class="posts">
    <div class="container posts__container">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article class="post">
            <div class="post__thumbnail">
                <img src="<?php echo e(asset('images/thumbnails/' . $post->thumbnail)); ?>">
            </div>
            <div class="post__info">
                <a href="" class="category__button"><?php echo e($post->category->title); ?></a>
                <h3 class="post__title">
                    <a href="/post/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a>
                </h3>
                <p class="post__body">
                    <?= substr($post['body'], 0, 150) ?>...
                </p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="<?php echo e(asset('images/avatars/' . $post->user->avatar)); ?>">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?php echo e($post->user->firstname); ?> <?php echo e($post->user->lastname); ?></h5>
                        <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
                    </div>
                </div>
            </div>
        </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<!-- END OF POSTS -->

<section class="category__buttons">
    <div class="container category__buttons-container">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="/category-posts/<?php echo e($category->id); ?>" class="category__button"><?php echo e($category->title); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<!-- END OF CATEGORY BUTTONS -->

<?php echo $__env->make('partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;
<!-- END OF FOOTER --><?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/category-posts.blade.php ENDPATH**/ ?>