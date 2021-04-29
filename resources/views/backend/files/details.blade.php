@extends('backend.layouts.main')
@section('title', 'FILE DETAILS')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Files</a></li>
    <li class="breadcrumb-item active">Details</li>
@endsection

@section('content')
    <div class="col-12">
        <!-- Default box -->

        <div class="card card-primary">
            <div class="card-header">

                <h3 class="card-title"> FILE DETAILS</h3>

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
                <div class="col-md-10 offset-md-1 d-flex justify-content-between">
                    <div class="col-md-4">
                        <dl class="row">
                            <dt class="col-sm-5">Registration No :</dt>
                            <dd class="col-sm-7 ">{{ $data->hn }}</dd>
                            <dt class="col-sm-5">Admission No :</dt>
                            <dd class="col-sm-7 ">{{ $data->an }}</dd>
                            <dt class="col-sm-5">Patient Name :</dt>
                            <dd class="col-sm-7 ">{{ $data->patient_name }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="row">
                            <dt class="col-sm-5">Admitted Under :</dt>
                            <dd class="col-sm-7 ">{{ $data->doctor->name }}</dd>
                            <dt class="col-sm-5">Department :</dt>
                            <dd class="col-sm-7 ">{{ $data->department->name }}</dd>
                            <dt class="col-sm-5">Ward :</dt>
                            <dd class="col-sm-7 ">{{ $data->ward->name }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-3">
                        <dl class="row border">
                            <dt class="col-sm-6">Tracking No :</dt>
                            <dd class="col-sm-6 text-right">{{ $data->tracking_no }}</dd>
                            <dt class="col-sm-6">Rack :</dt>
                            <dd class="col-sm-6 text-right">{{ $data->locker->rack->name }}</dd>
                            <dt class="col-sm-6">Locker :</dt>
                            <dd class="col-sm-6 text-right">{{ $data->locker->name }}</dd>
                        </dl>
                    </div>
                </div>


                <div class="col-md-10 offset-md-1 row ">
                    <h5 class="text-bold mt-5">Issue Receive History</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Handover to</th>
                            <th>Place</th>
                            <th>Issue Date</th>
                            <th>Receive Date</th>
                            <th>Issued By</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($issueHistory->count() > 0)
                            @foreach($issueHistory as $row)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $row->handover_to }}</td>
                                    <td>{{ $row->place }}</td>
                                    <td>{{ $row->issue_date }}</td>
                                    <td>{{ $row->receive_date }}</td>
                                    <td>Prodip M</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">
                                    This file has not been issued anywhere
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>



@endsection

@section('script')

@endsection

