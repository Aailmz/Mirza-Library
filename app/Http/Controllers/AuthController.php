<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Siswa;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->login_as === "none") {
            return redirect()->route('login');
        }

        if ($request->login_as === "admin") {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('dashboard_admin');
            }

            return redirect()->route('login');

        } elseif ($request->login_as === "siswa") {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ]);
        
            if (Auth::guard('siswa')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard_siswa');
            }
        
            return redirect()->route('login');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role_status' => 'required|in:admin,siswa',
        ]);

        $hashedPassword = Hash::make($request->input('password'));

        if ($request->input('role_status') === 'admin') {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $hashedPassword,
                'role_status' => $request->input('role_status'),
            ]);
        } elseif ($request->input('role_status') === 'siswa') {
            Siswa::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $hashedPassword,
                'kelas' => $request->input('kelas'),
                'role_status' => $request->input('role_status'),
            ]);
        }

        return redirect()->route('login');
    }

}