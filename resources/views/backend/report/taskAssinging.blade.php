@extends('layouts.master')

@section('page')
Task Assign
@endsection

@push('css')

@endpush
@section('content')


<div class="card">
  <div class="card-body">
    <form method="post" action="{{route('assets.store.management')}}" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-10 col-12 offset-lg-2 offset-md-2 offset-sm-2">
          <h1 class="text-center text-danger">Task Assign</h1><br>

          {!! csrf_field() !!}
          <!-begin form-group row -->
            <div class="form-group row">
              <label
              class="col-3">Asset<span class="text-danger">*</span></label>

             <h3>{{$asset->name}}</h3>

            </div>
            <!-end form-group row --> 


              <!-begin form-group row -->
                <div class="form-group row">
                  <label
                  class="col-3">Employee<span class="text-danger">*</span></label>

                  <select name="user_id" class="col-9 form-control">
                    <option value="">Select Employee</option>
                    @foreach($available_empolyees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                  </select>

                </div>
                <!-end form-group row -->

                  <div class="form-group">
                   <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                 </div>

               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>

   @endsection


