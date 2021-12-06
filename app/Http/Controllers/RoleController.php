<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use DB;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
      $roles = Role::latest()->get();
        return view('backend.role.index',compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();
        return view('backend.role.create',compact('permission'));
    }


    public function permission(Request $request)
    {
        //return $request->all();
        if ($request->isMethod('post'))
        {
            $permission = new Permission();

            $permission->name = $request->permission;
            $permission->guard_name = 'web';

            $permission->save();

            return redirect()->back()->with('flash_message_success','Permission Added Successfully');
        }
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
            try{
                // Step 1 : Create Role
                $role = Role::create(['name' => $request->role_name]);
                $role->syncPermissions($request->input('permission'));

                DB::commit();

                return redirect()->back()->with('flash_message_success','Role Added Successfully');

            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->with('flash_message_error','Something Went Wrong!');
            }
        }
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('backend.role.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
            try{
                // Step 1 : Update Role
                $role = Role::findOrFail($id);
                $role->name = $request->role_name;
                $role->update();

                $role->syncPermissions($request->input('permission'));


                DB::commit();

                return redirect()->back()->with('flash_message_success','Role Updated Successfully');

            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->with('flash_message_error','Something Went Wrong!');
            }
        }
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->back()
            ->with('flash_message_success','Role deleted successfully');
    }
}
