<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">

        <div>
            <h4 class="logo-text">Employer</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('employer.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>


        <li>
            <a href="{{ route('employer.profile') }}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
        </li>





        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-graduation"></i>
                </div>
                <div class="menu-title">Create Job</div>
            </a>
            <ul>
                <li> <a href="{{ route('employer.job.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Job</a>
                </li>
                <li> <a href="{{ route('employer.job.all') }}"><i class="bx bx-right-arrow-alt"></i>All Job</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="{{ route('applied.jobseeker') }}">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Applied Jobs</div>
            </a>
        </li>


        <li>
            <a href="{{ route('employer.change.password') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-key"></i>
                </div>
                <div class="menu-title">Change Password</div>
            </a>
        </li>



        <li>
            <a href="{{ route('employer.logout') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-lock"></i>
                </div>
                <div class="menu-title">Logout</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
