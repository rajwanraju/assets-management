@extends('layouts.master')

@section('page')
    Edit Employee
@endsection

@push('css')
@endpush

@section('content')
    <div class="col-md-12">

        <div class="panel panel-inverse">
           
            <div class="panel-body">
                <form method="post" action="{{ route('users.update',$data->id) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input type="text" value="{{ $data->name }}" id="name" name="name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="email" value="{{ $data->email }}" id="email" disabled name="email" class="form-control">
                                </div>

                                    <div class="form-group">
                                    <label for="role" class="col-form-label">Depeartment</label>
                                    <select name="dept" id="role" class="form-control">
                                
                                
                  

                          <option value="Accounts" @if($data->dept == 'Accounts') selected @endif>Accounts</option>
                                                    <option value="HR" @if($data->dept == 'HR') selected @endif>HR</option>
                                                    <option value="IT" @if($data->dept == 'IT') selected @endif>IT</option>
                              
                                    </select>
                                </div> 

                                
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="confirm-password" class="col-form-label">Confirm Password</label>
                                    <input type="password" id="confirm-password" name="confirm-password" class="form-control">
                                </div>


                             

                                 <div class="form-group">
                                    <label for="role" class="col-form-label">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Select Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" @if($data->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                     

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <br/>
                                          <div class="row">
                                    @foreach($permission as $value)
                                  
                                        <label class="col-md-4">
                                            <input type="checkbox" class="col-md-4" name="permission[]" value="{{ $value->id }}" @php if(in_array($value->id,$user_permissions)) echo "checked"; @endphp >{{ $value->name }}
                                        </label>
                                  

                                    @endforeach
                                          </div>
                                </div>
                            </div>







                        </div>


                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
