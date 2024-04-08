@extends('dashboard')
@section('user')
    <div class="utf-dashboard-content-container-aera" data-simplebar>
        <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
            <div class="row">
                <div class="col-xl-12">
                    <h3>Job Post</h3>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li>Job Post</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>





        <div class="utf-dashboard-content-inner-aera">
            <form action="{{ route('jobseeker.job.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

            <div class="row">
                <div class="col-xl-12">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3>General Information</h3>
                        </div>
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">



                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="utf-submit-field">
                                            <h5>Job Id</h5>
                                            <input type="text" name="job_id" value="{{ request()->query('jobId') }}"
                                                class="utf-with-bor" @error('job_id') is-invalid @enderror" readonly />

                                                @error('job_id')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>


                                    <input type="hidden" name="user_id" value="{{ $userData->id }}">

                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="utf-submit-field">
                                            <h5>Name</h5>
                                            <input type="text" name="name" value="{{ $userData->name }}"
                                                class="utf-with-border @error('name') is-invalid @enderror" placeholder="Name" />
                                            @error('name')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="utf-submit-field">
                                            <h5>Phone</h5>
                                            <input type="number" name="phone" value="{{ $userData->phone }}"
                                                class="utf-with-border @error('phone') is-invalid @enderror" placeholder="enter your mobile no" />
                                            @error('phone')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                  <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="utf-submit-field">
                                            <h5>Email Address</h5>
                                            <input type="email" value="{{ $userData->email }}" class="utf-with-border"
                                                name="email" placeholder="Email Address" />

                                                @error('email')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="utf-submit-field">
                                            <h5>Profession</h5>
                                            <input type="text" value="{{ $userData->profession }}" name="profession"
                                                class="utf-with-border" placeholder="Profession" />
                                                @error('profession')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                     <div class="col-xl-6 col-md-6 col-sm-6">
                                        <div class="utf-submit-field">
                                            <h5>Experience</h5>
                                            <!-- Use a dropdown -->
                                            <select name="exp" class="selectpicker utf-with-border" data-size="7"
                                                title="Select Experience">
                                                <option value="1 Year" {{ $userData->exp == '1 Year' ? 'selected' : '' }}>1
                                                    Year
                                                </option>
                                                <option value="1.5 Year"
                                                    {{ $userData->exp == '1.5 Year' ? 'selected' : '' }}>
                                                    1.5 Year</option>
                                                <option value="2 Year" {{ $userData->exp == '2 Year' ? 'selected' : '' }}>2
                                                    Year
                                                </option>
                                                <option value="2.5 Year"
                                                    {{ $userData->exp == '2.5 Year' ? 'selected' : '' }}>
                                                    2.5 Year</option>
                                                <option value="3 Year" {{ $userData->exp == '3 Year' ? 'selected' : '' }}>3
                                                    Year</option>
                                                <option value="4 Year" {{ $userData->exp == '4 Year' ? 'selected' : '' }}>4
                                                    Year</option>
                                                <option value="5 Year" {{ $userData->exp == '5 Year' ? 'selected' : '' }}>5
                                                    Year</option>
                                                <option value="More Than 5 Years"
                                                    {{ $userData->exp == 'More Than 5 Years' ? 'selected' : '' }}>More Than
                                                    5
                                                    Years</option>
                                            </select>

                                            @error('exp')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-xl-12 col-md-12 col-sm-12">
                                        <div class="utf-submit-field">
                                            <h5>Upload Resume</h5>
                                            <div class="uploadButton margin-top-15 margin-bottom-30">
                                                <input type="file" name="resume" value="{{ $userData->resume }}" id="resume">

                                                @if (!empty($userData->resume))
                                                    <div>
                                                        <a href="{{ url('upload/resume/' . $userData->resume) }}" target="_blank">View Resume</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="utf-centered-button">
                <button type="submit" name="submit" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">
                    Submit Jobs <i class="icon-feather-plus"></i>
                </button>

            </div>

        </form>

            <!-- Footer -->
            <div class="utf-dashboard-footer-spacer-aera"></div>
            <div class="utf-small-footer margin-top-15">
                @include('frontend.body.footer_copyright')
            </div>
        </div>



    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#resume').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showResume').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
