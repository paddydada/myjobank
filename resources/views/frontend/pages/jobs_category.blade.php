@extends('frontend.master_dashboard')
@section('main')
    @include('frontend.body.header')


    <!-- Titlebar -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Jobs Search</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Jobs Search</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Titlebar End -->


    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
               





<p>Jobs Keywords: {{ $cat_name }}</p>

@if ($jobs->isEmpty())
    <h3 style="color:red">No jobs available for this category.</h3>
@else
    <div class="utf-listings-container-part compact-list-layout margin-top-35">
        @foreach ($jobs as $job)
            <div class="utf-job-listing utf-apply-button-item">
                <div class="utf-job-listing-details">
                    <div class="utf-job-listing-company-logo">
                        <a href="{{ route('job.category', ['cat_name' => $job->cat_name]) }}">
                            <img src="{{ asset($job->logo) }}" alt="Company Logo">
                        </a>
                    </div>
                    <div class="utf-job-listing-description">
                        <span class="dashboard-status-button utf-job-status-item green">
                            <i class="icon-material-outline-business-center"></i> Full Time
                        </span>
                        <h3 class="utf-job-listing-title">{{ $job->cmp_name }}</h3>
                        <div class="utf-job-listing-footer">
                            <ul>
                                <li><i class="icon-feather-briefcase"></i> {{ $job->cat_name }}</li>
                                <li><i class="icon-material-outline-account-balance-wallet"></i>
                                    ${{ $job->min }}-${{ $job->max }}</li>
                                <li><i class="icon-material-outline-location-on"></i>
                                    {{ $job->country_name }}</li>
                                <li><i class="icon-material-outline-access-time"></i> 15 Minute Ago</li>
                            </ul>
                        </div>
                    </div>
                    @if (Auth::check())
                        <a href="{{ route('jobseeker.post', ['jobId' => $job->id]) }}" class="list-apply-button ripple-effect">
                            Apply Job <i class="icon-line-awesome-briefcase"></i>
                        </a>
                    @else
                        <button class="list-apply-button ripple-effect" onclick="alert('Please login to apply for this job.');">
                            Apply Job <i class="icon-line-awesome-briefcase"></i>
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endif







                <!-- Pagination -->
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="utf-pagination-container-aera margin-top-30 margin-bottom-60">
                            <nav class="pagination">
                                <ul>
                                    <li class="utf-pagination-arrow"><a href="#"><i
                                                class="icon-material-outline-keyboard-arrow-left"></i></a></li>
                                    <li><a href="#" class="current-page">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="utf-pagination-arrow"><a href="#"><i
                                                class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4">
                <div class="utf-sidebar-container-aera">
                    <div class="utf-sidebar-widget-item">
                        <div class="utf-quote-box utf-jobs-listing-utf-quote-box">
                            <div class="utf-quote-info">
                                <h4>Make a Difference with Online Resume!</h4>
                                <p>Your Resume in Minutes with Jobs Resume Assistant is Ready!</p>
                                <a href="{{ url('/register') }}"
                                    class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Create
                                    Account <i class="icon-feather-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>



                   


                </div>
            </div>
        </div>
    </div>








    @include('frontend.body.footer')
@endsection
