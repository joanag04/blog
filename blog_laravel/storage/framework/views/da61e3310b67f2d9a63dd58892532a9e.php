<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!--Custom Stylesheet-->
    <link rel="stylesheet" href="<?php echo e((asset('css/app.css'))); ?>">
    <!--Iconscout-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/solid.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!--Flaticon-->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-chubby/css/uicons-regular-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<body>
    <!-- START OF NAV-->
    <nav>
        <div class="container nav__container">
            <a href="" class="nav__logo">JG</a>
            <ul class="nav__items">
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about">About</a></li>
                <li><a href="services">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <!-- só tem acesso aqui se estiver logado-->
                    <li class="nav__profile">
                    <div class="avatar">
                        <img src="">
                    </div>
                    <ul>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="admin/index.php">Dashboard</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
                <li><a href="signin.php">Sign In</a></li>
            </ul>
            <button id="open__nav-btn"><i class="uis uis-bars"></i></button>
            <button id="close__nav-btn"><i class="uis uis-multiply"></i></i></button>
        </div>
    </nav>
    <!-- END OF NAV -->

<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="fi fi-br-angle-right"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fi fi-br-angle-left"></i></button>
        <aside>
                <ul>
                    <li>
                        <a href="add-post.php"><i class="fi fi-rc-pencil"></i>
                            <h5>Add Post</h5>
                        </a>
                    </li>
                    <li>
                        <a href="index.php" class="active"><i class="fi fi-rr-blog-text"></i>
                            <h5>Manage Posts</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-user.php"><i class="fi fi-rr-user-add"></i>
                            <h5>Add User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-users.php"><i class="fi fi-rs-users"></i>
                            <h5>Manage User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-category.php"><i class="fi fi-rs-edit"></i>
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categories.php"><i class="fi fi-rr-category-alt"></i>
                            <h5>Manage Category</h5>
                        </a>
                    </li>
                </ul>
        </aside>
        <main>
            <h2>Manage Posts</h2>
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
                    <tr>
                        <td><?= "Post title" ?></td>
                        <td><?= "Category title" ?></td>
                        <td><a href="admin/edit-post.php?id=" class="btn sm">Edit</a></td>
                        <td><a href="admin/delete-post.php?id=" class="btn danger">Delete</a></td>
                    </tr>
                </tbody>
            </table>
                <div class="alert__message error"><?= "No posts found" ?></div>
        </main>
    </div>
</section>
<!-- END OF DASHBOARD -->

<footer>
    <div class="footer__socials">
        <a href="https://www.youtube.com/" target="_blank"><i class="fi fi-brands-youtube"></i></a>
        <a href="https://www.instagram.com/"><i class="fi fi-brands-instagram"></i></a>
        <a href="https://www.facebook.com/"><i class="fi fi-brands-facebook"></i></a>
        <a href="https://www.twitter.com/"><i class="fi fi-brands-twitter"></i></a>
    </div>
    <div class="container footer__container">
        <article>
            <h4>Categories</h4>
            <ul>
                <li><a href="">Category1</a></li>
                <li><a href="">Category2</a></li>
                <li><a href="">Category3</a></li>
                <li><a href="">Category4</a></li>
            </ul>
        </article>
        <article>
            <h4>Support</h4>
            <ul>
                <li><a href="">Online Support</a></li>
                <li><a href="">Call Numbers</a></li>
                <li><a href="">Emails</a></li>
                <li><a href="">Location</a></li>
            </ul>
        </article>
        <article>
            <h4>Blog</h4>
            <ul>
                <li><a href="">Safety</a></li>
                <li><a href="">Repair</a></li>
                <li><a href="">Recent</a></li>
                <li><a href="">Popular</a></li>
                <li><a href="">Categories</a></li>
            </ul>
        </article>
        <article>
            <h4>Permalinks</h4>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </article>
    </div>
    <div class="footer__copyright">
        <small>Copyright &copy;</small>
    </div>
</footer>

<script src="<?php echo e((asset('js/main.js'))); ?>"></script>
</body>
</html>
<!-- END OF FOOTER --><?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views/admin/index.blade.php ENDPATH**/ ?>