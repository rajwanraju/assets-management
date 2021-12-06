@extends('layouts.master')

@section('page')
Assingned Assets to Employee
@endsection

@push('css')
@endpush

@section('content')

<div class="col-sx-12">
    <div class="card">
        <div class="card-header">

            <h4 class="card-title text-center">Assingned Assets List</h4>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#Sl No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Employee</th>
                        <th>Dept.</th>
                        <th>Email</th>
                        <th>Assigned At</th>

                        <th>Assigned Expired At</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($assigned_assets as $key => $value): ?>
                      <tr>

                        <td>{{$key+1}}</td>
                        <td><img src="{{asset('/storage/products/'.$value->feature_image)}}" width="56px"></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->cat_name}}</td>
                        <td>{{$value->employee}}</td>


                        <td>{{$value->dept}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->assignDate}}</td>
                        <td>{{$value->expireDate}}</td>

                       
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
            window.location.href="/assets/"+deleteFunction+"/"+id;
        });
    });
</script>
@endpush
