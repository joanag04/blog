<?php echo $__env->make('partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<section class="profile">
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="container profile__container">
            <div class="profile__image">
                <img src="<?php echo e(asset('images/avatars/' . $user->avatar)); ?>" alt="<?php echo e($user->firstname); ?>">
            </div>
            <div class="user__info">
                <h2 class="user__name"><a href=""><?php echo e($user->firstname); ?> <?php echo e($user->lastname); ?></a></h2>
                <p class="user__info__username">
                    <?php echo e($user->username); ?>

                </p>
                <p class="user__info__email">
                    <?php echo e($user->email); ?>

                </p>
                <a href="edit-profile/<?php echo e($user->id); ?>" class="edit__profile__button">Edit Profile</a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
    <!-- END OF SECTION WITH PROFILE INFO -->

<section class="label__section">
    <div class="container label__section-container">
    <h3>Your Posts</h3>
    </div>
</section>
<!-- END OF LABEL SECTION -->

<section class="posts">
    <?php if(count($posts) == 0): ?>
    <div class="alert__message error">No posts found</div>
    <?php else: ?>
    <div class="container posts__container">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article class="post">
            <div class="post__thumbnail">
                <img src="<?php echo e(asset('images/thumbnails/' . $post->thumbnail)); ?>">
            </div>
            <div class="post__info">
                <?php 
                // fetch category from categories table using category_id of post
                ?>
                <a href="category-posts/<?php echo e($post->category->id); ?>" class="category__button"><?php echo e($post->category->title); ?></a>
                <h3 class="post__title">
                    <a href="post/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a>
                </h3>
                <p class="post__body">
                    <?php echo e($post->body); ?>

                </p>
                <div class="post__author">
                <?php 
                // fetch author from users table using author_id
                ?>
                    <div class="post__author-avatar">
                        <img src="<?php echo e(asset('images/avatars/' . $post->user->avatar)); ?>">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?php echo e($user->firstname); ?> <?php echo e($user->lastname); ?></h5>
                        <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
                    </div>
                </div>
            </div>
        </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </div>
    <?php endif; ?> 
 </section>
<!-- END OF POSTS -->

<?php echo $__env->make('partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;<?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/profile.blade.php ENDPATH**/ ?>