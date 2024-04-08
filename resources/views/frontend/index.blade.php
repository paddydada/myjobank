@extends('frontend.master_dashboard')
@section('main')
    <style>
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



        .bootstrap-select .dropdown-menu {
            max-height: 200px;
            /* Set the maximum height for the dropdown */
            overflow-y: auto;
            /* Add a scrollbar when needed */
        }
        
        

        
    </style>

    <!-- Header Container -->
    @include('frontend.body.header')
    <div class="clearfix"></div>
    <!-- Header Container / End -->

    <!-- Intro Banner  -->
    <div class="intro-banner" data-background-image="{{ asset('frontend/images/home-background-01.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="utf-banner-headline-text-part">
                        <h3>Find Jobs in Australia or Canada <span class="typed-words"></span></h3>
                        <span>Find your dream job in Australia or Canada</span>
                        <span>These jobs fall under skills shortage in both Australia and Canada, which means there is an acute shortage of skills and you have a good chance of getting selected.</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!--<div class="utf-intro-banner-search-form-block margin-top-40">-->
                    <!--    <div class="utf-intro-search-field-item">-->
                    <!--        <form action="{{ route('job.search') }}" method="post">-->
                    <!--            @csrf-->
                    <!--            {{-- <i class="icon-feather-search"></i> --}}-->
                    <!--            <input id="intro-keywords" name="search" type="text"-->
                    <!--                placeholder="Search Jobs Keywords...">-->
                    <!--    </div>-->

                    <!--    <div class="utf-intro-search-button">-->
                    <!--        <button class="button ripple-effect"><i class="icon-material-outline-search"></i> Search-->
                    <!--            Jobs</button>-->
                    <!--        </form>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                   
                        <div class="utf-intro-banner-search-form-block margin-top-40"> 
            <div class="utf-intro-search-field-item">
              <input id="intro-keywords" type="text" placeholder="Search Jobs Keywords...">
			  <i class="icon-feather-search"></i>
            </div>
			<div class="utf-intro-search-field-item">
              <select class="selectpicker default" data-live-search="true" data-selected-text-format="count" data-size="5" title="Select Location">
                 <option>Australia</option>
                <option>Canada</option>
              </select>
            </div>
			<div class="utf-intro-search-button">
              <button class="button ripple-effect" onclick="window.location.href='jobs-list-layout-leftside.html'"><i class="icon-material-outline-search"></i> Search Jobs</button>
            </div>
          </div>
                    
                 <p class="utf-trending-silver-item">
                      <span class="utf-trending-black-item">Jobs Keywords:</span>
                      @php
                      $categories = App\Models\jobcategory::orderBy('cat_name', 'asc')->get();
                      @endphp
                      @foreach ($categories as $item)
                     <a href="{{ route('jobs.category', ['cat_name' => $item->cat_name]) }}">{{ $item->cat_name }}</a>
                      @endforeach
                 </p>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <ul class="intro-stats margin-top-45 hide-under-992px">
                        <li><i class="icon-material-outline-business-center"></i> <sub class="counter_item"><strong
                                    class="counter">600</strong> <span>Live Jobs
                                    Posted</span></sub> </li>
                        <li><i class="icon-feather-users"></i> <sub class="counter_item"><strong
                                    class="counter">1500</strong> <span>Jobs Candidate</span></sub> </li>
                       
                        <li><i class="icon-material-outline-assignment"></i> <sub class="counter_item"><strong
                                    class="counter">90</strong> <span>Companies job</span></sub> </li>
                       
                    </ul>
                </div>
            </div>
            
            
            
            
              <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        

                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <a href="#" class="photo-box"
                        data-background-image="{{ asset('frontend/images/popular-location-01.jpg') }}">
                        <div class="utf-opening-box-content-part">
                            <h3>Canada</h3>
                            <span>376 Jobs</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-md-6">
                    <a href="#" class="photo-box"
                        data-background-image="{{ asset('frontend/images/popular-location-02.jpg') }}">
                        <div class="utf-opening-box-content-part">
                            <h3>Australia</h3>
                            <span>645 Jobs</span>
                        </div>
                    </a>
                </div>
               

            </div>
            
            
            
            
        </div>
    </div>

    <!-- Jobs Category Boxes -->
    <div class="section margin-top-60 margin-bottom-60">
        <div class="container">
            
            <marquee behavior="scroll" direction="left">
   <b style="color:#FF8F0A">   <i class="icon-material-outline-business-center"></i> Discover diverse job opportunities in our latest postings. Find your next career move with ease and connect with top employers. Start your job search today
</b></marquee>
            
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        <span>Jobs Categories</span>
                        <h3>Top Trending Categories</h3>
                        <div class="utf-headline-display-inner-item">Jobs Categories</div>
                        <p class="utf-slogan-text">Job categories span various industries, including technology, healthcare,
                            finance, education, engineering, marketing, hospitality, offering diverse career opportunities.
                        </p>
                    </div>
                    <div class="utf-categories-container-block">

                        @php
                            $categories = App\Models\jobcategory::orderBy('cat_name', 'Asc')->get();
                        @endphp

                        @foreach ($categories as $item)
                           
                            <a href="{{ route('jobs.category', ['cat_name' => $item->cat_name]) }}" class="utf-category-box">
                                <div class="utf-category-box-icon-item"> <i class="icon-line-awesome-briefcase"></i>
                                </div>
                                <div class="utf-category-box-content">
                                    <h3>{{ $item->cat_name }}</h3>
                                </div>
                                <div class="utf-category-box-counter-item">Jobs</div>
                            </a>
                        @endforeach


                    </div>



                    <div class="utf-centered-button margin-top-10">
                        <a href="{{route('job.category')}}"
                            class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-20">View All
                            Categories <i class="icon-feather-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs Category Boxes / End -->

    <!-- Latest Jobs -->
    <div class="section gray padding-top-60 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        <span>Latest Jobs Post</span>
                        <h3>Jobs You May Be Interested</h3>
                        <div class="utf-headline-display-inner-item">Latest Jobs Post</div>
                        <!--<p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting-->
                        <!--    industry Lorem Ipsum been industry standard dummy text ever since when unknown printer-->
                        <!--    took a galley.</p>-->
                    </div>



                    <div class="utf-listings-container-part compact-list-layout margin-top-35">
                        @php
                            use App\Models\job;
                            $jobs = job::where('status', 'active')->orderBy('id', 'asc')->get();
                        @endphp



                        @foreach ($jobs as $item)
                            <div id="notification" class="notification" style="display: none;">Please login first then you
                                can apply the job.</div>

                            <div class="utf-job-listing utf-apply-button-item">
                                <div class="utf-job-listing-details">
                                     <div class="utf-job-listing-company-logo">
                                        <a href="{{ route('job.description', ['jobId' => $item->id]) }}">
                                            <img src="{{ asset($item->logo) }}" alt="Company Logo">
                                        </a>
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
                                    @if (Auth::check())
                                        <a href="{{ route('jobseeker.post', ['jobId' => $item->id]) }}"
                                            class="list-apply-button ripple-effect">Apply Job <i
                                                class="icon-line-awesome-briefcase"></i></a>
                                    @else
                                        <span class="list-apply-button ripple-effect" onclick="showNotification()">Apply Job
                                            <i class="icon-line-awesome-briefcase"></i></span>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <script>
                            function showNotification() {
                                document.getElementById('notification').style.display = 'block';
                            }
                        </script>



                    </div>



                    
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Jobs / End -->


    <!-- Features Cities -->
    <!--<div class="section margin-top-65 margin-bottom-60">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-xl-12">-->
    <!--                <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">-->
    <!--                    <span>Jobs Location</span>-->
    <!--                    <h3>Companies By Location</h3>-->
    <!--                    <div class="utf-headline-display-inner-item">Jobs Location</div>-->
    <!--                    <p class="utf-slogan-text"></p>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-xl-6 col-md-6">-->
    <!--                <a href="#" class="photo-box"-->
    <!--                    data-background-image="{{ asset('frontend/images/popular-location-01.jpg') }}">-->
    <!--                    <div class="utf-opening-box-content-part">-->
    <!--                        <h3>Canada</h3>-->
    <!--                        <span>376 Jobs</span>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </div>-->
    <!--            <div class="col-xl-6 col-md-6">-->
    <!--                <a href="#" class="photo-box"-->
    <!--                    data-background-image="{{ asset('frontend/images/popular-location-02.jpg') }}">-->
    <!--                    <div class="utf-opening-box-content-part">-->
    <!--                        <h3>Australia</h3>-->
    <!--                        <span>645 Jobs</span>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </div>-->
               

    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- Features Cities / End -->





    <!-- Testimonials -->
    <div class="section gray padding-top-65 padding-bottom-65">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-30">
                        <span>Clients Say About Us</span>
                        <h3>Candidates Testimonials</h3>
                        <div class="utf-headline-display-inner-item">Clients Say About Us</div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Categories Carousel -->
        <div class="utf-carousel-container-block">
            <div class="utf-testimonial-carousel-block testimonials">
                <div class="utf-carousel-review-item">
                    <div class="utf-testimonial-box">
                        <div class="utf-testimonial-avatar-photo"> <img src="{{ asset('frontend/images/user.png') }}"
                                alt=""> </div>
                        <div class="utf-testimonial-author-utf-detail-item">
                            <h4>Rahul Roy</h4>
                            <span>Graphics Designer</span>
                        </div>
                        <div class="testimonial">Embarking on my career as a Graphics Designer felt like a challenging
                            endeavor until I stumbled upon this remarkable platform. Its extensive collection of job
                            opportunities catered specifically to my skills and interests, simplifying the otherwise
                            overwhelming job search process. The platform's user-friendly interface made navigation
                            effortless, allowing me to focus my energy on showcasing my creativity and talent. Thanks to
                            this platform, I've found my dream role as a Graphics Designer and am excited to continue
                            pushing the boundaries of visual storytelling.</div>
                    </div>
                </div>
                <div class="utf-carousel-review-item">
                    <div class="utf-testimonial-box">
                        <div class="utf-testimonial-avatar-photo"> <img src="{{ asset('frontend/images/user.png') }}"
                                alt=""> </div>
                        <div class="utf-testimonial-author-utf-detail-item">
                            <h4>Mukesh Kumar</h4>
                            <span>iOS developer</span>
                        </div>
                        <div class="testimonial">Transitioning into the world of iOS development seemed like a daunting
                            task until I discovered this platform. The curated job listings and intuitive interface
                            streamlined my job search, allowing me to focus on what I do best – crafting exceptional iOS
                            experiences. Within no time, I found a position that aligned perfectly with my skills and career
                            goals. This platform has truly been a game-changer for my journey as an iOS developer, and I
                            couldn't be more grateful for the opportunity it has provided me.</div>
                    </div>
                </div>
                <div class="utf-carousel-review-item">
                    <div class="utf-testimonial-box">
                        <div class="utf-testimonial-avatar-photo"> <img src="{{ asset('frontend/images/user.png') }}"
                                alt=""> </div>
                        <div class="utf-testimonial-author-utf-detail-item">
                            <h4>Vinay Singh</h4>
                            <span>Android Developer</span>
                        </div>
                        <div class="testimonial">Thanks to this platform, my journey to becoming an Android Developer has
                            been nothing short of incredible. The vast array of job opportunities tailored specifically to
                            my skills made the job search process seamless. The interface is intuitive, making navigation
                            effortless. Within a short period, I found a role that perfectly matched my expertise and career
                            aspirations. I couldn't be happier with my experience and highly recommend this platform to any
                            aspiring Android Developer.</div>
                    </div>
                </div>
                <div class="utf-carousel-review-item">
                    <div class="utf-testimonial-box">
                        <div class="utf-testimonial-avatar-photo"> <img src="{{ asset('frontend/images/user.png') }}"
                                alt=""> </div>
                        <div class="utf-testimonial-author-utf-detail-item">
                            <h4>Vicky Singh</h4>
                            <span>Web
                            Developer</span>
                        </div>
                        <div class="testimonial">Securing a job as a Web Developer was made effortless through this
                            platform. With its comprehensive job listings and user-friendly interface, I quickly found the
                            perfect opportunity. The application process was seamless, and I appreciated the personalized
                            support from the team. Thanks to this website, I am now thriving in my new role as a Web
                            Developer.</div>
                    </div>
                </div>
                <div class="utf-carousel-review-item">
                    <div class="utf-testimonial-box">
                        <div class="utf-testimonial-avatar-photo"> <img src="{{ asset('frontend/images/user.png') }}"
                                alt=""> </div>
                        <div class="utf-testimonial-author-utf-detail-item">
                            <h4>Manish Kumar</h4>
                            <span>UI/UX Designer</span>
                        </div>
                        <div class="testimonial">Finding a job as a UI/UX Designer in the USA was a daunting task until I
                            discovered this online platform. The user interface is intuitive, making job searching a breeze.
                            Within weeks of signing up, I landed multiple interviews and eventually secured my dream job. I
                            highly recommend this website to any designer looking to advance their career in the USA.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials / End -->


    <!-- Counters -->
    <div class="section gradient_item_area padding-top-70 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        <span>Success Business Record</span>
                        <h3>Our Success & Record</h3>
                        <div class="utf-headline-display-inner-item">Success Business Record</div>

                    </div>
                </div>
                <div class="col-xl-12 counter_inner_block">
                    <div class="utf-counters-container-aera">
                        <div class="col-xl-3">
                            <div class="utf-single-counter"> <i class="icon-feather-briefcase"></i>
                                <div class="utf-counter-inner-item">
                                    <h3><span class="counter">600</span></h3>
                                    <span class="utf-counter-title">Live Jobs</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="utf-single-counter"> <i class="icon-feather-users"></i>
                                <div class="utf-counter-inner-item">
                                    <h3><span class="counter">1500</span></h3>
                                    <span class="utf-counter-title">Jobs Candidate</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="utf-single-counter"> <i class="icon-material-outline-textsms"></i>
                                <div class="utf-counter-inner-item">
                                    <h3><span class="counter">200</span></h3>
                                    <span class="utf-counter-title">Active Resume</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="utf-single-counter"> <i class="icon-material-outline-location-city"></i>
                                <div class="utf-counter-inner-item">
                                    <h3><span class="counter">90</span></h3>
                                    <span class="utf-counter-title">Companies</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counters / End -->
    <script>
        function showNotification() {
            var notification = document.getElementById("notification");
            notification.style.display = "block";
            setTimeout(function() {
                notification.style.display = "none";
            }, 3000); // Hide the notification after 3 seconds
        }
    </script>

    @include('frontend.body.footer')
@endsection
