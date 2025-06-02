@include('partials/header');
// END OF NAV

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Profile</h2>
        @if ($errors->any())
           <div class="alert__message error">
              <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
              </ul>
          </div>
      @endif
        <form action="/edit-profile/{{$user->first()->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{$user->first()->avatar}}" name="previous_avatar">
            <input type="text" value="{{$user->first()->firstname}}" name="firstname" placeholder="First Name">
            <input type="text" value="{{$user->first()->lastname}}" name="lastname" placeholder="Last Name">
            <select name="is_admin">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form__control">
                <label for="avatar">Update Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Update Profile</button>
        </form>
    </div>
</section>
<!-- END OF EDIT PROFILE FORM -->

@include('partials/footer');
<!-- END OF FOOTER -->