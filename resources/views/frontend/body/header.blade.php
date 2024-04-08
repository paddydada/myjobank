<header id="utf-header-container-block">
    <div id="header">
        <div class="container">
               @php
        $setting = App\Models\sitesetting::find(1);
    @endphp
 
            <div class="utf-left-side">
                <div id="logo"> <a href="{{ url('/') }}"><img src="{{ asset('upload/logo/' . $setting->logo) }}"
                            alt=""></a>
                </div>
                <nav id="navigation">
                    <ul id="responsive">

                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('job.category') }}">Category</a></li>
                           <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>
                <div class="clearfix"></div>
            </div>
            <div class="utf-right-side">
                <div class="utf-header-widget-item">
                  <a
                    href="{{ url('/register') }}"
                    class=" log-in-button">
                    <i class="icon-feather-log-in"></i> <span>Employer/Jobseeker</span></a>
                </div>

                @php
                if(Auth::check()) {
                    $id = Auth::user()->id;
                    $userData = App\Models\User::find($id);
                }
            @endphp

@auth



                <div class="utf-header-widget-item">
                  <div class="utf-header-notifications user-menu">
                    <div
                      class="utf-header-notifications-trigger user-profile-title"
                    >
                      <a href="#">
                        <div class="user-avatar status-online">
                          {{-- <img src="{{ asset('frontend/images/user_small_1.jpg') }}" alt="" /> --}}

                          <img src="{{ !empty($userData->photo) ? url('upload/user_images/' . $userData->photo) : url('upload/no_image.jpg') }}">


                        </div>
                        @if(Auth::check())
                        <div class="user-name">{{ Auth::user()->name }}</div>
                    @endif
                      </a>
                    </div>
                    <div class="utf-header-notifications-dropdown-block">
                      <ul class="utf-user-menu-dropdown-nav">
                        <li>
                          <a href="{{ route('dashboard') }}"
                            ><i class="icon-material-outline-dashboard"></i>
                            Dashboard</a
                          >
                        </li>


                        <li>
                          <a href="{{ route('applied.job') }}"
                            ><i class="icon-material-outline-star-border"></i>
                            Bookmarks Jobs</a>
                        </li>

                        <li>
                          <a href="{{ route('jobseeker.profile') }}"
                            ><i class="icon-feather-user"></i> My Profile</a>
                        </li>

                        <li>
                          <a href="{{ route('jobseeker.logout') }}">
                            <i
                              class="icon-material-outline-power-settings-new"
                            ></i>
                            Logout</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

@endauth

                <span class="mmenu-trigger">
                  <button
                    class="hamburger utf-hamburger-collapse-item"
                    type="button"
                  >
                    <span class="utf-hamburger-box-item">
                      <span class="utf-hamburger-inner-item"></span>
                    </span>
                  </button>
                </span>
              </div>
        </div>
    </div>
</header>
