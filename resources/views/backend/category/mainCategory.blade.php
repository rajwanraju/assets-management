@extends('layouts.master')

@section('page')
Create Category
@endsection

@push('css')
<style type="text/css">

</style>
@endpush

@section('content')

<div class="col-sx-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center"><center>Create Category</center></h4>
            <form method="post" action="{{route('store_category')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <div class="row">
                      <label class="col-form-label col-md-2">Category Name</label>
                      <div class="col-md-10 col-sm-10 col-10 ">
                        <input type="text" id="name" value="{{ old('cat_name') }}" name="cat_name" class="form-control" value="">
                    </div>
                </div>
            </div> 
            
            <div class="form-group">
              <div class="row">
                  <label class="col-form-label col-md-2">Category Slug</label>
                  <div class="col-md-10 col-sm-10 col-10 ">
                    <input type="text" id="name" value="{{ old('cat_slug') }}" name="cat_slug" class="form-control" value="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-form-label col-md-2">Category Icone</label>

                <div class="col-md-8 ">
                  <div id="coba"></div>
                  <p>Image Resulation: 190px*160px && size: less than 100kb</p>

              </div>
              
          </div>
      </div>


      
      


      <div class="col-md-12">
        <div class="form-group">
            <input type="checkbox" name="status" value=1 checked>
            <label for="secondLevel" class="col-form-label">Enable</label>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <a href="/category" class="btn btn-success">Back</a>
        <input type="submit" class="btn btn-primary" value="Create Category">
    </div>
</form>
</div>
</div>
</div>
@endsection

@push('js')

<script type="text/javascript">
 $(function(){

   $("#coba").spartanMultiImagePicker({
     fieldName:        'category_icone',
     maxCount:         1,
     rowHeight:        '200px',
     groupClassName:   'col-md-12 col-sm-12 col-xs-12',
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

   $("#category_banner").spartanMultiImagePicker({
     fieldName:        'category_banner',
     maxCount:         1,
     rowHeight:        '200px',
     groupClassName:   'col-md-12 col-sm-12 col-xs-12',
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
</script>
@endpush
