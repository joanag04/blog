<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function search(Request $request) {
        $search = $request->input('search');
        $results = Post::where('title', 'like', "%$search%")->get();
        $categories = Category::all();
        $users = USer::where('id', Auth::id())->get();

        return view('search', ['results' => $results, 'categories' => $categories, 'users' => $users]);
    }

    public function updatePost(Post $post, Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'thumbnail' => ['required','image', 'mimes:jpeg,png,jpg'],
            'is_featured' => 'required',
            'previous_thumbnail' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['author_id'] = Auth::id();
        $incomingFields['category_id'] = strip_tags($incomingFields['category_id']);
        $incomingFields['thumbnail'] = strip_tags($incomingFields['thumbnail']);

        if ($incomingFields['is_featured'] == 1) {
            Post::query()->update([
                'is_featured' => 0
            ]);

            //delete previous thumbnail
            if ($incomingFields['thumbnail']){
            $imageName = $incomingFields['previous_thumbnail'];
            $previous_thumbnail_path = public_path('images/thumbnails/') . $imageName;
            if ($previous_thumbnail_path) {
                unlink($previous_thumbnail_path);
             }
            }

            // store new thumbnail
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/thumbnails/'), $imageName);

            $incomingFields['thumbnail'] = $imageName;
            
            $post->update($incomingFields);

            return redirect('admin')
            ->with('edit-post-success', 'Post updated successfully!');
        } else {

            //delete previous thumbnail
            if ($incomingFields['thumbnail']){
                $imageName = $incomingFields['previous_thumbnail'];
                $previous_thumbnail_path = public_path('images/thumbnails/') . $imageName;
                if ($previous_thumbnail_path) {
                    unlink($previous_thumbnail_path);
                 }
                }
    
            // store new thumbnail
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/thumbnails/'), $imageName);
    
            $incomingFields['thumbnail'] = $imageName;
                
            $post->update($incomingFields);

            $post->update($incomingFields);

            return redirect('admin')
            ->with('edit-post-success', 'Post updated successfully!');
        }

        return redirect('/admin');
    }

    public function deletePost(Post $post) {
        $post->delete();
        return redirect('admin')
        ->with('delete-post-success', 'Post deleted successfully');
    }

    public function editPost(Post $post) {
        $categories = Category::all();
        $users = User::where('id', Auth::id())->get();
        return view('admin/edit-post', ['post' => $post, 'categories' => $categories, 'users' => $users]);
    }

    public function addPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'thumbnail' => ['required','image', 'mimes:jpeg,png,jpg'],
            'is_featured' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['author_id'] = Auth::id();
        $incomingFields['category_id'] = strip_tags($incomingFields['category_id']);
        
        if ($incomingFields['is_featured'] == 1) {
            Post::query()->update([
                'is_featured' => 0
            ]);

            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/thumbnails'), $imageName);

            $incomingFields['thumbnail'] = $imageName;

            Post::create($incomingFields); 
            return redirect('/admin')
            ->with('add-post-success', 'New post added successfully');
        } else {
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/thumbnails'), $imageName);

            $incomingFields['thumbnail'] = $imageName;

            Post::create($incomingFields);
            return redirect('/admin')
            ->with('add-post-success', 'New post added successfully');
        } 
    }
}

