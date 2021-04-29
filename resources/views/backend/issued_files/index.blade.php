@extends('backend.layouts.main')
@section('title', "PATIENT'S FILE LIST ( ISSUED )")

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Files</a></li>
    <li class="breadcrumb-item active">Issued</li>
@endsection

@section('content')
    <div class="col-12">
        <!-- Default box -->

        <div class="card card-primary">
            <div class="card-header">

                <h3 class="card-title"><span><a href="{{route('files.create')}}" class="btn btn-light text-dark"> ADD NEW </a></span></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th >SL</th>
                        <th >Registration Number</th>
                        <th >Patient's Name</th>
                        <th >Department</th>
                        <th >Issued Place</th>
                        <th >Issue Date</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $row)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $row->file->hn }}</td>
                            <td>{{ $row->file->patient_name }}</td>
                            <td>{{ $row->file->department->name }}</td>
                            <td>{{ $row->place }}</td>
                            <td>{{ $row->issue_date }}</td>
                            <td>
                                <div class="btn-group">

                                    <form method="POST" id="receiveFile{{$row->id}}" action="{{route('issued-files.update', $row->id)}}">
                                        <input type="hidden" name="file_id" value="{{ $row->file_id }}">
                                        @method('patch')
                                        @csrf
                                        <button class="btn btn-sm btn-outline-primary" type="submit">RECEIVE</button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>



@endsection

@section('script')
    <script type="text/javascript">
        let table =    $("#data_table").DataTable({
            searching: true,
            lengthChange: false,
            order: [],
        });

        function deleteData(id) {

            swal.fire({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then( function (e) {
                if (e.value === true){
                    const formId = `#deleteForm${id}`
                    console.log(formId);
                    $(formId).submit();
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })

        }

    </script>
@endsection

