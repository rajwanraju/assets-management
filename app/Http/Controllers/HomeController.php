<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\User;
use App\Models\Category;
use App\Models\AssetManagement;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


 $assinged_assets = $assigned_assets = DB::table('asset_management')->join('assets', 'asset_management.asset_id', 'assets.id')
        ->join('categories', 'asset_management.category_id', 'categories.id')
        ->join('users', 'asset_management.user_id', 'users.id')
        ->select('asset_management.*','assets.*', 'categories.cat_name', 'users.name as employee','users.dept','users.email','users.id')
        ->where('users.id',Auth::guard('web')->user()->id)
        ->get();
        return view('home',compact('assinged_assets'));
    }
}
