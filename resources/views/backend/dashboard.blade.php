@extends('layouts.master')

@section('page')
DashBoard
@endsection

@section('content')

 

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

                        <div class="col-xl-3 col-sm-6">
                            <div class="card-box widget-box-two widget-two-custom ">
                                <div class="media">
                                    <div class="avatar-lg rounded-circle bg-info widget-two-icon align-self-center">
                                        <i class="dripicons-weight avatar-title font-30 text-white"></i>

                                    </div>

                                    <div class="wigdet-two-content media-body">
                                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Available Assets</p>
                                        <h3 class="font-weight-medium my-2"> <span data-plugin="counterup">{{count($available_assets)}}</span></h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-3 col-sm-6">
                            <div class="card-box widget-box-two widget-two-custom ">
                                <div class="media">
                                    <div class="avatar-lg rounded-circle bg-warning widget-two-icon align-self-center">
                                        <i class="dripicons-cart avatar-title font-30 text-white"></i>
                                    </div>

                                    <div class="wigdet-two-content media-body">
                                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Employees</p>
                                        <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{count($available_empolyees)}}</span></h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-3 col-sm-6">
                            <div class="card-box widget-box-two widget-two-custom ">
                                <div class="media">
                                    <div class="avatar-lg rounded-circle bg-danger widget-two-icon align-self-center">
                                        <i class="fas fa-users  avatar-title font-30 text-white"></i>
                                    </div>

                                    <div class="wigdet-two-content media-body">
                                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Assets</p>
                                        <h3 class="font-weight-medium my-2"><span data-plugin="counterup"></span>{{count($aseets)}}</h3>

                                    </div>
                                </div>
                            </div>
                        </div>

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


<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 ">
        <!-- begin card -->
        <div class="card card-info">
            <div class="card-header">

                <h4 class="card-title">Available Assets</h4>


            </div>
            <div class="card-body p-t-0">
                <div class="table-responsive">
                    
    <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#Sl No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Category</th>

                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($available_assets as $key => $value): ?>
                      <tr>

                        <td>{{$key+1}}</td>
                        <td><img src="{{asset('/storage/products/'.$value->feature_image)}}" width="56px"></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->sku}}</td>
                        <td>{{category($value->category_id)}}</td>


                        <td>{{status($value->status)}}</td>

                        <td>
                          <a href="{{route('assetAssigning',$value->id)}}" class='btn btn-sm btn-primary'  data-toggle="tooltip" title="Assign To Employee!"><i class='fa fa-plus'></i></a>
                      </td>
                  </tr>
              <?php endforeach; ?>


         </tbody>
     </table>


         
             </div>
         </div>
     </div>
     <!-- end card -->
 </div>
 <div class="col-lg-6">
    <!-- begin card -->
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title">Employees</h4>
        </div>
        <div class="card-body p-t-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($available_empolyees as $key=>$user)
                        <tr class="odd gradeX">
                            <td><a href="#" class="text-indigo-darker">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->dept}}</td>
                        </tr>

                        <?php if($key == 4) break; ?>
                        @endforeach
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


