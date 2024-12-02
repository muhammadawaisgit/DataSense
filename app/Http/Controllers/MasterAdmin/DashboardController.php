<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('master-admin.dashboard');
    }

    public function addUser()
    {
        return view('master-admin.add-user');
    }

    public function insertUserAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_admins,email',
            'password' => 'required|min:6',
            'role' => 'required|in:user-admin',
            'status' => 'required|in:active,inactive'
        ]);

        $userAdmin = \App\Models\UserAdmin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
            'status' => $validated['status']
        ]);

        if ($userAdmin) {
            return redirect()->route('master-admin.dashboard')->with('success', 'User admin created successfully');
        } else {
            return redirect()->route('master-admin.add-user')->with('error', 'User admin creation failed');
        }
    }
}
