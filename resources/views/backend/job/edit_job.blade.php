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
            <div class="breadcrumb-title pe-3">Update Job</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Job</li>
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
                            <h5 class="mb-0 text-primary"> Update Job</h5>
                        </div>
                        <hr>


                        <form class="row g-3" method="POST" action="{{ route('job.update', ['id' => $job->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Hidden input field to include the job ID -->
                            <input type="hidden" name="id" value="{{ $job->id }}">



                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Your Company Name</label>
                                <input type="text" value="{{ $job->cmp_name }}" class="form-control" name="cmp_name">
                            </div>



                            <div class="col-md-6">
                                <label for="inputLastName" class="form-label">Your Company's number of employees</label>
                                <select id="inputState" name="emp_no" class="form-select">
                                    <option value="">Select an Option</option>
                                    <option value="1-10" {{ $job->emp_no == '1-10' ? 'selected' : '' }}>1 to 10</option>
                                    <option value="10-20" {{ $job->emp_no == '10-20' ? 'selected' : '' }}>10 to 20</option>
                                    <option value="20-30" {{ $job->emp_no == '20-30' ? 'selected' : '' }}>20 to 30</option>
                                    <option value="30-40" {{ $job->emp_no == '30-40' ? 'selected' : '' }}>30 to 40</option>
                                    <option value="40-50" {{ $job->emp_no == '40-50' ? 'selected' : '' }}>40 to 50</option>
                                    <option value="50-60" {{ $job->emp_no == '50-60' ? 'selected' : '' }}>50 to 60</option>
                                    <option value="60-70" {{ $job->emp_no == '60-70' ? 'selected' : '' }}>60 to 70</option>
                                    <option value="70-80" {{ $job->emp_no == '70-80' ? 'selected' : '' }}>70 to 80</option>
                                    <option value="80-90" {{ $job->emp_no == '80-90' ? 'selected' : '' }}>80 to 90</option>
                                    <option value="90-100" {{ $job->emp_no == '90-100' ? 'selected' : '' }}>90 to 100</option>
                                    <option value="100-150" {{ $job->emp_no == '100-150' ? 'selected' : '' }}>100 to 150</option>
                                    <option value="150-200" {{ $job->emp_no == '150-200' ? 'selected' : '' }}>150 to 200</option>
                                    <option value="200-300" {{ $job->emp_no == '200-300' ? 'selected' : '' }}>200 to 300</option>
                                    <option value="300-500" {{ $job->emp_no == '300-500' ? 'selected' : '' }}>300 to 500</option>
                                    <option value="500-1000" {{ $job->emp_no == '500-1000' ? 'selected' : '' }}>500 to 1000</option>
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">First and Last Name</label>
                                <input type="text" value="{{ $job->name }}" class="form-control" name="name">

                            </div>






                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Minimum Education</label>
                                <select id="min_edu" name="min_edu" class="form-select">
                                    <option value="" selected>Select an Option</option>
                                    <option value="none" {{ $job->min_edu == 'none' ? 'selected' : '' }}>No Formal Education</option>
                                    <option value="primary" {{ $job->min_edu == 'primary' ? 'selected' : '' }}>Primary School</option>
                                    <option value="secondary" {{ $job->min_edu == 'secondary' ? 'selected' : '' }}>Secondary School</option>
                                    <option value="high_school" {{ $job->min_edu == 'high_school' ? 'selected' : '' }}>High School Diploma or GED</option>
                                    <option value="associates" {{ $job->min_edu == 'associates' ? 'selected' : '' }}>Associate's Degree</option>
                                    <option value="bachelors" {{ $job->min_edu == 'bachelors' ? 'selected' : '' }}>Bachelor's Degree</option>
                                    <option value="masters" {{ $job->min_edu == 'masters' ? 'selected' : '' }}>Master's Degree</option>
                                    <option value="doctorate" {{ $job->min_edu == 'doctorate' ? 'selected' : '' }}>Doctorate or Professional Degree</option>
                                    <option value="Other" {{ $job->min_edu == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>







                            <!--<div class="col-md-6">-->
                            <!--    <label for="inputCity" class="form-label">Phone Number</label>-->
                            <!--    <input type="number" class="form-control" value="{{ $job->phone }}" name="phone" id="phone">-->

                            <!--</div>-->




                            <div class="col-md-4">
    <label for="cat_name" class="form-label">Job Category</label>
    <select id="cat_name" name="cat_name" class="form-select @error('cat_name') is-invalid @enderror">
        <option value="" selected>Select an Option</option>
        @foreach(App\Models\jobcategory::all() as $category)
            <option value="{{ $category->cat_name }}" {{ $category->cat_name == old('cat_name', $job->cat_name) ? 'selected' : '' }}>
                {{ $category->cat_name }}
            </option>
        @endforeach
    </select>
    @error('cat_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>




                               <div class="col-md-4">
                                <label for="inputZip" class="form-label">Country Location</label>
                                  <input type="text" class="form-control" value="{{ $job->country_name }}" name="country_name" id="country_name">
                                  </div>
 
                              <div class="col-md-4">
                                <label for="inputCountry" class="form-label">Country Name</label>
                               <select class="form-select" name="country">
                               <option value="">Select a country</option>
                              <option value="Canada" {{ $job->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                                <option value="Australia" {{ $job->country == 'Australia' ? 'selected' : '' }}>Australia</option>
                               </select>
                                </div>



                            <div class="col-md-6">
                                <label for="inputZip" class="form-label">Language</label>
                                <input type="text" class="form-control" value="{{ $job->Language }}" name="language"
                                    id="language">

                            </div>







                            <div class="col-md-6">
                                <label for="job_type" class="form-label">Is this a full-time or part-time job?</label>
                                <select id="job_type" name="job_type" class="form-select">
                                    <option value="" {{ $job->job_type == '' ? 'selected' : '' }}>Select an Option</option>
                                    <option value="Full-Time" {{ $job->job_type == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                                    <option value="Part-Time" {{ $job->job_type == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                                    <option value="Other" {{ $job->job_type == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>





                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">How many people do you want to hire for this opening?</label>
                                    <select class="form-select" name="hiring_no" id="hiring_no">
                                        <option value="">Select an Option</option>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ $job->hiring_no == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                        <option value="I have an opening need to fill this role" {{ $job->hiring_no == 'I have an opening need to fill this role' ? 'selected' : '' }}>I have an opening need to fill this role</option>
                                    </select>
                                </div>
                            </div>




                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">How quickly do you need to hire?</label>
                                    <select class="form-select" name="quickly_need" id="quickly_need">
                                        <option value="">Select an Option</option>
                                        <option value="1 to 3 days" {{ $job->quickly_need == '1 to 3 days' ? 'selected' : '' }}>1 to 3 days</option>
                                        <option value="3 to 7 Days" {{ $job->quickly_need == '3 to 7 Days' ? 'selected' : '' }}>3 to 7 Days</option>
                                        <option value="1 to 2 Weeks" {{ $job->quickly_need == '1 to 2 Weeks' ? 'selected' : '' }}>1 to 2 Weeks</option>
                                        <option value="2 to 4 Weeks" {{ $job->quickly_need == '2 to 4 Weeks' ? 'selected' : '' }}>2 to 4 Weeks</option>
                                        <option value="More than 4 Weeks" {{ $job->quickly_need == 'More than 4 Weeks' ? 'selected' : '' }}>More than 4 Weeks</option>
                                        <option value="Other" {{ $job->quickly_need == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Minimum Salary $</label>
                                    <input type="number" value="{{ $job->min }}" name="min" class="form-control"
                                        placeholder="$">

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Max Salary $ </label>
                                    <input type="number" value="{{ $job->max }}" name="max" class="form-control "
                                        placeholder="$">
                                </div>

                            </div>


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Rate</label>
                                    <select class="form-select" name="rate" id="rate">
                                        <option value="">Select an Option</option>
                                        <option value="per Month" {{ $job->rate == 'per Month' ? 'selected' : '' }}>Per Month</option>
                                        <option value="Per Day" {{ $job->rate == 'Per Day' ? 'selected' : '' }}>Per Day</option>
                                        <option value="Per Year" {{ $job->rate == 'Per Year' ? 'selected' : '' }}>Per Year</option>
                                        <option value="Other" {{ $job->rate == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>










                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Job descriptions</label>
                                    <textarea class="form-control " name="job_des" id="inputAddress" placeholder="Job descriptions..." rows="5"> {{ $job->job_des }}</textarea>
                                </div>

                            </div>









                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Business Name</label>
                                    <select class="form-select" name="emp_id">
                                        <option value="Admin" {{ $job->emp_id == 'Admin' ? 'selected' : '' }}>Admin</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ $job->emp_id == $user->id ? 'selected' : '' }}>
                                                {{ $user->bussiness_name }}
                                            </option>
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
