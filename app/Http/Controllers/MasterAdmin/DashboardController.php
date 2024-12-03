<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Controllers\Controller;
use App\Models\UserAdmin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userAdmins = UserAdmin::all();  // Get all user admins
        return view('master-admin.dashboard', compact('userAdmins'));
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
            'role' => 'required|in:Admin',
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

    public function editUserAdmin($id)
    {
        $userAdmin = UserAdmin::find($id);
        return view('master-admin.edit-user', compact('userAdmin'));
    }

    public function updateUserAdmin(Request $request, $id)
    {
        $userAdmin = UserAdmin::find($id);
        $userAdmin->update($request->all());
        if ($userAdmin) {
            return redirect()->route('master-admin.dashboard')->with('success', 'User admin updated successfully');
        } else {
            return redirect()->route('master-admin.edit-user', $id)->with('error', 'User admin update failed');
        }
    }

    public function deleteUserAdmin($id)
    {
        $userAdmin = UserAdmin::find($id);
        $userAdmin->delete();
        return redirect()->route('master-admin.dashboard')->with('success', 'User admin deleted successfully');
    }
}
