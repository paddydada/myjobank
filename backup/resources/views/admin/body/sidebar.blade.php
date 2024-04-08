<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('adminbackend/assets/images/favicon-32x32.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>


        <li>
            <a href="{{ route('admin.profile') }}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
        </li>


        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="fadeIn animated bx bx-align-justify"></i>
                </div>
                <div class="menu-title">Employer Create</div>
            </a>
            <ul>
                <li> <a href="{{ route('employer.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Employer</a>
                </li>
                <li> <a href="{{ route('employer.all') }}"><i class="bx bx-right-arrow-alt"></i>All Employer</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-graduation"></i>
                </div>
                <div class="menu-title">Job Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('job.category.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Job Category</a>
                </li>
                <li> <a href="{{ route('job.category.all') }}"><i class="bx bx-right-arrow-alt"></i>All Job Category</a>
                </li>

            </ul>
        </li>



        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="lni lni-briefcase"></i>
                </div>
                <div class="menu-title">Job Seeker Create</div>
            </a>
            <ul>
                <li> <a href="{{ route('jobseeker.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Job Seeker</a>
                </li>
                <li> <a href="{{ route('jobseeker.all') }}"><i class="bx bx-right-arrow-alt"></i>All Job Seeker</a>
                </li>
            </ul>
        </li>




        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-graduation"></i>
                </div>
                <div class="menu-title">Create Job</div>
            </a>
            <ul>
                <li> <a href="{{ route('job.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Job</a>
                </li>
                <li> <a href="{{ route('job.all') }}"><i class="bx bx-right-arrow-alt"></i>All Job</a>
                </li>

            </ul>
        </li>





         <li>
            <a href="{{ route('job.applied.all') }}">
                <div class="parent-icon"><i class="lni lni-briefcase"></i>
                </div>
                <div class="menu-title">User Applied Job </div>
            </a>
        </li>




        <li>
            <a href="{{ route('site.setting') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-globe"></i>
                </div>
                <div class="menu-title">Site Setting</div>
            </a>
        </li>


        <li>
            <a href="{{ route('seo.setting') }}">
                <div class="parent-icon"><i class="lni lni-seo"></i>
                </div>
                <div class="menu-title">Seo Setting</div>
            </a>
        </li>


        <li>
            <a href="{{ route('admin.change.password') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-key"></i>
                </div>
                <div class="menu-title">Change Password</div>
            </a>
        </li>



        <li>
            <a href="{{ route('admin.logout') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-lock"></i>
                </div>
                <div class="menu-title">Logout</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
