<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use File;
use Image;
use Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //  public function __construct()
    // {
    //            $this->middleware(['auth','permission:category-list|category-create|category-edit|category-delete']);

    // }

  public function index()
  {

    $user = Auth::user();

    $categories = category::all();
    return view('backend.category.index',compact('categories'));

  }

  public function create()
  {

    return view('backend.category.create');
  }

  public function mainCategory(){
    $category = category::get();
    return view('backend.category.mainCategory',compact('category'));
  }

  public function store(Request $request)
  {



    $this->validate($request, [
      'cat_name' => 'required|max:255|unique:categories',
      'cat_slug' => 'required|max:255',
      'category_icone' => 'image|required|mimes:svg,png,jpg,gif,jpeg|max:100',

    ]);



    if ($request->status) {
      $status = 1;
    } else {
      $status = 0;
    }




                //category icone
    $path = public_path('/storage/upload/');
    $path_thumb = public_path('/storage/category/');

     if(!File::isDirectory($path)){
      File::makeDirectory(public_path('/storage/upload'));
    }

    if(!File::isDirectory($path_thumb)){
      File::makeDirectory(public_path('/storage/category'));
    }

                 //Orginal icon storage
    $originalImage= $request->file('category_icone');
    $thumbnailImage = Image::make($originalImage);
    $thumbnailImage->save($path.time().str_slug($request['name']).'.'.$originalImage->getClientOriginalExtension());

                // resize icone
    $thumbnailImage->resize(223,150);
    $thumbnailImage->save($path_thumb.time().str_slug($request['name']).'.'.$originalImage->getClientOriginalExtension());
    $category_icone=time().$request['name'].'.'.$originalImage->getClientOriginalExtension();


                // remove  original image
                // unlink($path.time().$request['name']);
                // unlink($path.time().$originalBanner->getClientOriginalName());

    $category = new category();
    $category->cat_name = $request['cat_name'];
    $category->cat_slug = ($request['cat_slug']);
    $category->icone = $category_icone;
    $category->status = $status;
    $category->save();
    DB::commit();
    return redirect()->back()->with('flash_message_success','Category Created Successfully');

  }

  public function edit(category $category)
  {
    $cat = category::find($category->id);

    return  view('backend.category.editPage',compact('cat'));
  }

  public function update(Request $request, category $category)
  {


    $request->validate([
      'name' => 'required|max:255',
      'cat_slug' => 'required|max:255',
      'status' => 'required',
    ]);

    $cat = category::find($category->id);





    if($request->file('category_icone')){


     $request->validate([

       'category_icone' => 'image|required|mimes:svg,png,jpg,gif,jpeg|max:100',

     ]);
     $path = public_path('/storage/upload/');
     $path_thumb = public_path('/storage/category/');

     $originalImage= $request->file('category_icone');
     $thumbnailImage = Image::make($originalImage);
     $thumbnailImage->save($path.time().str_slug($request['name']).'.'.$originalImage->getClientOriginalExtension());

                // resize icone
     $thumbnailImage->resize(223,150);
     $thumbnailImage->save($path_thumb.time().str_slug($request['name']).'.'.$originalImage->getClientOriginalExtension());
     $category_icone=time().str_slug($request['name']).'.'.$originalImage->getClientOriginalExtension();

                // remove  original image
        // unlink($path.time().str_slug($request['name']).'.'.$originalImage->getClientOriginalExtension());
     if($cat->icone != null){
      unlink($path_thumb.$cat->icone);
    }
    $cat->icone = $category_icone;
  }


  $cat->cat_name = $request['name'];
  $cat->cat_slug = ($request['cat_slug']);
  $cat->status = $request['status'];
  $cat->save();
  return redirect('/category')->with('success','Category Updated Successfully');


}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
      $category = category::find($category->id);
      $category->delete();
      return redirect()->back()->with('success','Category Deleted Successfully');
    }


  }
