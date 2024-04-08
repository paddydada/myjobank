@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Employer</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Employer</li>
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
                            <h5 class="mb-0 text-primary">Edit Employer</h5>
                        </div>
                        <hr>

                        <form id="myForm" method="post" action="{{ route('employer.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $employer->id }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Which option best describes your self?</label>
                                    <select class="form-select" name="your_self">
                                        <option value="1" {{ $employer->your_self == '1' ? 'selected' : '' }}>I am hiring candidate for my company.</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputLastName" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $employer->name }}" required>
                                </div>

                                <!-- Bussiness Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="inputLastName" class="form-label">Bussiness Name</label>
                                    <input type="text" class="form-control" name="bussiness_name" value="{{ $employer->bussiness_name }}" required>
                                </div>
                                <!-- Bussiness Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="inputEmail" class="form-label">Bussiness Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $employer->email }}" required>
                                </div>
                                <!-- Bussiness Phone No -->
                                <div class="col-md-6 mb-3">
                                    <label for="inputEmail" class="form-label">Bussiness Phone No</label>
                                    <input type="number" class="form-control" name="phone" value="{{ $employer->phone }}" required>
                                </div>
                                <!-- Designation -->
                                <div class="col-md-6 mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{ $employer->designation }}" required>
                                </div>
                                <!-- Company Logo -->
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Company Logo</label>
                                    <input type="file" name="photo" class="form-control" id="image">
                                </div>
                                <!-- Company Logo -->
                                <div class="col-md-6 mb-3">
                                    <label for="displayLogo" class="form-label"></label>
                                    <img id="showImage" src="{{ asset('upload/employer_images/' . $employer->photo) }}" alt="Logo" style="width:100px; height: 100px;">
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
