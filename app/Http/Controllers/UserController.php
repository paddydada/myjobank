<?php

namespace App\Http\Controllers;
use App\Mail\FormSubmissionNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\applied;
use App\Models\job;
use App\Models\jobcategory;
use App\Models\contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\landing;
use App\Models\australia;
use App\Models\canada;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    
public function jobscategory(Request $request, $cat_name){
    // Fetch jobs based on the category name
    $jobs = job::where('cat_name', $cat_name)
                ->where('status', 'active')
                ->orderBy('id', 'asc')
                ->get();

    // Pass the jobs and category name to the view
    return view('frontend.pages.jobs_category', compact('jobs', 'cat_name'));
}
    
    // ---------------------------------------------------------------------
    
    
    public function australia(){
    Mail::raw('This is a test email.', function ($message) {
    $message->to('recipient@example.com')
            ->subject('Test Email');
});
die;
        return view('frontend.pages.australia');
    }
    
      public function australiaForm(Request $request)
    {
            $validatedData = $request->validate([
    'name' => 'required|string|max:255',
    'email' => [
        'required',
        'email',
        'max:255',
        Rule::unique('australias')->ignore($request->id),
    ],
    'phone' => [
        'required',
        'string',
        'max:10',
        Rule::unique('australias')->ignore($request->id),
    ],
    'resume' => 'required|file|max:10240', // Example file size limit: 10MB
    'subject' => 'required|string',
]);

       if ($request->hasFile('resume')) {
    $resumeFile = $request->file('resume');
    $filename = date('ymdHi') . '_' . $resumeFile->getClientOriginalName();
    $resumeFile->move(public_path('australia_resume'), $filename); // Change the path to save inside 'australia_resume' folder
}

        // Store the validated data into the database
        $formData = new australia();
        $formData->name = $validatedData['name'];
        $formData->email = $validatedData['email'];
        $formData->phone = $validatedData['phone'];
        $formData->resume = $filename; // Store the filename in the database
        $formData->subject = $validatedData['subject'];
        $formData->save();

       // Send email notification
        Mail::to($validatedData['email'])
            ->send(new FormSubmissionNotification($formData));

        // Send email to contact@visanswer.com
        Mail::to('contact@visanswer.com')
            ->send(new FormSubmissionNotification($formData));

        $notification = [
            'message' => 'Form Submitted successfully',
            'alert-type' => 'success'
        ];

 
        return redirect()->route('thankyou')->with($notification);
    }

    
    //   public function mail(){
    //     return view('mail');
    // }
    

   
    
        public function Thankyou(){
        return view('frontend.pages.thank_you');
    }
    

    
    
    
      public function canada(){
        return view('frontend.pages.canada');
    }
    
    
    
    
     
      public function canadaForm(Request $request)
    {
        $validatedData = $request->validate([
    'name' => 'required|string|max:255',
    'email' => [
        'required',
        'email',
        'max:255',
        Rule::unique('canadas')->ignore($request->id),
    ],
    'phone' => [
        'required',
        'string',
        'max:10',
        Rule::unique('canadas')->ignore($request->id),
    ],
    'resume' => 'required|file|max:10240', // Example file size limit: 10MB
    'subject' => 'required|string',
]);

       if ($request->hasFile('resume')) {
    $resumeFile = $request->file('resume');
    $filename = date('ymdHi') . '_' . $resumeFile->getClientOriginalName();
    $resumeFile->move(public_path('canada_resume'), $filename); // Change the path to save inside 'australia_resume' folder
}

        // Store the validated data into the database
        $formData = new canada();
        $formData->name = $validatedData['name'];
        $formData->email = $validatedData['email'];
        $formData->phone = $validatedData['phone'];
        $formData->resume = $filename; // Store the filename in the database
        $formData->subject = $validatedData['subject'];
        $formData->save();

        $notification = [
             'message' => 'Thank You For Submitting!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    
    
    // ------------------------------------------------------------------
    
    
   public function landingstore(Request $request)
{
    // Dump and die to check if data is coming
    dd($request->all());
    // Your existing code
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'country_code' => 'required|string',
        'number' => 'required|string',
        'resume' => 'required|file|mimes:pdf,doc,docx',
    ]);

    // Handle file upload
    if ($request->hasFile('resume')) {
        $file = $request->file('resume');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/resume'), $fileName);
    }

    // Create a new Landing instance
    $landing = new landing;
    $landing->name = $request->name;
    $landing->email = $request->email;
    $landing->country_code = $request->country_code;
    $landing->number = $request->number;
    $landing->resume = $fileName ?? null; // Store the file name if uploaded
    $landing->save();

    $notification = array(
            'message' => "Your form is successfully added",
            'alert-type' => 'danger'
        );
     return redirect()->back()->with($notification);
}
    
    
    
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


    public function landing()
    {
        return view('frontend.pages.landing_page');
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
            'message' => "job Post Successfully",
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


    public function jobdescription($jobId){
        $job = job::findOrFail($jobId);
        return view('frontend.pages.job_description', compact('job'));
    }




    public function termcondition(){
        return view('frontend.pages.term_condition');
    }


    public function privacypolicy(){
        return view('frontend.pages.privacy_policy');
    }



    public function submit(Request $request)
     {
    $request->validate([
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|email',
        'subject' => 'required|string',
        'comments' => 'required|string',
    ]);

    $contact = new contact;
    $contact->firstname = $request->firstname;
    $contact->lastname = $request->lastname;
    $contact->email = $request->email;
    $contact->subject = $request->subject;
    $contact->comments = $request->comments;
    $contact->save();

    return redirect()->back()->with('success_message', 'Your Form Submitted successfully');

}


     public function blog(){
    return view('frontend.pages.blog');
}



}
