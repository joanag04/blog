<?php echo $__env->make('../partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Category</h2>
        <?php if(isset($_SESSION['edit-category'])) : ?>
        <div class="alert__message error">
            <p>
                <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </p>
        </div>
        <?php endif ?>
        <form action="/admin/edit-category/<?php echo e($category->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" value="" name="id">
            <input type="text" value="<?php echo e($category->title); ?>" name="title" placeholder="Title">
            <textarea rows="4" name="description" placeholder="Description"><?php echo e($category->description); ?></textarea>
            <button type="submit" name="submit" class="btn">Update Category</button>
        </form>
    </div>
</section>
<!-- END OF EDIT CATEGORY SECTION -->

<?php echo $__env->make('../partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;<?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/admin/edit-category.blade.php ENDPATH**/ ?>