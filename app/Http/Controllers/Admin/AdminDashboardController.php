<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AppearanceSetting;
use App\Models\FieldSettings;
use App\Models\CustomAdsSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::all();  // Get all user admins
        return view('admin.dashboard', compact('users'));
    }

    public function addUser()
    {
        return view('admin.add-user');
    }

    public function insertUser(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:user_admins,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_admins,email',
            'password' => 'required|min:6',
            'role' => 'required|in:Admin,User',
            'status' => 'required|in:active,inactive'
        ]);

        $user = User::create([
            'user_admin_id' => $validated['user_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
            'status' => $validated['status']
        ]);

        if($user) {
            return redirect()->route('admin.dashboard')->with('success', 'User added successfully');
        }
        return redirect()->back()->withErrors(['error' => 'Failed to add user']);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        if($user) {
            return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
        }
        return redirect()->back()->withErrors(['error' => 'Failed to update user']);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }

    public function appearanceSettings()
    {
        return view('admin.appearance-settings');
    }

    public function updateAppearanceSettings(Request $request)
    {
        $colors = $request->all();

        $user_admin_id = Auth::guard('user-admin')->check() ? Auth::guard('user-admin')->user()->id : session('user_admin_id');

        $update = AppearanceSetting::updateOrCreate(
            ['user_admin_id' => $user_admin_id],
            $colors
        );

        if($update) {

            $settings = \App\Models\AppearanceSetting::where('user_admin_id', $user_admin_id)->first();

        // Store settings in session
        session([
            'primaryColor' => $settings->primary_color ?? '#0075FF',
            'primaryGradientStart' => $settings->primary_gradient_start ?? '#4318FF',
            'primaryGradientEnd' => $settings->primary_gradient_end ?? '#9F7AEA',

            'sidebarBgStart' => $settings->sidebar_bg_start ?? '#060B26',
            'sidebarBgMid' => $settings->sidebar_bg_mid ?? '#070C27',
            'sidebarBgEnd' => $settings->sidebar_bg_end ?? '#1A1F37',
            'sidebarTextColor' => $settings->sidebar_text_color ?? '#FFFFFF',
            'sidebarMenuIconBg' => $settings->sidebar_menu_icon_bg ?? '#1A1F37',
            'sidebarMenuIconHover' => $settings->sidebar_menu_icon_hover ?? '#0075FF',
            'sidebarLineColor' => $settings->sidebar_line_color ?? '#E0E1E2',
            'sidebarMenuHoverBg' => $settings->sidebar_menu_hover_bg ?? '#1A1F37',

            'headerBgStart' => $settings->header_bg_start ?? '#060B26',
            'headerBgMid' => $settings->header_bg_mid ?? '#070C27',
            'headerBgEnd' => $settings->header_bg_end ?? '#1A1F37',
            'headerTextColor' => $settings->header_text_color ?? '#FFFFFF',
            'headerTextMuted' => $settings->header_text_muted ?? '#FFFFFF80',
            'headerIconHover' => $settings->header_icon_hover ?? '#FFFFFF1A',

            'bodyBgOverlay' => $settings->body_bg_overlay ?? '#060B26',
            'contentBgDark' => $settings->content_bg_dark ?? '#060B26',
            'contentBgLight' => $settings->content_bg_light ?? '#1A1F37',
            'contentBlur' => $settings->content_blur ?? '10px',

            'cardBgDark' => $settings->card_bg_dark ?? '#060B26',
            'cardBgLight' => $settings->card_bg_light ?? '#1A1F37',
            'cardBorder' => $settings->card_border ?? '#FFFFFF1A',
            'cardText' => $settings->card_text ?? '#FFFFFF',
            'cardTextMuted' => $settings->card_text_muted ?? '#FFFFFF80',

            'inputBg' => $settings->input_bg ?? '#060B26',
            'inputBorder' => $settings->input_border ?? '#FFFFFF1A',
            'inputText' => $settings->input_text ?? '#FFFFFF',
            'inputPlaceholder' => $settings->input_placeholder ?? '#FFFFFF80',

            'dangerBg' => $settings->danger_bg ?? '#DC3545',
            'dangerBorder' => $settings->danger_border ?? '#DC3545',
            'dangerText' => $settings->danger_text ?? '#DC3545',
        ]);
            return redirect()->back()->with('success', 'Appearance settings updated successfully');
        }
        return redirect()->back()->with('error', 'Failed to update appearance settings');
    }

    public function fieldsSettings()
    {
        return view('admin.fields-settings');
    }

    public function updateFieldsSettings(Request $request)
    {
        $fields = [
            'firstName', 'lastName', 'email', 'company', 'phone', 'mobile',
            'address', 'city', 'state', 'zipcode', 'birthMonth', 'birthDay',
            'physicalMailing', 'digitalMailing', 'loyaltyEnrollment'
        ];

        $settings = [];
        foreach ($fields as $field) {
            $settings[$field] = [
                'label' => $request->input('label_' . $field),
                'value' => $request->input($field . '_value'),
                'display' => $request->has($field . '_display'),
                'required' => $request->has($field . '_required')
            ];
        }

        $user_admin_id = Auth::guard('user-admin')->check() ? Auth::guard('user-admin')->user()->id : session('user_admin_id');

        $update = FieldSettings::updateOrCreate(
            ['user_admin_id' => $user_admin_id],
            ['fields_settings' => json_encode($settings)]
        );

        if($update) {
            return redirect()->back()->with('success', 'Field settings updated successfully');
        }
        return redirect()->back()->withErrors(['error' => 'Failed to update field settings']);
    }

    public function customAdsSettings()
    {
        return view('admin.custom-ads-settings');
    }

    public function updateCustomAdsSettings(Request $request)
    {
        $settings = [];

        // Handle up to 3 ads
        for ($i = 1; $i <= 3; $i++) {
            $settings["ad{$i}"] = [
                'link' => $request->input("ad{$i}_link"), 
                'display' => $request->has("ad{$i}_display")
            ];

            // Handle image upload if provided
            if ($request->hasFile("ad{$i}_image")) {
                $image = $request->file("ad{$i}_image");
                $extension = $image->getClientOriginalExtension();
                $baseImageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $imageName = $baseImageName . '.' . $extension;
                
                // Check if file exists and add increment number
                $counter = 1;
                while (file_exists(public_path('uploads/ads/' . $imageName))) {
                    $imageName = $baseImageName . '-' . $counter . '.' . $extension;
                    $counter++;
                }

                $image->move(public_path('uploads/ads'), $imageName);
                $settings["ad{$i}"]['image'] = 'uploads/ads/' . $imageName;
            } else {
                // Keep existing image if no new one uploaded
                $existingSettings = CustomAdsSettings::where('user_admin_id', Auth::guard('user-admin')->user()->id)->first();
                if ($existingSettings) {
                    $existingData = json_decode($existingSettings->ads_settings, true);
                    if (isset($existingData["ad{$i}"]['image'])) {
                        $settings["ad{$i}"]['image'] = $existingData["ad{$i}"]['image'];
                    }
                }
            }
        }

        $update = CustomAdsSettings::updateOrCreate(
            ['user_admin_id' => Auth::guard('user-admin')->user()->id],
            ['ads_settings' => json_encode($settings)]
        );

        if ($update) {
            return redirect()->back()->with('success', 'Custom ads settings updated successfully');
        }
        return redirect()->back()->withErrors(['error' => 'Failed to update custom ads settings']);
    }
}
