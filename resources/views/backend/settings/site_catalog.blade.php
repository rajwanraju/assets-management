@extends('layouts.master')

@section('page')
Product Catalog Settings
@endsection

@push('css')

@endpush
@section('content')

<!-- begin card -->
<div class="card card-default">
  <!-- begin card-heading -->
  <div class="card-header">

    <h4 class="card-title text-center">Product Catalog List</h4>
  </div>
  <!-- end card-heading -->
  <!-- begin card-body -->
  <div class="card-body">
    <table id="product_table" class="table table-striped table-bordered product_table">
      <thead>
        <tr>
          <th width="1%">#Sl</th>
          <th class="text-nowrap">Title</th>
          <th class="text-nowrap">Category</th>
          <th class="text-nowrap">Action</th>
        </tr>
      </thead>
      <tbody>
       @foreach($catalogs as $key=>$catalog)
       <tr>
        <td>{{$key+1}}</td>
        
        <td>
         {{$catalog->title}}
       </td>
     <td>{{category_name($catalog->category_id)->cat_name}}</td>
       <td>

         <a href="javascript:;" class="btn btn-danger top_banner_remove" id="{{$catalog->id}}"><i class="fa fa-trash"></i></a>

       </td>
     </tr>

     @endforeach
   </tbody>
 </table>
</div>
<!-- end card-body -->
</div>
<!-- end card -->
<div class="card card-default">
 <div class="card-header">
  <h4 class="card-title text-center">Product Catalog Adding</h4>
</div>
<!-- end card-heading -->
<!-- begin card-body -->
<div class="card-body">
  <form method="post" action="{{route('catalog.settings')}}" enctype="multipart/form-data">


    {!! csrf_field() !!}


        <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Title</label>
      <div class="col-md-9">
        <input type="text" name="title"  placeholder="Display title" class="form-control" >
      </div>
    </div>
    <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-12">
      <label
      class="col-md-3 text-md-right col-form-label">Category</label>
      <div class="col-md-9">
        <select name="category_id" class="form-control">
          {{  category('','','') }}
        </select>
      </div>
    </div>
    <!-end form-group row -->

       <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Catalog</label>
      <div class="col-md-9">
        <input type="file" name="catalog"   class="form-control" >
      </div>
    </div>
    <!-end form-group row -->






    <div class="form-group">
     <button type="submit" class="btn btn-success" style="float: right">Save</button>
   </div>


 </form>
</div>
</div>



@endsection
@push('js')
<script type="text/javascript">
  $(function(){



    $(document).on('click','.top_banner_remove', function(e){
      var id = $(this).attr('id');
      swal({
        title: "Are You Sure?",
        text: "You will not be able to recover this record again",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Delete It"
      },
      function(){
        window.location.href="/admin/settings/catalog/"+id+"/delete";
      });
    });
  });
</script>

@endpush
