@extends('layouts.master')

@section('page')
    Roles
@endsection

@push('css')
@endpush

@section('content')
    <div class="col-mnd-12">
        <div class="card card-default">
            <div class="card-header">
                    <a href="{{ route('role.create') }}" class="btn btn-info float-right">Create New Roles</a>
                <h4 class="card-title text-center">Roles</h4>
            </div>
            <div class="card-body">
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#Sl No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php foreach ($roles as $key => $value): ?>
                        <tr>
                          <td>
                            {{$key+1}}
                          </td>
                          <td>
                            {{$value->name}}
                          </td>
                          <td>
                            <a href="{{route('role.edit',$value->id)}}" style='margin-right: 5px' class="btn btn-sm btn-warning"><i class='fa fa-edit'></i></a>

                              <a rel="$role->id" rel1="delete-role" href="javascript:" style='margin-right: 5px' class="btn btn-sm btn-danger deleteRecord"><i class='fa fa-trash'></i></a>

                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')


    <script>
        $(document).on('click','.deleteRecord', function(e){
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                    title: "Are You Sure?",
                    text: "You will not be able to recover this record again",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete It"
                },
                function(){
                    window.location.href="/admin/settings/role/"+deleteFunction+"/"+id;
                });
        });
    </script>
@endpush
