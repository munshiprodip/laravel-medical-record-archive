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

                <h3 class="card-title"><span><a href="{{route('files.create')}}" class="btn btn-light text-dark">ADD NEW</a></span> </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th >Tracking No</th>
                        <th >Patient's Name</th>
                        <th >Registration Number</th>
                        <th >Admission Number</th>
                        <th >Ward</th>
                        <th >Doctor</th>
                        <th >Rack</th>
                        <th >Shelf</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $row)
                        <tr>
                            <td>{{$row->tracking_no}}</td>
                            <td>{{$row->patient_name}}</td>
                            <td>{{$row->hn}}</td>
                            <td>{{$row->an}}</td>
                            <td>{{$row->ward->name}}</td>
                            <td>{{$row->doctor->name}}</td>
                            <td>{{$row->locker->rack->name}}</td>
                            <td>{{$row->locker->name}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu text-right dropdown-menu-right">
                                        <a href="{{route('files.edit', $row->id)}}" class="dropdown-item" type="button">Edit</a>

                                        <form method="POST" id="deleteForm{{$row->id}}" action="{{route('files.destroy', $row->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button onclick="deleteData({{$row->id}})" class="dropdown-item" type="button">Delete</button>
                                        </form>
                                    </div>
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




