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

<div class="card card-default">
   <div class="card-header">
    <h4 class="card-title text-center">Advertisement Adding</h4>
</div>
<!-- end card-heading -->
<!-- begin card-body -->
<div class="card-body">
    <form method="post" action="{{route('addvertisement.store')}}" enctype="multipart/form-data">


        {!! csrf_field() !!}

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
            <label class="col-md-3 text-md-right col-form-label"> Left Banner</label>
            <div class="col-md-9">
                <input  type="file" name="left_banner" >
            </div>
        </div>

        <!-end form-group row -->

        <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label"> Left Banner Slug</label>
            <div class="col-md-9">
                <input type="text" name="left_banner_slug"  placeholder="Banner Url Slug" class="form-control" required>
                            <p>Image Resulation: 685px*200px && size: less than 150kb</p>
            </div>


        </div>
        <!-end form-group row -->

                  <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label">Left Banner Expire At</label>
            <div class="col-md-9">
                <input type="text"  id="date_to" name="left_banner_expire" class="form-control" required>
            </div>
        </div>
        <!-end form-group row -->

        <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label"> Right Banner</label>
            <div class="col-md-9">
                <input  type="file" name="right_banner" >
                            <p>Image Resulation: 685px*200px && size: less than 150kb</p>
            </div>
        </div>


        <!-end form-group row -->

        <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label"> Right Banner Slug</label>
            <div class="col-md-9">
                <input type="text" name="right_banner_slug"  placeholder="Banner Url Slug" class="form-control" required>
            </div>
        </div>
        <!-end form-group row -->

          <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label"> Expire At</label>
            <div class="col-md-9">
                <input type="text"  id="date_from" name="right_banner_expire" class="form-control" required>
            </div>
        </div>
        <!-end form-group row -->


        <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label"> Position</label>
            <div class="col-md-9">
                <input type="text" name="position" class="form-control" required>
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

    $('.top_banner').on('click',function(){

        var id = $(this).attr('id');


        $.ajax({
            url: '/admin/settings/home-page/'+id,
            method: 'get',

            success: function (data) {

                $('#image_body').html(data);
                $('#imageModal').modal();

            },error: function(data){


            }
        })

    });

                $('#date_from').datetimepicker().datetimepicker("setDate", new Date());
        $('#date_to').datetimepicker().datetimepicker("setDate", new Date());

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
            window.location.href="/admin/settings/page-content/"+id+"/delete";
        });
    });
</script>

@endpush