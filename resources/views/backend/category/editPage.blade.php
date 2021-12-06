@extends('layouts.master')

@section('page')
   Update Category
@endsection

@push('css')
    <style type="text/css">

    </style>
@endpush

@section('content')

    <div class="col-sx-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('update_category',$cat->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <h4 class="card-title text-center"><center>Update Category</center></h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                          
                                    <label for="name" class="col-form-label">Category Name</label>
                                
                                    <input type="text" id="name" name="name" class="form-control" value="{{$cat->cat_name}}">
                                </div>
                            </div> 
                             <div class="col-md-12">
                                <div class="form-group">
                                   
                                    <label for="name" class="col-form-label">Category Slug</label>
                                 
                                    <input type="text" id="name" name="cat_slug" class="form-control" value="{{$cat->cat_slug}}">
                                </div>
                            </div>
                    

                             <div class="col-md-12">
                                <div class="form-group">
                                <div class="row">
                                    <label for="secondLevel" class="col-form-label col-md-2">Category Icone</label>

                                    <div class="col-md-12">
                                      <div id="coba"></div>
                                                           <p>Image Resulation: 190px*160px && size: less than 100kb</p>

                                   </div>




                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="secondLevel" class="col-form-label">Category Status</label>
                                    <select class="form-control secondLevel" name="status" id="secondLevel">
                                        @if($cat->status == 1)
                                            <option value=1 selected>Enable</option>
                                            <option value=0 >Disable</option>
                                        @else
                                            <option value=1 >Enable</option>
                                            <option value=0 selected>Disable</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 text-center">
                        <a href="/category" class="btn btn-success">Back</a>
                        <input type="submit" class="btn btn-primary" value="Update Category">
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
        image: '<?php echo ('/storage/category/'.$cat->icone); ?>',
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
