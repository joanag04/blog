<?php echo $__env->make('../partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit User</h2>
        <?php if(isset($_SESSION['edit-user'])) : ?>
        <div class="alert__message error">
            <p>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </p>
        </div>
        <?php endif ?>
        <form action="/admin/edit-user/<?php echo e($user->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" value="" name="id">
            <input type="text" value="<?php echo e($user->firstname); ?>" name="firstname" placeholder="First Name">
            <input type="text" value="<?php echo e($user->lastname); ?>" name="lastname" placeholder="Last Name">
            <select name="is_admin">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" name="submit" class="btn">Update User</button>
        </form>
    </div>
</section>
<!-- END OF EDIT USER SECTION -->

<?php echo $__env->make('../partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;
<?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/admin/edit-user.blade.php ENDPATH**/ ?>