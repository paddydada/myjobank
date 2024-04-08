
@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Create Jobseeker Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Jobseeker Profile</li>
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
                            <h5 class="mb-0 text-primary">Jobseeker Registration</h5>
                        </div>
                        <hr>

                        <form class="row g-3" method="POST" action="{{ route('jobseeker.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Bussiness Company Name -->
                            <div class="col-md-6">
                                <label for="inputLastName" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Bussiness Phone No -->
                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Phone No</label>
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


@endsection


