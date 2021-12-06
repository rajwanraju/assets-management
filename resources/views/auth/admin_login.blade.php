@extends('layouts.simpleMaster')

@section('page')
   Login
@endsection
@section('content')

  <div class="account-pages w-100 mt-5 mb-5">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="card mb-0">

            <div class="card-body p-4">

              <div class="account-box">
                <div class="account-logo-box">
                  <div class="text-center">
                    <a href="index.html">
                      <img src="{{asset('/')}}logo.png" alt="">
                    </a>
                  </div>
                  <h5 class="text-uppercase mb-1 mt-4">Sign In</h5>
                </div>

                <div class="account-content mt-4">

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

                  <form class="form-horizontal" action="{{route('admin.login')}}" method="post">
                    @csrf
                    <div class="form-group row">
                      <div class="col-12">
                        <label for="emailaddress">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required="" placeholder="Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-12">
                        <a href="{{route('reset.password')}}"  class="text-muted float-right"><small>Forgot your password?</small></a>
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Enter your password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-12">

                        <div class="checkbox checkbox-success">
                          <input id="remember" type="checkbox" checked="">
                          <label for="remember">
                            Remember me
                          </label>
                        </div>

                      </div>
                    </div>

                    <div class="form-group row text-center mt-2">
                      <div class="col-12">
                        <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                      </div>
                    </div>

                  </form>



                </div>
              </div>
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