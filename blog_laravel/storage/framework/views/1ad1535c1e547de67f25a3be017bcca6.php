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
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="/category-posts/<?php echo e($category->id); ?>"><?php echo e($category->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<!-- END OF FOOTER --><?php /**PATH /opt/lampp/htdocs/blog_laravel/resources/views////partials/footer.blade.php ENDPATH**/ ?>