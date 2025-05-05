<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,moderator,user',
            'status' => 'required|in:0,1,2,5',
            'phone' => 'nullable|string|max:20',
            'ic' => 'nullable|string|max:255',
            'address_1' => 'nullable|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'postcode' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }
}
