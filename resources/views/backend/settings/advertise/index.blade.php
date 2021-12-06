@extends('layouts.admin.master')

@section('page')
Home Page Content Settings
@endsection

@push('css')
<style type="text/css">
    .main-section{
        margin:0 auto;
        padding: 20px;
        margin-top: 100px;
        background-color: #fff;
        box-shadow: 0px 0px 20px #c1c1c1;
    }
    .fileinput-remove,
    .fileinput-upload{
        display: none;
    }
</style>
@endpush
@section('content')

<!-- begin card -->
<div class="card card-default">
    <!-- begin card-heading -->
    <div class="card-header">
                    <a href="{{ route('addvertisement.add') }}" class="btn btn-xs btn-primary float-right">Create Advertisement</a>
        <h4 class="card-title text-center">Advertisement List</h4>
    </div>
    <!-- end card-heading -->
    <!-- begin card-body -->
    <div class="card-body">
        <table id="product_table" class="table table-striped table-bordered product_table">
            <thead>
                <tr>
                    <th width="1%">#Sl</th>
                    <th class="text-nowrap">Category</th>
                    <th class="text-nowrap">Left banner</th>
                    <th class="text-nowrap">Right banner</th>
                    <th class="text-nowrap">Position</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($advertises as $key=>$page_data)
               <tr>
                <td>{{$key+1}}</td>
                <td>{{category_name($page_data->cat_id)->cat_name}}</td>
                <td>

                    <a class="thumbnail fancybox" rel="ligthbox" href="{{asset('/storage/settings/'.$page_data->left_banner)}}">
                        <img src="{{asset('/storage/settings/'.$page_data->left_banner)}}" class="img-fluid m-b-10" width="120" alt="">
                    </a>

                </td>
                <td>

                    <a class="thumbnail fancybox" rel="ligthbox" href="{{asset('/storage/settings/'.$page_data->right_banner)}}">
                      <img src="{{asset('/storage/settings/'.$page_data->right_banner)}}" width="120" class="img-fluid m-b-10" alt="">
                  </a>

              </td>
              <td>
               {{$page_data->position}}
           </td>
           <td>
               {{status($page_data->status)}}
           </td>
           <td>
               <a href="{{route('addvertisement.edit',$page_data->id)}}" class="btn btn-primary top_banner" id="{{$page_data->id}}"><i class="fa fa-edit"></i></a>
               &nbsp;
               <a href="javascript:;" class="btn btn-danger deleteRecord" rel="{{$page_data->id}}"><i class="fa fa-trash"></i></a>

           </td>
       </tr>

       @endforeach
   </tbody>
</table>
</div>
<!-- end card-body -->
</div>
<!-- end card -->


@endsection

@push('js')

<script>
   $(document).ready(function () {

       $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });

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
                    window.location.href="/admin/settings/addvertisement-delete/"+id;
                });

   });
   });
</script>

@endpush
