@extends('layouts.app')

@section('content')
<div style="height: 100vh;" class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-8">
            <div class="card" style="min-height: 50vh; background: #130d0dc2;">

                <div class="card-body ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2 text-center">
                                <img src="{{ asset('public/backend/assets/images/logo.png')}}" alt="KYAMCH MRA">
                            </div>
                            <div class="col-md-8 offset-md-2 text-center">
                                <h3 class="text-info p-2">Sign in to start your session </h3>
                            </div>
                            <div class="col-md-8 offset-md-2">
                                <input id="email" type="email" class="form-control text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <input id="password" type="password" class="form-control text-center @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
