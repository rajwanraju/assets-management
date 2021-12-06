@extends('layouts.master')

@section('page')
Home Page Content Settings
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
          <th width="1%">#Sl</th>
          <th class="text-nowrap">Category</th>
          <th class="text-nowrap">Position</th>
          <th class="text-nowrap">Status</th>
          <th class="text-nowrap">Action</th>
        </tr>
      </thead>
      <tbody>
       @foreach($home_page as $key=>$page_data)
       <tr>
        <td>{{$key+1}}</td>
        <td>{{category_name($page_data->cat_id)->cat_name}}</td>
        <td>
         {{$page_data->position}}
       </td>
       <td>
         {{status($page_data->status)}}
       </td>
       <td>



         <a href="{{route('home-page.content-edit',$page_data->id)}}" class="btn btn-primary top_banner" id="{{$page_data->id}}"><i class="fa fa-edit"></i></a>
         &nbsp;
         <a href="javascript:;" class="btn btn-danger top_banner_remove" id="{{$page_data->id}}"><i class="fa fa-trash"></i></a>

       </td>
     </tr>

     @endforeach
   </tbody>
 </table>
</div>
<!-- end card-body -->
</div>
<!-- end card -->
<div class="card card-default">
 <div class="card-header">
  <h4 class="card-title text-center">Home Page Content Adding</h4>
</div>
<!-- end card-heading -->
<!-- begin card-body -->
<div class="card-body">
  <form method="post" action="{{route('home-page.content-adding')}}" enctype="multipart/form-data">


    {!! csrf_field() !!}

    <!-begin form-group row -->
    <div class="form-group row m-b-12">
      <label
      class="col-md-3 text-md-right col-form-label">Category</label>
      <div class="col-md-9">
        <select name="category_id" class="form-control">
          {{  category('','','') }}
        </select>
      </div>
    </div>
    <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Position</label>
      <div class="col-md-9">
        <input type="number" name="position"  placeholder="Display Position" class="form-control" >
      </div>
    </div>
    <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Left Banner</label>
      <div id="banner" class="col-md-9">

      </div>

    </div>
    <p style="text-align:center">Image Resulation: 395px*515px && size: less than 150kb</p>


    <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Botoom Paralax</label>
      <div class="col-md-9" id="left_banner">
      </div>
    </div>
    <p style="text-align:center">Image Resulation: 1920px*700px && size: less than 650kb</p>
    <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Botoom Left Banner Slug</label>
      <div class="col-md-9">
        <input type="text" name="paralax_slug"  placeholder="Banner Url Slug" class="form-control" >
      </div>
    </div>


    <!-end form-group row -->



    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Botoom Paralax Content</label>
      <div class="col-md-9">
        <textarea class="summernote" name="paralax_content"></textarea>
      </div>

    </div>
    <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Botoom Paralax Display Status</label>
      <div class="col-md-9">
        <div class="switchery-demo">
          
          <input type="checkbox" data-plugin="switchery" data-color="#ff7aa3" value="1" name="paralax_status" data-switchery="true" style="display: none;" checked>
          
        </div>
      </div>

    </div>
    <!-end form-group row -->

    <!-begin form-group row -->
    <div class="form-group row m-b-10">
      <label class="col-md-3 text-md-right col-form-label">Status</label>
      <div class="col-md-9">
        <div class="switchery-demo">
          
          <input type="checkbox" data-plugin="switchery" data-color="#ff7aa3" value="1" name="status" data-switchery="true" style="display: none;" checked>
          
        </div>
      </div>

    </div>
    <!-end form-group row -->





    <div class="form-group">
     <button type="submit" class="btn btn-success" style="float: right">Save</button>
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
    $("#left_banner").spartanMultiImagePicker({
      fieldName:        'paralax',
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


    $('.top_banner').on('click',function(){

      var id = $(this).attr('id');


      $.ajax({
        url: '/admin/settings/home-page/'+id,
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
        window.location.href="/admin/settings/page-content/"+id+"/delete";
      });
    });
  });
</script>

@endpush
