@extends('layouts.master')

@section('page')
Slug Settings
@endsection

@section('content')

<div class="col-12">

      <form action="{{ route('slug.settings.update',$slug->id) }}" method="POST">
        @csrf

    <div class="col-9 offset-1">
<!-- begin card -->
<div class="card card-primary" >
    <!-- begin card-header -->
    <div class="card-header">
        <h4 class="card-title">Edit Slug</h4>
    </div>
    <!-- end card-header -->
    <!-- begin card-body -->
    <div class="card-body">
         <div class="row form-group m-b-10">
            <label class="col-md-3 col-form-label">Slug News</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input type="text" class="form-control" name="slug"  value="{{$slug->slug}}" />
                </div>
            </div>
        </div>
        <div class="row form-group m-b-10">
            <label class="col-md-3 col-form-label">Slug URL</label>
            <div class="col-md-9">
                <div class="input-group">
                    <input type="text" class="form-control" name="slug_url" value="{{$slug->slug_url}}" />

                </div>

            </div>
        </div>

       <div class="form-group row m-b-10">
        <div class="col-md-10">
            <center><input type="submit" value="Save Settings" class="btn btn-primary"></center>
        </div>
    </div>
    </div>
</div>
</div>

</form>
</div>


@endsection

@push('js')

@endpush
