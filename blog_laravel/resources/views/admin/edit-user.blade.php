@include('../partials/header');

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit User</h2>
        @if ($errors->any())
           <div class="alert__message error">
              <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
              </ul>
          </div>
      @endif
        <form action="/admin/edit-user/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" value="" name="id">
            <input type="text" value="{{$user->firstname}}" name="firstname" placeholder="First Name">
            <input type="text" value="{{$user->lastname}}" name="lastname" placeholder="Last Name">
            <select name="is_admin">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" name="submit" class="btn">Update User</button>
        </form>
    </div>
</section>
<!-- END OF EDIT USER SECTION -->

@include('../partials/footer');
