@extends('layouts.master')

@section('page')
Slug Settings
@endsection

@section('content')
    <div class="col-12">
  <div class="card card-default">
            <div class="card-header">

                <h4 class="card-title text-center"> Slug News</h4>
            </div>
            <div class="card-body">
                <table id="product_table" class="table table-responsive table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Slug News</th>
                        <th>Slug Url </th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
             @foreach($slugs as $key=>$value)
             <tr>

                <td>{{$value->slug}}</td>
                <td>{{$value->slug_url}}</td>
                <td>{{status($value->status)}}</td>
                <td>
                    @if($value->status == 0)
                    <a href="{{route('slug.settings.status',$value->id)}}" class="btn btn-sm btn-success" title="Active"><i class="fa fa-check"></i></a>

                    @else
                    <a href="{{route('slug.settings.status',$value->id)}}" class="btn btn-sm btn-warning" title="DeActive"><i class="fa fa-power-off"></i></a>

                    @endif

                    <a href="{{route('slug.edit',$value->id)}}" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger deleteRecord" rel="{{$value->id}}" title="Remove"><i class="fa fa-trash"></i></a>
                </td>
             </tr>

             @endforeach
                </tbody>
                </table>
            </div>
        </div>
        </div>


    <!-- begin col-6 -->

      <form action="{{ route('slug.settings.store') }}" method="POST">
        @csrf

    <div class="col-12">
<!-- begin card -->
<div class="card card-primary" >
    <!-- begin card-header -->
    <div class="card-header">
        <h4 class="card-title">News Slug</h4>
    </div>
    <!-- end card-header -->
    <!-- begin card-body -->
    <div class="card-body">
         <div class="row form-group m-b-10">
            <label class="col-md-3 col-form-label">Slug News</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input type="text" class="form-control" name="slug"  />
                </div>
            </div>
        </div>
        <div class="row form-group m-b-10">
            <label class="col-md-3 col-form-label">Slug URL</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input type="text" class="form-control" name="slug_url" />

                </div>

            </div>
        </div>

       <div class="form-group row m-b-10">
        <div class="col-md-10">
            <center><input type="submit" value="Save Settings" class="btn btn-primary"></center>
        </div>
    </div>
    </div>
</div>
</div>

</form>

<!-- end col-6 -->


<!-- end row -->

@endsection

@push('js')
    <script>
           $(document).ready(function () {
        $(document).on('click','.deleteRecord', function(e){
            var id = $(this).attr('rel');
            swal({
                    title: "Are You Sure?",
                    text: "You will not be able to recover this record again",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete It"
                },
                function(){
                    window.location.href="/admin/settings/slug-news/"+id+"/delete";
                });

        $('#product_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
            'excel', 'pdf', 'print'
            ]
        });


    });
    });
</script>
@endpush
