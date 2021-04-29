@extends('backend.layouts.main')
@section('title', 'Dashboard')

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
	<div style="height: 500px" class="col-12 d-flex  justify-content-center align-items-center">
        <!-- Default box -->
        <div  class=" text-center ">
            <img width="500px" class="m-auto py-3" src="{{ asset('public/backend/assets/images/logo.png')}}">
          <h1 style="color: red; font-family: Maiandra GD;">Khwaja Yunus Ali Medical College & Hospital</h1>
          <h3>Founder : DR. M. M. AMJAD HUSSAIN</h3>
          <h3></h3>
        </div>
        <!-- /.card -->
    </div>
@endsection
