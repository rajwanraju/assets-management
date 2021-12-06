@extends('layouts.master')

@section('page')
    Role Create
@endsection

@push('css')
<style>
.label_text input[type="checkbox"] {
    margin: 5px;
}
.label_text{
font-weight: 600;
text-transform: capitalize;
    }
    </style>
@endpush

@section('content')
    <div class="col-md-12">
           <div class="card card-default">
            <div class="card-header">
                <h4 class="card-title text-center">Roles</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="role_name" class="col-form-label"> Role Name</label>
                        <input type="text" id="role_name" name="role_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Add Permission</label>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></button>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                             <label for="" class="col-form-label">Permission</label>
                            <div class="col-12">
                         <div class="row">
                        <div class="col-3">
                            <div class="card card-success">
                            <div class="card-body">
                            @foreach($permission as $key=> $value)

                                <label class="label_text">
                                <input type="checkbox" name="permission[]" value="{{ $value->id }}">{{ $value->name }}</label>
                                <br>

                 @if($key != 0 && $key%4 == 0)

                             </div>
                         </div>
                     </div>

                        <div class="col-3">
                            <div class="card card-success">
                            <div class="card-body">

                     @endif
                            @endforeach

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Add Permission modal-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('permission.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="permission" class="col-form-label">Permission</label>
                            <input type="text" id="permission" name="permission" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
