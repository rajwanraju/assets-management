@extends('layouts.master')

@section('page')
    Shipment Options
@endsection
@section('content')

    <!-- begin card -->
    <div class="card card-inverse">
        <!-- begin card-heading -->
        <div class="card-header">
                <a href="{{ route('shipment.create') }}" class="btn btn-xs btn-primary float-right">Add Shipment</a>
            <h4 class="card-title text-center"> Shipment Options</h4>
        </div>
        <!-- end card-heading -->
        <!-- begin card-body -->
        <div class="card-body">
            <table id="product_table" class="table table-striped table-bordered product_table">
                <thead>
                <tr>
                    <th width="1%">#Sl</th>
                    <th class="text-nowrap">Title</th>
                    <th class="text-nowrap">Cost Inside Dhaka</th>
                    <th class="text-nowrap">Cost Outside Dhaka</th>
                    <th class="text-nowrap">Duration</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shipments as $key=> $shipment)
                    <tr class="odd gradeX">
                        <td width="1%" class="f-s-600 text-inverse">{{$key+1}}</td>

                        <td>{{$shipment->title}}</td>
                        <td>{{$shipment->price}}</td>
                        <td>{{$shipment->price_outside}}</td>
                        <td>{{$shipment->duration}}</td>
                        <td>
                        @if($shipment->status == 0)
                                <span class="lable lable-warning">  {{"Unpublished"}}</span>
                            @elseif($shipment->status == 1)
                                        <span class="lable lable-green">   {{"Published"}}</span>
                            @elseif($shipment->status == 3)
                                                <span class="lable lable-indigo">  {{"Upcomming"}}</span>
                            @else
                                                        <span class="lable lable-yellow">  {{"In Review"}}</span>
                            @endif</td>
                        <td>
                           <a href="{{route('shipment.edit',['id'=>$shipment->id])}}" class="btn btn-success" data-toggle="tooltip" title="Edit Product!"><i class="fa fa-edit"></i> </a>
                            <a href="#" class="btn btn-danger deleteRecord" rel="{{$shipment->id}}" data-toggle="tooltip" title="Product Remove!"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- end card-body -->
    </div>
    <!-- end card -->
    <!-- end #content -->
@endsection
@push('js')
    <script>
        $(document).ready(function () {

            $('#product_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                   'csv', 'excel', 'pdf', 'print'
                ]
            });


               $(document).on('click','.deleteRecord', function(e){
            var id = $(this).attr('rel');
            swal({
                    title: "Are You Sure?",
                    text: "You will not be able to recover this record again",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete It"
                },
                function(){
                    window.location.href= "/admin/settings/shipment/delete/"+id;
                });
        });
        });
    </script>
@endpush
