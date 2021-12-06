<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
      public function index()
  {

   return redirect()->route('login');
}


    public function login(){

       return view('auth.admin_login');
   }

   public function postlogin(Request $request){

      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
    ]);

      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

        return redirect()->intended('/admin/dashboard');
    }
    return back()->withInput($request->only('email', 'remember'));
}


}
