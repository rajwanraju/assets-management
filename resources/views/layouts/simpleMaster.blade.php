<!DOCTYPE html>
<html lang="en">
<head>
  <title>Asset Management | @yield('page') </title>
  <?php echo
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  header('Content-Type: text/html');?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('/')}}/public/favicon.ico">

  <!-- App css -->
  <link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
  <link href="{{asset('/')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('/')}}assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />

  <style>
      .logo-box {
    height: 70px;
    width: 240px;
    float: left;
    background-color: #fff;
}
</style>
</head>

 <body class="{{ Auth::guard('web')->check() ?  '' : 'authentication-bg bg-dark authentication-bg-pattern d-flex align-items-center pb-0 vh-100'}}">

@if(Auth::guard('web')->check())

    @include('layouts.simplenavbar')

    @include('layouts.simplesidebar')
@endif

    @yield('content')

  <!-- Vendor js -->
  <script src="{{asset('/')}}assets/js/vendor.min.js"></script>

  <!-- App js -->
  <script src="{{asset('/')}}assets/js/app.min.js"></script>
</body>

</html>