<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PasswordRecovery;
use App\Models\Admin;
use DB;

class ResetPasswordController extends Controller
{
    public function getPassword($token) {
        return view('admin.pages.partials.password.reset',['token' => $token]);

     }
 
     public function updatePassword(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:admins',
             'password' => 'required|string|min:5|confirmed',
             'password_confirmation' => 'required',
 
         ]);
 
         $updatePassword = DB::table('password_resets')
                             ->where(['email' => $request->email, 'token' => $request->token])
                             ->first();
 
         if(!$updatePassword)
             return back()->withInput()->with('error', 'Invalid token!');
 
           $user = Admin::where('email', $request->email)
                       ->update(['password' => $request->password]); // Hash::make
 
           DB::table('password_recoverys')->where(['email'=> $request->email])->delete();
 
           return redirect('/admin/login')->with('message', 'Your password has been changed!');
     }
 
}
