@extends('layouts.master')

@section('page')
Employees
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

        <!-- Tab variant tab card start -->
        <div class="card">

            <div class="card-body tab-icon">
                <!-- Row start -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <h6 class="sub-title">Tab With Icon</h6> -->
                        <div class="sub-title text-center">Employee Management</div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs md-tabs " role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><i class="icofont icofont-ui-user"></i>Employee</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><i class="icofont icofont-ui-settings"></i>New Employee</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="home7" role="tabpanel">
                                <table id="product_table" class="table table-responsive table-striped table-bordered product_table">
                                    <thead>
                                        <tr>
                                            <th width="1%">#Sl</th>
                                            <th class="text-nowrap">Employee Name</th>
                                            <th class="text-nowrap">Dept.</th>
                                            <th class="text-nowrap">Role</th>
                                            <th class="text-nowrap">Email</th>
                             
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key=> $user)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->dept}}</td>
                                            <td>{{getUserRole($user->id)}}</td>
                                            <td>{{$user->email}}</td>
                                          
                                            <td>

                                  
                                             <a class="btn btn-primary" href="{{route('user.edit',$user->id)}}"><i class="fas fa-pencil-alt fa-fw"></i> Edit</a>
                                
                                         </td>

                                     </tr>

                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                         <div class="tab-pane" id="profile7" role="tabpanel">
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
                                     

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="role" class="col-form-label">Depertment</label>
                                                <select name="dept" id="role" class="form-control">
                                                    <option value="">Select Depertment</option>
                                      
                                                    <option value="Accounts">Accounts</option>
                                                    <option value="HR">HR</option>
                                                    <option value="IT">IT</option>
                                            
                                                </select>
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

                                        <div class="col-12">
                                            <div class="form-group">
                                             <label for="role" class="col-form-label">Permission:</label>
                                             <br/>
                                             <div class="row">
                                                @foreach($permission as $value)
                                                <label class="col-3 label_text">
                                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}">{{ $value->name }}</label>
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

            </div>
            <!-- Row end -->
        </div>
    </div>
    <!-- Tab variant tab card start -->




@endsection

@push('js')
<script type="text/javascript">
  $(document).ready(function () {

    $('#product_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'excel', 'pdf', 'print'
        ]
    });

});
</script>
@endpush
