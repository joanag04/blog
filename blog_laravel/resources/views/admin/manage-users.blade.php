@include('../partials/header');
 
<section class="dashboard">
    @if (session('edit-user-success'))
    <div class="alert__message success container">{{ session('edit-user-success') }}</div>
    @elseif (session('delete-user-success'))
    <div class="alert__message success container">{{ session('delete-user-success') }}</div>
    @elseif (session('add-user-success'))
    <div class="alert__message success container">{{ session('add-user-success') }}</div>
    @endif
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="fi fi-br-angle-right"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fi fi-br-angle-left"></i></button>
        <aside>
                <ul>
                    <li>
                        <a href="/admin/add-post"><i class="fi fi-rc-pencil"></i>
                            <h5>Add Post</h5>
                        </a>
                    </li>
                    <li>
                        <a href="."><i class="fi fi-rr-blog-text"></i>
                            <h5>Manage Posts</h5>
                        </a>
                    </li>
                    <?php if( $user->first()->is_admin  == "1") : ?>
                    <li>
                        <a href="/admin/add-user"><i class="fi fi-rr-user-add"></i>
                            <h5>Add User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/manage-users" class="active"><i class="fi fi-rs-users"></i>
                            <h5>Manage Users</h5>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/add-category"><i class="fi fi-rs-edit"></i>
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/manage-categories"><i class="fi fi-rr-category-alt"></i>
                            <h5>Manage Category</h5>
                        </a>
                    </li>
                    <?php endif ?>
                </ul>
        </aside>
        <main>
        <?php if( $user->first()->is_admin  == "1") : ?>
            <h2>Manage Users</h2>
            @if (count($users) == 0)
            <div class="alert__message error">No users found</div>
            @else
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user['firstname'] }} {{ $user['lastname'] }}</td>
                        <td>{{ $user['username'] }}</td>
                        <td><a href="edit-user/{{ $user->id }}" class="btn sm">Edit</a></td>
                        <td><form action="delete-user/{{ $user->id }}"  method="POST">
                            @csrf 
                            @method('DELETE')
                            <button class="btn danger">Delete</button>
                        </form></td>
                        <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            <?php endif ?>
        </main>
    </div>
</section>
<!-- END OF DASHBOARD -->

@include('../partials/footer');