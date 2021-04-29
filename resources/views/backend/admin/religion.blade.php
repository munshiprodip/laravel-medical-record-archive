@extends('backend.layouts.main')
@section('title', 'Admin Section')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item ">Admin Area</li>
    <li class="breadcrumb-item active">Religion</li>
@endsection

@section('content')
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-dark">
            <div class="card-header">

                <h3 class="card-title"><span><a onclick="addReligion()" href="#" class="btn btn-outline-info"> ADD NEW</button></a></span>RELIGION LIST</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <table id="religionTable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th width="70%">Religion</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Modal for Add Blood Group -->
    <div class="modal fade" id="addReligion">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" >
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Religion</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text"  name="religions" class="form-control" required>
                            <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal for Edit Blood Group -->
    <div class="modal fade" id="editReligion">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" >
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Religion</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" id="religions" name="religions" class="form-control" required>
                            <input type="hidden" name="updated_by" value="{{ Auth::user()->id }}">
                            <input type="hidden" id="id" name="id">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection

@section('script')
    <script type="text/javascript">
        var table =    $("#religionTable").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            lengthChange: false,
            ajax: "{{route('api.religion')}}",
            columns: [
                {data:'DT_RowIndex'},
                {data:'religions'},
                {data:'action'},
            ]
        });

        function addReligion() {
            $('#addReligion form')[0].reset();
            $("#addReligion").modal('show');
        }

        $(function () {
            $('#addReligion form').on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    $.ajax({
                        url: "{{route('create.religion')}}",
                        type: "POST",
                        data: $('#addReligion form').serialize(),
                        success:function (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000,
                                timerProgressBar: true,

                            })

                            if (data.success === true) {
                                Toast.fire("Done!", data.message, "success");
                            } else {
                                Toast.fire("Error!", data.message, "error");
                            }

                            $('#addReligion').modal('hide');
                            table.ajax.reload();

                        },
                        error: function () {
                            alert('Oops!!!');
                        }
                    });
                    return false;
                }
            });
        })

        function editReligion(id) {
            $('#editReligion form')[0].reset();
            $.ajax({
                url: "{{url('religion')}}"+'/'+id+'/edit',
                type: "GET",
                dataType:"JSON",
                success:function (data) {
                    $('#id').val(data.id);
                    $('#religions').val(data.religions);
                    $('#editReligion').modal('show');
                },
                error: function () {
                    alert('Oops!!!');
                }

            })
        }

        $(function () {
            $('#editReligion form').on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    $.ajax({
                        url: "{{url('religion')}}"+'/'+id,
                        type: "POST",
                        data: $('#editReligion form').serialize(),
                        success:function (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000,
                                timerProgressBar: true,

                            })

                            if (data.success === true) {
                                Toast.fire("Done!", data.message, "success");
                            } else {
                                Toast.fire("Error!", data.message, "error");
                            }

                            $('#editReligion').modal('hide');
                            table.ajax.reload();
                        },
                        error: function () {
                            alert('Oops!!!');
                        }
                    });
                    return false;
                }
            });
        })

        function deleteReligion(id) {

            swal.fire({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then( function (e) {
                if (e.value === true){
                    var csrf_token =$('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "{{url('religion')}}"+'/'+id+'/delete',
                        type: "POST",
                        data:{'_method': 'DELETE', '_token': csrf_token},
                        success:function (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000,
                                timerProgressBar: true,

                            })

                            if (data.success === true) {
                                Toast.fire("Done!", data.message, "success");
                            } else {
                                Toast.fire("Error!", data.message, "error");
                            }
                            table.ajax.reload();
                        },
                        error: function () {
                            alert('Oops!!!');
                        }

                    })
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })

        }

    </script>

@endsection
