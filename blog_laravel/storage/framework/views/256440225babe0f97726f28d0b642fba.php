<?php echo $__env->make('../partials/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<section class="dashboard">
    <?php if(session('edit-category-success')): ?>
    <div class="alert__message success container"><?php echo e(session('edit-category-success')); ?></div>
    <?php elseif(session('delete-category-success')): ?>
    <div class="alert__message success container"><?php echo e(session('delete-category-success')); ?></div>
    <?php elseif(session('add-category-success')): ?>
    <div class="alert__message success container"><?php echo e(session('add-category-success')); ?></div>
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
                        <a href="."><i class="fi fi-rr-blog-text"></i>
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
                        <a href="/admin/manage-categories" class="active"><i class="fi fi-rr-category-alt"></i>
                            <h5>Manage Category</h5>
                        </a>
                    </li>
                   <?php endif ?> 
                </ul>
        </aside>
        <main>
        <?php if( $user->first()->is_admin  == "1") : ?>
            <h2>Manage Categories</h2>
            <?php if(count($categories) == 0): ?>
            <div class="alert__message error"><?= "No categories found" ?></div>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <!--php while ($category = mysqli_fetch_assoc($categories)) : ?>-->
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <tr>
                        <td><?php echo e($category->title); ?></td>
                        <td><a href="edit-category/<?php echo e($category->id); ?>" class="btn sm">Edit</a></td>
                        <td><form action="delete-category/<?php echo e($category->id); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn danger">Delete</button>
                        </form></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--php endwhile -->
                </tbody>
            </table>
            <?php endif; ?>
        </main>
        <?php endif ?> 
    </div>
</section>
<!-- END OF DASHBOARD -->

<?php echo $__env->make('../partials/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;<?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/admin/manage-categories.blade.php ENDPATH**/ ?>