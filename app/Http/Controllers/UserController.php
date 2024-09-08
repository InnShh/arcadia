<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use File;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create', ['roles' => UserRole::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'user_role_id' => 'required|exists:user_roles,id',
            'password' => 'required|min:6',
            'image_file' => [
                Rule::requiredIf(function () use ($request) {
                    return $request->user_role_id == User::ROLE_VETERINARY;
                }),
                'image',
                'mimes:jpeg,jpg',
                'dimensions:min_width=400,max_width=400,min_height=400,max_height=400',
                'max:100'
            ],
        ], [
            'image_file.required' => 'An image file is required for veterinary. It is shown on site.',
        ]);

        $user = new User();
        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.jpg'; // . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            $user->avatar_image_path = 'images/' . $imageName;
        }
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->user_role_id = $validated['user_role_id'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect(route('users.index'))->with('success', 'User saved!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = UserRole::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'image_file' => [
                Rule::requiredIf(function () use ($request) {
                    return $request->user_role_id == User::ROLE_VETERINARY;
                }),
                'image',
                'mimes:jpeg,jpg',
                'dimensions:min_width=400,max_width=400,min_height=400,max_height=400',
                'max:100'
            ],
        ], [
            'image_file.required' => 'An image file is required for veterinary. It is shown on site.',
        ]);

        $user = User::findOrFail($id);
        if ($request->hasFile('image_file')) {
            $imageName = 'image_' . Str::uuid() . '.jpg'; // . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            if ($user->avatar_image_path && File::exists(public_path($user->avatar_image_path))) {
                File::delete(public_path($user->avatar_image_path));
            }
            $user->avatar_image_path = 'images/' . $imageName;
        }
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();
        return redirect('/users')->with('success', 'User updated!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User deleted!');
    }
}
