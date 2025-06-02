<?php echo $__env->make('../partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Category</h2>
        <?php if($errors->any()): ?>
           <div class="alert__message error">
              <ul>
                 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li><?php echo e($error); ?></li>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      <?php endif; ?>
        <form action="add-category" method="POST">
        <?php echo csrf_field(); ?>
            <input type="text" name="title" value="" placeholder="Title">
            <textarea rows="4" name="description" value="" placeholder="Description"></textarea>
            <button type="submit" name="submit" class="btn">Add Category</button>
        </form>
    </div>
</section>
<!-- END OF ADD CATEGORY SECTION -->

<?php echo $__env->make('../partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;<?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/admin/add-category.blade.php ENDPATH**/ ?>