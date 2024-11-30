<?php

namespace App\Http\Controllers\MasterAdmin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('master-admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('master-admin')->attempt($credentials, $request->remember)) {
            return redirect()->route('master-admin.dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
}
