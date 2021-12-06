
@extends('layouts.master')

@section('page')
    Role Edit
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
                <h4 class="card-title text-center">Roles Edit</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('role.update',$role->id) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="role_name" class="col-form-label"> Role Name</label>
                        <input type="text" id="role_name" name="role_name" value="{{ $role->name }}" class="form-control">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                       <label for="" class="col-form-label">Permission</label>
                            <div class="col-12">
                         <div class="row">
                            @foreach($permission as $value)
                                <label class="col-3 label_text">
                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" @if(in_array($value->id, $rolePermissions)) checked @endif >{{ $value->name }}</label>
                                <br/>
                            @endforeach
                        </div>
                    </div>
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
