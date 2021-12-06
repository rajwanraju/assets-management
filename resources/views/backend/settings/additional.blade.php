@extends('layouts.master')

@section('page')
Additional Settings
@endsection

@push('css')
<style type="text/css">

	#image-preview {
        width: 300px;
        height: 200px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #ecf0f1;
        border: 1px solid black;
        margin: 10px;
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 800px) and (orientation: portrait) {
        #image-preview {
            width: 300px;
            height: 200px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
            border: 1px solid black;
            margin: 10px;
        }
    }

    #image-preview input {
        width: 300px;
        height: 200px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }

    #image-preview label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        vertical-align: middle;
        background-color: #bdc3c7;
        width: 223px;
        height: 50px;
        font-size: 14px;
        line-height: 55px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }
            #paralax-image-preview {
        width: 300px;
        height: 200px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #ecf0f1;
        border: 1px solid black;
        margin: 10px;
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 800px) and (orientation: portrait) {
        #paralax-image-preview {
            width: 300px;
            height: 200px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
            border: 1px solid black;
            margin: 10px;
        }
    }

    #paralax-image-preview input {
        width: 300px;
        height: 200px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }

    #paralax-image-preview label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        vertical-align: middle;
        background-color: #bdc3c7;
        width: 223px;
        height: 50px;
        font-size: 14px;
        line-height: 55px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }
        #user-image-preview {
        width: 300px;
        height: 200px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #ecf0f1;
        border: 1px solid black;
        margin: 10px;
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 800px) and (orientation: portrait) {
        #user-image-preview {
            width: 300px;
            height: 200px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
            border: 1px solid black;
            margin: 10px;
        }
    }

    #user-image-preview input {
        width: 300px;
        height: 200px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }

    #user-image-preview label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        vertical-align: middle;
        background-color: #bdc3c7;
        width: 223px;
        height: 50px;
        font-size: 14px;
        line-height: 55px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush
@section('content')



<!-- begin col-6 -->

<form action="{{ route('additional.settings.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <!-- begin card -->
            <div class="card card-primary" >
                <!-- begin card-header -->
                <div class="card-header">
                    <h4 class="card-title">Pop Up Modal</h4>
                </div>
                <div class="card-body p-t-10">
                   <div class="row row-space-10">
                      <div class="col-md-6">
                         <div class="form-group row m-b-10">
                            <label class="col-5 text-md-right col-form-label">Pop Up</label>
                            <div class="col-7  main-section">
                            	@if(isset($settings->popUp_modal_image))
                            	 <div id="image-preview" class="form-group" style="background-image: url('{{asset('/public/storage/popup/'.$settings->popUp_modal_image )}}');background-repeat: no-repeat, repeat;">
                                    <label for="image-upload" id="image-label">Choose
                                    Logo</label>
                                    <input type="file" name="image" id="image-upload"
                                    value=""/>
                                </div>
                            	@else
                            	 <div id="image-preview" class="form-group" >
                                    <label for="image-upload" id="image-label">Choose
                                    Logo</label>
                                    <input type="file" name="image" id="image-upload"
                                    value=""/>
                                </div>
                            	@endif
                               
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                            <label class="col-5 text-md-right col-form-label">Status</label>
                            <div class="col-sm-7 col-xl-7 m-b-30">
                               <div class="form-group">
                                    <input type="checkbox" name="status" {{ isset($settings->popUp_modal_status) && $settings->popUp_modal_status == 1  ? "checked" : '' }} value="1">
                                    <label for="secondLevel" class="col-form-label">Enable</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card-body -->
            <!-- begin hljs-wrapper -->
            <div class="hljs-wrapper">

            </div>
            <!-- end hljs-wrapper -->
        </div>
    </div>
    <!-- end card -->
    
                <div class="col-lg-6">
            <!-- begin card -->
            <div class="card card-primary" >
                <!-- begin card-header -->
                <div class="card-header">
                    <h4 class="card-title">Extra Images</h4>
                </div>
                <div class="card-body p-t-10">
                   <div class="row row-space-10">
                      <div class="col-md-6">
                         <div class="form-group row m-b-10">
                            <label class="col-5 text-md-right col-form-label">NewsLetter Paralax</label>
                            <div class="col-7  main-section">
                                @if(isset($settings->paralax_image))
                                 <div id="paralax-image-preview" class="form-group" style="background-image: url('{{asset('/public/storage/popup/'.$settings->paralax_image )}}');background-repeat: no-repeat, repeat;">
                                    <label for="image-upload" id="paralax-image-label">Choose
                                    NewsLetter Paralax</label>
                                    <input type="file" name="paralax_image" id="paralax-image-upload"
                                    value=""/>
                                </div>
                                @else
                                 <div id="image-preview" class="form-group" >
                                    <label for="image-upload" id="paralax-image-label">Choose
                                    NewsLetter Paralax</label>
                                    <input type="file" name="paralax_image" id="paralax-image-upload"
                                    value=""/>
                                </div>
                                @endif
                               
                            </div>
                        </div>

                         <div class="form-group row m-b-10">
                            <label class="col-5 text-md-right col-form-label">User DashBoard Banner</label>
                            <div class="col-7  main-section">
                                @if(isset($settings->user_banner))
                                 <div id="user-image-preview" class="form-group" style="background-image: url('{{asset('/public/storage/popup/'.$settings->user_banner )}}');background-repeat: no-repeat, repeat;">
                                    <label for="image-upload" id="user-image-label">Choose
                                    User DashBoard Banne</label>
                                    <input type="file" name="user_image" id="user-image-upload"
                                    value=""/>
                                </div>
                                @else
                                 <div id="user-image-preview" class="form-group" >
                                    <label for="image-upload" id="user-image-label">Choose
                                    User DashBoard Banne</label>
                                    <input type="file" name="user_image" id="user-image-upload"
                                    value=""/>
                                </div>
                                @endif
                               
                            </div>
                        </div>
                       
                    </div>

                </div>
            </div>
            <!-- end card-body -->
            <!-- begin hljs-wrapper -->
            <div class="hljs-wrapper">

            </div>
            <!-- end hljs-wrapper -->
        </div>
    </div>
    <!-- end card -->
    <div class="col-lg-6">
        <!-- begin card -->
        <div class="card card-primary" >
            <!-- begin card-header -->
            <div class="card-header">
                <h4 class="card-title">Facebook Login </h4>
            </div>
            <!-- end card-header -->
            <!-- begin card-body -->
            <div class="card-body">
                <div class="row form-group m-b-10">
                   <label class="col-md-3 col-form-label">App Key</label>
                   <div class="col-md-9">
                      <div class="input-group">
                        <input type="text" class="form-control" name="facebook_app_key" value="{{isset($settings->facebook_app_key)? $settings->facebook_app_key :''}}" />

                    </div>
                </div>
            </div>
            <div class="row form-group m-b-10">
               <label class="col-md-3 col-form-label">App Secrect</label>
               <div class="col-md-9">
                  <div class="input-group">
                     <textarea class="form-control" name="facebook_app_secrect">{{ isset($settings->facebook_app_secrect) ? $settings->facebook_app_secrect :''}}</textarea>
                 </div>
             </div>
         </div>

     </div>


     <!-- end card-body -->
     <!-- begin hljs-wrapper -->
     <div class="hljs-wrapper">

     </div>
     <!-- end hljs-wrapper -->
 </div>
 <!-- end card -->
</div>
<div class="col-lg-6">
    <!-- begin card -->
    <div class="card card-primary" >
        <!-- begin card-header -->
        <div class="card-header">
            <h4 class="card-title">Google Login</h4>
        </div>
        <!-- end card-header -->
        <!-- begin card-body -->
        <div class="card-body">
            <div class="row form-group m-b-10">
               <label class="col-md-3 col-form-label">App Key</label>
               <div class="col-md-9">
                  <div class="input-group">
                    <input type="text" class="form-control" name="google_app_key" value="{{isset($settings->google_app_key)? $settings->google_app_key :''}}" />

                </div>
            </div>
        </div>
        <div class="row form-group m-b-10">
           <label class="col-md-3 col-form-label">App Secrect</label>
           <div class="col-md-9">
              <div class="input-group">
                 <input type="text" class="form-control" name="google_app_secrect" value="{{ isset($settings->google_app_secrect) ? $settings->google_app_secrect :''}}" />
             </div>
         </div>
     </div>

 </div>


 <!-- end card-body -->
 <!-- begin hljs-wrapper -->
 <div class="hljs-wrapper">

 </div>
 <!-- end hljs-wrapper -->
</div>
<!-- end card -->
</div>


<div class="col-lg-6">
    <!-- begin card -->
    <div class="card card-primary" >
        <!-- begin card-header -->
        <div class="card-header">
            <h4 class="card-title">Facebook Pixel</h4>
        </div>
        <!-- end card-header -->
        <!-- begin card-body -->
        <div class="card-body">
            <div class="row form-group m-b-10">
                <div class="col-md-12">
                    <div class="input-group">

                        <textarea class="form-control" name="facebook_pixel">{{ isset($settings->facebook_pixel)? $settings->facebook_pixel :''}}</textarea>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div> 

<div class="col-lg-6">
    <!-- begin card -->
    <div class="card card-primary" >
        <!-- begin card-header -->
        <div class="card-header">
            <h4 class="card-title">Google Analytics</h4>
        </div>
        <!-- end card-header -->
        <!-- begin card-body -->
        <div class="card-body">
            <div class="form-group m-b-10">
                <div class="col-md-12">
                    <div class="input-group">

                        <textarea class="form-control" rows="4" name="google_analytics">{{ isset($settings->google_analytics)? $settings->google_analytics :''}}</textarea>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>    <div class="col-lg-6">
    <!-- begin card -->
    <div class="card card-primary" >
        <!-- begin card-header -->
        <div class="card-header">
            <h4 class="card-title">Google Tag Manager</h4>
        </div>
        <!-- end card-header -->
        <!-- begin card-body -->
        <div class="card-body">
            <div class="form-group m-b-10">
                <div class="col-md-12">
                    <div class="input-group">

                        <textarea class="form-control" rows="4" name="google_tagManager">{{ isset($settings->google_tagManager)? $settings->google_tagManager :''}}</textarea>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>  

  <div class="col-lg-6">
    <!-- begin card -->
    <div class="card card-primary" >
        <!-- begin card-header -->
        <div class="card-header">
            <h4 class="card-title">Home Decorate </h4>
        </div>
        <!-- end card-header -->
        <!-- begin card-body -->
        <div class="card-body">
            <div class="form-group m-b-10">
            	     <label class="col-md-3 col-form-label">Category</label>
                <div class="col-md-9">
                    <div class="input-group">

                          <select class="js-example-basic-multiple" name="home_decorate_cat[]" multiple="multiple">
    {{  home_decorate_category('','',$settings->home_decorate_cat) }}
</select>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>





<!-- end card -->
</div>
<div class="form-group row m-b-10">
    <div class="col-md-10">
        <center><input type="submit" value="Save Settings" class="btn btn-primary"></center>
    </div>
</div>
<br>
</form>

<!-- end col-6 -->


<!-- end row -->

@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label"
        });

            $.uploadPreview({
            input_field: "#paralax-image-upload",
            preview_box: "#paralax-image-preview",
            label_field: "#paralax-image-label"
        });

                $.uploadPreview({
            input_field: "#user-image-upload",
            preview_box: "#user-image-preview",
            label_field: "#user-image-label"
        });
    });

</script>
@endpush