@extends('layouts.simpleMaster')

@section('page')
DashBoard
@endsection

@section('content')
    <div id="wrapper" style="padding-top: 20px;">
        <div class="content-page">
            <div class="content">
              <div class="container-fluid">

    <!-- begin row -->
<div class="row">

                        <div class="col-xl-3 col-sm-6">
                            <div class="card-box widget-box-two widget-two-custom">
                                <div class="media">
                                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                        <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                                    </div>

                                    <div class="wigdet-two-content media-body">
                                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Assigned Assets</p>
                                        <h3 class="font-weight-medium my-2"> <span data-plugin="counterup">{{count($assinged_assets)}}</span></h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- begin card -->
        <div class="card card-info">
            <div class="card-header">

                <h4 class="card-title">Assingned Assets List</h4>


            </div>
            <div class="card-body p-t-0">
                <div class="table-responsive">
                    
    <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#Sl No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Employee</th>
                        <th>Dept.</th>
                        <th>Email</th>
                        <th>Assigned At</th>

                        <th>Assigned Expired At</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($assinged_assets as $key => $value): ?>
                      <tr>

                        <td>{{$key+1}}</td>
                        <td><img src="{{asset('/storage/products/'.$value->feature_image)}}" width="56px"></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->cat_name}}</td>
                        <td>{{$value->employee}}</td>


                        <td>{{$value->dept}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->assignDate}}</td>
                        <td>{{$value->expireDate}}</td>

                       
                  </tr>
              <?php endforeach; ?>

          </tbody>
      </table>



        

         
             </div>
         </div>
     </div>
     <!-- end card -->
 </div>


    
</div>
</div>
</div>
</div>
@endsection
