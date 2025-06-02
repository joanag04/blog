@include('partials/header-title')
<body>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign Up</h2>
        @if (session('signup'))
        <div class="alert__message error">{{ session('signup') }}</div>
        @endif
        <form action="signup" enctype="multipart/form-data" method="POST">
        @csrf
            <input type="text" name="firstname" value="" placeholder="First Name">
            <input type="text" name="lastname" value="" placeholder="Last Name">
            <input type="text" name="username" value="" placeholder="Username">
            <input type="email" name="email" value="" placeholder="Email">
            <input type="password" name="password" value="" placeholder="Create password">
            <input type="password" name="confirmpassword" value="" placeholder="Confirm password">
            <div class="form__control">
                <label for="avatar">User avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small>Already have an account? <a href="signin">Sign In</a></small>
        </form>
    </div>
</section>
</body>
<!-- END OF SIGN UP-->

@include('partials/footer')