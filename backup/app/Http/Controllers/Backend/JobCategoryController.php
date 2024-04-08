<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jobcategory;


class JobCategoryController extends Controller
{

    public function jobcategory()
    {
        $categories = jobcategory::latest()->get();
        return view('backend.category.job_category_all', compact('categories'));
    }


    public function jobcategoryedit($id)
    {
        $categories = jobcategory::findOrFail($id);
        return view('backend.category.job_category_edit', compact('categories'));
    }


    public function jobcategoryupdate(Request $request, $id)
    {
        $request->validate([
            'cat_name' => 'required|string|max:255',
        ]);
        $categories = jobcategory::findOrFail($id);
        $categories->fill([
            'cat_name' => $request->cat_name,
        ]);
        $categories->save();
        $notification = [
            'message' => 'Category updated successfully.',
            'alert-type' => 'success',
        ];
        return redirect()->route('job.category.all')->with($notification);
    }


    public function jobcategorydelete($id)
    {
        $categories = jobcategory::findOrFail($id);
        $categories->delete();
        $notification = [
            'message' => 'Job Category Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }


    public function jobcategoryadd()
    {
        return view('backend.category.job_category_create');
    }


    public function addjobcategory(Request $request){
        $request->validate([
            'cat_name' => 'required',
        ]);

        jobcategory::create([
            'cat_name' => $request->cat_name,
        ]);

        $notification = [
            'message' => 'Category has been stored successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('job.category.all')->with($notification);
    }

}
