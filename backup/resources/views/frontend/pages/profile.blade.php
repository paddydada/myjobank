@extends('dashboard')
@section('user')
    <div class="utf-dashboard-content-container-aera" data-simplebar>
        <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
            <div class="row">
                <div class="col-xl-12">
                    <h3>My Profile</h3>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li>My Profile</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="utf-dashboard-content-inner-aera">
            <div class="row">
                <div class="col-xl-6">
                    <div class="dashboard-box margin-top-0 margin-bottom-30">
                        <div class="headline">
                            <h3>My Profile Details</h3>
                        </div>



                        <div class="content with-padding padding-bottom-0">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="row">
                                                <div class="col-xl-5 col-md-3 col-sm-4">
                                                    <div class="utf-avatar-wrapper" data-tippy-placement="top"
                                                        title="Your Profile Picture">

                                                            <img src="{{ !empty($userData->photo) ? url('upload/user_images/' . $userData->photo) : url('upload/no_image.jpg') }} "
                                                            alt="User" class="rounded-circle p-1 bg-primary" width="110">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <form action="{{ route('jobseeker.profile.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf



                                            <div class="col-xl-12 col-md-6 col-sm-6">
                                                <div class="utf-submit-field">
                                                    <h5>User Name</h5>
                                                    <input type="text" class="utf-with-border" name="username"
                                                        value="{{ $userData->username }}" required>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-md-6 col-sm-6">
                                                <div class="utf-submit-field">
                                                    <h5>Your Name</h5>
                                                    <input type="text" class="utf-with-border" name="name"
                                                        value="{{ $userData->name }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-6 col-sm-6">
                                                <div class="utf-submit-field">
                                                    <h5>Phone Number</h5>
                                                    <input type="number" class="utf-with-border" name="phone"
                                                        value="{{ $userData->phone }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-6 col-sm-6">
                                                <div class="utf-submit-field">
                                                    <h5>Email Address</h5>
                                                    <input type="email" class="utf-with-border" name="email"
                                                        value="{{ $userData->email }}" required>
                                                </div>
                                            </div>


                                            <div class="col-xl-12 col-md-6 col-sm-6">
                                                <div class="utf-submit-field">
                                                    <h5>Profession</h5>
                                                    <input type="text" class="utf-with-border" name="profession"
                                                        value="{{ $userData->profession }}" required>
                                                </div>
                                            </div>



                                            <div class="col-xl-12 col-md-6 col-sm-6">
                                                <div class="utf-submit-field">
                                                    <h5>Experience</h5>
                                                    <!-- Use a dropdown -->
                                                    <select name="exp" class="selectpicker utf-with-border" data-size="7" title="Select Experience">
                                                        <option value="1 Year" {{ $userData->exp == '1 Year' ? 'selected' : '' }}>1 Year</option>
                                                        <option value="1.5 Year" {{ $userData->exp == '1.5 Year' ? 'selected' : '' }}>1.5 Year</option>
                                                        <option value="2 Year" {{ $userData->exp == '2 Year' ? 'selected' : '' }}>2 Year</option>
                                                        <option value="2.5 Year" {{ $userData->exp == '2.5 Year' ? 'selected' : '' }}>2.5 Year</option>
                                                        <option value="3 Year" {{ $userData->exp == '3 Year' ? 'selected' : '' }}>3 Year</option>
                                                        <option value="4 Year" {{ $userData->exp == '4 Year' ? 'selected' : '' }}>4 Year</option>
                                                        <option value="5 Year" {{ $userData->exp == '5 Year' ? 'selected' : '' }}>5 Year</option>
                                                        <option value="More Than 5 Years" {{ $userData->exp == 'More Than 5 Years' ? 'selected' : '' }}>More Than 5 Years</option>
                                                    </select>
                                                </div>
                                            </div>







                                            <div class="col-xl-12 col-md-6 col-sm-6">
                                                <div class="utf-submit-field">
                                                    <h5>Address</h5>
                                                    <textarea type="address" class="utf-with-border" name="address"> {{ $userData->address }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-md-6 col-sm-6">
                                                <div class="utf-submit-field">
                                                    <h5>Photo</h5>
                                                <input type="file" class="utf-with-border" id="image" name="photo">
                                          </div>
                                          <img id="showImage" src="{{ !empty($userData->photo) ? url('upload/user_images/' . $userData->photo) : url('upload/no_image.jpg') }} "
                                            alt="Admin" class="rounded-circle p-1 bg-primary" width="100">
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
                            <button type="submit" name="submit"
                                class="button ripple-effect big margin-top-10 margin-bottom-20">Save Changes</button>

                        </div>
                        </form>


                    </div>
                </div>



                <div class="col-xl-6">

                    <form method="post" action="{{ route('jobseeker.update.password') }}">
                        @csrf

                    <div id="test1" class="dashboard-box margin-top-0">
                        <div class="headline">
                            <h3>Change Password</h3>
                        </div>
                        <div class="content with-padding">
                            <div class="row">
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Current Password</h5>
                                        <input type="password" class="utf-with-border @error('old_password')
                                        is-invalid
                                    @enderror" title="Current Password"
                                            data-tippy-placement="top" id="old_password" name="old_password">
                                    </div>

                                    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                </div>

                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>New Password</h5>
                                        <input type="password" class="utf-with-border @error('new_password')
                                        is-invalid
                                    @enderror" name="new_password" id="new_password">

                                    </div>
                                    @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>

                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Confirm New Password</h5>
                                        <input type="password" class="utf-with-border @error('new_password_confirmation')
                                        is-invalid
                                    @enderror" id="new_password_confirmation"
                                    name="new_password_confirmation" type="password">
                                    </div>


                                    @error('new_password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                                </div>
                            </div>
                            <button type="submit" name="submit" class="button ripple-effect big margin-top-10">Change Password</button>
                        </div>
                    </div>


                </form>

                </div>





            </div>

            <!-- Footer -->
            <div class="utf-dashboard-footer-spacer-aera"></div>
            @include('frontend.body.footer_copyright')

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


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
