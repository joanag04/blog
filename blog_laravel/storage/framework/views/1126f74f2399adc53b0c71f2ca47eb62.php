<?php echo $__env->make('../partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<section class="dashboard">
    <?php if(session('edit-post-success')): ?>
    <div class="alert__message success container"><?php echo e(session('edit-post-success')); ?></div>
    <?php elseif(session('delete-post-success')): ?>
    <div class="alert__message success container"><?php echo e(session('delete-post-success')); ?></div>
    <?php elseif(session('add-post-success')): ?>
    <div class="alert__message success container"><?php echo e(session('add-post-success')); ?></div>
    <?php endif; ?>
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="fi fi-br-angle-right"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fi fi-br-angle-left"></i></button>
        <aside>
                <ul>
                    <li>
                        <a href="/admin/add-post"><i class="fi fi-rc-pencil"></i>
                            <h5>Add Post</h5>
                        </a>
                    </li>
                    <li>
                        <a href="." class="active"><i class="fi fi-rr-blog-text"></i>
                            <h5>Manage Posts</h5>
                        </a>
                    </li>
                    <?php if( $user->first()->is_admin  == "1") : ?>
                    <li>
                        <a href="/admin/add-user"><i class="fi fi-rr-user-add"></i>
                            <h5>Add User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/manage-users"><i class="fi fi-rs-users"></i>
                            <h5>Manage User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/add-category"><i class="fi fi-rs-edit"></i>
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/manage-categories"><i class="fi fi-rr-category-alt"></i>
                            <h5>Manage Category</h5>
                        </a>
                    </li>
                    <?php endif ?>
                </ul>
        </aside>
        <main>
            <h2>Manage Posts</h2>
            <?php if(count($user_posts) == 0): ?>
            <div class="alert__message error"><?= "No posts found" ?></div>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- get category title of each post from categories table -->
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($post->title); ?></td>
                        <td><?php echo e($post->category->title); ?></td>
                        <td><a href="/admin/edit-post/<?php echo e($post->id); ?>" class="btn sm">Edit</a></td>
                        <td><form action="/admin/delete-post/<?php echo e($post->id); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn danger">Delete</button>
                        </form></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php endif; ?>
        </main>
    </div>
</section>
<!-- END OF DASHBOARD -->

<?php echo $__env->make('../partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;<?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/admin/manage-posts.blade.php ENDPATH**/ ?>