<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Hash;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
          // $this->middleware(['auth','permission:user-list|user-create|user-edit|user-delete']);


    }

    public function index()
    {
        $roles = Role::all();
        $permission= Permission::all();

        $user = User::role('User')->pluck('id');
        $users_without_any_roles = User::doesntHave('roles')->pluck('id');
        $users = User::wherenotNull('email')
        ->whereNotIn('id',$user)
        ->whereNotIn('id',$users_without_any_roles)
        ->get();


        return view('backend.user.index',compact('roles','permission','users'));
    }

    public function create(){
        $roles = Role::all();
        $permission= Permission::all();
        return view('backend.user.create',compact('roles','permission'));
    }



    public function store(Request $request)
    {
         $validate = $request->validate([
           'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => 'required|min:6|same:password',
        ]);

                $input = $request->all();
                $input['password'] = Hash::make($input['password']);

                $code =  mt_rand(100000, 999999);

                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->dept = $request->dept;
                $user->password = Hash::make($input['password']);
                $user->save();
                $user->assignRole($request->role);
                $user->givePermissionTo($request->permission);

                return redirect()->back()->with('flash_message_success','User Added Successfully');
    }

    public function edit($id)
    {
        $data = DB::table('users')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.dept',
                'model_has_roles.role_id'
            )
            ->leftJoin('model_has_roles','users.id','=','model_has_roles.model_id')
            ->leftJoin('roles','model_has_roles.role_id','=','roles.id')
            ->where('users.id',$id)
            ->first();
        //dd($data);die;
        $roles = Role::all();
      
        $permission = Permission::all();
        $user_permissions = DB::table('model_has_permissions')->where('model_id',$id)->pluck('permission_id')->toArray();
//        return $user_permissions;
        return view('backend.user.edit',compact('roles','data','user_permissions','permission'));
    }

    public function update(Request $request, $id)
    {


        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
            try{
                $user = User::find($id);

                // Step 1 : Update Users
                $input = $request->all();
                if(!empty($input['password'])){
                     $user->password = Hash::make($request->password);
                }

                 if(empty($request->status))
                {
                    $status = 0;
                }else{
                    $status = 1;
                }

                $user->name = $request->name;
                $user->dept = $request->dept;
                $user->save();
                DB::table('model_has_roles')->where('model_id',$id)->delete();


                $user->assignRole($request->role);
                if($request->permission != null){
                    $user->syncPermissions();
                $user->givePermissionTo($request->permission);
            }
            else{

                $user->syncPermissions();
            }


                DB::commit();

                return redirect()->route('user.index')->with('flash_message_success','User Update Successfully');

            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->with('flash_message_error','Something Went Wrong!');
            }
        }
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('flash_message_success','User deleted successfully');
    }
}
