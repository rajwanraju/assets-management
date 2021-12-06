@extends('layouts.admin.master')

@section('page')
Vendor Profile
@endsection
@push('css')


<style>
    .md-tabs .nav-item {
        width: calc(100% / 5);
        text-align: center;
    }
    .nav-tabs .slide {
        background: #01a9ac;
        width: calc(100% / 5);
        height: 4px;
        position: absolute;
        -webkit-transition: left 0.3s ease-out;
        transition: left 0.3s ease-out;
        bottom: 0;
    }

    .card-block.user-info {
    position: absolute;
    width: 100%;
    bottom: 30px;
}

</style>
@endpush
@section('content')
<!-- Page-body start -->
<div class="page-body">
    <!--profile cover start-->
    <div class="row">
        <div class="col-lg-12">
            <div class="cover-profile">
                <div class="profile-bg-img">
                    @if($settings != null && isset($settings->banner))
                    <img class="img-fluid" src="{{asset('/storage/profileImage/'.$user->id.'/'.$settings->banner)}}" alt="seller banner" height="120px">
                    @else
                    <img class="img-fluid" src="/backend/assets/images/user-profile/bg-img1.jpg" alt="bg-img">
                    @endif


                    <div class="card-block user-info">
                        <div class="row">
                        <div class="col-md-2">
                                @if($user->avatar != null )
                                <a href="#" >
                                 <img class="img-fluid"  src="{{asset('/storage/profileImage/'.$user->id.'/'.$user->avatar)}}" alt="{{$user->name}}">
                             </a>
                             @elseif($settings != null && isset($settings->logo))
                             <a href="#">

                              <img class="img-fluid"  src="{{asset('/storage/profileImage/'.$user->id.'/'.$settings->logo)}}" alt="user-img">
                          </a>

                          @else
                          <a href="#">
                            <img class="img-fluid"  src="/backend/assets/images/user-profile/user-img.jpg" alt="{{$user->name}}">
                        </a>

                        @endif
                    </div>
                    <div class="col-md-10">
                    <div class="media-body row">
                        
                        <div>
                            <div class="pull-right cover-btn">
                                @if(isset($settings->slug) && $settings != null)
                                <a href="{{env('CLIENT_BASE_URL').'/shop/'.$settings->slug}}" target="_blank" class="btn btn-primary m-r-10 m-b-5"><i class="icofont icofont-plus"></i> View On Shop</a>
                                @else

                                <a href="{{env('CLIENT_BASE_URL').'/shop'}}" target="_blank" class="btn btn-primary m-r-10 m-b-5"><i class="icofont icofont-plus"></i> View On Shop</a>
                                @endif
                                @if($user->status ==0)
                                <a href="#" rel="{{$user->id}}"  class="btn btn-success m-r-10 m-b-5 sellerActive"><i class="fa fa-check-circle"></i> Active Seller</a>
                                @else

                                <a href="#" rel="{{$user->id}}"  class="btn btn-danger m-r-10 m-b-5 sellerActive"><i class="fa fa-times-circle"></i>InActive Seller</a>
                                @endif

                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--profile cover end-->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-yellow update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{count($products)}}</h4>
                        <h6 class="text-white m-b-0">Total Products</h6>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-1" height="50"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{count($orders)}}+</h4>
                        <h6 class="text-white m-b-0">Total Orders</h6>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-pink update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{$commission}}</h4>
                        <h6 class="text-white m-b-0"> Commission</h6>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-blue text-white">
            <div class="card-block">
                <div class="row ">
                    <div class="col">
                        
                        <h4 class="text-white">{{isset($settings->comission) ? $settings->comission : site_settings()->seller_commission}}%
                        </h4>
                        <h6 class="text-white"> Commission Rate</h6>
                    </div>
                    <div class="col-4 text-right">
                     <a class="btn btn-sm" data-toggle="modal" data-target="#comissionModal"><i class="fa fa-edit"></i></a>
                 </div>
                 
             </div>
         </div>
     </div>
 </div>
 

</div>
<div class="row">
    <div class="col-lg-12">
        <!-- tab header start -->
        <div class="tab-header card">
            <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">Products</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Orders</a>
                    <div class="slide"></div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#report" role="tab">Warehouse Report</a>
                    <div class="slide"></div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#config" role="tab">Config</a>
                    <div class="slide"></div>
                </li>
            </ul>
        </div>
        <!-- tab header end -->
        <!-- tab content start -->
        <div class="tab-content">
            <!-- tab panel personal start -->
            <div class="tab-pane active" id="personal" role="tabpanel">
                <!-- personal card start -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">{{$settings->title}}</h4>
                    </div>
                    <div class="card-block">
                        <div class="view-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-6">


                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Seller Name</th>
                                                                <td>{{$user->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Buisness Type</th>
                                                                <td>{{$user->seller != null ? buisness_type($user->seller->buisness_type) : ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Buisness Info</th>
                                                                <td>{{$user->seller != null ?$user->seller->buisness_info : ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Company Type</th>
                                                                <td>{{$user->seller != null ? company_type($user->seller->company_type) : ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Company Address</th>
                                                                <td>{{$user->seller != null ? $user->seller->office_address : ''}}</td>
                                                            </tr>
                                                             <tr>
                                                            <th scope="row">NID/Passport ID</th>
                                                            <td>{{$user->seller != null ? $user->seller->national_id : ''}}</td>
                                                        </tr>
                                                            <tr>
                                                                <th scope="row">NID/Passport</th>
                                                                <td>
                                                                    
                                                                    

                                                                  <a class="thumbnail fancybox" rel="ligthbox" href="{{asset('/storage/profileImage/'.$user->id.'/'.$user->seller->national_id_img)}}">
                                                                     <img src="{{asset('/storage/profileImage/'.$user->id.'/'.$user->seller->national_id_img)}}" class="img-fluid m-b-10" alt="">
                                                                 </a>



                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                         <!-- end of table col-lg-6 -->
                                         <div class="col-lg-12 col-xl-6">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td><a href="#!"><span class="__cf_email__" data-cfemail="4206272f2d02273a232f322e276c212d2f">{{$user->email}}</span></a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Mobile Number</th>
                                                            <td>{{$user->phone}}</td>
                                                        </tr>
                                                         <tr>
                                                            <th scope="row">Office Email</th>
                                                            <td><a href="#!"><span class="__cf_email__" data-cfemail="4206272f2d02273a232f322e276c212d2f">{{$user->seller->office_email}}</span></a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Office Number</th>
                                                            <td>{{$user->seller->office_number}}</td>
                                                        </tr>
                                                          <tr>
                                                            <th scope="row">Bank Details</th>
                                                            <td><a href="#!">{{$user->seller != null ? $user->seller->bank_name :''}}:{{$user->seller != null ? $user->seller->bank_account : ''}}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tread Licence</th>
                                                            <td>{{$user->seller != null ? $user->seller->tread_licence : ''}}</td>
                                                        </tr>
                                                       
                                                      
                                                        <tr>
                                                            <th scope="row">tread Licence</th>
                                                            <td>
                                                                
                                                               

                                                              <a class="thumbnail fancybox" rel="ligthbox" href="{{asset('/storage/profileImage/'.$user->id.'/'.$user->seller->tread_licence_img)}}">
                                                                 <img src="{{asset('/storage/profileImage/'.$user->id.'/'.$user->seller->tread_licence_img)}}" class="img-fluid m-b-10" alt="">
                                                             </a>

                                                         </td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                     <!-- end of table col-lg-6 -->
                                 </div>
                                 <!-- end of row -->
                             </div>
                             <!-- end of general info -->
                         </div>
                         <!-- end of col-lg-12 -->
                     </div>
                     <!-- end of row -->
                 </div>
                 <!-- end of view-info -->

             </div>
             <!-- end of card-block -->
         </div>

         <!-- personal card end-->
     </div>
     <!-- tab pane personal end -->
     <!-- tab pane info start -->
     <div class="tab-pane" id="binfo" role="tabpanel">
        <!-- info card start -->
        <div class="card">

            <div class="card-block">
               <table id="product_table" class="table table-responsive table-striped table-bordered product_table">
                <thead>
                    <tr>
                        <th width="1%">#Sl</th>
                        <th width="1%" data-orderable="false">Images</th>
                        <th class="text-nowrap">Product Name</th>
                        <th class="text-nowrap">Product Code</th>
                        <th class="text-nowrap">Category</th>
                        <th class="text-nowrap">Regular Price</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=> $product)
                    <tr class="odd gradeX">
                        <td width="1%" class="f-s-600 text-inverse">{{$key+1}}</td>
                        <td width="1%" class="with-img"><img src="{{asset('/public/storage/'.$product->id.'/thumb/'.$product->feature_image)}}"
                           class="img-radius cover-img" width="128px" /></td>
                           <td>{{$product->pro_name}}</td>
                           <td>{{$product->pro_code}}</td>
                           <td>
                            {{category_name($product->category_id)->cat_name}}
                        </td>
                        <td>{{$product->regular_price}}</td>
                        <td>
                            {{product_status($product->status)}}
                        </td>
                        <td>
                         <a href="{{route('product.edit',['id'=>$product->id,'slug'=>slug($product->pro_name)])}}" class="btn btn-success" data-toggle="tooltip" title="Edit Product!"><i class="fa fa-edit"></i> </a>
                         <a href="{{route('productDetails.add',['id'=>$product->id,'slug'=>slug($product->pro_name)])}}" class="btn btn-warning" data-toggle="tooltip" title="Product Details!"><i class="fa fa-pen"></i> </a>
                         <a href="javascript;" class="btn btn-danger deleteRecord"  data-toggle="tooltip" rel="{{$product->id}}" title="Product Remove!"><i class="fa fa-trash"></i> </a>
                     </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 </div>

 <!-- info card end -->
</div>
<!-- tab pane info end -->
<!-- tab pane contact start -->
<div class="tab-pane" id="contacts" role="tabpanel">

    <table id="order_table" class="table table-striped table-bordered product_table">
        <thead>
            <tr>
                <th width="1%">#Sl</th>
                <th class="text-nowrap">Order Id</th>
                <th class="text-nowrap">Customer</th>
                <th class="text-nowrap">Phone</th>
                <th class="text-nowrap">Grand Totall</th>
                <th class="text-nowrap">Commission</th>
                <th class="text-nowrap">Payment</th>
                <th class="text-nowrap">Payment Status</th>
                <th class="text-nowrap">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $key=> $order)
            <tr>
                <td>{{$key+1}}

                </td>
                <td>
                    <a href="{{route('order.details',['id'=>$order->order_id])}}" class="text-indigo-darker">{{$order->order_id}}</a>
                    @if($order->status == 'Pending')
                    <span class="badge badge-success">New</span>
                    @endif
                </td>
                <td>{{$order->order->full_name}}</td>
                <td>{{$order->order->phone_number}}</td>
                <td>৳{{price_formate($order->order->grand_total)}}</td>
                <td>৳{{price_formate($order->commission)}}</td>
                <td>{{order_payment($order->order->payment_method )}}</td>
                <td>{{payment_status($order->order->payment_status)}}</td>
                <td>{{order_status($order->order->status)}}</td>
                   <!--  <td>
                        <a href="{{route('order.details',['id'=>$order->order_id])}}" class="btn btn-sm btn-info">View</a>
                    </td> -->
                </tr>

                @endforeach
            </tbody>
        </table>


    </div>

    <div class="tab-pane" id="report" role="tabpanel">

        <table id="warehouse_table" class="table table-responsive table-striped table-bordered product_table">
            <thead>
                <tr>
                    <th width="1%">#Sl</th>
                    <th class="text-nowrap">Product SKU</th>
                    <th class="text-nowrap">Quantity</th>
                    <th class="text-nowrap">Carton</th>
                    <th class="text-nowrap">Damage</th>
                    <th class="text-nowrap">Admin Note</th>
                    <th class="text-nowrap">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($warehouses as $key=> $warehouse)
                <tr class="odd gradeX">
                    <td width="1%" class="f-s-600 text-inverse">{{$key+1}}</td>
                    <td>{{$warehouse->product_sku}}</td>

                    <td>{{$warehouse->quentity}}</td>
                    <td>{{$warehouse->carton_quantity}}</td>
                    <td>{{$warehouse->damage}}</td>
                    <td>{{$warehouse->admin_note}}</td>
                    <td>{{status($warehouse->status)}}</td>

                </tr>
                @empty

                <tr class="odd gradeX">
                    No Data Found
                </tr>

                @endforelse
            </tbody>
        </table>

    </div>

    <div class="tab-pane" id="config" role="tabpanel">
      <table id="product_table" class="table table-striped table-bordered product_table">
        <thead>
            <tr>

                <th class="text-nowrap">Logo</th>
                <th class="text-nowrap">Title</th>
                <th class="text-nowrap">Address</th>
                <th class="text-nowrap">Facebook</th>
                <th class="text-nowrap">Instagram</th>
                <th class="text-nowrap">Youtube </th>
                <th class="text-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>

            <tr>
             @if($settings != null)
             <td>
                <img src="{{asset('/public/storage/profileImage/'.$user->id.'/'.$settings->logo)}}">
            </td>
            <td>{{$settings->title}}</td>
            <td>{{$settings->address}}</td>
            <td>{{$settings->fb_link}}</td>
            <td>{{$settings->ins_link}}</td>
            <td>{{$settings->youtube_link}}</td>
            <td><a class="btn btn-warning" href="{{route('seller.settings.edit',$user->id)}}"><i class="fa fa-edit"></i>Edit</a>
            </td>
            @else
            <td>
                <a class="btn btn-warning" href="{{route('seller.settings.edit',$user->id)}}"><i class="fa fa-edit"></i>Edit</a>
            </td>
            @endif
        </tr>


    </tbody>
</table>
</div>
</div>
<!-- tab content end -->
</div>
</div>
</div>
<!-- Page-body end -->


<div class="modal fade" id="comissionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Comission Set</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="container"></div>
            <div class="modal-body">

                <form action="{{route('set_comission',$user->id)}}" method="post">

                    @csrf

                    <div class="row form-group m-b-10">
                       <label class="col-md-5 col-form-label text-center">Commision in %</label>
                       <div class="col-md-7">
                          <div class="input-group">
                             <input type="text" class="form-control" name="comission" value="{{isset($settings->comission) ? $settings->comission : site_settings()->seller_commission}}" />
                         </div>
                     </div>
                 </div>

                 <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary button">Submit</button>
                </div>


            </form>


        </div> 
    </div>
</div>
</div>

@endsection

@push('js')

<script>
 $(document).ready(function () {

     $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });


     $(document).on('click','.sellerActive', function(e){
        var id = $(this).attr('rel');
        swal({
            title: "Are You Sure to Change Seller Status?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes"
        },
        function(){
            window.location.href="/admin/seller/status/"+id;
        });
    });

     $('#product_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'excel', 'pdf', 'print'
        ]
    });  $('#order_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'excel', 'pdf', 'print'
        ]
    });
    $('#warehouse_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'excel', 'pdf', 'print'
        ]
    });

});

</script>
@endpush
