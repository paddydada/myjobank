@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Employer</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Employers</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('employer.add') }}" type="button" class="btn btn-primary">Add Employer</a>

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
                                {{-- <th>Self</th> --}}
                                <th>Name</th>
                                <th>Bussiness Name</th>
                                <th>Username</th>
                                <th>email</th>
                                <th>Phone</th>
                                <th>Designation</th>
                                <th>Role</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($employers as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if ($item->photo)
                                            <img src="{{ asset('upload/employer_images/' . $item->photo) }}"
                                                style="width:70px; height:40px;">
                                        @else
                                            <img src="{{ asset('upload/no_image.jpg') }}" style="width:70px; height:40px;">
                                        @endif
                                    </td>


                                    {{-- <td>{{ $item->your_self }}</td> --}}
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->bussiness_name }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>
                                        <div class="badge rounded-pill bg-light-info text-danger w-100">
                                            {{ $item->role }} </div>
                                    </td>

                                    <td> <a href="{{ route('employer.edit', $item->id) }}" class="btn btn-primary" title="Edit Data">
                                            <li class="fa fa-pencil"></li>
                                        </a>
                                        <a href="{{ route('employer.delete', $item->id) }}" class="btn btn-danger"
                                            id="delete" title="Delete Data">
                                            <li class="fa fa-trash"></li>
                                        </a>


                                        @if ($item->status == 'active')
                                            <a href="{{ route('employer.inactive', $item->id) }}" class="btn btn-success"
                                                title="Inactive"><i class="fa-solid fa-thumbs-down"></i></a>
                                        @else
                                            {{-- Inactive --}}
                                            <a href="{{ route('employer.active', $item->id) }}" class="btn btn-danger"
                                                title="Active"><i class="fa-solid fa-thumbs-up"></i></a>
                                        @endif


                                        <a href="{{ route('user.change.password', $item->id) }}" class="btn btn-info" title="Change Password"><i class="fa-solid fa-key"></i></a>


                                    </td>





                                </tr>
                            @endforeach

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                {{-- <th>Self</th> --}}
                                <th>Name</th>
                                <th>Bussiness Name</th>
                                <th>Username</th>
                                <th>email</th>
                                <th>Phone</th>
                                <th>Designation</th>
                                <th>Role</th>
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
