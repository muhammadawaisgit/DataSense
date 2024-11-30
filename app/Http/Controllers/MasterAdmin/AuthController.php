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
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
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
        MasterAdmin::create($credentials);
        return redirect()->route('master-admin.login')->with('success', 'Account created successfully');
    }
}
