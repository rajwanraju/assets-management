@extends('layouts.master')

@section('page')
Password Change
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
        </style>
@endpush
@section('content')

<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
            <form action="{{ route('admin.Password-change') }}" enctype="multipart/form-data" method="POST">
                                @csrf
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-th"></span>
                        Change password
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 separator social-login-box"> <br>
                           <img alt="" class="img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                        </div>
                        <div style="margin-top:80px;" class="col-xs-6 col-sm-6 col-md-6 login-box">
                         <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                              <input class="form-control" name="old_password" type="password" placeholder="Current Password">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
                              <input class="form-control" type="password" name="password" placeholder="New Password">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
                              <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password">
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


@endpush
