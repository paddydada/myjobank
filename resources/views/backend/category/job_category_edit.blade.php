@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Category</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <br>

        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">

                            <h5 class="mb-0 text-primary">Edit Job Category</h5>
                        </div>
                        <hr>

                        <form id="myForm" method="post" action="{{ route('job.category.update', ['id' => $categories->id]) }}" enctype="multipart/form-data">

                            @csrf
                            {{-- <input type="hidden" name="id" value="{{ $categories->id }}"> --}}
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="inputLastName" class="form-label">Job Category Name</label>
                                    <input type="text" class="form-control" name="cat_name" value="{{ $categories->cat_name }}" required>
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
