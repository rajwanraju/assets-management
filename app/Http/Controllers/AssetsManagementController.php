<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Category;
use App\Models\AssetManagement;
use App\Models\User;
use Validator;

use Image;
use File;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssetAssignMail;


class AssetsManagementController extends Controller
{
    public function assiging_asset(){

        $available_assets = Asset::with('assetManagement','category')->doesnthave('assetManagement')->get();
        $available_empolyees = User::with('assetManagement')->get();

        return view('backend.assets.taskAssign',compact('available_assets','available_empolyees'));

    }


    public function store_asset(Request $request){



      $this->validate($request, [

          "asset_id"=>'required|unique:asset_management',
          'user_id'=>'required',
      ]);


      $asset = Asset::with('category')->find($request->asset_id);
      $employee = User::find($request->user_id); 

      $startDate = date('Y-m-d H:i:s');
      $date = Carbon::createFromFormat('Y.m.d', date('Y.m.d'));
      $expireDate = $date->addDays(5);

      $asset_assign = new AssetManagement();
      $asset_assign->asset_id = $request->asset_id;
      $asset_assign->user_id = $request->user_id;
      $asset_assign->category_id = $asset->category_id;
      $asset_assign->assignDate = $startDate;
      $asset_assign->expireDate = $expireDate;
      $asset_assign->save();


      Mail::to($employee->email)
      ->cc(Auth::guard('admin')->user()->email)
      ->send(new AssetAssignMail($asset,$employee));  

      return redirect()->route('assets.assign')->with('success','Asset assign to employee');

  }



  public function assetAssigning($id){

    $asset=Asset::find($id);
    $available_empolyees = User::get();

    return view('backend.report.taskAssinging',compact('asset','available_empolyees'));
}


public function assigned_asset(){

    $assigned_assets = DB::table('asset_management')->join('assets', 'asset_management.asset_id', 'assets.id')
    ->join('categories', 'asset_management.category_id', 'categories.id')
    ->join('users', 'asset_management.user_id', 'users.id')
    ->select('asset_management.*','assets.*', 'categories.cat_name', 'users.name as employee','users.dept','users.email')
    ->get();
    return view('backend.report.assigned_asset',compact('assigned_assets'));

}  



public function available_assets(){

    $available_assets = Asset::with('assetManagement','category')->doesnthave('assetManagement')->get();
    return view('backend.report.available_assets',compact('available_assets'));


}
}
