@extends('layouts.master')

@section('page')
Bottom Banners Settings
@endsection

@push('css')

@endpush
@section('content')

<div class="row">
  @foreach($bottom_banner as $image)

  <div class="col-md-4">

    <div class="form-group">

      <img src="{{asset('/storage/settings/'.$image->image)}}" width="30%">
    </div>
    <div class="form-group">
      <label>Url Slug: {{$image->slug}}</label>
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
<div class="card">
  <div class="card-body">


    <form method="post" action="{{route('upload.home.image')}}" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-8 col-sm-12 col-12 offset-lg-2 main-section">
          <h1 class="text-center text-danger">Bottom Banner Image Upload</h1><br>

          {!! csrf_field() !!}
          <input type="hidden" name="image_type" value="3">

          <div class="form-group row">
            <label class="col-2">Url Slug</label>
            <input type="text" class="form-control col-8" name="slug">
            <span> Note: Use Slug Here.(Please Avoid Full Url)</span>
          </div>

          <div class="form-group row">
            <label class="col-2">Position</label>
            <input type="number" class="form-control col-8" name="position">
          </div>

          <div class="form-group row">
            <label class="col-2">Image</label>
            <div id="top_banner" class="col-8">
            </div>
          </div>
          <p>Image Resulation: 420px*200px && size: less than 150kb</p>

          <div class="form-group">
            <button type="submit" class="btn btn-success text-right">Upload</button>
          </div>

        </div>
      </div>
    </form>
  </div>
</div>
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
  $(function(){
    $("#top_banner").spartanMultiImagePicker({
      fieldName:        'image',
      maxCount:         1,
      rowHeight:        '200px',
      groupClassName:   'col-md-6 col-sm-6 col-xs-6',
      maxFileSize:      '',
      placeholderImage: {
        image: '/images/placeholder.png',
        width : '100%'
      },
      dropFileLabel : "Drop Here",
      onAddRow:       function(index){
        console.log(index);
        console.log('add new row');
      },
      onRenderedPreview : function(index){
        console.log(index);
        console.log('preview rendered');
      },
      onRemoveRow : function(index){
        console.log(index);
      },
      onExtensionErr : function(index, file){
        console.log(index, file,  'extension err');
        alert('Please only input png or jpg type file')
      },
      onSizeErr : function(index, file){
        console.log(index, file,  'file size too big');
        alert('File size too big');
      }
    });
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
