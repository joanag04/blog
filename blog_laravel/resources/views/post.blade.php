@include('partials/header');

<section class="singlepost">
    @foreach ($posts as $post)
    <div class="container singlepost__container">
        <h2>{{$post->title}}</h2>
        <div class="post__author">
            <div class="post__author-avatar">
                <img src="{{asset('images/avatars/' . $post->user->avatar)}}">
            </div>
            <div class="post__author-info">
                <h5>{{$post->user->firstname}} {{$post->user->lastname}}</h5>
                <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
            </div>
        </div>
        <div class="singlepost__thumbnail">
            <img src="{{asset('images/thumbnails/' . $post->thumbnail)}}">
        </div>
            <p>
            {{$post->body}}
            </p>
        </div>
    @endforeach
</section>
<!-- END OF SINGLE POST SECTION -->

@include('partials/footer');
