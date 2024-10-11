<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('admin.users.create');
    }

    // Store a newly created user
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }
        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'تم إنشاء المستخدم بنجاح.');
    }

    // Display the specified user
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update the specified user
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if (empty($data['password'])) {
            $data = Arr::except($data, ['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'تم تحديث المستخدم بنجاح.');
    }

    // Remove the specified user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'تم حذف المستخدم بنجاح.');
    }
}
