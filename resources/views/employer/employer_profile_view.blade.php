@extends('employer.employer_dashboard')
@section('employer')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Employer Profile</div>
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
        <div class="container">
            <div class="main-body">
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ !empty($employerData->photo) ? url('upload/employer_images/' . $employerData->photo) : url('upload/no_image.jpg') }}"
                                    alt="Admin"
                                    class="rounded-circle p-1"
                                    width="110"
                                    style="border: 2px solid #000;">

                                    <div class="mt-3">
                                        <h4>{{ $employerData->name }}</h4>
                                        <p class="text-secondary mb-1">{{ $employerData->role }}</p>
                                        {{-- <p class="text-muted font-size-sm">{{ $employerData->designation }}</p> --}}

                                    </div>
                                </div>
                                <hr class="my-2">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('employer.profile.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3 mt-3">

{{--
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Which option best describes your self?</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select class="form-select">
                                                    <option value="1">I am hiring candidate for my company.</option>
                                                </select>
                                            </div>
                                        </div> --}}


                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Username</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="username" class="form-control"
                                                value="{{ $employerData->username }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Bussiness Company Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $employerData->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Bussiness Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="bussiness_name" class="form-control"
                                                value="{{ $employerData->bussiness_name }}">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Bussiness Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="email"class="form-control"
                                                value="{{ $employerData->email }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Bussiness Phone No</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="number" name="phone" class="form-control"
                                                value="{{ $employerData->phone }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Designation</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="designation" class="form-control"
                                                value="{{ $employerData->designation }}">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Photo</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" id="image" name="photo" class="form-control">
                                            <br>
                                            <img id="showImage"
                                                src="{{ !empty($employerData->photo) ? url('upload/employer_images/' . $employerData->photo) : url('upload/no_image.jpg') }}"
                                                class="rounded-circle p-1" width="110">
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Update Profile">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

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
