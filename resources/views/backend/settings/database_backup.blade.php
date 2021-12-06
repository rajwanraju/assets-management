@extends('layouts.master')

@section('page')
Database Backup
@endsection

@push('css')

@endpush
@section('content')



        <!-- end panel-heading -->


<div class="card text-center">

  <div class="card-body">
    <h5 class="card-title">Last BackUp</h5>
    <p class="card-text">By: {{$database ? $database->user_id : ""}}</p>
    <p class="card-text"> {{$database ? $database->created_at : ""}}</p>
    <a href="{{route('backup.index')}}" class="btn btn-bg btn-success">Backup Now</a>
  </div>


</div>


  <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">

            <h4 class="panel-title"> Database BackUp</h4>
        </div>

        <!-- begin panel-body -->
        <div class="panel-body">
            <table id="product_table" class="table table-striped table-bordered product_table">
                <thead>
                <tr>
                    <th width="1%">#Sl</th>
                    <th class="text-nowrap">Backup Creator</th>
                    <th class="text-nowrap">Time</th>
                    <th class="text-nowrap">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($backup as $key=> $backup_data)
                    <tr class="odd gradeX">
                        <td width="1%" class="f-s-600 text-inverse">{{$key+1}}</td>

                        <td>{{$backup_data->user_id}}</td>
                        <td>{{$backup_data->create_at}}</td>
                      <td>
                            <a href="" class="btn btn-danger"  data-toggle="tooltip" title="Download!"><i class="fa fa-download"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- end panel-body -->
    </div>

@endsection
@push('js')

@endpush
