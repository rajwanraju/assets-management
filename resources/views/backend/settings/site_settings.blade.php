@extends('layouts.master')

@section('page')
General Settings
@endsection

@push('css')
<style type="text/css">

</style>
@endpush
@section('content')



<!-- begin col-6 -->

<form action="{{ route('general.settings.store') }}" enctype="multipart/form-data" method="POST">
	@csrf
	<div class="row">
		<div class="col-lg-6">
			<!-- begin card -->
			<div class="card card-primary" >
				<!-- begin card-header -->
				<div class="card-header">
					<h4 class="card-title">Site Logo</h4>
				</div>
				<div class="card-body p-t-10">
					<div class="form-group row m-b-10">
						<label class="col-4 text-md-right col-form-label">Site Logo</label>
						<div class="col-8">
							<div id="logo"></div>

						</div>
					</div>

					<div class="form-group row m-b-10">
						<label class="col-4 text-md-right col-form-label">Favicon</label>
						<div class="col-8">
							<div id="favicon"></div>
						</div>
					</div>
				</div>
				<!-- end card-body -->
				<!-- begin hljs-wrapper -->
				<div class="hljs-wrapper">

				</div>
				<!-- end hljs-wrapper -->
			</div>
		</div>
		<!-- end card -->
		<div class="col-lg-6">
			<!-- begin card -->
			<div class="card card-primary" >
				<!-- begin card-header -->
				<div class="card-header">
					<h4 class="card-title">Site Infomation</h4>
				</div>
				<!-- end card-header -->
				<!-- begin card-body -->
				<div class="card-body">
					<div class="row form-group m-b-10">
						<label class="col-md-3 col-form-label">Site Title</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="site_title" value="{{isset($settings->site_title)? $settings->site_title :''}}" />

							</div>
						</div>
					</div>
					<div class="row form-group m-b-30">
						<label class="col-md-3 col-form-label">Office Address</label>
						<div class="col-md-9">
							<div class="input-group">

								<textarea class="form-control" name="office_address">{{ isset($settings->office_address) ? $settings->office_address :''}}</textarea>
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
		<div class="col-lg-6">
			<!-- begin card -->
			<div class="card card-primary" >
				<!-- begin card-header -->
				<div class="card-header">
					<h4 class="card-title">Site SEO</h4>
				</div>
				<!-- end card-header -->
				<!-- begin card-body -->
				<div class="card-body">
					<div class="row form-group m-b-10">
						<label class="col-md-3 col-form-label">Meta Title</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="meta_title" value="{{isset($settings->meta_title)? $settings->meta_title :''}}" />

							</div>
						</div>
					</div>
					<div class="row form-group m-b-10">
						<label class="col-md-3 col-form-label">Meta Description</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="meta_description" value="{{ isset($settings->meta_description) ? $settings->meta_description :''}}" />
							</div>
						</div>
					</div>
					<div class="row form-group m-b-30">
						<label class="col-md-3 col-form-label">Meta Keywords</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" data-role="tagsinput" name="meta_keywords" value="{{ isset($settings->meta_keywords)? $settings->meta_keywords :''}}" />
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

		@hasrole('Super Admin')
		<div class="col-lg-6">
			<!-- begin card -->
			<div class="card card-primary" >
				<!-- begin card-header -->
				<div class="card-header">
					<h4 class="card-title">SMS API</h4>
				</div>
				<!-- end card-header -->
				<!-- begin card-body -->
				<div class="card-body">
					<div class="row form-group m-b-10">
						<label class="col-md-3 col-form-label">SMS URL</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="url" class="form-control" name="sms_url" value="{{ isset($settings->sms_url)? $settings->sms_url :''}}" />

							</div>

						</div>
					</div>
					<div class="row form-group m-b-10">
						<label class="col-md-3 col-form-label">SMS API KEY</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="sms_key" value="{{ isset($settings->sms_key)? $settings->sms_key :''}}" />
							</div>
						</div>
					</div>
					<div class="row form-group m-b-30">
						<label class="col-md-3 col-form-label">SMS SENDER ID</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control"   name="sms_sender" value="{{ isset($settings->sms_sender)? $settings->sms_sender :''}}" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="col-lg-6">
			<!-- begin card-body -->
			<div class="card card-primary" >
				<!-- begin card-header -->
				<div class="card-header">
					<h4 class="card-title">SSl Commerce API</h4>
				</div>
				<div class="card-body">
					<div class="row form-group m-b-10">
						<label class="col-md-3 col-form-label">Store Url</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="url" class="form-control" name="sslcommerce_store_url" value="{{ isset($settings->sslcommerce_store_url)? $settings->sslcommerce_store_url :''}}"  />

							</div>

						</div>
					</div>
					<div class="row form-group m-b-10">
						<label class="col-md-3 col-form-label">Store ID</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="sslcommerce_store_id" value="{{ isset($settings->sslcommerce_store_id)? $settings->sslcommerce_store_id :''}}" />
							</div>
						</div>
					</div>
					<div class="row form-group m-b-30">
						<label class="col-md-3 col-form-label">Store Password</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="sslcommerce_store_password" value="{{isset($settings->sslcommerce_store_password)? $settings->sslcommerce_store_password :''}}"  />
							</div>
						</div>
					</div>
					
					<div class="form-group row m-b-10">
                            <label class="col-5 text-md-right col-form-label">Cash on Delivery</label>
                            <div class="col-sm-7 col-xl-7 m-b-30">
                               <div class="form-group">
                                    <input type="checkbox" name="cash_status" {{ isset($settings->cash_status) && $settings->cash_status == 1  ? "checked" : '' }} value="1">
                                    <label for="secondLevel" class="col-form-label">Enable</label>
                                </div>
                            </div>
                        </div>
				</div>


				<!-- end card-body -->

			</div>
		</div>
		@endrole

		<div class="col-lg-6">
			<!-- begin card-body -->
			<div class="card card-primary" >
				<!-- begin card-header -->
				<div class="card-header">
					<h4 class="card-title">Help Desk Number</h4>
				</div>
				<div class="card-body">
					<div class="row form-group m-b-10">
						<label class="col-md-3 col-form-label">Number</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="help_number" value="{{ isset($settings->help_number)? $settings->help_number :''}}"  />

							</div>

						</div>
					</div>
				</div>


				<!-- end card-body -->

			</div>
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

<!-- end col-6 -->


<!-- end row -->

@endsection
@push('js')
<script type="text/javascript">
$(function(){

	$("#logo").spartanMultiImagePicker({
		fieldName:        'logo',
		maxCount:         1,
		rowHeight:        '200px',
		groupClassName:   'col-md-12 col-sm-12 col-xs-12 col-12',
		maxFileSize:      '',
		placeholderImage: {
			image: '/public/images/logo.png',
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

	$("#favicon").spartanMultiImagePicker({
		fieldName:        'favicon',
		maxCount:         1,
		rowHeight:        '100px',
		groupClassName:   'col-md-12 col-sm-12 col-xs-12 col-12',
		allowedExt:       'ico',
		maxFileSize:      '',
		placeholderImage: {
			image: '/public/favicon.ico',
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
			alert('Please only input .ico type file')
		},
		onSizeErr : function(index, file){
			console.log(index, file,  'file size too big');
			alert('File size too big');
		}
	});
});
</script>
@endpush
