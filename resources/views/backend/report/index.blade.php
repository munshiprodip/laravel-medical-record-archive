@extends('backend.layouts.main')
@section('title', 'Report')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Report</li>
@endsection

@section('content')
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-purple">
            <div class="card-header">
                <h3 class="card-title">Generate Report</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form target="_blank" class="form" method="POST" action="{{ route('report.generate') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 p-3 ">

                            <div class="form-group card pl-5 p-3">

                                <div class="icheck-primary d-block mr-5">
                                    <input type="radio" id="radioPrimary1" value="all" name="type" checked>
                                    <label for="radioPrimary1">
                                        Select all files
                                    </label>
                                </div>
                                <div class="icheck-primary d-block">
                                    <input type="radio" id="radioPrimary2" value="present" name="type" >
                                    <label for="radioPrimary2">
                                        Only present files in archive
                                    </label>
                                </div>
                                <div class="icheck-primary d-block">
                                    <input type="radio" id="radioPrimary3" value="death" name="type" >
                                    <label for="radioPrimary3">
                                        Only death patients files
                                    </label>
                                </div>
                                <div class="icheck-primary d-block">
                                    <input type="radio" id="radioPrimary4" value="issued" name="type" >
                                    <label for="radioPrimary4">
                                        Only issued patients files
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6  p-3 ">

                            <div class="form-group card pl-5 p-3">

                                <div class="icheck-primary d-block mr-5">
                                    <input type="radio" id="radioPrimary5" onclick="hideRange()" value="all" name="date_range" checked>
                                    <label for="radioPrimary5">
                                        All
                                    </label>
                                </div>
                                <div class="icheck-primary d-block">
                                    <input type="radio" id="radioPrimary6" onclick="hideRange()" value="month" name="date_range" >
                                    <label for="radioPrimary6">
                                        This Month
                                    </label>
                                </div>
                                <div class="icheck-primary d-block">
                                    <input type="radio" id="radioPrimary7" onclick="hideRange()" value="year" name="date_range" >
                                    <label for="radioPrimary7">
                                        This Year
                                    </label>
                                </div>
                                <div class="icheck-primary d-block">
                                    <input type="radio" id="radioPrimary8" onclick="showRange()" value="range" name="date_range" >
                                    <label for="radioPrimary8">
                                        Date Range
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12" id="dataRange">
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Start Date:</label>
                                    <div class="input-group date" id="reservationdateStart" data-target-input="nearest">
                                        <input type="text" id="start_date" name="start_date" class="form-control datetimepicker-input" data-target="#reservationdate">
                                        <div class="input-group-append" data-target="#reservationdateStart" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>End Date:</label>
                                    <div class="input-group date" id="reservationdateEnd" data-target-input="nearest">
                                        <input type="text" id="end_date" name="end_date" class="form-control datetimepicker-input" data-target="#reservationdate">
                                        <div class="input-group-append" data-target="#reservationdateEnd" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="reset"  style="width: 150px" class="btn btn-danger mx-3">RESET</button>
                                <button type="submit" style="width: 150px" class="btn btn-primary mx-3">RUN REPORT</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                KYAMCH MRA
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        const hideRange = () => {
            $('#dataRange').hide();
            $('#start_date').prop('required',false);
            $('#end_date').prop('required',false);
        }
        const showRange = () => {
            $('#dataRange').show();
            $('#start_date').prop('required',true);
            $('#end_date').prop('required',true);
        }
        hideRange();

    </script>
@endsection
