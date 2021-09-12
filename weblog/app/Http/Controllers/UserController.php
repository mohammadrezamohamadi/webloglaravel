<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("users.index")
            ->with('users', $users);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = User::query()->create([
            'name' => $request->get('name', 'NO_NAME'),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()
            ->route('user.index')
            ->with('name', $user->name);
    }
}
