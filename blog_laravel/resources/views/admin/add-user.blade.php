@include('../partials/header');

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add User</h2>
        @if ($errors->any())
           <div class="alert__message error">
              <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
              </ul>
          </div>
      @endif
        <form action="add-user" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="text" name="firstname" value="" placeholder="First Name">
            <input type="text" name="lastname" value="" placeholder="Last Name">
            <input type="text" name="username" value="" placeholder="Username">
            <input type="email" name="email" value="" placeholder="Email">
            <input type="password" name="password" value="" placeholder="Create password">
            <input type="password" name="confirmpassword" value="" placeholder="Confirm password">
            <select name="is_admin">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form__control">
                <label for="avatar">Add Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Add User</button>
        </form>
    </div>
</section>
<!-- END OF ADD USER SECTION -->

@include('../partials/footer');