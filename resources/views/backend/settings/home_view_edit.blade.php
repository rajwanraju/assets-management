@extends('layouts.master')

@section('page')
Home Slider Settings Edit
@endsection

@push('css')

@endpush
@section('content')




<div class="card">
  <div class="card-body">
<form method="post" action="{{route('settings.image-edit')}}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 col-sm-12 col-11 offset-lg-2">
                <h1 class="text-center text-danger">Home Slider Image Edit</h1><br>

                    {!! csrf_field() !!}
                    <input type="hidden" name="image_type" value="1">
    <input type="hidden" name="id" value="{{$home_slider->id}}">

                     <div class="form-group row">
                        <label class="col-3">Url Slug</label>
                            <input type="text" class="form-control col-8" name="slug" value="{{$home_slider->slug}}">
                    </div>
                    <span style="text-align:center"> Note: Use Slug Here.(Please Avoid Full Url)</span>




                       <div class="form-group row">
                        <label class="col-3">Position</label>
                            <input type="number" class="form-control col-8" name="position" value="{{$home_slider->position}}">
                    </div>

                    <div class="form-group row">
                      <label class="col-3">Image</label>

                        <div id="home_view" class="col-9">
                        </div>
                    </div>


    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Image Content</label>
      <div class="col-md-9">
        <textarea class="summernote" name="note">{!!  $home_slider->note !!}</textarea>
      </div>

    </div>
    <!-end form-group row -->

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






    @endsection
@push('js')
    <script type="text/javascript">
    $(function(){
      $("#home_view").spartanMultiImagePicker({
        fieldName:        'image',
        maxCount:         1,
        rowHeight:        '200px',
        groupClassName:   'col-md-12 col-sm-12 col-xs-12',
        maxFileSize:      '',
        placeholderImage: {
          image: '{{asset("/public/storage/settings/".$home_slider->image)}}',
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
