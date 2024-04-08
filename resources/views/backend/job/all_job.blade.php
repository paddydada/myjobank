@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Job</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Jobs</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('job.add') }}" type="button" class="btn btn-primary">Add Employer</a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th>Emp. No/Name</th>
                                <th>Job ID</th>
                                <th>Country</th>
                                <th>Cmp Name</th>
                                <th>Name</th>
                                <th>Mini Edu</th>
                                <th>Cat. Name</th>
                                <th>Location</th>
                                <th>Lang</th>
                                <th>Job Type</th>
                                <th>Hiring No</th>
                                <th>Quickly Need</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Rate</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($jobs as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        @if ($item->logo)
                                            <img src="{{ asset($item->logo) }}" style="width:70px; height:20px;">
                                        @else
                                            <img src="{{ asset('upload/no_image.jpg') }}" style="width:70px; height:100%;">
                                        @endif
                                    </td>

                                    @if ($item->emp_id)
                                        <td><span
                                                class="badge rounded-pill bg-light-success text-success w-100">{{ $item->emp_id }}</span>
                                        </td>
                                    @else
                                        <td><span class="badge rounded-pill bg-light-danger text-danger w-100">Admin</span>
                                        </td>
                                    @endif

                                    <td>
                                        <span
                                            class="badge rounded-pill bg-light-info text-danger w-100">{{ $item->id }}</span>

                                    </td>
                                    <td>{{ $item->country }}</td>

                                    <td>{{ $item->cmp_name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->min_edu }}</td>
                                    <td>{{ $item->cat_name }}</td>
                                    <td>{{ $item->country_name }}</td>
                                    <td>{{ $item->Language }}</td>
                                    <td>{{ $item->job_type }}</td>
                                    <td>{{ $item->hiring_no }}</td>
                                    <td>{{ $item->quickly_need }}</td>
                                    <td>{{ $item->min }}</td>
                                    <td>{{ $item->max }}</td>
                                    <td>{{ $item->rate }}</td>





                                    <td>
                                        <a href="{{ route('job.edit', $item->id) }}" class="btn btn-primary"
                                            title="Edit Data">
                                            <li class="fa fa-pencil"></li>

                                        </a>
                                        <a href="{{ route('job.delete', $item->id) }}" class="btn btn-danger"
                                            id="delete" title="Delete Data">
                                            <li class="fa fa-trash"></li>
                                        </a>


                                        @if ($item->status == 'active')
                                            <a href="{{ route('job.inactive', $item->id) }}" class="btn btn-success"
                                                title="Inactive"><i class="fa-solid fa-thumbs-down"></i></a>
                                        @else
                                            {{-- Inactive --}}
                                            <a href="{{ route('job.active', $item->id) }}" class="btn btn-danger"
                                                title="Active"><i class="fa-solid fa-thumbs-up"></i></a>
                                        @endif


                                    </td>





                                </tr>
                            @endforeach

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th>Emp. No/Name</th>
                                <th>Job Id</th>
                                <th>Country</th>
                                <th>Cmp Name</th>
                                <th>Name</th>
                                <th>Mini Edu</th>
                                <th>Cat. Name</th>
                                <th>Location</th>
                                <th>Lang</th>
                                <th>Job Type</th>
                                <th>Hiring No</th>
                                <th>Quickly Need</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Rate</th>
                                <th>Action</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('adminbackend/assets/js/code.js') }}"></script>
@endsection
