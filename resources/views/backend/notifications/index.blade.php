@extends('layouts.admin.master')

@section('page')
     Notification
@endsection

@push('css')
@endpush

@section('content')
    <div class="col-sx-12">
        <div class="card card-inverse">
            <div class="card-header">
                    <a href="{{route('notification.create')}}" class="btn btn-info float-right" >New Notification</a>
                <h4 class="card-title">Notification List</h4>
            </div>
            <div class="card-body">
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#Sl No</th>
                        <th>Title</th>
                        <th>Target</th>
                        <th>Message</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($notifications as $key=>$notification)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$notification -> title}}</td>
                            <td>{{notification_user($notification -> target_user)}}</td>
                            <td>{{$notification -> message}}</td>
                            <td>{{status($notification -> status)}}</td>
                            <td>
                                
                                           @if($notification->status == 0)
                    <a href="{{route('notification.status',$notification->id)}}" class="btn btn-sm btn-success" title="Active"><i class="fa fa-check"></i></a>

                    @else
                    <a href="{{route('notification.status',$notification->id)}}" class="btn btn-sm btn-warning" title="DeActive"><i class="fa fa-power-off"></i></a>

                    @endif

                    <a href="{{route('notification.edit',$notification->id)}}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger deleteRecord" rel="{{$notification->id}}" title="Remove"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script>
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
                    window.location.href="delete/"+id;
                });
        });
    </script>
@endpush
