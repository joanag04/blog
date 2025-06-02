<?php echo $__env->make('partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;
// END OF NAV

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Profile</h2>
        <?php if($errors->any()): ?>
           <div class="alert__message error">
              <ul>
                 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li><?php echo e($error); ?></li>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      <?php endif; ?>
        <form action="/edit-profile/<?php echo e($user->first()->id); ?>" enctype="multipart/form-data" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" value="<?php echo e($user->first()->avatar); ?>" name="previous_avatar">
            <input type="text" value="<?php echo e($user->first()->firstname); ?>" name="firstname" placeholder="First Name">
            <input type="text" value="<?php echo e($user->first()->lastname); ?>" name="lastname" placeholder="Last Name">
            <select name="is_admin">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form__control">
                <label for="avatar">Update Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Update Profile</button>
        </form>
    </div>
</section>
<!-- END OF EDIT PROFILE FORM -->

<?php echo $__env->make('partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;
<!-- END OF FOOTER --><?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/edit-profile.blade.php ENDPATH**/ ?>