@include ('partials/header');

<section class="posts section__extra-margin" > 
        <div class="container posts__container">
            @foreach ($results as $result)
            <article class="post">
                <div class="post__thumbnail">
                    <img src="{{asset('images/thumbnails/' . $result->thumbnail)}}">
                </div>
                <div class="post__info">
                    <a href="category-posts/{{$result->category->id}}" class="category__button">{{$result->category->title}}</a>
                    <h3 class="post__title">
                        <a href="post/{{$result->id}}">{{$result->title}}</a>
                    </h3>
                    <p class="post__body">
                        <?= substr($result['body'], 0, 150) ?>...
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="{{asset('images/avatars/' . $result->user->avatar)}}">
                        </div>
                        <div class="post__author-info">
                            <h5>By: {{$result->user->firstname}} {{$result->user->lastname}}</h5>
                            <small><?= date("M d, Y - H:i", strtotime($result['date_time'])) ?></small>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
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

@include ('partials/footer'); 
<!-- END OF FOOTER -->