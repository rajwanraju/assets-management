@extends('layouts.admin.master')

@section('page')
Seller Page Design
@endsection
@section('content')

@push('css')
<style type="text/css">

	#image-preview {
        width: 300px;
        height: 70px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #ecf0f1;
        border: 1px solid black;
        margin: 10px;
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 800px) and (orientation: portrait) {
        #image-preview {
            width: 300px;
            height: 70px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
            border: 1px solid black;
            margin: 10px;
        }
    }

    #image-preview input {
        width: 300px;
        height: 70px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }

    #image-preview label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        vertical-align: middle;
        background-color: #bdc3c7;
        width: 223px;
        height: 50px;
        font-size: 14px;
        line-height: 55px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }

    #favicon-preview {
        width: 300px;
        height: 70px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #ecf0f1;
        border: 1px solid black;
        margin: 10px;
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 800px) and (orientation: portrait) {
        #favicon-preview {
            width: 300px;
            height: 120px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
            border: 1px solid black;
            margin: 10px;
        }
    }

    #favicon-preview input {
        width: 300px;
        height: 70px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }

    #favicon-preview label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        vertical-align: middle;
        background-color: #bdc3c7;
        width: 223px;
        height: 50px;
        font-size: 14px;
        line-height: 55px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }
</style>
@endpush
@section('content')

<div class="card">
    <div class="card-header">
          <h3 class="card-title text-center">{{$seller !=null ? $seller->title : $user->name}} Page Settings</h4>
    </div>

    <!-- begin col-6 -->

      <form action="{{route('seller.settings.update',$user->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
        <!-- begin card -->
        <div class="card card-primary" >
            <!-- begin card-header -->
            <div class="card-header">
                <h4 class="card-title">Page Logo</h4>
            </div>
            <div class="card-body p-t-10">
            
                     <div class="form-group row m-b-10">
                        <label class="col-3 text-md-right col-form-label">Page Logo</label>
                        <div class="col-9  main-section">
                            <div id="image-preview" class="form-group" style="background-image: url('{{$seller !=null ? asset('/storage/profileImage/'.$seller->user_id.'/'.$seller->logo) : ''}}');background-repeat: no-repeat, repeat;">
                                <label for="image-upload" id="image-label">Choose
                                Logo</label>
                                <input type="file" name="logo" id="image-upload"
                                value=""/>
                            </div>
                        </div>
                    </div>
              

                     <div class="row form-group m-b-10">
           <label class="col-3 col-form-label">Title</label>
           <div class="col-9">
              <div class="input-group">
                 <input type="text" class="form-control" name="title" value="{{$seller !=null ? $seller->title : ''}}" />
             </div>
         </div>
     </div>

      <div class="row form-group m-b-10">
           <label class="col-3 col-form-label">Shop Location</label>
           <div class="col-9">
              <div class="input-group">
                 <input type="text" class="form-control" name="location" value="{{$seller !=null ? $seller->address : ''}}" />
             </div>
         </div>
     </div>

       

            </div>
        </div>
        <!-- end card-body -->
        <!-- begin hljs-wrapper -->
        <div class="hljs-wrapper">

        </div>
        <!-- end hljs-wrapper -->
    </div>
    <!-- end card -->
    <div class="col-lg-6">
    <!-- begin card -->
    <div class="card card-primary" >
        <!-- begin card-header -->
        <div class="card-header">
            <h4 class="card-title">Page SEO</h4>
        </div>
        <!-- end card-header -->
        <!-- begin card-body -->
        <div class="card-body">
            <div class="row form-group m-b-10">
               <label class="col-md-3 col-form-label">Meta Title</label>
               <div class="col-md-9">
                  <div class="input-group">
                    <input type="text" class="form-control" name="meta_title" value="{{ $seller !=null ? $seller->meta_title :''}}" />

                 </div>
             </div>
         </div>
         <div class="row form-group m-b-10">
           <label class="col-md-3 col-form-label">Meta Description</label>
           <div class="col-md-9">
              <div class="input-group">
                 <textarea class="form-control" name="meta_description" value=""  rows="4">{{$seller !=null ? $seller->meta_description : ''}}</textarea>
             </div>
         </div>
     </div>
</div>


<!-- end card-body -->
<!-- begin hljs-wrapper -->
<div class="hljs-wrapper">

</div>
<!-- end hljs-wrapper -->
</div>
<!-- end card -->
</div>





    <!-- end card -->
    <div class="col-lg-6">
    <!-- begin card -->
    <div class="card card-primary" >
        <!-- begin card-header -->
        <div class="card-header">
            <h4 class="card-title">Social Links</h4>
        </div>
        <!-- end card-header -->
        <!-- begin card-body -->
        <div class="card-body">
            <div class="row form-group m-b-10">
               <label class="col-md-3 col-form-label">Facebook Page</label>
               <div class="col-md-9">
                  <div class="input-group">
                    <input type="url" class="form-control" name="fb_link" value="{{$seller !=null ? $seller->fb_link : ''}}" />

                 </div>
             </div>
         </div>
         <div class="row form-group m-b-10">
           <label class="col-md-3 col-form-label">Instagram Link</label>
           <div class="col-md-9">
              <div class="input-group">
                 <input type="url" class="form-control" name="ins_link" value="{{$seller !=null ? $seller->ins_link : ''}}" />
             </div>
         </div>
     </div>
     <div class="row form-group m-b-30">
       <label class="col-md-3 col-form-label">Youtube Link</label>
       <div class="col-md-9">
        <div class="input-group">
           <input type="url" class="form-control" data-role="tagsinput" name="youtube_link" value="{{$seller !=null ? $seller->youtube_link : ''}}" />
       </div>
   </div>
</div>
</div>


<!-- end card-body -->
<!-- begin hljs-wrapper -->
<div class="hljs-wrapper">

</div>
<!-- end hljs-wrapper -->
</div>
<!-- end card -->
</div>



    <!-- end card -->
    <div class="col-lg-12">
    <!-- begin card -->
    <div class="card card-primary" >
        <!-- begin card-header -->
        <div class="card-header">
            <h4 class="card-title">Shop Policy</h4>
        </div>
        <!-- end card-header -->
        <!-- begin card-body -->
        <div class="card-body">
            <div class="row form-group m-b-10">
               <label class="col-md-3 col-form-label">Return Policy</label>
               <div class="col-md-9">
                  <div class="input-group">
                    <textarea class="summernote" name="return_policy" value="" >{!! $seller !=null ? $seller->return_policy : "" !!}</textarea>

                 </div>
             </div>
         </div>
         <div class="row form-group m-b-10">
           <label class="col-md-3 col-form-label">Privacy Policy</label>
           <div class="col-md-9">
              <div class="input-group">
                 <textarea class="summernote" name="privacy_policy" value="" >{!! $seller !=null ? $seller->privacy_policy : "" !!}</textarea>
             </div>
         </div>
     </div>
</div>


<!-- end card-body -->
<!-- begin hljs-wrapper -->
<div class="hljs-wrapper">

</div>
<!-- end hljs-wrapper -->
</div>
<!-- end card -->
</div>

<!-- end card -->
</div>
    <div class="form-group row m-b-10">
        <div class="col-md-10">
            <center><input type="submit" value="Save Settings" class="btn btn-primary"></center>
        </div>
    </div>
    <br>
</form>
</div>
<!-- end col-6 -->


<!-- end row -->

@endsection
@push('js')

@push('js')




    //Using text editor...
    <script>
        $(document).ready(function () {
               
// FormSummernote.init();

$(".summernote").summernote({

      fontNames: ['Arial', 'Arial Black','Times', 'Times New Roman', 'Georgia', 'serif', 'Comic Sans MS', 'Courier New', 'serif','Verdana', 'Helvetica', 'sans-serif','Lucida Console', 'Courier', 'monospace','Comic Sans', 'Comic Sans MS', 'cursive','Zapf Chancery', 'cursive','Coronetscript', 'cursive','Florence', 'cursive','Parkavenue', 'cursive','cursive','Impact','Arnoldboecklin','Oldtown','Blippo','Brushstroke','fantasy','Abril Fatface','Aclonica'],
        height: 300,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
    });
        });
    </script>
<script>
    $(document).ready(function () {
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label"
        });

    });

    $("select").val();
</script>
@endpush