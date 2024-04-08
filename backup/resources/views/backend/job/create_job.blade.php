@extends('admin.admin_dashboard')
@section('admin')
    <style>
        /* Custom styling for round checkbox */
        .round-checkbox .form-check-input {
            border-radius: 50%;
            width: 1.5em;
        }
    </style>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Create Job</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Job</li>
                    </ol>
                </nav>
            </div>
        </div>


        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="lni lni-briefcase me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary"> Create Job</h5>
                        </div>
                        <hr>

                        <form class="row g-3" method="POST" action="{{ route('job.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-4">
                                <label for="inputFirstName" class="form-label">Your Company Name</label>
                                <input type="text" value="{{ old('cmp_name') }}"
                                    class="form-control @error('cmp_name') is-invalid @enderror" name="cmp_name">
                                @error('cmp_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label for="inputLastName" class="form-label">Your Company's number of employees</label>
                                <select id="inputState" name="emp_no"
                                    class="form-select @error('emp_no') is-invalid @enderror">
                                    <option value="">Select an Option</option>
                                    <option value="1-10" {{ old('emp_no') == '1-10' ? 'selected' : '' }}>1 to 10</option>
                                    <option value="10-20" {{ old('emp_no') == '10-20' ? 'selected' : '' }}>10 to 20
                                    </option>
                                    <option value="20-30" {{ old('emp_no') == '20-30' ? 'selected' : '' }}>20 to 30
                                    </option>
                                    <option value="30-40" {{ old('emp_no') == '30-40' ? 'selected' : '' }}>30 to 40
                                    </option>
                                    <option value="40-50" {{ old('emp_no') == '40-50' ? 'selected' : '' }}>40 to 50
                                    </option>
                                    <option value="50-60" {{ old('emp_no') == '50-60' ? 'selected' : '' }}>50 to 60
                                    </option>
                                    <option value="60-70" {{ old('emp_no') == '60-70' ? 'selected' : '' }}>60 to 70
                                    </option>
                                    <option value="70-80" {{ old('emp_no') == '70-80' ? 'selected' : '' }}>70 to 80
                                    </option>
                                    <option value="80-90" {{ old('emp_no') == '80-90' ? 'selected' : '' }}>80 to 90
                                    </option>
                                    <option value="90-100" {{ old('emp_no') == '90-100' ? 'selected' : '' }}>90 to 100
                                    </option>
                                    <option value="100-150" {{ old('emp_no') == '100-150' ? 'selected' : '' }}>100 to 150
                                    </option>
                                    <option value="150-200" {{ old('emp_no') == '150-200' ? 'selected' : '' }}>150 to 200
                                    </option>
                                    <option value="200-300" {{ old('emp_no') == '200-300' ? 'selected' : '' }}>200 to 300
                                    </option>
                                    <option value="300-500" {{ old('emp_no') == '300-500' ? 'selected' : '' }}>300 to 500
                                    </option>
                                    <option value="500-1000" {{ old('emp_no') == '500-1000' ? 'selected' : '' }}>500 to
                                        1000</option>
                                </select>

                                @error('emp_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label for="inputFirstName" class="form-label">First and Last Name</label>
                                <input type="text" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>








                           <div class="col-md-6">
                                <label for="inputState" class="form-label">Minimum Education</label>
                                <select id="min_edu" name="min_edu"
                                    class="form-select @error('min_edu') is-invalid @enderror">
                                    <option value="" selected>Select an Option</option>
                                    <option value="none" {{ old('min_edu') == 'none' ? 'selected' : '' }}>No Formal
                                        Education</option>
                                    <option value="primary" {{ old('min_edu') == 'primary' ? 'selected' : '' }}>Primary
                                        School</option>
                                    <option value="secondary" {{ old('min_edu') == 'secondary' ? 'selected' : '' }}>
                                        Secondary School</option>
                                    <option value="high_school" {{ old('min_edu') == 'high_school' ? 'selected' : '' }}>
                                        High School Diploma or GED</option>
                                    <option value="associates" {{ old('min_edu') == 'associates' ? 'selected' : '' }}>
                                        Associate's Degree</option>
                                    <option value="bachelors" {{ old('min_edu') == 'bachelors' ? 'selected' : '' }}>
                                        Bachelor's Degree</option>
                                    <option value="masters" {{ old('min_edu') == 'masters' ? 'selected' : '' }}>Master's
                                        Degree</option>
                                    <option value="doctorate" {{ old('min_edu') == 'doctorate' ? 'selected' : '' }}>
                                        Doctorate or Professional Degree</option>
                                    <option value="Other" {{ old('min_edu') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('min_edu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>






                          <div class="col-md-6">
                                <label for="inputCity" class="form-label">Phone Number</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" name="phone" id="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label for="cat_name" class="form-label">Job Category</label>
                                <select id="cat_name" name="cat_name" class="form-select @error('cat_name') is-invalid @enderror">
                                    <option value="" selected>Select an Option</option>
                                    @foreach(App\Models\jobcategory::all() as $category)
                                        <option value="{{ $category->cat_name }}">{{ $category->cat_name }}</option>
                                    @endforeach
                                </select>
                                @error('cat_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>





                        {{-- <div class="col-md-6">
                                <label for="inputZip" class="form-label">Job Title</label>
                                <input type="text" class="form-control @error('job_title') is-invalid @enderror"
                                    value="{{ old('job_title') }}" name="job_title" id="job_title">

                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}





                              <div class="col-md-6">
                                <label for="inputZip" class="form-label">Country Location</label>
                                <input type="text" class="form-control  @error('country_name') is-invalid @enderror"
                                    value="{{ old('country_name') }}" name="country_name" id="country_name">
                                @error('country_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                            <div class="col-md-6">
                                <label for="inputZip" class="form-label">Language</label>
                                <input type="text" class="form-control @error('language') is-invalid @enderror"
                                    value="{{ old('language') }}" name="language" id="language">
                                @error('language')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>








                             <div class="col-md-6">
                                <label for="job_type" class="form-label">Is this a full-time or part-time job?</label>
                                <select id="job_type" name="job_type" class="form-select @error('job_type') is-invalid @enderror">
                                    <option value="" selected>Select an Option</option>
                                    <option value="Full-Time" {{ old('job_type') == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                                    <option value="Part-Time" {{ old('job_type') == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                                    <option value="Other" {{ old('job_type') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('job_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>










                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">How many people do you want to hire for this opening?</label>
                                    <select class="form-select @error('hiring_no') is-invalid @enderror" name="hiring_no" id="hiring_no">
                                        <option value="">Select an Option</option>
                                        <option value="1" {{ old('hiring_no') == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('hiring_no') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('hiring_no') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('hiring_no') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('hiring_no') == '5' ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ old('hiring_no') == '6' ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ old('hiring_no') == '7' ? 'selected' : '' }}>7</option>
                                        <option value="8" {{ old('hiring_no') == '8' ? 'selected' : '' }}>8</option>
                                        <option value="9" {{ old('hiring_no') == '9' ? 'selected' : '' }}>9</option>
                                        <option value="10" {{ old('hiring_no') == '10' ? 'selected' : '' }}>10</option>
                                        <option value="I have an opening need to file this role" {{ old('hiring_no') == 'I have an opening need to file this role' ? 'selected' : '' }}>I have an opening need to file this role</option>
                                    </select>
                                    @error('hiring_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                           <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">How quickly do you need to hire?</label>
                                    <select class="form-select @error('quickly_need') is-invalid @enderror" name="quickly_need" id="quickly_need">
                                        <option value="">Select an Option</option>
                                        <option value="1 to 3 days" {{ old('quickly_need') == '1 to 3 days' ? 'selected' : '' }}>1 to 3 days</option>
                                        <option value="3 to 7 Days" {{ old('quickly_need') == '3 to 7 Days' ? 'selected' : '' }}>3 to 7 Days</option>
                                        <option value="1 to 2 Weeks" {{ old('quickly_need') == '1 to 2 Weeks' ? 'selected' : '' }}>1 to 2 Weeks</option>
                                        <option value="2 to 4 Weeks" {{ old('quickly_need') == '2 to 4 Weeks' ? 'selected' : '' }}>2 to 4 Weeks</option>
                                        <option value="More than 4 Weeks" {{ old('quickly_need') == 'More than 4 Weeks' ? 'selected' : '' }}>More than 4 Weeks</option>
                                        <option value="Other" {{ old('quickly_need') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('quickly_need')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Minimum Salary $</label>
                                    <input type="number" value="{{ old('min') }}" name="min" class="form-control @error('min') is-invalid @enderror" placeholder="$">
                                    @error('min')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Max Salary $ </label>
                                    <input type="number" value="{{ old('max') }}" name="max" class="form-control @error('max') is-invalid @enderror" placeholder="$">
                                    @error('max')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Rate</label>
                                    <select class="form-select @error('rate') is-invalid @enderror" name="rate" id="rate">
                                        <option value="">Select an Option</option>
                                        <option value="per Month" {{ old('rate') == 'per Month' ? 'selected' : '' }}>Per Month</option>
                                        <option value="Per Day" {{ old('rate') == 'Per Day' ? 'selected' : '' }}>Per Day</option>
                                        <option value="Per Year" {{ old('rate') == 'Per Year' ? 'selected' : '' }}>Per Year</option>
                                        <option value="Other" {{ old('rate') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>











                                <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Job descriptions</label>
                                    <textarea class="form-control  @error('job_des') is-invalid @enderror"   name="job_des" id="inputAddress" placeholder="Job descriptions..." rows="5">{{ old('job_des') }}</textarea>
                                </div>
                                @error('job_des')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>






                            <div class="col-md-6">
                                <label for="inputPassword" class="form-label">Company Logo</label>
                                <input type="file" id="image" name="logo" class="form-control">
                                <br>
                                <img id="showImage"
                                    src="{{ old('logo') ? url('upload/logo/' . old('logo')) : url('upload/no_image.jpg') }}"
                                    class="rounded-circle p-1" width="110">
                        </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Business Name</label>
                                    <select class="form-select" name="emp_id">
                                        <option value=""></option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->bussiness_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Submit Job</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
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
@endsection
