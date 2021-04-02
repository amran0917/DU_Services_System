<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class PagesController extends Controller
{
    public function index()
    {

        return view('frontend.pages.home');
    } 

    public function languageIndex(){
        return view('frontend.language.pages.home');
    }
    public function testmonialIndex(){
        return view('frontend.testmonials.pages.home');

    }

    public function about()
    {
        return view('frontend.pages.about');
    } 

    public function contact()
    {
        return view('frontend.pages.contact');
    } 

    public function status()
    {
        return view('frontend.pages.status');
    } 

    public function sendEmail(Request $request){
        $details = [
                'name' => $request->name,
                'email'  => $request->email,
                'phone'  => $request->phone,
                'msg' => $request->msg
        ];

        Mail::to('ahossain0917@gmail.com')->send(new ContactMail($details));
        return back()->with('sent_msg',"YOur msg has been sent successfully");
    }
}
