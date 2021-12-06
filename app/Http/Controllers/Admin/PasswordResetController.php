<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\StrongPassword;
use App\Rules\PasswordNotMatch;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(){
    	return view('backend.settings.password_change');
    }

    public function password_change(Request $request){

    	 $this->validate($request, [
            'old_password' => ['required', new PasswordNotMatch],
            'password'=>[new StrongPassword],
             'confirm_password' => ['same:password'],
        ]);

    	 User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);

    	 return redirect()->back()->with('success','Password Changed!');


    }
}
