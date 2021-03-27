<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\PasswordRecovery;
use App\Models\Admin;
use DB;
use Mail;



class ForgotPasswordController extends Controller
{
    public function getEmail()
    {

       return view('admin.pages.partials.password.forget-password');
    }
    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);

        $token = Str::random(60);

        DB::table('password_recoverys')->insert(
            ['email' => $request->email, 'token' => $token]
        );

        Mail::send('admin.pages.partials.password.verify',['token' => $token], function($message) use ($request) {
                  $message->from('ahossain0917@gmail.com');
                  $message->to($request->email); 
                  $message->subject('Reset Password Notification');
               });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

}
