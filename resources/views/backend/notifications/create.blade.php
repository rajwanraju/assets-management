@extends('layouts.admin.master')

@section('page')
     Notification Adding
@endsection

@push('css')
@endpush

@section('content')



<div class="col-md-12">
	<div class="card card-default">
		<div class="card-header">
			<h4 class="card-title text-center">  Notification Adding</h4>
		</div>
		<div class="card-body">
			<form action="{{ route('notification.store') }}" method="post">
				@csrf
						<div class="form-group">
							<label for="district" class="col-form-label"> Title </label>
							<input type="text" name="title" value="{{ old('title') }}"  id="address" class="form-control">

						</div>
				


						<div class="form-group" id="condition">
							<label for="district" class="col-form-label"> Target User </label>
							<select class="form-control" name="target_user" id="condition_for">
						
								<option value="1">All Users</option>
								<option value="2">Customers</option>
								<option value="3">Seller</option>
								<option value="4">Merchant </option>
							</select>

						</div>
						<div class="form-group" id="customer_condition" style="display: none">
						<label for="district" class="col-form-label"> Customers </label>
							<select name="user[]" class="form-control demo1" id="demo1" data-max="" multiple="multiple" style="">
								@foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
							</select>
						</div>
						<div class="form-group" id="seller_condition" style="display: none">
						<label for="district" class="col-form-label"> Seller </label>

							<select class="form-control demo1" name="seller[]" id="demo1" data-max="" multiple="multiple" style="">
								@foreach($sellers as $seller)
                                <option value="{{$seller->id}}">{{$seller->seller_settings ? $seller->seller_settings->title : $seller->name}}</option>
                                @endforeach
							</select>
						</div>

						<div class="form-group" id="merchant_condition" style="display: none">
						<label for="district" class="col-form-label"> Merchant </label>

							<select class="form-control demo1" name="merchant[]" id="demo1" data-max="" multiple="multiple" style="">
							@foreach($merchants as $merchant)
                                <option value="{{$merchant->id}}">{{$merchant->seller_settings ? $merchant->seller_settings->title : $merchant->name}}</option>
                                @endforeach
							</select>
						</div>
						
					

								<div class="form-group">
							<label for="longitude" class="col-form-label">Message</label>
							
							<textarea class="form-control" rows="4" name="message">{{ old('message') }}</textarea>
						</div>



						<div class="switcher">
							<input type="checkbox" name="status" id="switcher_checkbox_1" checked value="1">
							<label for="switcher_checkbox_1">Status</label>
						</div>

		

				<div class="form-group text-center">
					<button type="submit" class="btn btn-bg btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>


@endsection

@push('js')

    <script>


// condition aplly on 
		$('#condition_for').on('change',function(){
			if (this.value == 1) {
				$( "#customer_condition" ).slideUp( "slow" );
				$( "#seller_condition" ).slideUp( "slow" );
				$( "#merchant_condition" ).slideUp( "slow" );
			}
			else if (this.value == 2) {
				$( "#customer_condition" ).slideDown( "slow" );
				$( "#seller_condition" ).slideUp( "slow" );
				$( "#merchant_condition" ).slideUp( "slow" );
			}

			else if (this.value == 3) {
				$( "#customer_condition" ).slideUp( "slow" );
				$( "#seller_condition" ).slideDown( "slow" );
				$( "#merchant_condition" ).slideUp( "slow" );
			}

			else{
				$( "#customer_condition" ).slideUp( "slow" );
				$( "#seller_condition" ).slideUp( "slow" );
				$( "#merchant_condition" ).slideDown( "slow" );
			}

		});





        $(document).on('click','.deleteRecord', function(e){
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                    title: "Are You Sure?",
                    text: "You will not be able to recover this record again",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete It"
                },
                function(){
                    window.location.href="/notification/delete/"+id;
                });
        });
    </script>
@endpush