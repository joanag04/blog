<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function updateProfile(Request $request, User $user) {
        $incomingFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'is_admin' => 'required',
            'avatar' => ['required','image', 'mimes:jpeg,png,jpg'],
            'previous_avatar' => 'required'
        ]);

        $incomingFields['firstname'] = strip_tags($incomingFields['firstname']);
        $incomingFields['lastname'] = strip_tags($incomingFields['lastname']);

        //delete previous avatar
        if ($incomingFields['avatar']){
            $imageName = $incomingFields['previous_avatar'];
            $previous_avatar_path = public_path('images/avatars/') . $imageName;
            if ($previous_avatar_path) {
                unlink($previous_avatar_path);
            }
        }

        // work on avatar
        // rename avatar 
        $imageName = time() . '.' . $request->avatar->extension();
        $request->avatar->move(public_path('images/avatars/'), $imageName);

        $incomingFields['avatar'] = $imageName;

        $user->update($incomingFields);

        return redirect('profile');
    }

    public function editProfile(Request $request) {
        $categories = Category::all();
        $user = User::where('id', Auth::id())->get();
        $users = User::all();
        return view('edit-profile', ['categories' => $categories, 'users' => $users, 'user' => $user]);
    }

    public function deleteUser(User $user) {
        $user->delete();
        return redirect('admin/manage-users')
        ->with('delete-user-success', 'User deleted successfully');
    }

    public function updateUser(User $user, Request $request) {
        $incomingFields = $request->validate([
            'firstname'=> 'required',
            'lastname' => 'required',
            'is_admin' => 'required'
        ]);

        $incomingFields['firstname'] = strip_tags($incomingFields['firstname']);
        $incomingFields['lastname'] = strip_tags($incomingFields['lastname']);
        $incomingFields['is_admin'] = strip_tags($incomingFields['is_admin']);

        $user->update($incomingFields);

        return redirect('admin/manage-users')
        ->with('edit-user-success', 'User updated successfully!');
    }

    public function editUser(User $user) {
        $users = User::where('id', Auth::id())->get();
        $categories = Category::all();
        return view('admin/edit-user', ['user' => $user, 'users' => $users, 'categories' => $categories]);
    }

    public function addUser(Request $request) {

        $incomingFields = $request->validate([
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required'],
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'max:200'],
            'confirmpassword' => ['required', 'max:200'],
            'is_admin' => ['required'],
            'avatar' => ['required','image', 'mimes:jpeg,png,jpg']
            
        ]);

        if ($incomingFields['password'] == $incomingFields['confirmpassword']) {
            $incomingFields['password'] = bcrypt($incomingFields['password']);

            User::create($incomingFields);
            return redirect('admin/manage-users')
            ->with('add-user-success', 'New user added successfully');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
  
    public function signin(Request $request) {

        $incomingFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['username' => $incomingFields['username'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return redirect('signin')
            ->with('signin', 'Username or password incorrect');
        }
    }

    public function signup(Request $request) {

        $incomingFields = $request->validate([
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required'],
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'max:200'],
            'confirmpassword' => ['required', 'max:200'],
            'avatar' => ['required','image', 'mimes:jpeg,png,jpg']
            
        ]);

        if ($incomingFields['password'] == $incomingFields['confirmpassword']) {
            $incomingFields['password'] = bcrypt($incomingFields['password']);

            // is_admin field default value is 0
            $incomingFields['is_admin'] = 0;

            // work on avatar
            // rename avatar 
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/avatars'), $imageName);

            $incomingFields['avatar'] = $imageName;

            User::create($incomingFields);

            return redirect('signin');
        } else {
            return redirect('signup')
            ->with('signup', 'Passwords do not match');
        }
    }
}
