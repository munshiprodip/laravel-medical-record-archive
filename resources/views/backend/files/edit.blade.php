@extends('backend.layouts.main')
@section('title', "EDIT PATIENT'S FILE")

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Patient's Files</li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">

                <h3 class="card-title"><span><a href="{{route('files.index')}}" class="btn btn-light text-dark ">VIEW LIST</a></span></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('files.update', $data->id)}}" >
                    @method('PATCH')
                    @csrf
                    <div class="row">


                        <div class="col-12">
                            <div class="form-group">
                                <label>Patient's Name</label>
                                <input type="text" value="{{$data->patient_name}}" id="patient_name" name="patient_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Registration Number</label>
                                <input type="text" value="{{$data->hn}}" id="hn" name="hn" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Admission Number</label>
                                <input type="text" value="{{$data->an}}" id="an" name="an" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Ward</label>
                                <select name="ward_id" id="ward_id" class="form-control" required>
                                    <option value="">Select Ward</option>
                                    @foreach($wards as $row)
                                        <option value="{{$row->id}}" {{$row->id===$data->ward_id?'selected':''}}>{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Department</label>
                                <select name="department_id" id="department_id" class="form-control" required>
                                    @foreach($departments as $row)
                                        <option value="{{$row->id}}" {{$row->id===$data->department_id?'selected':''}}>{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Doctor</label>
                                <select name="doctor_id" id="doctor_id" class="form-control" required>
                                    @foreach($doctors as $row)
                                        <option value="{{$row->id}}" {{$row->id===$data->doctor_id?'selected':''}}>{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Speciality</label>
                                <select name="speciality_id" id="speciality_id" class="form-control" required>
                                    @foreach($specialities as $row)
                                        <option value="{{$row->id}}" {{$row->id===$data->speciality_id?'selected':''}}>{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Locker</label>
                                <select name="locker_id" id="locker_id" class="form-control" required>
                                    <option value="">Select Locker</option>
                                    @foreach($lockers as $row)
                                        <option value="{{$row->id}}" {{$row->id===$data->locker_id?'selected':''}}>{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Tracking Number</label>
                                <input type="text" value="{{$data->tracking_no}}" id="tracking_no" name="tracking_no" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                                <input type="submit" value="Update" class="btn btn-block btn-lg btn-primary float-right">
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Modal for Add Blood Group -->
    {{--    <div class="modal fade" id="addData">--}}
    {{--        <div class="modal-dialog">--}}
    {{--            <div class="modal-content">--}}
    {{--                <form method="POST" >--}}
    {{--                    @csrf--}}
    {{--                    <div class="modal-header">--}}
    {{--                        <h4 class="modal-title">Add Rack</h4>--}}
    {{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                            <span aria-hidden="true">&times;</span>--}}
    {{--                        </button>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-body">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input type="text" name="name" class="form-control" required placeholder="Name" >--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input type="text" name="description" class="form-control" required placeholder="Description" >--}}
    {{--                            <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-footer justify-content-between">--}}
    {{--                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
    {{--                        <input type="submit" class="btn btn-primary" value="Submit">--}}
    {{--                    </div>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--            <!-- /.modal-content -->--}}
    {{--        </div>--}}
    {{--        <!-- /.modal-dialog -->--}}
    {{--    </div>--}}
    <!-- /.modal -->

    <!-- Modal for Edit Blood Group -->
    {{--    <div class="modal fade" id="editData">--}}
    {{--        <div class="modal-dialog">--}}
    {{--            <div class="modal-content">--}}
    {{--                <form method="POST" >--}}
    {{--                    @csrf--}}
    {{--                    @method('PATCH')--}}
    {{--                    <div class="modal-header">--}}
    {{--                        <h4 class="modal-title">Edit Rack</h4>--}}
    {{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                            <span aria-hidden="true">&times;</span>--}}
    {{--                        </button>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-body">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input type="text" id="name" name="name" class="form-control" required>--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input type="text" id="description" name="description" class="form-control" required>--}}
    {{--                            <input type="hidden" name="updated_by" value="{{ Auth::user()->id }}">--}}
    {{--                            <input type="hidden" id="id" name="id">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-footer justify-content-between">--}}
    {{--                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
    {{--                        <input type="submit" class="btn btn-primary" value="Update">--}}
    {{--                    </div>--}}

    {{--                </form>--}}
    {{--            </div>--}}
    {{--            <!-- /.modal-content -->--}}
    {{--        </div>--}}
    {{--        <!-- /.modal-dialog -->--}}
    {{--    </div>--}}
    <!-- /.modal -->

@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection


