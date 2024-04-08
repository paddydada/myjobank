<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\australia;
use App\Models\canada;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function admindashboard()
    {

        return view('admin.index');
    }

    public function adminlogin()
    {
        return view('admin.admin_login');
    }



    public function adminprofile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }






    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->designation = $request->designation;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('ymdHi')  . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename; // Fixed this line to set the photo attribute
        }

        $data->save();

        $notification = array(
            'message' => "Admin Profile Updated Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }



    public function addemployer()
    {

        return view('admin.employer.employer_add');
    }



    public function adminchangepassword()
    {
        return view('admin.admin_change_password');
    }


    public function adminupdatepassword(Request $request)
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
            return redirect()->route('admin.change.password')->with($notification);
        }

        // Update password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => "Admin Password Changed Successfull",
            'alert-type' => 'success'
        );
        return redirect()->route('admin.change.password')->with($notification);
        // return back()->with('status', 'Password Changed Successfully');
    }




    public function employerstore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'your_self' => 'required',
            'username' => 'required|unique:users',
            'name' => 'required',
            'bussiness_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'designation' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        // If validation fails, return back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, create and save the user
        $user = new User();
        $user->your_self = $request->your_self;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->bussiness_name = $request->bussiness_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->designation = $request->designation;
        $user->password = bcrypt($request->password);
        $user->role = 'employer'; // Assuming role is stored in the same table

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('upload/employer_images'), $imageName);
            $user->photo = $imageName;
        }

        $user->save();

        $notification = array(
            'message' => "Admin employer created successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('employer.all')->with($notification);
    }

    public function allemployer()
    {
        $employers = User::where('role', 'employer')->latest()->get();
        return view('admin.employer.employer_all', compact('employers'));
    }




      public function AustraliaLeads(){
         $leads = australia::latest()->get();
        return view('admin.leads.australia_leads', compact('leads'));
    }
    

  public function CanadaLeads(){
         $leads = canada::latest()->get();
        return view('admin.leads.canada_leads', compact('leads'));
    }
    



    public function editemployer($id)
    {
        $employer = user::findOrFail($id);
        return view('admin.employer.employer_edit', compact('employer'));
    }




    public function employerupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
            'your_self' => 'required',
            'name' => 'required',
            'bussiness_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'designation' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $employer = User::findOrFail($request->id);
            $employer->update($request->except('_token', 'id', 'photo'));

            if ($request->hasFile('photo')) {
                $imageName = time() . '.' . $request->file('photo')->extension();
                $request->file('photo')->move(public_path('upload/employer_images'), $imageName);
                $employer->photo = $imageName;
                $employer->save();
            }

            return redirect()->route('employer.all')->with([
                'message' => 'Admin employer updated successfully',
                'alert-type' => 'success'
            ]);
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Error updating employer: ' . $e->getMessage());
        }
    }


    public function employerdelete($id)
    {
        $employer = User::findOrFail($id);
        $imgPath = public_path('upload/employer_images/' . $employer->employer_image);

        if (file_exists($imgPath) && is_file($imgPath)) {
            unlink($imgPath); // Delete the employer image file
        }

        // Delete the employer record
        $employer->delete();

        $notification = [
            'message' => 'Employer Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    // Job Seeker logics


    public function addjobseeker()
    {
        return view('admin.jobseeker.jobseeker_add');
    }


    public function jobseekerstore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'designation' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        // If validation fails, return back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, create and save the user
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->designation = $request->designation;
        $user->password = bcrypt($request->password);
        $user->role = 'job_seeker'; // Assuming role is stored in the same table

        $user->save();

        $notification = array(
            'message' => "Jobseeker created successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('jobseeker.all')->with($notification);
    }






    public function jobseekerall()
    {
        $jobseeker = User::where('role', 'job_seeker')->latest()->get();
        return view('admin.jobseeker.jobseeker_all', compact('jobseeker'));
    }










    public function jobseekerdelete($id)
    {
        $jobseeker = User::findOrFail($id);
        $imgPath = public_path('upload/jobseeker_images/' . $jobseeker->jobseeker_image);

        if (file_exists($imgPath) && is_file($imgPath)) {
            unlink($imgPath); // Delete the employer image file
        }

        // Delete the employer record
        $jobseeker->delete();

        $notification = [
            'message' => 'Jobseeker Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }


    public function jobseekeredit($id)
    {
        $jobseeker = User::findOrFail($id);
        return view('admin.jobseeker.jobseeker_edit', compact('jobseeker'));
    }



    public function jobseekerupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'designation' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $jobseeker = User::findOrFail($request->id);
            $jobseeker->update($request->except('_token', 'id'));

            $notification = [
                'message' => 'Admin jobseeker updated successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('jobseeker.all')->with($notification);
        } catch (\Exception $e) {
            // Handle exceptions (e.g., if user is not found)
            $notification = [
                'message' => 'Failed to update jobseeker. Please try again.',
                'alert-type' => 'error'
            ];

            return redirect()->route('jobseeker.all')->with($notification);
        }
    }




// employer active

   public function employeractive($id)
    {
        User::findOrfail($id)->update(['status' => 'active']);
        $notification = array(
            'message' => 'Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

// employer inactive

    public function employerinactive($id)
    {
        User::findOrfail($id)->update(['status' => 'inactive']);
        $notification = array(
            'message' => 'Inactive',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


public function applied(){
    return view('admin.applied.applied_user_list');
}





// jobseeker active

    public function jobseekeractive($id)
    {
        User::findOrfail($id)->update(['status' => 'active']);
        $notification = array(
            'message' => 'Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
// jobseeker inactive


    public function jobseekerinactive($id)
    {
        User::findOrfail($id)->update(['status' => 'inactive']);
        $notification = array(
            'message' => 'Inactive',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }




    // Admin Logout

    public function adminlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
