<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Hash;
use Illuminate\Http\Request;

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
        ]);

        $user = new User([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'user_role_id' => $validated['user_role_id'],
            'password' => Hash::make($validated['password']),
        ]);

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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
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
