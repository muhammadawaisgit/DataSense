<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAdmin;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        // $userAdmins = UserAdmin::all();  // Get all user admins
        return view('admin.dashboard');
    }

    public function appearanceSettings()
    {
        return view('admin.appearance-settings');
    }
}
