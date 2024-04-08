<?php

namespace App\Http\Controllers;

use App\Models\applied;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class EmployerController extends Controller
{
    public function employerdashboard()
    {
        return view('employer.index');
    }


    public function becomeemployer()
    {
        return view('auth.become_employer');
    }


    public function employerlogin()
    {
        return view('employer.employer_login');
    }

    public function employerProfile()
    {
        $id = Auth::user()->id;
        $employerData = User::find($id);
        return view('employer.employer_profile_view', compact('employerData'));
    }

    public function employerlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/employer/login');
    }



    public function employerprofilestore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->bussiness_name = $request->bussiness_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->designation = $request->designation;


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/employer_images/' . $data->photo));
            $filename = date('ymdHi')  . $file->getClientOriginalName();
            $file->move(public_path('upload/employer_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => "employer Profile Updated Successfull",
            'alert-type' => 'success'
        );
        return redirect()->route('employer.profile')->with($notification);
    }



    public function employerchangepassword()
    {
        return view('employer.employer_change_password');
    }


    public function employerupdatepassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Verify old password
        if (!Hash::check($request->old_password, auth()->user()->password)) {

            $notification = array(
                'message' => "Old Password doesn't Match!!",
                'alert-type' => 'danger'
            );
            return redirect()->route('employer.change.password')->with($notification);
        }

        // Update password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => "Employer Password Changed Successfull",
            'alert-type' => 'success'
        );
        return redirect()->route('employer.change.password')->with($notification);
        // return back()->with('status', 'Password Changed Successfully');
    }




    public function employerregister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username, // Assuming you have a field 'username' in your user table
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'employer',
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Employer Registered Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('employer.login')->with($notification);
    }


    public function appliedjobseeker()
    {

        if (Auth::check() && Auth::user()->role == 'employer') {
            $jobs = applied::latest()->get();
            return view('employer.job.applied_jobseeker', compact('jobs'));
        } else {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }
    }
}
