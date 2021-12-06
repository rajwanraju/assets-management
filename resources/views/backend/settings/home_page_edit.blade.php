@extends('layouts.master')

@section('page')
Home Page Content Settings
@endsection

@push('css')

@endpush
@section('content')



<div class="card card-default">
 <div class="card-header">
    <h4 class="card-title text-center">Home Page Content Edit</h4>
</div>
<!-- end card-heading -->
<!-- begin card-body -->
<div class="card-body">
    <form method="post" action="{{route('home-page.content-update',$pagecontent->id)}}" enctype="multipart/form-data">


        {!! csrf_field() !!}

        <!-begin form-group row -->
        <div class="form-group row m-b-12">
            <label
            class="col-md-3 text-md-right col-form-label">Category</label>
            <div class="col-md-9">
                <select name="category_id" class="form-control">
                    {{  homePage_category('','',$pagecontent->id) }}
                </select>
            </div>
        </div>
        <!-end form-group row -->

        <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label">Position</label>
            <div class="col-md-9">
                <input type="number" name="position"  placeholder="Display Position" value="{{$pagecontent->position}}" class="form-control" required>
            </div>
        </div>
        <!-end form-group row -->

        <!-begin form-group row -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label">Left Banner</label>
            <div class="col-md-9">
               <div id="banner">

            </div>

        </div>

    </div>
    <p style="text-align:center">Image Resulation: 395px*515px && size: less than 150kb</p>

    <!-end form-group row -->




 <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Botoom Paralax</label>
      <div class="col-md-9" id="paralax">
      </div>
    </div>
    <p style="text-align:center">Image Resulation: 1920px*700px && size: less than 650kb</p>
    <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Botoom Left Banner Slug</label>
      <div class="col-md-9">
        <input type="text" name="paralax_slug"  value="{{$pagecontent->paralax_slug}}" class="form-control" >
      </div>
    </div>


    <!-end form-group row -->



    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Botoom Paralax Content</label>
      <div class="col-md-9">
        <textarea class="summernote" name="paralax_content">
          {!! $pagecontent->paralax_content !!}
        </textarea>
      </div>

    </div>
    <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Botoom Paralax Display Status</label>
      <div class="col-md-9">
        <div class="switchery-demo">
          
          <input type="checkbox" data-plugin="switchery" data-color="#ff7aa3" value="1" name="paralax_status" data-switchery="true" style="display: none;" {{$pagecontent->paralax_status ==1 ? "checked" : ''}}>
          
        </div>
      </div>

    </div>
    <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Status</label>
      <div class="col-md-9">
        <div class="switchery-demo">
          
          <input type="checkbox" data-plugin="switchery" data-color="#ff7aa3" value="1" name="status" data-switchery="true" style="display: none;" {{$pagecontent->status ==1 ? "checked" : ''}}>
          
        </div>
      </div>

    </div>
    <!-end form-group row -->


    <div class="form-group">
       <button type="submit" class="btn btn-success" style="float: right">Update</button>
   </div>


</form>
</div>
</div>





@endsection
@push('js')

<script type="text/javascript">
$(function(){
  $("#banner").spartanMultiImagePicker({
    fieldName:        'image',
    maxCount:         1,
    rowHeight:        '200px',
    groupClassName:   'col-md-12 col-sm-12 col-xs-12',
    maxFileSize:      '',
    placeholderImage: {
      image: '{{ $pagecontent->banner != null ? ('/public/storage/settings/'.$pagecontent->banner) : '/images/placeholder.png' }}',
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
  $("#paralax").spartanMultiImagePicker({
    fieldName:        'paralax',
    maxCount:         1,
    rowHeight:        '200px',
    groupClassName:   'col-md-12 col-sm-12 col-xs-12',
    maxFileSize:      '',
    placeholderImage: {
      image: '{{ $pagecontent->paralax != null ? ('/public/storage/settings/'.$pagecontent->paralax) : '/images/placeholder.png' }}',
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
  $("#right_banner").spartanMultiImagePicker({
    fieldName:        'right_banner',
    maxCount:         1,
    rowHeight:        '200px',
    groupClassName:   'col-md-12 col-sm-12 col-xs-12',
    maxFileSize:      '',
    placeholderImage: {
      image: '{{ $pagecontent->right_banner != null ? ('/public/storage/settings/'.$pagecontent->right_banner) : '/images/placeholder.png' }}',
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
