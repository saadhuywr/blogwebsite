<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('backend.auth.register');
    }

    public function registeruser(Request $request)
    {

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = new User();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // Check karen agar koi user exist karta hai ya nahi
        if (User::count() === 0) {
            $user->role = "admin";
        } else {
            $user->role = "user";  // Baaki users normal user honge
        }

        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
