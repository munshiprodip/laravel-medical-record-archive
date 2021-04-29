@extends('backend.layouts.main')
@section('title', "CREATE PATIENT'S FILE")

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Files</a></li>
    <li class="breadcrumb-item active">Store</li>
@endsection

@section('content')
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">

                <h3 class="card-title"><span><a href="{{route('files.index')}}"  class="btn btn-light text-dark">VIEW LIST</a></span> </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('files.store')}}" >
                    @csrf
                    <div class="row">


                        <div class="col-6">
                            <div class="form-group">
                                <label>Patient's Name</label>
                                <input type="text" id="patient_name" name="patient_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Registration Number</label>
                                <input type="text" id="hn" name="hn" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Admission Number</label>
                                <input type="text" id="an" name="an" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Department</label>
                                <select name="department_id" id="department_id" class="form-control" required>
                                    <option value="">Select Department</option>
                                    @foreach($departments as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Admitted Under</label>
                                <select name="doctor_id" id="doctor_id" class="form-control" required>
                                    <option value="">Select Doctor</option>
                                    @foreach($doctors as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Speciality</label>
                                <select name="speciality_id" id="speciality_id" class="form-control" required>
                                    <option value="">Select Speciality</option>
                                    @foreach($specialities as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="col-6">
                            <div class="form-group">
                                <label>Ward</label>
                                <select name="ward_id" id="ward_id" class="form-control" required>
                                    <option value="">Select Ward</option>
                                    @foreach($wards as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
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
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Tracking Number</label>
                                <input type="text" id="tracking_no" name="tracking_no" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <div>
                                    <label>Death?</label>
                                </div>
                                <div class="icheck-primary d-inline mr-5">
                                    <input type="radio" id="radioPrimary1" value="1" name="is_dead" >
                                    <label for="radioPrimary1">
                                        Yes
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" value="0" name="is_dead" checked>
                                    <label for="radioPrimary2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                                <input type="submit" value="Save" class="btn btn-block btn-lg btn-danger">
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>



@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection


