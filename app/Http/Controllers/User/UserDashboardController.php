<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\FieldSettings;
use App\Models\CustomAdsSettings;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function searchResult(Request $request)
    {
        $search = $request->input('search');
        $customers = Customer::where('firstName', 'like', '%'.$search.'%')->orWhere('lastName', 'like', '%'.$search.'%')->orWhere('email', 'like', '%'.$search.'%')->get();
        return view('user.search-result', compact('customers'));
    }

    public function customerDetails($id)
    {
        $fieldSettings = FieldSettings::where('user_admin_id', session('user_admin_id'))->first();
        $custom_ads = CustomAdsSettings::where('user_admin_id', session('user_admin_id'))->first();
        $customer = Customer::find($id);
        return view('user.customer-details', compact('customer', 'fieldSettings', 'custom_ads'));
    }

    public function editCustomer($id)
    {
        $fieldSettings = FieldSettings::where('user_admin_id', session('user_admin_id'))->first();
        $customer = Customer::find($id);
        return view('user.customer-details-edit', compact('customer', 'fieldSettings'));
    }

    public function updateCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);
        $update = $customer->update($request->all());
        if($update) {
            return redirect()->route('user.edit-customer', $id)->with('success', 'Customer updated successfully');
        } else {
            return redirect()->route('user.edit-customer', $id)->withErrors('Failed to update customer');
        }
    }
}

