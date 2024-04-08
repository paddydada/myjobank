<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class EmployerJobController extends Controller
{

    public function employeralljobs()
    {
        $id = Auth::user()->id;
        $jobs = Job::where('emp_id',$id)->latest()->get();
        return view('employer.job.employer_all_job', compact('jobs'));
    }


    public function employeraddjob()
    {
        return view('employer.job.employer_create_job');
    }


    public function getEmployer(Request $request)
    {
        $authEmployerId = Auth::id();
        $users = User::where('status', 'active')->where('role', 'employer')->get();
        return view('employer.job.employer_create_job', compact('users', 'authEmployerId'));
    }


    public function employerjobedit($id)
    {
        $job = Job::findOrFail($id);
        $users = User::where('status', 'active')
                     ->where('role', 'employer')
                     ->get();
        $selectedCategoryId = $job->category_id;
        return view('employer.job.employer_edit_job', compact('job', 'users', 'selectedCategoryId'));
    }




    public function employerjobstore(Request $request)
    {
        $request->validate([

            'cmp_name' => 'required',
            'emp_no' => 'required',
            'name' => 'required',
            'min_edu' => 'required',
            'phone' => 'required',
            'cat_name' => 'required',
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

        // Assuming 'logo' is a file input, you need to handle the file upload
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
            'phone' => $request->phone,
            'cat_name' => $request->cat_name,
            'country_name' => $request->country_name,
            'language' => $request->language,
            'job_type' => $request->job_type,
            'hiring_no' => $request->hiring_no,
            'quickly_need' => $request->quickly_need,
            'min' => $request->min,
            'max' => $request->max,
            'rate' => $request->rate,
            'offer' => $request->offer,
            'job_des' => $request->job_des,
            'logo' => $logoPath,
            'created_at' => now(),

        ]);


        $notification = [
            'message' => 'Data has been stored successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('employer.job.all')->with($notification);
    }





    public function employerjobupdate(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'cmp_name' => 'required|string|max:255',
                'emp_no' => 'required',
                'name' => 'required',
            ]);

            // Find the job by its ID
            $job = Job::findOrFail($id);

            // Update job attributes
            $job->fill([

                'cmp_name' => $request->cmp_name,
                'emp_no' => $request->emp_no,
                'name' => $request->name,
                'min_edu' => $request->min_edu,
                'phone' => $request->phone,
                'cat_name' => $request->cat_name,
                'country_name' => $request->country_name,
                'language' => $request->language,
                'job_type' => $request->job_type,
                'hiring_no' => $request->hiring_no,
                'quickly_need' => $request->quickly_need,
                'min' => $request->min,
                'max' => $request->max,
                'rate' => $request->rate,
                'offer' => $request->offer,
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
        } catch (\Exception $e) {
            Log::error('Error updating job: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred. Please try again later.',
                'alert-type' => 'error',
            ];
        }

        return redirect()->route('employer.job.all')->with($notification);
    }




    public function employerjobactive($id)
    {
        Job::findOrfail($id)->update(['status' => 'active']);
        $notification = array(
            'message' => 'Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // job inactive

    public function employerjobinactive($id)
    {
        Job::findOrfail($id)->update(['status' => 'inactive']);
        $notification = array(
            'message' => 'Inactive',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }




    public function employerjobdelete($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        $notification = [
            'message' => 'Job Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }





}
