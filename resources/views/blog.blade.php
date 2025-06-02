@include('partials/header')

<section class="search__bar">
    <form class="container search__bar-container" action="search" method="GET">
        <div>
            <i class="fi fi-rr-search"></i>
            <input type="search" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn">Search</button>
    </form>
</section>
<!-- END OF SEARCH BAR-->

<section class="posts">
    @if (count($posts) == 0)
    <div class="alert__message error"><?= "No posts found" ?></div>
    @else
    <div class="container posts__container">
    @foreach($posts as $post)
        <article class="post">
            <div class="post__thumbnail">
                <img src="{{asset('images/thumbnails/' . $post->thumbnail)}}">
            </div>
            <div class="post__info">
                <a href="category-posts/{{$post->category->id}}" class="category__button">{{$post->category->title}}</a>
                <h3 class="post__title">
                    <a href="post/{{$post->id}}">{{$post->title}}</a>
                </h3>
                <p class="post__body">
                    <?= substr($post['body'], 0, 150) ?>...
                </p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="{{asset('images/avatars/' . $post->user->avatar)}}">
                    </div>
                    <div class="post__author-info">
                        <h5>By: {{$post->user->firstname}} {{$post->user->lastname}}</h5>
                        <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
    </div>
    @endif
</section>
<!-- END OF POSTS -->

<section class="category__buttons">
    <div class="container category__buttons-container">
        @foreach ($categories as $category)
        <a href="category-posts/{{$category->id}}" class="category__button">{{$category->title}}</a>
        @endforeach
    </div>
</section>
<!-- END OF CATEGORY BUTTONS-->

@include('partials/footer')