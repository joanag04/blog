@include('../partials/header');

<section class="dashboard">
    @if (session('edit-category-success'))
    <div class="alert__message success container">{{ session('edit-category-success') }}</div>
    @elseif (session('delete-category-success'))
    <div class="alert__message success container">{{ session('delete-category-success') }}</div>
    @elseif (session('add-category-success'))
    <div class="alert__message success container">{{ session('add-category-success') }}</div>
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
                        <a href="/admin/manage-users"><i class="fi fi-rs-users"></i>
                            <h5>Manage User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/add-category"><i class="fi fi-rs-edit"></i>
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/manage-categories" class="active"><i class="fi fi-rr-category-alt"></i>
                            <h5>Manage Category</h5>
                        </a>
                    </li>
                   <?php endif ?> 
                </ul>
        </aside>
        <main>
        <?php if( $user->first()->is_admin  == "1") : ?>
            <h2>Manage Categories</h2>
            @if (count($categories) == 0)
            <div class="alert__message error"><?= "No categories found" ?></div>
            @else
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <!--php while ($category = mysqli_fetch_assoc($categories)) : ?>-->
                    @foreach($categories as $category)  
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td><a href="edit-category/{{ $category->id }}" class="btn sm">Edit</a></td>
                        <td><form action="delete-category/{{ $category->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn danger">Delete</button>
                        </form></td>
                    </tr>
                    @endforeach
                    <!--php endwhile -->
                </tbody>
            </table>
            @endif
        </main>
        <?php endif ?> 
    </div>
</section>
<!-- END OF DASHBOARD -->

@include('../partials/footer');