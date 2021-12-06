@extends('layouts.admin.master')

@section('page')
Vendor List
@endsection
@push('css')


<style>
    .md-tabs .nav-item {
        width: calc(100% / 3);
        text-align: center;
    }
    .nav-tabs .slide {
        background: #01a9ac;
        width: calc(100% / 3);
        height: 4px;
        position: absolute;
        -webkit-transition: left 0.3s ease-out;
        transition: left 0.3s ease-out;
        bottom: 0;
    }
</style>
@endpush
@section('content')


<div class="card card-inverse">
            <div class="card-header">
                <a href="{{route('seller.create')}}" class="btn btn-primary float-right">Add Seller</a>
                <h4 class="card-title text-center"> Seller List</h4>
            </div>
            <div class="card-body">
<div class="row">
    <div class="col-lg-12">
        <!-- tab header start -->

                <!-- personal card start -->
                     <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Buessness Type</th>
                        <th>Company Type</th>
                        <th>Tread Licence</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
             @foreach($users as $key=>$value)
             <tr>

                <td><a class="text-primary" href="{{route('vendor.profile',['id'=>$value->id,'name'=>$value->name])}}"> {{$value->name}}</a></td>
                <td><a class="text-primary" href="{{route('vendor.profile',['id'=>$value->id,'name'=>$value->name])}}">{{$value->email}}</a></td>
                <td><a class="text-primary" href="{{route('vendor.profile',['id'=>$value->id,'name'=>$value->name])}}">{{$value->phone}}</a></td>
                <td>{{$value->seller != null  ? buisness_type($value->seller->buisness_type) :''}}</td>
                <td>{{$value->seller != null  ? company_type($value->seller->company_type) :''}}</td>
                <td>{{$value->seller != null  ? $value->seller->tread_licence :''}}</td>
                <td>{{status($value->status)}}</td>
                <td>
                    @if($value->status == 0)
                    <a href="{{route('vendor.status',$value->id)}}" class="btn btn-sm btn-success" title="Active"><i class="fa fa-check"></i></a>

                    @else
                    <a href="{{route('vendor.status',$value->id)}}" class="btn btn-sm btn-warning" title="DeActive"><i class="fa fa-power-off"></i></a>

                    @endif

                </td>
             </tr>

             @endforeach
                </tbody>
                </table>

               


  
</div>
<!-- tab content end -->
</div>
</div>






    
          
            </div>
@endsection

@push('js')

<script>
  $('#data-table').DataTable({
    dom: 'Bfrtip',
    buttons: [
    'excel', 'pdf', 'print'
    ]
}); 

</script>
@endpush