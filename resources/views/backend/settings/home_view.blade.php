@extends('layouts.master')

@section('page')
Home Slider Settings
@endsection

@push('css')

@endpush
@section('content')

<!-- begin card -->
<div class="card card-default">
    <!-- begin card-heading -->
    <div class="card-header">

        <h4 class="card-title text-center">Home Page Content List</h4>
    </div>
    <!-- end card-heading -->
    <!-- begin card-body -->
    <div class="card-body">
        <table id="product_table" class="table table-striped table-bordered product_table">
            <thead>
                <tr>
                    <th width="30%">Image</th>
                    <th class="text-nowrap">Url Slug</th>
                    <th class="text-nowrap">Note</th>
                    <th class="text-nowrap">Position</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
           @foreach($home_sliders as $image)
             <tr>
                <td> <img src="{{asset('/public/storage/settings/'.$image->image)}}" width="30%"></td>
                <td>{{$image->slug}}</td>
                <td>
                  {!! $image->note !!}
             </td>
             <td>
                {{$image->position}}
             </td>
             <td>



              <a href="{{route('home.image.edit',$image->id)}}" class="btn btn-primary" ><i class="fa fa-edit"></i></a>
                            &nbsp;
                            <a href="javascript:;" class="btn btn-danger top_banner_remove" id="{{$image->id}}"><i class="fa fa-trash"></i></a>

             </td>
         </tr>

         @endforeach
     </tbody>
 </table>
</div>
<!-- end card-body -->
</div>


<div class="card">
  <div class="card-body">
<form method="post" action="{{route('upload.home.image')}}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 col-sm-12 col-11 offset-lg-2">
                <h1 class="text-center text-danger">Home Slider Image Upload</h1><br>

                    {!! csrf_field() !!}
                    <input type="hidden" name="image_type" value="1">

                     <div class="form-group row">
                        <label class="col-3">Url Slug</label>
                            <input type="text" class="form-control col-8" name="slug">
                    </div>
                    <span style="text-align:center"> Note: Use Slug Here.(Please Avoid Full Url)</span>




                       <div class="form-group row">
                        <label class="col-3">Position</label>
                            <input type="number" class="form-control col-8" name="position">
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
        <textarea class="summernote" name="note"></textarea>
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
