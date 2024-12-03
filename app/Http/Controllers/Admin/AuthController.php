<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAdmin;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('user-admin')->attempt($credentials, $request->remember)) {
            return redirect()->route('admin.dashboard');
        }

        $admin = UserAdmin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->withErrors([
                'email' => 'Wrong email',
            ]);
        }
        return redirect()->back()->withErrors([
            'password' => 'Wrong password',
        ]);
    }
}
