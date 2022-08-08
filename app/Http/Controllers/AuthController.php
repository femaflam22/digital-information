<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // public function register(Request $request)
    // {
    //     $user = new User();
    //     $user->name = "Admin Wikrama";
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->save();
    // }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        $users = $request->only('email', 'password');
        if (Auth::attempt($users)) {
            return redirect()->route('index-item');
        } else {
            return back()->with('failed', "Gagal login, periksa dan coba lagi!");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
