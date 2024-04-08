<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\applied;
use App\Models\job;
use App\Models\jobcategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function userdashboard()
    {
        $id = Auth::id();
        $userData = User::find($id);
        return view('index', compact('userData'));
    }

    public function jobseekerprofile()
    {
        $id = Auth::id();
        $userData = User::find($id);
        return view('frontend.pages.profile', compact('userData'));
    }


    public function jobseekerupdatepassword(Request $request)
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
            return redirect()->back()->with($notification);
        }

        // Update password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => "Password Changed Successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function jobseekerprofilestore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->profession = $request->profession;
        $data->exp = $request->exp;
        $data->address = $request->address;

        // Handle Resume Upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumeFileName = date('ymdHi') . '_' . $resume->getClientOriginalName();
            $resume->move(public_path('upload/resume'), $resumeFileName);
            $data->resume = $resumeFileName;
        }

        // Handle Profile Photo Upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            @unlink(public_path('upload/user_images/' . $data->photo));
            $photoFileName = date('ymdHi') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('upload/user_images'), $photoFileName);
            $data->photo = $photoFileName;
        }

        $data->save();

        $notification = array(
            'message' => "Profile Updated Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('jobseeker.profile')->with($notification);
    }




    public function jobseekerlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => "User Logout Successfully",
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }



    public function jobseekerpost()
    {
        $id = Auth::id();
        $userData = User::find($id);
        return view('frontend.pages.job_post', compact('userData'));
    }





    public function jobseekerjobstore(Request $request)
    {
        // Define validation rules
        $rules = [
            'job_id' => 'required',
            'user_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'profession' => 'required',
            'exp' => 'required',

        ];

        // Perform validation
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Send validation errors back to the view
                ->withInput();  // Retain the user input
        }

        // Handle resume file upload
        if ($request->hasFile('resume')) {
            $resumeFileName = time() . '_' . $request->file('resume')->getClientOriginalName();
            $request->file('resume')->move(public_path('upload/resume'), $resumeFileName);
        } else {
            // If resume file is not provided, you may handle it as per your application's requirement
            $resumeFileName = null;
        }

        // Create a new applied instance and save data
        $data = new applied();
        $data->job_id = $request->job_id;
        $data->user_id = $request->user_id;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->profession = $request->profession;
        $data->exp = $request->exp;
        $data->resume = $resumeFileName; // Save resume file name/path in database

        $data->save();

        // Notification for successful job post
        $notification = [
            'message' => "Job Post Successfully",
            'alert-type' => 'success'
        ];

        return redirect()->route('applied.job')->with($notification);
    }



    public function appliedjob()
    {

        return view('frontend.pages.applied_job');
    }


    public function delete($id)
    {
        $applied = applied::findOrFail($id);
        $applied->delete();

        $notification = array(
            'message' => 'Applied job deleted successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }





    public function jobsearch(Request $request)
    {
        $request->validate(['search' => "required"]);
        $item = $request->search;
        $jobCategory = jobcategory::orderBy('cat_name','ASC')->get();
        $jobs = job::where('cmp_name', 'LIKE', "%$item%")->get();
        return view('frontend.pages.job_search',compact('jobs','jobCategory','item'));
    }




    public function about(){
        return view('frontend.pages.about');
    }

    public function jobcategory(){
        return view('frontend.pages.job_category');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

}
