@extends('layouts.master')

@section('page')
Banner On Slider Settings
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

        <h4 class="card-title text-center">Banner On Slider List</h4>
    </div>
    <!-- end card-heading -->
    <!-- begin card-body -->
    <div class="card-body">
        <table id="product_table" class="table table-striped table-bordered product_table">
            <thead>
                <tr>
                    <th width="1%">#Sl</th>
                    <th class="text-nowrap">Image</th>
                    <th class="text-nowrap">Position</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
             @foreach($banners as $key=>$page_data)
             <tr>
                <td>{{$key+1}}</td>
                 <td width="1%" class="with-img">
                    <img src="{{asset('/storage/settings/'.$page_data->image)}}"
                                                             class="img-rounded"/ width="60" ></td>
                <td>
                 {{$page_data->position}}
             </td>
             <td>
                 {{status($page_data->status)}}
             </td>
             <td>


                 <a href="javascript:;" class="btn btn-danger top_banner_remove" id="{{$page_data->id}}"><i class="fa fa-trash"></i></a>

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
    <h4 class="card-title text-center">Banner On Slider Adding</h4>
</div>
<!-- end card-heading -->
<!-- begin card-body -->
<div class="card-body">
    <form method="post" action="{{route('slider-banner.store')}}" enctype="multipart/form-data">


        {!! csrf_field() !!}


        <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label">Banner</label>
            <div class="col-md-9">
                <input  type="file" name="image" >
                    <p>Image Resulation: 395px*515px && size: less than 150kb</p>
            </div>
        </div>


        <!-end form-group row -->

                <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label">Slug</label>
            <div class="col-md-9">
                <input type="text" name="slug"  placeholder="URL Slug" class="form-control" required>
            </div>
        </div>
        <!-end form-group row -->

        <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label">Position</label>
            <div class="col-md-9">
                <input type="number" name="position"  placeholder="Display Position" class="form-control" required>
            </div>
        </div>
        <!-end form-group row -->


        <div class="form-group row m-b-10">

            <div class="col-md-1 offset-2">
                <input type="checkbox" name="status" class="form-control" value="1" checked>
            </div>
            <label class="col-md-9">Enable</label>
        </div>




        <div class="form-group">
         <button type="submit" class="btn btn-success" style="float: right">Save</button>
     </div>


 </form>
</div>
</div>



@endsection
@push('js')
<script type="text/javascript">
    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: "/image-view",
        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize:20000,
        maxFilesNum: 1,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });



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
            window.location.href="/admin/settings/slider-banner/"+id+"/delete";
        });
    });
</script>

@endpush
