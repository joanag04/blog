<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function deleteCategory(Category $category) {
        $category->delete();
        return redirect('admin/manage-categories')
        ->with('delete-category-success', 'Category deleted successfully!');
    }

    public function updateCategory(Category $category, Request $request) {

        $incomingFields = $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);

        $category->update($incomingFields);

        return redirect('admin/manage-categories')
            ->with('edit-category-success', 'Category updated successfully!');
    }

    public function editCategory(Category $category) {
        $categories = Category::all();
        $users = User::where('id', Auth::id())->get();
        return view('admin/edit-category', ['category' => $category, 'categories' => $categories, 'users' => $users]);
    }

    public function addCategory(Request $request) {
       
        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        
        Category::create($incomingFields);
        return redirect('admin/manage-categories')
        ->with('add-category-success', 'New category added successfully!');
    }
}
