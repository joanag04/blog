<?php echo $__env->make('partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<section class="posts section__extra-margin" > 
        <div class="container posts__container">
            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="<?php echo e(asset('images/thumbnails/' . $result->thumbnail)); ?>">
                </div>
                <div class="post__info">
                    <a href="category-posts/<?php echo e($result->category->id); ?>" class="category__button"><?php echo e($result->category->title); ?></a>
                    <h3 class="post__title">
                        <a href="post/<?php echo e($result->id); ?>"><?php echo e($result->title); ?></a>
                    </h3>
                    <p class="post__body">
                        <?= substr($result['body'], 0, 150) ?>...
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="<?php echo e(asset('images/avatars/' . $result->user->avatar)); ?>">
                        </div>
                        <div class="post__author-info">
                            <h5>By: <?php echo e($result->user->firstname); ?> <?php echo e($result->user->lastname); ?></h5>
                            <small><?= date("M d, Y - H:i", strtotime($result['date_time'])) ?></small>
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
            <a href="category-posts/<?php echo e($category->id); ?>" class="category__button"><?php echo e($category->title); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <!-- END OF CATEGORY BUTTONS-->

<?php echo $__env->make('partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>; 
<!-- END OF FOOTER --><?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/search.blade.php ENDPATH**/ ?>