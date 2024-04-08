@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Jobs Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All job</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                    <a href="{{ route('job.category.add') }}" type="button" class="btn btn-primary">Add Jobs Category</a>

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
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->cat_name }}</td>

                                    <td>
                                        <a href="{{ route('job.category.edit', $item->id) }}" class="btn btn-primary" title="Edit Data">
                                            <li class="fa fa-pencil"></li>
                                        </a>

                                        <a href="{{ route('job.category.delete', $item->id) }}" class="btn btn-danger" title="Delete Data"
                                            id="delete">
                                            <li class="fa fa-trash"></li>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
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
