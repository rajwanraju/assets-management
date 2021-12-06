@extends('layouts.admin.master')

@section('page')
Vendor List
@endsection
@section('content')
<div class="col-sm-12">
	<!-- Tab variant tab card start -->
	<div class="card">

		<form method="post" action="{{ route('seller.account-store') }}">
			@csrf
			<div class="modal-body">



				<div class="card">
					<div class="card-header">
						<h4 class="card-title text-center">Seller Account Details</h4>
					</div>

					<div class="card-block">




						<div class="row">
							<div class="col-md-12">
									<div class="form-group">
									<label for="name" class="col-form-label">Shop Name</label>
									<input type="text" id="name" name="shop_name" class="form-control">
								</div>

							</div>
							<div class="col-md-6">
								

								<div class="form-group">
									<label for="name" class="col-form-label">Seller Name</label>
									<input type="text" id="name" name="name" class="form-control">
								</div>

								<div class="form-group">
									<label for="email" class="col-form-label">Email</label>
									<input type="email" id="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label for="phone" class="col-form-label">Phone Number</label>
									<input type="text" id="phone" name="phone"  data-parsley-type="number" placeholder="017xxxxxxxxx" class="form-control">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="password" class="col-form-label">Password</label>
									<input type="password" id="password" name="password" class="form-control">
								</div>

								<div class="form-group">
									<label for="confirm-password" class="col-form-label">Confirm Password</label>
									<input type="password" id="confirm-password" name="password_confirmation" class="form-control">
								</div>
								<div class="form-group">
									<label for="address" class="col-form-label">Address</label>
									<input type="text" id="address" name="address" class="form-control">
								</div>

							</div>
						</div>
					</div>
				</div>



				<div class="card">
					<div class="card-header">
						<h4 class="card-title text-center">Seller Buisness Details</h4>
					</div>
					<div class="card-block">




						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name" class="col-form-label">NID/Passport</label>
									<input type="text" id="name" name="nid" class="form-control">
								</div>

								<div class="form-group">
									<label for="email" class="col-form-label">Tread Licence</label>
									<input type="text" id="email" name="tread_licence" class="form-control">
								</div>
								<div class="form-group">
									<label for="phone" class="col-form-label">Buisness Information</label>
									<input type="text" id="phone" name="buisness_info"  class="form-control">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="password" class="col-form-label">Offile Phone</label>
									<input type="text" id="password" name="office_phone" class="form-control">
								</div>

								<div class="form-group">
									<label for="confirm-password" class="col-form-label">Office Email</label>
									<input type="text" id="office_email" name="office_email" class="form-control">
								</div>
								<div class="form-group">
									<label for="address" class="col-form-label">Office Location</label>
									<input type="text" id="address" name="office_address" class="form-control">
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>


@endsection