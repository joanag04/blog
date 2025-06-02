@include('partials/header');

<section class="profile">
    @foreach($users as $user)
        <div class="container profile__container">
            <div class="profile__image">
                <img src="{{asset('images/avatars/' . $user->avatar)}}" alt="{{ $user->firstname }}">
            </div>
            <div class="user__info">
                <h2 class="user__name"><a href="">{{$user->firstname}} {{$user->lastname}}</a></h2>
                <p class="user__info__username">
                    {{$user->username}}
                </p>
                <p class="user__info__email">
                    {{$user->email}}
                </p>
                <a href="edit-profile/{{$user->id}}" class="edit__profile__button">Edit Profile</a>
            </div>
        </div>
    @endforeach
    </section>
    <!-- END OF SECTION WITH PROFILE INFO -->

<section class="label__section">
    <div class="container label__section-container">
    <h3>Your Posts</h3>
    </div>
</section>
<!-- END OF LABEL SECTION -->

<section class="posts">
    @if (count($posts) == 0)
    <div class="alert__message error">No posts found</div>
    @else
    <div class="container posts__container">
    @foreach($posts as $post)
        <article class="post">
            <div class="post__thumbnail">
                <img src="{{asset('images/thumbnails/' . $post->thumbnail)}}">
            </div>
            <div class="post__info">
                <?php 
                // fetch category from categories table using category_id of post
                ?>
                <a href="category-posts/{{$post->category->id}}" class="category__button">{{$post->category->title}}</a>
                <h3 class="post__title">
                    <a href="post/{{$post->id}}">{{$post->title}}</a>
                </h3>
                <p class="post__body">
                    {{$post->body}}
                </p>
                <div class="post__author">
                <?php 
                // fetch author from users table using author_id
                ?>
                    <div class="post__author-avatar">
                        <img src="{{asset('images/avatars/' . $post->user->avatar)}}">
                    </div>
                    <div class="post__author-info">
                        <h5>By: {{$user->firstname}} {{$user->lastname}}</h5>
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

@include('partials/footer');