<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

Route::get('/', function () {
    $posts = Post::whereNot('is_featured', 1)->get();
    $featured_post = Post::where('is_featured', 1)->get();
    $categories = Category::all();
    $users = User::where('id', Auth::id())->get();
    return view('home', ['posts' => $posts, 'categories' => $categories, 'featured_post' => $featured_post, 'users' => $users]);});

Route::get('/about', function () { 
    $users = User::where('id', Auth::id())->get();
    $categories = Category::all();
    return view('about', ['users' => $users, 'categories' => $categories]);});

Route::get('/services', function () { 
    $users = User::where('id', Auth::id())->get();
    $categories = Category::all();
    return view('services', ['users' => $users, 'categories' => $categories]);});

Route::get('/contact', function () { 
    $users = User::where('id', Auth::id())->get();
    $categories = Category::all();
    return view('contact', ['users' => $users, 'categories' => $categories]);});

Route::get('/profile', function () { 
    $users = User::where('id', Auth::id())->get();
    $posts = Post::where('author_id', Auth::id())->get();
    $categories = Category::all();
    return view('profile', ['users' => $users, 'posts' => $posts, 'categories' => $categories]);});

Route::get('/signin', function () { 
    $categories = Category::all();
    $users = User::where('id', Auth::id())->get();
    return view('signin', ['categories' => $categories, 'users' => $users]);});

Route::post('/signin', [UserController::class, 'signin']);

Route::get('/signup', function () { 
    $categories = Category::all();
    return view('signup', ['categories' => $categories]);});
Route::post('/signup', [UserController::class, 'signup']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/blog', function () { 
    $posts = Post::all();
    $categories = Category::all();
    $users = User::where('id', Auth::id())->get();
    return view('blog', ['posts' => $posts, 'categories' => $categories, 'users' => $users]);});

// Admin dashboard routes
Route::get('/admin', function () { 
    if (Auth::check()) {
        $posts = Auth::user()->usersPosts()->latest('date_time')->get();
    }
    $user = User::where('id', Auth::id())->get();
    $users = User::where('id', Auth::id())->get();
    $categories = Category::all();
    $user_posts = Post::where('author_id', Auth::id())->get();
    //$posts = Post::where('author_id', Auth::id())->get();
    return view('admin/manage-posts', ['posts' => $posts, 'users' => $users, 'categories' => $categories, 'user' => $user, 'user_posts' => $user_posts]); });

Route::get('/admin/add-post', function () { 
    $categories = Category::all();
    $users = User::where('id', Auth::id())->get();
    return view('admin/add-post', ['categories' => $categories, 'users' => $users]); });

Route::post('/admin/add-post', [PostController::class, 'addPost']);

Route::get('/admin/add-user', function () { 
    $categories = Category::all();
    $users = User::where('id', Auth::id())->get();
    return view('admin/add-user', ['categories' => $categories, 'users' => $users]); });
Route::post('/admin/add-user', [UserController::class, 'addUser']);

Route::get('/admin/manage-users', function () { 
    $users = User::all();
    $user = User::where('id', Auth::id())->get();
    $categories = Category::all();
    return view('admin/manage-users', ['user' => $user, 'categories' => $categories, 'users' => $users]); });

Route::get('/admin/add-category', function () { 
    $categories = Category::all();
    $users = User::where('id', Auth::id())->get();
    return view('admin/add-category', ['categories' => $categories, 'users' => $users]);});
Route::post('/admin/add-category', [CategoryController::class, 'addCategory']);

Route::get('/admin/manage-categories', function () { 
    $user = User::where('id', Auth::id())->get();
    $users = User::all();
    $categories = Category::all();
    return view('admin/manage-categories', ['categories' => $categories, 'users' => $users, 'user' => $user]); });

// User operations routes
Route::get('admin/edit-user/{user}', [UserController::class, 'editUser']);
Route::put('admin/edit-user/{user}',  [UserController::class, 'updateUser']);
Route::delete('admin/delete-user/{user}',  [UserController::class, 'deleteUser']);

// Category operations routes
Route::get('admin/edit-category/{category}', [CategoryController::class, 'editCategory']); 
Route::put('admin/edit-category/{category}', [CategoryController::class, 'updateCategory']);
Route::delete('admin/delete-category/{category}', [CategoryController::class, 'deleteCategory']);

// Post operations routes
Route::get('admin/edit-post/{post}', [PostController::class, 'editPost']);
Route::put('admin/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('admin/delete-post/{post}', [PostController::class, 'deletePost']);


Route::get('category-posts/{category}', function (string $category) { 
    $posts = Post::where('category_id', $category)->get();
    $categories_title = Category::where('id', $category)->get();
    $categories = Category::all();
    $users = User::where('id', Auth::id())->get();
    return view('category-posts', ['posts' => $posts, 'categories' => $categories, 'users' => $users, 'categories_title' => $categories_title]);});

Route::get('post/{post}', function (string $post) { 
    $posts = Post::where('id', $post)->get();
    $categories = Category::all();
    $users = User::where('id', Auth::id())->get();
    return view('post', ['posts' => $posts, 'categories' => $categories, 'users' => $users]);});

Route::get('/search', [PostController::class, 'search'])->name('search');

Route::get('/partials/footer', function () {
    $categories = Category::all();
    return view('admin/footer', ['categories' => $categories]);
});

Route::get('/partials/header', function () {
    $users = User::where('id', Auth::id())->get();
    return view('partials/header', ['users' => $users]);
});

Route::get('/edit-profile/{user}', [UserController::class, 'editProfile']);
Route::put('/edit-profile/{user}', [UserController::class, 'updateProfile']);