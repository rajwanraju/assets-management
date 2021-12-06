<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Category;
use Image;
use File;

class AssetsController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $assets = Asset::with('assetManagement')->get();
        return view('backend.assets.index',compact('assets','categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('backend.assets.create',compact('categories'));
    }


    public function store(Request $request)
    {
       $this->validate($request, [
          'category_id'=>'required',
          'name'=>'required|unique:assets',
          'sku'=>'sku',
          'slug'=>'required',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
          'description'=>'required',
      ]);


       if ($request->status) {
          $status = 1;
      } else {
          $status = 0;
      } 


      $path = public_path('/storage/products/');

      if(!File::isDirectory($path)){
        File::makeDirectory(public_path('/storage/products'));
    }
    if ($files = $request->file('image')) {

      $assetImage = date('YmdHis') .$files->getClientOriginalName()."." . $files->getClientOriginalExtension();
      $files->move($path, $assetImage);

  }




  $asset = new Asset();
  $asset->name = $request['name'];
  $asset->sku = $request['asset_sku'];
  $asset->feature_image = $assetImage;
  $asset->category_id = $request['category_id'];
  $asset->slug = $request['slug'];
  $asset->description = $request['description'];
  $asset->status = $status;
  $asset->save();

  return redirect()->route('assets.index')->with('success','New Assets Added');
}


public function edit($id)
{
            $asset = Asset::findorfail($id);
             $categories = Category::all();

    return view('backend.assets.edit',compact('asset','categories'));
}


public function update(Request $request, $id)
{

      $asset = Asset::find($id);

               $this->validate($request, [
          'category_id'=>'required',
          'name'=>'required|unique:assets,name,'.$asset->id,
          'sku'=>'sku',
          'slug'=>'required',
          'description'=>'required',
      ]);


       if ($request->status) {
          $status = 1;
      } else {
          $status = 0;
      } 


      $path = public_path('/storage/products/');

      if(!File::isDirectory($path)){
        File::makeDirectory(public_path('/storage/products'));
    }
    if ($files = $request->file('image')) {

      $assetImage = date('YmdHis') .$files->getClientOriginalName()."." . $files->getClientOriginalExtension();
      $files->move($path, $assetImage);

        $asset->feature_image = $assetImage;

  }





  $asset->name = $request['name'];
  $asset->sku = $request['asset_sku'];
  $asset->category_id = $request['category_id'];
  $asset->slug = $request['slug'];
  $asset->description = $request['description'];
  $asset->status = $status;
  $asset->save();

  return redirect()->route('assets.index')->with('success','Assets Updated');
}

public function destroy($id)
{

    $asset = Asset::find($id);

    if(\File::exists(public_path('products/'.$asset->feature_image))){
\File::delete(public_path('products/'.$asset->feature_image));
}

    $asset->delete();
    return redirect()->back()->with('success','Asset Deleted Successfully');


}
}
