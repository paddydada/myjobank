<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\Password\ChangePasswordController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\EmployerJobController;
use App\Http\Controllers\Backend\AppliedController;
use App\Http\Controllers\Backend\JobCategoryController;
use App\Http\Controllers\UserController;




Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/job/category', [UserController::class, 'jobcategory'])->name('job.category');
Route::get('/blog', [UserController::class, 'blog'])->name('blog');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::get('/job/description/{jobId}', [UserController::class, 'jobdescription'])->name('job.description');
Route::get('/privacy/policy', [UserController::class, 'privacypolicy'])->name('privacy.policy');
Route::get('/term/condition', [UserController::class, 'termcondition'])->name('term.condition');
Route::post('/submit-form', [UserController::class, 'submit'])->name('submit.form');
Route::get('/term/condition', [UserController::class, 'termcondition'])->name('term.condition');
Route::get('/australia', [UserController::class, 'australia'])->name('australia');
Route::post('/submit', [UserController::class, 'australiaForm'])->name('australia.form');

Route::get('/thank/you', [UserController::class, 'Thankyou'])->name('thankyou');





Route::get('/canada', [UserController::class, 'canada'])->name('canada');
Route::post('/submitcanada', [UserController::class, 'canadaForm'])->name('canada.form');





Route::get('/landing', [UserController::class, 'landing'])->name('landing');
Route::post('/landing', [UserController::class, 'landingstore'])->name('landing.store');
Route::get('/jobs/category/{cat_name}', [UserController::class, 'jobscategory'])->name('jobs.category');




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'userdashboard'])->name('dashboard');
    Route::get('/jobseeker/profile', [UserController::class, 'jobseekerprofile'])->name('jobseeker.profile');
    Route::post('/jobseeker/profile/store', [UserController::class, 'jobseekerprofilestore'])->name('jobseeker.profile.store');
    Route::get('/jobseeker/logout', [UserController::class, 'jobseekerlogout'])->name('jobseeker.logout');
    Route::post('/jobseeker/profile', [UserController::class, 'jobseekerupdatepassword'])->name('jobseeker.update.password');
    Route::get('/jobseeker/post', [UserController::class, 'jobseekerpost'])->name('jobseeker.post');
    Route::post('/jobseeker/job/store', [UserController::class, 'jobseekerjobstore'])->name('jobseeker.job.store');
    Route::get('/applied/job', [UserController::class, 'appliedjob'])->name('applied.job');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');


    // Route::get('/email', [UserController::class, 'email'])->name('email');

});




Route::get('/clear', function() {

  Artisan::call('cache:clear');
  Artisan::call('config:clear');
  Artisan::call('config:cache');
  Artisan::call('view:clear');

  return "Cleared!";

});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin'])->group(function () {

    // all Admin route
    Route::get('/admin/dashboard', [AdminController::class, 'admindashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminlogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'adminprofile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminprofilestore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'adminchangepassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'adminupdatepassword'])->name('update.password');


    // all employer route
    Route::get('/employer/add', [AdminController::class, 'addemployer'])->name('employer.add');
    Route::get('/employer/all', [AdminController::class, 'allemployer'])->name('employer.all');
    Route::get('/employer/edit{id}', [AdminController::class, 'editemployer'])->name('employer.edit');
    Route::post('/employer/update', [AdminController::class, 'employerupdate'])->name('employer.update');
    Route::post('/employer/store', [AdminController::class, 'employerstore'])->name('employer.store');
    Route::get('/delete/employer/{id}', [AdminController::class, 'employerdelete'])->name('employer.delete');

    // employer Active inactive route

    Route::get('/employer/inactive{id}', [AdminController::class, 'employerinactive'])->name('employer.inactive');
    Route::get('/employer/active{id}', [AdminController::class, 'employeractive'])->name('employer.active');


    // Leads 

   Route::get('/australia/leads', [AdminController::class, 'AustraliaLeads'])->name('australia.leads');
   Route::get('/canada/leads', [AdminController::class, 'CanadaLeads'])->name('canada.leads');

    // jobseeker Active inactive route

    Route::get('/jobseeker/inactive{id}', [AdminController::class, 'jobseekerinactive'])->name('jobseeker.inactive');
    Route::get('/jobseeker/active{id}', [AdminController::class, 'jobseekeractive'])->name('jobseeker.active');

    // all Jobseeker route



    Route::get('/jobseeker/add', [AdminController::class, 'addjobseeker'])->name('jobseeker.add');
    Route::post('/jobseeker/store', [AdminController::class, 'jobseekerstore'])->name('jobseeker.store');
    Route::get('/jobseeker/all', [AdminController::class, 'jobseekerall'])->name('jobseeker.all');
    Route::get('/jobseeker/edit{id}', [AdminController::class, 'jobseekeredit'])->name('jobseeker.edit');
    Route::post('/jobseeker/update', [AdminController::class, 'jobseekerupdate'])->name('jobseeker.update');
    Route::get('/delete/jobseeker/{id}', [AdminController::class, 'jobseekerdelete'])->name('jobseeker.delete');




    Route::get('/create/job', [JobController::class, 'addjob'])->name('job.add');
    Route::get('/create/job', [JobController::class, 'getEmployer'])->name('job.add');
    Route::post('/job/store', [JobController::class, 'jobstore'])->name('job.store');
    Route::get('/job/edit/{id}', [JobController::class, 'jobedit'])->name('job.edit');
    Route::post('/job/update/{id}', [JobController::class, 'jobupdate'])->name('job.update');

    Route::get('/all/job', [JobController::class, 'alljobs'])->name('job.all');
    Route::get('/job/inactive{id}', [JobController::class, 'jobinactive'])->name('job.inactive');
    Route::get('/job/active{id}', [JobController::class, 'jobactive'])->name('job.active');
    Route::get('/job/delete{id}', [JobController::class, 'jobdelete'])->name('job.delete');

    Route::get('/job/all/applied', [AppliedController::class, 'applied'])->name('job.applied.all');




    Route::get('/job/category/all', [JobCategoryController::class, 'jobcategory'])->name('job.category.all');
    Route::get('/job/category/edit/{id}', [JobCategoryController::class, 'jobcategoryedit'])->name('job.category.edit');
    Route::post('/job/category/update/{id}', [JobCategoryController::class, 'jobcategoryupdate'])->name('job.category.update');
    Route::get('/job/category/delete{id}', [JobCategoryController::class, 'jobcategorydelete'])->name('job.category.delete');
    Route::get('/job/category/create', [JobCategoryController::class, 'jobcategoryadd'])->name('job.category.add');
    Route::post('/job/category/create', [JobCategoryController::class, 'addjobcategory'])->name('job.category.create');
});






Route::middleware(['auth', 'role:employer'])->group(function () {
    Route::get('/employer/dashboard', [EmployerController::class, 'employerdashboard'])->name('employer.dashboard');
    Route::get('/employer/logout', [EmployerController::class, 'employerlogout'])->name('employer.logout');
    Route::get('/employer/profile', [EmployerController::class, 'employerprofile'])->name('employer.profile');
    Route::post('/employer/profile/store', [EmployerController::class, 'employerprofilestore'])->name('employer.profile.store');



    Route::get('/employer/change/password', [EmployerController::class, 'employerchangepassword'])->name('employer.change.password');

    Route::post('/update/password', [EmployerController::class, 'employerupdatepassword'])->name('update.password');

    // Employer add job

    Route::get('/employer/all/job', [EmployerJobController::class, 'employeralljobs'])->name('employer.job.all');

    Route::get('/employer/create/job', [EmployerJobController::class, 'employeraddjob'])->name('employer.job.add');
    Route::post('/employer/job/store', [EmployerJobController::class, 'employerjobstore'])->name('employer.job.store');
    Route::get('/employer/create/job', [EmployerJobController::class, 'getEmployer'])->name('employer.job.add');

    Route::get('/employer/job/edit/{id}', [EmployerJobController::class, 'employerjobedit'])->name('employer.job.edit');
    Route::post('/employer/job/update/{id}', [EmployerJobController::class, 'employerjobupdate'])->name('employer.job.update');


    Route::get('/employer/job/inactive{id}', [EmployerJobController::class, 'employerjobinactive'])->name('employer.job.inactive');
    Route::get('/employer/job/active{id}', [EmployerJobController::class, 'employerjobactive'])->name('employer.job.active');


    Route::get('/employer/job/delete{id}', [EmployerJobController::class, 'employerjobdelete'])->name('employer.job.delete');



    Route::get('/applied.jobseeker', [EmployerController::class, 'appliedjobseeker'])->name('applied.jobseeker');



});



Route::get('/admin/login', [AdminController::class, 'adminlogin']);
Route::get('/employer/login', [EmployerController::class, 'employerlogin'])->name('employer.login');
Route::get('/become/employer', [EmployerController::class, 'becomeemployer'])->name('become.employer');
Route::post('/employer/register', [EmployerController::class, 'employerregister'])->name('employer.register');





// Site Setting route

Route::get('/site/setting', [SiteSettingController::class, 'sitesetting'])->name('site.setting');
Route::post('/site/setting/update', [SiteSettingController::class, 'sitesettingupdate'])->name('site.setting.update');

Route::get('/seo/setting', [SiteSettingController::class, 'seosetting'])->name('seo.setting');
Route::post('/seo/setting/update', [SiteSettingController::class, 'seosettingUpdate'])->name('seo.setting.update');

// End Site Setting route




Route::post('/job/search', [UserController::class, 'jobsearch'])->name('job.search');

//password change user   route

Route::get('/user/change/password', [ChangePasswordController::class, 'userchangepassword'])->name('user.change.password');
Route::post('/uesr/update/password', [ChangePasswordController::class, 'userupdatepassword'])->name('user.update.password');

//End password change user   route


require __DIR__ . '/auth.php';
