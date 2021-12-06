<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('page')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}/favicon.ico">

    <!-- third party css -->
    <link href="{{asset('/')}}assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />


    <link href="{{asset('/')}}assets/css/sweetalert.min.css" rel="stylesheet">
    <!-- Summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- Plugins css -->

    <link href="{{asset('/')}}assets/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="{{asset('/')}}assets/css/bootstrap-datetimepicker.css" rel="stylesheet" />
    <!-- App css -->
    <link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('/')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />


    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <style>

    .note-editor .note-toolbar, .note-popover .popover-content{
      background: red !important;
  }
  .note-editor .note-toolbar .note-para .note-dropdown-menu, .note-popover .popover-content .note-para .note-dropdown-menu{
    
      background: red !important;  
  }

  .logo-box {
    height: 70px;
    width: 240px;
    float: left;
    background-color: #fff;
}
</style>

@livewireStyles
@stack('css')

</head>

<body style="background:#ECF0F5">


    
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        @include('layouts.navbar')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.sidebar')
        <!-- Left Sidebar End -->

        <div class="content-page">
            <div class="content">
              <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                 <!--    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">@yield('page')</a></li>

                                    </ol> -->

                                    <ol class="breadcrumb">
                                     <li class="breadcrumb-item">
                                         <i class="fa fa-home"></i>
                                         <a href="{{url('/')}}">HOME</a>
                                     </li>

                                     @for($i = 2; $i <= count(Request::segments()); $i++)
                                     <li class="breadcrumb-item">
                                       <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
                                        {{strtoupper(Request::segment($i))}}
                                    </a>
                                </li>
                                @endfor
                            </ol>
                        </div>
                        <h4 class="page-title">@yield('page')</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @include('layouts.message')
            @include('sweetalert::alert')

            
            @yield('content')
        </div>
    </div>
</div>
<!-- END wrapper -->

<!-- Vendor js -->
<script src="{{asset('/')}}assets/js/vendor.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/spartan-multi-image-picker.js"></script>

<!-- Required datatable js -->
<script src="{{asset('/')}}assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{asset('/')}}assets/libs/datatables/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}assets/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/')}}assets/libs/jszip/jszip.min.js"></script>
<script src="{{asset('/')}}assets/libs/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/')}}assets/libs/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/')}}assets/libs/datatables/buttons.html5.min.js"></script>
<script src="{{asset('/')}}assets/libs/datatables/buttons.print.min.js"></script>
<script src="{{asset('/')}}assets/libs/datatables/buttons.colVis.js"></script>

<!-- Responsive examples -->
<script src="{{asset('/')}}assets/libs/datatables/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}assets/libs/datatables/responsive.bootstrap4.min.js"></script>
<script type="application/javascript" src="{{asset('/')}}assets/js/sweetalert.min.js"></script>



<!-- Datatables init -->
<script src="{{asset('/')}}assets/js/pages/datatables.init.js"></script>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="{{asset('/')}}assets/js/app.min.js"></script>


<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<script type="text/javascript">
    $(".summernote").summernote({
       fontNames: ['Arial', 'Arial Black','Times','Roboto','Times New Roman', 'Georgia', 'serif', 'Comic Sans MS', 'Courier New', 'serif','Verdana', 'Helvetica', 'sans-serif','Lucida Console', 'Courier', 'monospace','Comic Sans', 'Comic Sans MS', 'cursive','Zapf Chancery', 'cursive','Coronetscript', 'cursive','Florence', 'cursive','Parkavenue', 'cursive','cursive','Impact','Arnoldboecklin','Oldtown','Blippo','Brushstroke','fantasy','Abril Fatface','Aclonica'],
       lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
       fontsize: ['6', '8', '10', '12', '14', '18', '20', '24', '30', '36', '40', '60','72','84','100'],
       height: 300,
       toolbar: [
       [ 'style', [ 'style' ] ],
       [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
       [ 'fontname', [ 'fontname' ] ],
       [ 'fontsize', [ 'fontsize' ] ],
       [ 'color', [ 'color' ] ],
       [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
       [ 'table', [ 'table' ] ],
       [ 'insert', [ 'link'] ],
       [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
       ]
   });
</script>

@livewireScripts
@stack('js')

</body>

</html>
