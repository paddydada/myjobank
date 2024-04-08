@extends('dashboard')
@section('user')
    <!-- Dashboard Content -->
    <div class="utf-dashboard-content-container-aera" data-simplebar>
        <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
            <div class="row">
                <div class="col-xl-12">
                    <h3>Manage Jobs</h3>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="index-1.html">Home</a></li>
                            <li><a href="dashboard.html">Dashboard</a></li>
                            <li>Manage Jobs</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="utf-dashboard-content-inner-aera">
            <div class="row">
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">
                        <div class="headline">
                            <h3>My Jobs Listings</h3>
                        </div>
                        <div class="content">



                            @php
                            // Get the currently authenticated user's ID
                            $userId = auth()->id();

                            // Filter the applied jobs based on the user's ID
                            $applied = App\Models\applied::where('user_id', $userId)->orderBy('id', 'ASC')->get();
                        @endphp

                        @foreach ($applied as $item)
                            <ul class="utf-dashboard-box-list">
                                <li>
                                    <div class="utf-job-listing">
                                        <div class="utf-job-listing-details">

                                            <div class="utf-job-listing-description">

                                                <div class="utf-job-listing-footer">
                                                    <ul>

                                                        <li>
                                                            <div class="utf-job-listing-company-logo">
                                                                <img src="{{ asset($item->job->logo) }}" alt="Company Logo">
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <i class="icon-feather-briefcase"></i>
                                                            {{ $item->job->cmp_name }}
                                                        </li>

                                                        <li>
                                                            <i class="icon-material-outline-location-on"></i>
                                                            {{ $item->job->country_name }}
                                                        </li>

                                                        <li>
                                                            <i class="icon-material-outline-email"></i> <!-- Gmail icon -->
                                                            {{ $item->email }}
                                                        </li>

                                                        <li>
                                                            <i class="icon-material-outline-account-circle"></i> <!-- Icon representing role -->
                                                            {{ $item->profession }}(Profession)
                                                        </li>

                                                        <li>
                                                            <i class="icon-material-outline-business-center"></i> <!-- Icon representing experience -->
                                                            {{ $item->exp }}(exp)
                                                        </li>

                                                        <li>
                                                            <a href="{{ asset('upload/resume/' . $item->resume) }}" target="_blank">
                                                                <i class="icon-material-outline-description"></i> <!-- Resume-like icon -->
                                                                View Resume
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="utf-buttons-to-right">
                                                        <div class="utf-buttons-to-right">
                                                            <a href="{{ route('delete', $item->id) }}" class="button red ripple-effect ico"
                                                                data-tippy-placement="top">
                                                                <i class="icon-feather-trash-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr>
                        @endforeach



                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Row / End -->

            <!-- Footer -->
            <div class="utf-dashboard-footer-spacer-aera"></div>
            @include('frontend.body.footer_copyright')
        </div>
    </div>
    <!-- Dashboard Content / End -->
@endsection
