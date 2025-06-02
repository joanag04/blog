@include('../partials/header');

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Post</h2>
        @if ($errors->any())
           <div class="alert__message error">
              <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
              </ul>
          </div>
      @endif
        <form action="/admin/edit-post/{{$post->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{$post->thumbnail}}" name="previous_thumbnail">
            <input type="text" value="{{$post->title}}" name="title" placeholder="Title">
            <select name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->title }}</option>
                @endforeach
            </select>
            <textarea rows="10" name="body" placeholder="Body">{{ $post->body }}</textarea>
            <div class="form__control inline">
                <input type="hidden" name="is_featured" value="0">
                <input type="checkbox" name="is_featured" value="1">
                <label for="is_featured">Featured</label>
            </div>
            <div class="form__control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Update Post</button>
        </form>
    </div>
</section>
<!-- END OF EDIT POST SECTION -->

@include('../partials/footer');