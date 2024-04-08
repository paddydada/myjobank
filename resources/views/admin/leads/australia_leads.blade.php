@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Australia Leads</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Australia Leads</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body"> 
                <button id="exportButton" class="btn btn-primary">Export to CSV</button>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Resume</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($leads as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if($item->resume)
                                            <a href="{{ url('australia_resume/' . $item->resume) }}" target="_blank">View Resume</a>
                                        @else
                                            No Resume Uploaded
                                        @endif
                                    </td>
                                    <td>{{ $item->subject }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Resume</th>
                                <th>Subject</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Include TableExport.js library -->
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableexport.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize TableExport.js
            $('#example').tableExport({
                formats: ["csv"],
                filename: "table_export",
                position: 'bottom',
            });

            // Trigger export on button click
            $('#exportButton').click(function () {
                $('#example').tableExport().start('csv');
            });
        });
    </script>
@endsection
