@extends('layouts.master')

@section('page')
    Shipment Create
@endsection

@push('css')
@endpush

@section('content')
    <div class="col-md-8">

        <div class="card card-inverse">
            <div class="card-header">
                <h4 class="card-title text-center">Shipment</h4>
            </div>
            <div class="card-body">
                <form action="{{route('shipment.store')}}" method="post">
                    @csrf
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="coupon_code" class="col-form-label"> Shipment Title </label>
                                <input type="text" name="title" id="coupon_code" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="amount" class="col-form-label">Cost InSide Dhaka </label>
                                <input type="text" id="amount" name="price" class="form-control">
                            </div>
                            
                             <div class="form-group">
                                <label for="amount" class="col-form-label">Cost OutSide Dhaka</label>
                                <input type="text" id="amount" name="price_outside" class="form-control">
                            </div>
                            
                             <div class="form-group">
                                <label for="amount" class="col-form-label"> Delivary Time</label>
                                <input type="text" id="amount" value="" name="duration" class="form-control">
                            </div>
                        <div class="form-group row m-b-10" style="margin-left: 3px;">
                            <div class="col-md-9">
                                <div class="checkbox checkbox-css checkbox-inline">
                                    <input type="checkbox" value="1" name="status" id="inlineCssCheckbox2">
                                    <label for="inlineCssCheckbox2">Enable</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <a href="{{ route('shipment.settings') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
