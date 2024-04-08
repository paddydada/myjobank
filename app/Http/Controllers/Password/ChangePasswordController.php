<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function userchangepassword()
    {
        return view('admin.password.user_change_password');
    }


    public function userupdatepassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|confirmed',
        ]);

        // Update password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => "Password Changed Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('employer.all')->with($notification);
    }

}
