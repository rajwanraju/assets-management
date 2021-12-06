@extends('layouts.master')

@section('page')
Assets
@endsection

@push('css')
@endpush

@section('content')

<div class="col-sx-12">
    <div class="card">
        <div class="card-header">
            <a href="{{route('assets.adding')}}" class="btn btn-info float-right" >Create New Assets</a>
            <h4 class="card-title text-center">Assets List</h4>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#Sl No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Category</th>

                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($assets as $key => $value): ?>
                      <tr>

                        <td>{{$key+1}}</td>
                        <td><img src="{{asset('/storage/products/'.$value->feature_image)}}" width="56px"></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->sku}}</td>
                        <td>{{category($value->category_id)}}</td>


                        <td>{{status($value->status)}}</td>

                        <td>

                            @if(!isset($value->assetManagement))
                         <a href="{{route('assetAssigning',$value->id)}}" class='btn btn-sm btn-primary'  data-toggle="tooltip" title="Assign To Employee!"><i class='fa fa-plus'></i></a>
                         @endif

                          <a href="{{route('assets.edit',$value->id)}}" class='btn btn-sm btn-warning' data-toggle="tooltip" title="Edit Asset!"><i class='fa fa-edit'></i></a>

                          <a class="btn btn-sm btn-danger deleteRecord" rel="{{$value->id}}" rel1="delete" style='margin-right: 5px' data-toggle="tooltip" title="Remove Asset!"><i class='fa fa-trash'></i></a>

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
            window.location.href="/admin/assets/"+deleteFunction+"/"+id;
        });
    });
</script>
@endpush
