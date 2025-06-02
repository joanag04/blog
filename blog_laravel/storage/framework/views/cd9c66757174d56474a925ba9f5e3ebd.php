<?php echo $__env->make('../partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Post</h2>
        <?php if(isset($_SESSION['edit-post'])) : ?>
        <div class="alert__message error">
            <p>
                <?= $_SESSION['edit-post'];
                unset($_SESSION['edit-post']);
                ?>
            </p>
        </div>
        <?php endif ?>
        <form action="/admin/edit-post/<?php echo e($post->id); ?>" enctype="multipart/form-data" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" value="<?php echo e($post->thumbnail); ?>" name="previous_thumbnail">
            <input type="text" value="<?php echo e($post->title); ?>" name="title" placeholder="Title">
            <select name="category_id">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <textarea rows="10" name="body" placeholder="Body"><?php echo e($post->body); ?></textarea>
            <div class="form__control inline">
                <input type="hidden" name="is_featured" value="0">
                <input type="checkbox" name="is_featured" value="1">
                <label for="is_featured">Featured</label>
            </div>
            <div class="form__control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Update Post</button>
        </form>
    </div>
</section>
<!-- END OF EDIT POST SECTION -->

<?php echo $__env->make('../partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;<?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/admin/edit-post.blade.php ENDPATH**/ ?>