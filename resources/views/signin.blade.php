@include('partials/header-title')

<body>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign In</h2>
        @if (session('signin'))
        <div class="alert__message error">{{ session('signin') }}</div>
        @endif
        <form action="/signin" method="POST">
            @csrf
            <input type="text" name="username" value="" placeholder="Username or Email">
            <input type="password" name="password" value="" placeholder="Password">
            <button type="submit" name="submit" class="btn">Sign In</button>
            <small>Don't have an account? <a href="/signup">Sign Up</a></small>
        </form>
    </div>
</section>
</body>
<!-- END OF SIGN IN -->

@include('partials/footer')