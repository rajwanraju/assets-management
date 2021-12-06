@extends('layouts.master')

@section('page')
Site Paralax Settings
@endsection

@push('css')

@endpush
@section('content')
<div class="row">
  @foreach($top_banner as $image)

  <div class="col-md-4">

    <div class="form-group">

      <img src="{{asset('/public/storage/settings/'.$image->image)}}" width="30%">
    </div>
    <div class="form-group">
      <label>Url Slug: {{$image->slug}}</label>
    </div>
    <div class="form-group">
      <label>Position: {{$image->position}}</label>
    </div>
    <div class="row">
      <a href="{{route('site-paralax.edit',$image->id)}}" class="btn btn-primary " ><i class="fa fa-edit"></i></a>
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
        <div class="col-lg-12 col-sm-12 col-12">
          <h1 class="text-center text-danger">Site Paralax Image Upload</h1><br>

          {!! csrf_field() !!}
          <input type="hidden" name="image_type" value="2">

          <div class="form-group row">
            <label class="col-2">Url Slug</label>
            <input type="text" class="form-control col-8" name="slug">
            <p style="text-align:center"> Note: Use Slug Here.(Please Avoid Full Url)</p>
          </div>

          <div class="form-group row">
            <label class="col-2">Position</label>
            <input type="number" class="form-control col-8" name="position">
          </div>

            <div class="form-group row">
            <label class="col-2">Content</label>
           <textarea class="form-control col-8 summernote" name="note"></textarea>
          </div>

          <div class="form-group row">
            <label class="col-2">Image</label>
            <div id="top_banner"  class="col-8">
            </div>
          </div>

          <div class="form-group ">


            <button type="submit" class="btn btn-success text-right">Upload</button>
          </div>

        </div>
      </div>
    </form>
  </div>
</div>
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
