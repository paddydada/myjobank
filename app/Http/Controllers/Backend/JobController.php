<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\job;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    public function addjob()
    {
        return view('backend.job.create_job');
    }



    public function jobstore(Request $request)
    {
        $request->validate([

            'cmp_name' => 'required',
            'emp_no' => 'required',
            'name' => 'required',
            'min_edu' => 'required',
            'cat_name' => 'required',
            'country' => 'required',
            'country_name' => 'required',
            'language' => 'required',
            'job_type' => 'required',
            'hiring_no' => 'required',
            'quickly_need' => 'required',
            'min' => 'required',
            'max' => 'required',
            'rate' => 'required',
            'job_des' => 'required',


        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('upload/logos'), $logoName);
            $logoPath = 'upload/logos/' . $logoName;
        } else {
            $logoPath = '';
        }

        Job::create([

            'emp_id' => $request->emp_id,
            'cmp_name' => $request->cmp_name,
            'emp_no' => $request->emp_no,
            'name' => $request->name,
            'min_edu' => $request->min_edu,
            'country' => $request->country,
            'cat_name' => $request->cat_name,
            'country_name' => $request->country_name,
            'language' => $request->language,
             'job_type' => $request->job_type,
            'hiring_no' => $request->hiring_no,
            'quickly_need' => $request->quickly_need,
            'min' => $request->min,
            'max' => $request->max,
            'rate' => $request->rate,
            'job_des' => $request->job_des,
            'logo' => $logoPath,
            'created_at' => now(),

        ]);


        $notification = [
            'message' => 'Data has been stored successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('job.all')->with($notification);
    }


    public function alljobs()
    {
        $jobs = job::latest()->get();
        return view('backend.job.all_job', compact('jobs'));
    }



    public function getEmployer(Request $request)
    {
        $users = User::where('status', 'active')->where('role', 'employer')->get();

        return view('backend.job.create_job', ['users' => $users]);
    }





    public function jobactive($id)
    {
        Job::findOrfail($id)->update(['status' => 'active']);
        $notification = array(
            'message' => 'Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // job inactive

    public function jobinactive($id)
    {
        Job::findOrfail($id)->update(['status' => 'inactive']);
        $notification = array(
            'message' => 'Inactive',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }



    public function jobdelete($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        $notification = [
            'message' => 'Job Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }


    public function jobedit($id)
    {
        $job = job::findOrFail($id);
        $users = User::where('status', 'active')
                     ->where('role', 'employer')
                     ->get();
        $selectedCategoryId = $job->category_id;
        return view('backend.job.edit_job', compact('job', 'users', 'selectedCategoryId'));
    }




public function jobupdate(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'cmp_name' => 'required|string|max:255',
        'emp_no' => 'required',
        'name' => 'required',
    ]);

    // Find the job by its ID
    $job = job::findOrFail($id);

    // Update job attributes
    $job->fill([
        'emp_id' => $request->emp_id,
        'cmp_name' => $request->cmp_name,
        'emp_no' => $request->emp_no,
        'name' => $request->name,
        'min_edu' => $request->min_edu,
        'cat_name' => $request->cat_name,
          'country' => $request->country,
        'country_name' => $request->country_name,
        'language' => $request->language,
        'job_type' => $request->job_type,
       
        'hiring_no' => $request->hiring_no,
        'quickly_need' => $request->quickly_need,
        'min' => $request->min,
        'max' => $request->max,
        'rate' => $request->rate,
        'job_des' => $request->job_des,
    ]);

    // Save the job
    if ($job->save()) {
        $notification = [
            'message' => 'Job Updated Successfully.',
            'alert-type' => 'success',
        ];
    } else {
        $notification = [
            'message' => 'Failed to update job.',
            'alert-type' => 'error',
        ];
    }

    return redirect()->route('job.all')->with($notification);
}


}












