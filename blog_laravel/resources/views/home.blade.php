@include('partials/header');

    <section class="featured">
    @if (count($posts) == 0 && count($featured_post) == 0)
    <div class="alert__message error"><?= "No posts found" ?></div>
    @else
        @foreach ($featured_post as $featured_post)
        <div class="container featured__container">
            <div class="post__thumbnail">
                <img src="{{asset('images/thumbnails/' . $featured_post->thumbnail)}}">
            </div>
            <div class="post__info">
                <a href="/category-posts/{{$featured_post->category->id}}" class="category__button">{{$featured_post->category->title}}</a>
                <h2 class="post__title"><a href="/post/{{$featured_post->id}}">{{$featured_post->title}}</h2></a>
                <p class="post__body">
                    <?= substr($featured_post['body'], 0, 350) ?>...
                </p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="{{asset('images/avatars/' . $featured_post->user->avatar)}}">
                    </div>
                    <div class="post__author-info">
                        <h5>By: {{$featured_post->user->firstname}} {{$featured_post->user->lastname}}</h5>
                        <small><?= date("M d, Y - H:i", strtotime($featured_post['date_time'])) ?></small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>
<!-- END OF FEATURED-->

<section class="posts">
    <div class="container posts__container">
    @foreach ($posts as $post)
        <article class="post">
            <div class="post__thumbnail">
                <img src="{{asset('images/thumbnails/' . $post->thumbnail)}}">
            </div>
            <div class="post__info">
                <a href="/category-posts/{{$post->category_id}}" class="category__button">{{$post->category->title}}</a>
                <h3 class="post__title">
                    <a href="/post/{{$post->id}}">{{$post->title}}</a>
                </h3>
                <p class="post__body">
                <?= substr($post['body'], 0, 150) ?>...
                </p>
                <div class="post__author">
                <?php 
                // fetch author from users table using author_id
                ?>
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
        <a href="/category-posts/{{$category->id}}" class="category__button">{{$category->title}}</a>
    @endforeach    
    </div>
</section>
<!-- END OF CATEGORY BUTTONS -->

@include('partials/footer');