<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Log;
use App\Models\Admin;

class ResetPasswordController extends Controller
{
     public function getPassword($token) {

         $emailck = Session::get('email');
         $data= Admin::where('email',$emailck)->get();
         return view('admin.pages.partials.password.reset',['token' => $token]);
 
      }
  
      public function updatePassword(Request $request)
      {
          $request->validate([
            //   'email' => 'required|email|exists:admins',
              'password' => 'required|string|min:5|confirmed',
              'password_confirmation' => 'required',
  
          ]);

          $admin = Admin::where('email',Session::get('email'))->first();
         $password = $request->password;
         $conf_password =  $request->password_confirmation;

         if($password == $conf_password) {
             $admin->password = $password;
             $admin->save();
         }
  
        
        if($admin){
            return Redirect()->route('admin.logIn')->with('message', 'Your password has been changed successfully!');;

        }
      }
}
