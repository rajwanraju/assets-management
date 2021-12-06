<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Asset;
use App\Models\User;
use App\Models\Category;
use App\Models\AssetManagement;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;

class AdminController extends Controller
{

    //   public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function dashboard(){


        $assigned_assets = AssetManagement::all();
        foreach($assigned_assets as $asset){

            if($asset->expireDate < date('Y-m-d H:i:s')){

                $asset->delete();
            }
        }

        $assinged_assets = $assigned_assets = DB::table('asset_management')->join('assets', 'asset_management.asset_id', 'assets.id')
        ->join('categories', 'asset_management.category_id', 'categories.id')
        ->join('users', 'asset_management.user_id', 'users.id')
        ->select('asset_management.*','assets.*', 'categories.cat_name', 'users.name as employee','users.dept','users.email')
        ->get();

        $available_assets = Asset::with('assetManagement','category')->doesnthave('assetManagement')->get();
        $available_empolyees = User::with('assetManagement')->get();
        $aseets = Asset::get();
        $categories = Category::all();

// return $assinged_assets;

        return view('backend.dashboard',compact('categories','assinged_assets','available_assets','available_empolyees','aseets'));

    }





public function settings(){


}
public function settings_store(){


}
}
