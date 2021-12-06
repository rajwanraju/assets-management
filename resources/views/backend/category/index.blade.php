@extends('layouts.master')

@section('page')
     Category
@endsection

@push('css')
@endpush

@section('content')

    <div class="col-sx-12">
        <div class="card">
            <div class="card-header">
                    <a href="{{route('category.create')}}" class="btn btn-info float-right" >Create New Category</a>
                <h4 class="card-title text-center">Category List</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#Sl No</th>
                        <th>Icon</th>
                        <th>Name</th>
                   
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
<?php foreach ($categories as $key => $value): ?>
  <tr>

<td>{{$key+1}}</td>
<td><img src="{{asset('/storage/category/'.$value->icone)}}" width="56px"></td>
<td>{{$value->cat_name}}</td>


<td>{{($value->status)}}</td>

<td>
  <a href="{{route('edit_category',$value->id)}}" class='btn btn-sm btn-warning'><i class='fa fa-edit'></i></a>

  <a class="btn btn-sm btn-danger deleteRecord" rel="{{$value->id}}" rel1="delete" style='margin-right: 5px'><i class='fa fa-trash'></i></a>

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
                    window.location.href="/category/"+deleteFunction+"/"+id;
                });
        });
    </script>
@endpush
