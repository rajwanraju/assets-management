@extends('layouts.master')

@section('page')
Available Assets
@endsection

@push('css')
@endpush

@section('content')

<div class="col-sx-12">
    <div class="card">
        <div class="card-header">

            <h4 class="card-title text-center">Available Assets List</h4>
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
                    <?php foreach ($available_assets as $key => $value): ?>
                      <tr>

                        <td>{{$key+1}}</td>
                        <td><img src="{{asset('/storage/products/'.$value->feature_image)}}" width="56px"></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->sku}}</td>
                        <td>{{category($value->category_id)}}</td>


                        <td>{{status($value->status)}}</td>

                        <td>
                          <a href="{{route('assetAssigning',$value->id)}}" class='btn btn-sm btn-primary'  data-toggle="tooltip" title="Assign To Employee!"><i class='fa fa-plus'></i></a>
                      </td>
                  </tr>
              <?php endforeach; ?>


          </tbody>

      </table>
  </div>
</div>
</div>

@endsection


