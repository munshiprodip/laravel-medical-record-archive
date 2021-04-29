@extends('backend.layouts.main')
@section('title', 'RACK LIST')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Archive Setting</a></li>
    <li class="breadcrumb-item active">Rack</li>
@endsection

@section('content')
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">

                <h3 class="card-title"><span><a onclick="addData()" href="#" class="btn btn-light text-dark">ADD NEW</a></span> </h3>

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
                        <th width="50px">#</th>
                        <th width="20%">Name</th>
                        <th>Description</th>
                        <th width="15%">Action</th>
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
    <div class="modal fade" id="addData">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" >
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Rack</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required placeholder="Name" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="description" class="form-control" required placeholder="Description" >
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
    <div class="modal fade" id="editData">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" >
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Rack</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="description" name="description" class="form-control" required>
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
        var table =    $("#data_table").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            lengthChange: false,
            ajax: "{{route('api.rack')}}",
            columns: [
                {data:'DT_RowIndex'},
                {data:'name'},
                {data:'description'},
                // {data: function (data) {
                //         let chk = '';
                //         let st = 'Deactive';
                //
                //         if (data.active_status == 1){
                //             chk = 'checked';
                //             st = 'Active';
                //         }
                //         return `<div class="custom-control custom-switch">
                //                     <input type="checkbox" onchange="changeStatus(${data.id})" ${chk} class="custom-control-input" id="customSwitch${data.id}">
                //                     <label class="custom-control-label" for="customSwitch${data.id}">${st}</label>
                //                 </div>`
                //     }},
                {data:'action'},
            ]
        });

        function addData() {
            $('#addData form')[0].reset();
            $("#addData").modal('show');
        }

        $(function () {
            $('#addData form').on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    $.ajax({
                        url: "{{route('store.rack')}}",
                        type: "POST",
                        data: $('#addData form').serialize(),
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

                            $('#addData').modal('hide');
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


        function editData(id) {
            console.log(id)
            $('#editData form')[0].reset();
            $.ajax({
                url: "{{url('rack')}}"+'/'+id+'/edit',
                type: "GET",
                dataType:"JSON",
                success:function (data) {
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#description').val(data.description);
                    $('#editData').modal('show');
                },
                error: function () {
                    alert('Oops!!!');
                }

            })
        }

        $(function () {
            $('#editData form').on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    $.ajax({
                        url: "{{url('rack')}}"+'/'+id,
                        type: "POST",
                        data: $('#editData form').serialize(),
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

                            $('#editData').modal('hide');
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
                    var csrf_token =$('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "{{url('rack')}}"+'/'+id+'/delete',
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
