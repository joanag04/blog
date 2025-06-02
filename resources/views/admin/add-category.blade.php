@include('../partials/header')

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Category</h2>
        @if ($errors->any())
           <div class="alert__message error">
              <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
              </ul>
          </div>
      @endif
        <form action="add-category" method="POST">
        @csrf
            <input type="text" name="title" value="" placeholder="Title">
            <textarea rows="4" name="description" value="" placeholder="Description"></textarea>
            <button type="submit" name="submit" class="btn">Add Category</button>
        </form>
    </div>
</section>
<!-- END OF ADD CATEGORY SECTION -->

@include('../partials/footer')