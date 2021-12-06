@extends('layouts.master')

@section('page')
Profile Edit
@endsection

@push('css')
<style>
 .separator {
    border-right: 1px solid #dfdfe0;
}
.icon-btn-save {
    padding-top: 0;
    padding-bottom: 0;
}
.input-group {
    margin-bottom:10px;
}
.btn-save-label {
    position: relative;
    left: -12px;
    display: inline-block;
    padding: 6px 12px;
    background: rgba(0,0,0,0.15);
    border-radius: 3px 0 0 3px;
}
      #image-preview {
            width: 240px;
            height: 240px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
            border: 1px solid black;
            margin: 10px;
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 800px) and (orientation:portrait) {
            #image-preview {
                width: 240px;
                height: 240px;
                position: relative;
                overflow: hidden;
                background-color: #ffffff;
                color: #ecf0f1;
                border: 1px solid black;
                margin: 10px;
            }
        }

        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 160px;
            height: 50px;
            font-size: 14px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }
        </style>
@endpush
@section('content')

<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
            <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-th"></span>
                        Profile Edit
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <!-- <div class="col-xs-6 col-sm-6 col-md-6 separator social-login-box"> <br>
                           <img alt="" class="img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                        </div> -->


                           <div class="col-xs-6 col-sm-6 col-md-6 separator main-section">
                            @if($user->avatar != null)

                            <div id="image-preview" class="form-group" style="background-image: url({{asset('/public/storage/profileImage/'.$user->id.'/'.$user->avatar)}});background-size: cover;">

                            @else

                            <div id="image-preview" class="form-group" style="background-image: url(https://bootdey.com/img/Content/avatar/avatar1.png);background-size: cover;">

                            @endif

                                           <label for="image-upload" id="image-label">Choose File</label>
                                           <input type="file" name="avatar" id="image-upload" value="" />
                                       </div>
                                   </div>


                        <div style="margin-top:80px;" class="col-xs-6 col-sm-6 col-md-6 login-box">
                         <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fas fa-fw fa-user"></i></div>
                              <input class="form-control" name="name"  value="{{$user->name}}" >
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fas fa-fw fa-paper-plane"></i></div>
                              <input class="form-control" disabled  value="{{$user->email}}" >
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fas fa-fw fa-phone"></i></div>
                              <input class="form-control" disabled  value="{{$user->phone}}" >
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fas fa-fw fa-home"></i></div>
                              <input class="form-control" name="address" value="{{$user->address}}" >
                            </div>
                          </div>

                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6"></div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <button class="btn btn-success" type="submit">Save Change</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection

@push('js')

<script type="text/javascript">
         $(document).ready(function() {
             $.uploadPreview({
                 input_field: "#image-upload",
                 preview_box: "#image-preview",
                 label_field: "#image-label"
             });
               $.uploadPreview({
                 input_field: "#banner-upload",
                 preview_box: "#banner-preview",
                 label_field: "#banner-label"
             });
         });
     </script>
@endpush
