<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\applied;
use Illuminate\Http\Request;

class AppliedController extends Controller
{
    public function applied()
    {
        $jobs = applied::latest()->get();
        return view('admin.applied.applied_user_list', compact('jobs'));
    }
}
