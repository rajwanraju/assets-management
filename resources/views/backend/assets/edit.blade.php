@extends('layouts.master')

@section('page')
Assets Update
@endsection

@push('css')

@endpush
@section('content')


<div class="card">
  <div class="card-body">
    <form method="post" action="{{route('assets.update',$asset->id)}}" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-10 col-12 offset-lg-2 offset-md-2 offset-sm-2">
          <h1 class="text-center text-danger">Assets Update</h1><br>

          {!! csrf_field() !!}
          <div class="form-group row">
            <label class="col-3">Title<span class="text-danger">*</span></label>
            <input type="text" class="form-control col-9" name="name" value="{{$asset->name}}">
          </div>

          <div class="form-group row">
            <label class="col-3">Url Slug<span class="text-danger">*</span> </label>
            <input type="text" class="form-control col-9" name="slug" value="{{$asset->slug}}">
            

          </div>



                  <div class="form-group row">
            <label class="col-3">Asset SKU<span class="text-danger">*</span> </label>
            <input type="text" class="form-control col-9" name="asset_sku" value="{{$asset->sku}}">
            

          </div>



          <!-begin form-group row -->
            <div class="form-group row">
              <label
              class="col-3">Category<span class="text-danger">*</span></label>

              <select name="category_id" class="col-9 form-control">


                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{$asset->category_id == $category->id ? "selected" : ''}}>{{ $category->cat_name }}</option>
                @endforeach


              </select>

            </div>
            <!-end form-group row -->





              <div class="form-group row">
                <label class="col-3">Feature Image<span class="text-danger">*</span></label>

                <div id="home_view" class="col-9">
                </div>
              </div>




              <!-begin form-group row -->
                <div class="form-group row">
                  <label class="col-3 col-form-label"> Description<span class="text-danger">*</span></label>
                  <div class="col-9">
                    <textarea class="summernote" name="description">{{$asset->sku}}</textarea>
                  </div>

                </div>
                <!-end form-group row -->





                 <!-begin form-group row -->
                  <div class="form-group row">
                    <label class="col-3  col-form-label">Status<span class="text-danger">*</span></label>
                    <div class="col-9">
                      <div class="form-group">
                        <input type="checkbox" name="status" value=1 {{$asset->category_id == $category->id ? "checked" : ''}}>
                        <label for="secondLevel" class="col-form-label">Enable</label>
                      </div>
                    </div>

                  </div>
                  <!-end form-group row -->

                    <div class="form-group">
                     <button type="submit" class="btn btn-success btn-lg float-right">Submit & Update</button>
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
          groupClassName:   'col-md-4 col-sm-6 col-xs-6',
          maxFileSize:      '',
          placeholderImage: {
            image: '/storage/products/'+'<?php echo $asset->feature_image ?>',
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

        $("#details_view").spartanMultiImagePicker({
          fieldName:        'Assets_image',
          maxCount:         3,
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
