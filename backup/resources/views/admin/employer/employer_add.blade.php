@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Create Employer Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Employer Profile</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <br>


        <div class="row">
            <div class="col-xl-10 mx-auto">

                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Employer Registration</h5>
                        </div>
                        <hr>

                        <form class="row g-3" method="POST" action="{{ route('employer.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">Which option best describes your self?</label>
                                <select class="form-select" name="your_self">
                                    <option value="1" {{ old('your_self') == '1' ? 'selected' : '' }}>I am hiring candidate for my company.</option>
                                </select>
                            </div>
                            <!-- Username -->
                            <div class="col-md-6">
                                <label for="inputLastName" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Bussiness Company Name -->
                            <div class="col-md-6">
                                <label for="inputLastName" class="form-label">Bussiness Company Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Bussiness Name -->
                            <div class="col-md-6">
                                <label for="inputLastName" class="form-label">Bussiness Name</label>
                                <input type="text" class="form-control" name="bussiness_name" value="{{ old('bussiness_name') }}">
                                @error('bussiness_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Bussiness Email -->
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Bussiness Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Bussiness Phone No -->
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Bussiness Phone No</label>
                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Designation -->
                            <div class="col-6">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" name="designation" value="{{ old('designation') }}">
                                @error('designation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="col-md-6">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Confirm Password -->
                            <div class="col-md-6">
                                <label for="inputPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password">
                                @error('confirm_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Company Logo -->
                            <div class="col-12">
                                <label for="inputPassword" class="form-label">Company Logo</label>
                                <input type="file" id="image" name="photo" class="form-control">
                                <br>
                                <img id="showImage"
                                    src="{{ old('photo') ? url('upload/employer_images/' . old('photo')) : url('upload/no_image.jpg') }}"
                                    class="rounded-circle p-1" width="110">
                            </div>
                            <!-- Submit Button -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Register</button>
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
