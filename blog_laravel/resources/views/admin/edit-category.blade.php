@include('../partials/header');

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Category</h2>
        @if ($errors->any())
           <div class="alert__message error">
              <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
              </ul>
          </div>
      @endif
        <form action="/admin/edit-category/{{ $category->id }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" value="" name="id">
            <input type="text" value="{{$category->title}}" name="title" placeholder="Title">
            <textarea rows="4" name="description" placeholder="Description">{{$category->description}}</textarea>
            <button type="submit" name="submit" class="btn">Update Category</button>
        </form>
    </div>
</section>
<!-- END OF EDIT CATEGORY SECTION -->

@include('../partials/footer');