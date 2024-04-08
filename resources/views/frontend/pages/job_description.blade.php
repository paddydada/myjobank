@extends('frontend.master_dashboard')
@section('main')

<style>
    .description {
    font-family: Arial, sans-serif;
    font-size: 14px;
    color: #333;
    word-wrap: break-word;
    overflow-wrap: break-word;
}

</style>

    @include('frontend.body.header')





    <!-- Titlebar -->
    <div class="single-page-header" data-background-image="{{ asset('frontend/images/bg-pic.jpg') }}">
        <div class="container">
            <div class="row md-2">
                <div class="col-md-12">
                    <div class="utf-single-page-header-inner-aera">
                        <div class="utf-left-side">
                            <div class="utf-header-image">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset($job->logo) }}" alt="Company Logo">
                                </a>
                            </div>
                            <div class="utf-header-details">
                                <span class="dashboard-status-button utf-job-status-item green"><i
                                        class="icon-material-outline-business-center"></i> {{ $job->job_type }}</span>

                                <h3>{{ $job->cmp_name }} <span class="utf-verified-badge" title="Verified"
                                        data-tippy-placement="top"></span></h3>

                                <h5><i class="icon-material-outline-business-center"></i>{{ $job->cat_name }}</h5>


                                <h5><i
                                        class="icon-material-outline-account-balance-wallet"></i>${{ $job->min }}-${{ $job->max }}
                                </h5>

                                <h5><i class="icon-material-outline-location-on"></i>{{ $job->country_name }}</h5>






                                <div class="utf-star-rating" data-rating="4.9"></div>
                            </div>
                        </div>


                        <div class="utf-right-side">
                            <div class="salary-box">
                                <a href="{{ Auth::check() ? route('jobseeker.post', ['jobId' => $job->id]) : '#' }}"
                                    class="button save-job-btn"
                                    style="background-color: #FF8A00;"
                                    onclick="{{ Auth::check() ? '' : 'showAlert()' }}">
                                    Apply Jobs
                                    <i class="icon-feather-chevron-right"></i>
                                </a>
                            </div>

                            <script>
                            function showAlert() {
                                alert("Please login first.");
                            }
                            </script>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

















    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 utf-content-right-offset-aera">
                <div class="utf-single-page-section-aera">
                    <div class="job-description-image-aera">
                        <img src="images/job-detail-inner.png" alt="" />
                    </div>
                    <div class="utf-boxed-list-headline-item">
                        <h3><i class="icon-material-outline-description"></i> Jobs Description</h3>
                    </div>
                 <pre class="description">{!! $job->job_des !!}</rre>

                   
                </div>

            </div>







            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="utf-sidebar-container-aera">
                    <div class="utf-sidebar-widget-item">
                        <div class="utf-detail-banner-add-section">
                            <a href="#"><img src="{{ asset('frontend/images/bg-pic.jpg') }}"
                                    alt="banner-add-2" /></a>
                        </div>
                    </div>
                    <div class="utf-sidebar-widget-item">
                        <div class="utf-quote-box">
                            <div class="utf-quote-info">
                                <h4>Make a Difference with Your Online Resume!</h4>
                                <p>Your Resume in Minutes with Jobs Resume Assistant is Ready!</p>
                                <a href="{{ route('register') }}"
                                    class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Create an
                                    Account <i class="icon-feather-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="utf-sidebar-widget-item">
                        <div class="utf-job-overview">
                            <div class="utf-job-overview-headline">Jobs Category</div>
                            <div class="utf-job-overview-inner">
                                <ul>
                                    @php
                                        $categories = App\Models\jobcategory::orderBy('cat_name', 'Asc')->get();
                                    @endphp
                                    @foreach ($categories as $item)
                                        <li>
                                            <i class="icon-material-outline-business-center"></i>
                                          <a href="{{ route('jobs.category', ['cat_name' => $item->cat_name]) }}"><span>{{ $item->cat_name }}</span> </a>  

                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>







    @include('frontend.body.footer')
@endsection
