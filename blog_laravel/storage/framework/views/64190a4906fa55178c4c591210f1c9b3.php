<?php echo $__env->make('partials/header-title', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<body>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign In</h2>
        <?php if(session('signin')): ?>
        <div class="alert__message error"><?php echo e(session('signin')); ?></div>
        <?php endif; ?>
        <form action="/signin" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="username" value="" placeholder="Username or Email">
            <input type="password" name="password" value="" placeholder="Password">
            <button type="submit" name="submit" class="btn">Sign In</button>
            <small>Don't have an account? <a href="/signup">Sign Up</a></small>
        </form>
    </div>
</section>
</body>
<!-- END OF SIGN IN -->

<?php echo $__env->make('partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;<?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/signin.blade.php ENDPATH**/ ?>