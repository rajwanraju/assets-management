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
                                 @if (Session::has('flash_message_error'))
                                 <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{!! session('flash_message_error') !!}</strong>
                                </div>
                                @endif

                                @if (Session::has('flash_message_success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{!! session('flash_message_success') !!}</strong>
                                </div>
                                @endif

                                @if (Session::has('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{Session::get('success')}}</strong>
                                </div>
                                @elseif (Session::has('errors'))
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @elseif (Session::has('error'))
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @endif
                            </div>
                            <form method="POST" class="form-horizontal" action="{{ route('Password.Reset.Email') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >
                                    </div>
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

