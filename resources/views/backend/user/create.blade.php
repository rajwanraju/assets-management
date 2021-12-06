@extends('layouts.master')

@section('page')
    Add Users
@endsection

@push('css')
@endpush

@section('content')
    <div class="col-md-12">
        <div class="card card-inverse">
            <div class="card-header">
                <h4 class="card-title">Edit Users</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-form-label">Phone Number</label>
                                    <input type="text" id="phone" name="phone"  data-parsley-type="number" placeholder="017xxxxxxxxx" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="confirm-password" class="col-form-label">Confirm Password</label>
                                    <input type="password" id="confirm-password" name="password_confirmation" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Address</label>
                                    <input type="text" id="address" name="address" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="role" class="col-form-label">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Select Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <br/>
                                    @foreach($permission as $value)
                                        <label>
                                            <input type="checkbox" name="permission[]" value="{{ $value->id }}">{{ $value->name }}</label>
                                        <br/>
                                    @endforeach
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
