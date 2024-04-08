@php
    if (Auth::check()) {
        $id = Auth::user()->id;
        $userData = App\Models\User::find($id);
    }
@endphp

<div class="utf-dashboard-nav">
    <div class="utf-dashboard-nav-inner">
        <div class="dashboard-profile-box">
            <span class="avatar-img">
                {{-- <img alt="" src="{{ asset('frontend/images/user-avatar-placeholder.png') }}" class="photo"> --}}
                <img
                    src="{{ !empty($userData->photo) ? url('upload/user_images/' . $userData->photo) : url('upload/no_image.jpg') }}">
            </span>
            <div class="user-profile-text">
                @if (Auth::check())
                    <span class="fullname">{{ Auth::user()->name }}</span>
                @endif

                @if (Auth::check())
                    <span class="user-role">{{ Auth::user()->role }}</span>
                @endif

            </div>
        </div>
        <div class="clearfix"></div>
        <ul id="menu">
            <li><a href="{{ route('dashboard') }}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('jobseeker.profile') }}"><i class="icon-feather-user"></i> My Profile</a></li>
            <li><a href="{{ route('jobseeker.post') }}"><i class="icon-line-awesome-user-secret"></i> Manage Jobs Post</a></li>
            <li><a href="{{ route('applied.job') }}"><i class="icon-feather-heart"></i> My Applied Jobs</a></li>
            <li><a href="{{ route('jobseeker.logout') }}"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
        </ul>
    </div>
</div>
<script>


</script>
