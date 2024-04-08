@extends('frontend.master_dashboard')
@section('main')
    @include('frontend.body.header')
    {{-- <style>
        .notification {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%) translateZ(20px);
            /* Adding translateZ for the 3D effect */
            background-color: #f72525;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Adding depth with a larger box shadow */
            z-index: 1000;
            animation: slideInDown 0.5s ease-in-out;
            cursor: pointer;
            /* Adding pointer cursor */
        }

        .notification-content {
            display: flex;
            align-items: center;
        }

        .notification-icon {
            margin-right: 10px;
        }

        .notification-message {
            font-size: 16px;
        }

        @keyframes slideInDown {
            0% {
                transform: translate(-50%, -100%);
            }

            100% {
                transform: translate(-50%, 0);
            }
        }

    </style>

 --}}




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
                <div class="utf-inner-search-section-title">
                    <h4><i class="icon-material-outline-search"></i> Search Jobs Listing Results</h4>
                </div>






                <div class="utf-listings-container-part compact-list-layout margin-top-35">
                    @php
                        use App\Models\Job;
                        $jobs = Job::where('status', 'active')->orderBy('id', 'asc')->get();
                    @endphp


                    @foreach ($jobs as $item)

                        @if (Auth::check())
                            <a href="{{ route('jobseeker.post', ['jobId' => $item->id]) }}"
                                class="utf-job-listing utf-apply-button-item">
                                <div class="utf-job-listing-details">
                                    <div class="utf-job-listing-company-logo">
                                        <img src="{{ asset($item->logo) }}" alt="Company Logo">
                                    </div>
                                    <div class="utf-job-listing-description">
                                        <span class="dashboard-status-button utf-job-status-item green"><i
                                                class="icon-material-outline-business-center"></i> Full Time</span>
                                        <h3 class="utf-job-listing-title">{{ $item->cmp_name }}</h3>
                                        <div class="utf-job-listing-footer">
                                            <ul>
                                                <li><i class="icon-feather-briefcase"></i> {{ $item->cat_name }}</li>
                                                <li><i class="icon-material-outline-account-balance-wallet"></i>
                                                    ${{ $item->min }}-${{ $item->max }}</li>
                                                <li><i class="icon-material-outline-location-on"></i>
                                                    {{ $item->country_name }}</li>
                                                <li><i class="icon-material-outline-access-time"></i> 15 Minute Ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="list-apply-button ripple-effect">Apply Job <i
                                            class="icon-line-awesome-briefcase"></i></span>
                                </div>
                            </a>
                        @else
                            <div class="utf-job-listing utf-apply-button-item">
                                <div class="utf-job-listing-details">
                                    <div class="utf-job-listing-company-logo">
                                        <img src="{{ asset($item->logo) }}" alt="Company Logo">
                                    </div>
                                    <div class="utf-job-listing-description">
                                        <span class="dashboard-status-button utf-job-status-item green"><i
                                                class="icon-material-outline-business-center"></i> Full Time</span>
                                        <h3 class="utf-job-listing-title">{{ $item->cmp_name }}</h3>
                                        <div class="utf-job-listing-footer">
                                            <ul>
                                                <li><i class="icon-feather-briefcase"></i> {{ $item->cat_name }}</li>
                                                <li><i class="icon-material-outline-account-balance-wallet"></i>
                                                    ${{ $item->min }}-${{ $item->max }}</li>
                                                <li><i class="icon-material-outline-location-on"></i>
                                                    {{ $item->country_name }}</li>
                                                <li><i class="icon-material-outline-access-time"></i> 15 Minute Ago
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="list-apply-button ripple-effect">Apply
                                        Job <i class="icon-line-awesome-briefcase"></i></span>

                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>





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



                    <div class="utf-sidebar-widget-item">
                        <h3>Category</h3>
                        <select class="selectpicker" data-live-search="true" data-selected-text-format="count"
                            data-size="7" title="All Categories">

                            @php
                                $categories = App\Models\jobcategory::orderBy('cat_name', 'Asc')->get();
                            @endphp

                            @foreach ($categories as $item)
                                <option>{{ $item->cat_name }}</option>
                            @endforeach

                        </select>
                    </div>



                </div>
            </div>
        </div>
    </div>








    @include('frontend.body.footer')
@endsection
