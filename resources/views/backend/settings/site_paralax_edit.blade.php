@extends('layouts.master')

@section('page')
Site Paralax Edit
@endsection

@push('css')

@endpush
@section('content')

<div class="card">
  <div class="card-body">


    <form method="post" action="{{route('settings.image-edit')}}" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
          <h1 class="text-center text-danger">Site Paralax Image Edit</h1><br>

          {!! csrf_field() !!}
          <input type="hidden" name="id" value="{{$paralax->id}}">

          <div class="form-group row">
            <label class="col-2">Url Slug</label>
            <input type="text" class="form-control col-8" name="slug" value="{{$paralax->slug}}">
            <p style="text-align:center"> Note: Use Slug Here.(Please Avoid Full Url)</p>
          </div>

          <div class="form-group row">
            <label class="col-2">Position</label>
            <input type="number" class="form-control col-8" name="position" value="{{$paralax->position}}">
          </div>

            <div class="form-group row">
            <label class="col-2">Content</label>
           <textarea class="form-control col-8 summernote" name="note" >{{$paralax->note}}</textarea>
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
        image: '{{asset("/public/storage/settings/".$paralax->image)}}',
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


  </script>

  @endpush
