@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Jobseeker</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Jobseeker</li>
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
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
                            <h5 class="mb-0 text-primary">Edit Jobseeker</h5>
                        </div>
                        <hr>

                        <form id="myForm" method="post" action="{{ route('jobseeker.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $jobseeker->id }}">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="inputLastName" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $jobseeker->name }}" required>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $jobseeker->email }}" required>
                                </div>
                                <!-- Bussiness Phone No -->
                                <div class="col-md-6 mb-3">
                                    <label for="inputEmail" class="form-label"> Phone No</label>
                                    <input type="number" class="form-control" name="phone" value="{{ $jobseeker->phone }}" required>
                                </div>
                                <!-- Designation -->
                                <div class="col-md-6 mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{ $jobseeker->designation }}" required>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@endsection
