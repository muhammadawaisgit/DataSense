<?php

namespace App\Http\Controllers\MasterAdmin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterAdmin;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('master-admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('master-admin')->attempt($credentials, $request->remember)) {
            return redirect()->route('master-admin.dashboard');
        }

        $user = MasterAdmin::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors([
                'email' => 'Wrong email',
            ]);
        }
        return redirect()->back()->withErrors([
            'password' => 'Wrong password',
        ]);
    }

    public function showSignupForm()
    {
        return view('master-admin.auth.signup');
    }

    public function signup(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:master_admins',
            'password' => 'required|confirmed',
        ]);
        $masterAdmin = MasterAdmin::create($credentials);
        
        if($masterAdmin) {
            return redirect()->route('master-admin.login')->with('success', 'Account created successfully');
        }
        return redirect()->back()->withErrors(['message' => 'Failed to create account']);
    }

    public function logout()
    {
        Auth::guard('master-admin')->logout();
        return redirect()->route('master-admin.login');
    }
}
