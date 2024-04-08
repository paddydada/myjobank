@extends('admin.admin_dashboard')
@section('admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
{{-- <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap5.min.css" rel="stylesheet"> --}}



    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Applied Job</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Applied Jobs</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Job ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Ressume</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $index => $job)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $job->job_id }}</td>

                                    <td>{{ $job->name }}</td>
                                    <td>{{ $job->email }}</td>
                                    <td>{{ $job->phone }}</td>
                                    <td>
                                        <a href="{{ asset('upload/resume/' . $job->resume) }}" target="_blank"> <img
                                                src="{{ asset('frontend/images/eye.gif') }}"
                                                style="height:45px
                                        ;"></a>
                                    </td>

                                    <td>{{ $job->status }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Job ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Ressume</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script> --}}

    <script>
        $(document).ready(function () {
            // Initialize DataTable
            var table = $('#dataTable').DataTable();

            // Configure DataTables Buttons
            new $.fn.dataTable.Buttons(table, {
                buttons: [
                    'excel',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'csv',
                    'print'
                ]
            });

            table.buttons().container().appendTo($('#dataTable_wrapper .col-md-6:eq(0)'));
            $('#dataTable_wrapper .dt-buttons button').on('click', function () {
                console.log('Button clicked: ' + $(this).text());
            });
        });
    </script>
@endsection
