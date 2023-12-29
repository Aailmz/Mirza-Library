<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'login_as' => 'required|in:admin,siswa',
        ]);

        // Use Hash::make() to securely hash the password
        $hashedPassword = Hash::make($request->input('password'));

        // Create a new user based on the selected option
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'role_status' => $request->input('login_as'),
        ]);

        // Handle additional logic if needed

        return redirect()->route('login');
    }
}
