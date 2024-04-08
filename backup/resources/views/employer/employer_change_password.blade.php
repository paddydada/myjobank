@extends('employer.employer_dashboard')
@section('employer')



<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Change Password</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <br>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update.password') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">

                                        {{ session('status') }}
                                    </div>
                                @elseif(session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif




                                <div class="row mb-3 mt-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Old Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" id="current_password" name="old_password"
                                            class="form-control @error('old_password')
                                        is-invalid
                                    @enderror"
                                            placeholder="Old Password">

                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">New Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" id="current_password" name="new_password"
                                            class="form-control @error('new_password')
                                        is-invalid
                                    @enderror"
                                            placeholder="New Password">

                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row mb-3 mt-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Confirm Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" id="current_password" name="new_password_confirmation"
                                            class="form-control @error('new_password_confirmation')
                                        is-invalid
                                    @enderror"
                                            placeholder="New Password">



                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Change Password">
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





@endsection
