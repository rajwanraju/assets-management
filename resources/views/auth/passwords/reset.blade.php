@extends('layouts.simpleMaster')

@section('page')
Password Reset
@endsection
@section('content')

<div class="account-pages w-100 mt-5 mb-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mb-0">

                    <div class="card-body p-4">

                        <div class="account-box">
                            <div class="text-center account-logo-box">
                                <div>
                                    <a href="{{url('/')}}">
                                        <img src="{{asset('/')}}images/logo.png" alt="" >
                                    </a>
                                </div>
                            </div>
                            <div class="account-content mt-4">
                                <div class="text-center">
                                </div>
                                <form method="POST" action="{{ url('/password/reset') }}" >
                                    @csrf

                                    <input type="hidden" name="token" value="{!! $token !!}">

                                    <div class="form-group row">
                                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                                        
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    
                                    <div class="form-group row text-center mt-2">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Reset Password</button>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <div class="clearfix"></div>
                                
                                <div class="row mt-4">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted mb-0">Back to <a href="{{url('/')}}" class="text-dark ml-1"><b>Sign In</b></a></p>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <!-- end card-box-->
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

@endsection


