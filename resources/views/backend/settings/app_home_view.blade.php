@extends('layouts.master')

@section('page')
APP Slider Settings
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
        <div class="row">
@foreach($home_sliders as $image)

<div class="col-md-4">

      <div class="form-group">

                            <img src="{{asset('/public/storage/settings/'.$image->image)}}" width="30%">
                           </div>
                     <div class="form-group">
                            <label>Url Slug: {{$image->slug}}</label>
</div>         <div class="form-group">
                            <label>Note: {!! $image->note !!}</label>
</div>
                     <div class="form-group">
                            <label>Position: {{$image->position}}</label>
                        </div>
                            <div class="row">
                            <a href="javascript:;" class="btn btn-primary top_banner" id="{{$image->id}}"><i class="fa fa-edit"></i></a>
                            &nbsp;
                            <a href="javascript:;" class="btn btn-danger top_banner_remove" id="{{$image->id}}"><i class="fa fa-trash"></i></a>
                        </div>

</div>
@endforeach
</div>
<form method="post" action="{{route('upload.app-slider.image')}}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 col-sm-12 col-11 main-section">
                <h1 class="text-center text-danger">App Slider Image Upload</h1><br>

                    {!! csrf_field() !!}
                    <input type="hidden" name="image_type" value="1">

                     <div class="form-group">
                        <label>Url Slug</label>
                            <input type="text" class="form-control" name="slug">
                            <span> Note: Use Slug Here.(Please Avoid Full Url)</span>
                    </div>

                     <div class="form-group">
                        <label>Promotional Note</label>
                          <textarea class="summernote" name="notes"></textarea>
                    </div>

                       <div class="form-group">
                        <label>Position</label>
                            <input type="number" class="form-control" name="position">
                    </div>

                    <div class="form-group">
                        <div class="file-loading">
                            <input id="file-1" type="file" name="image" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                        </div>
                    </div>

                       <div class="form-group">
                       <button type="submit" class="btn btn-success text-right">Upload</button>
                    </div>

            </div>
            </div>
            </form>
        </div>
    </div>


          <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Image Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('settings.image-edit') }}">
                    @csrf
                    <div class="modal-body" id="image_body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary button">Submit</button>
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
                    url: '/admin/settings/image-edit/'+id,
                    method: 'get',

                    success: function (data) {

                        $('#image_body').html(data);
                            $('#imageModal').modal();

                    },error: function(data){


                    }
                })

        });

        $('.summernote').summernote();


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
                    window.location.href="/admin/settings/image-remove/"+id;
                });
        });
    </script>

    @endpush
