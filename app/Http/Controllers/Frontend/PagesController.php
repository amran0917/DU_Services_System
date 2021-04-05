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
        $name = 'services';
        return view('frontend.pages.home',compact('name'));
    } 

    public function languageIndex(){

        $name = 'course';
        return view('frontend.language.pages.home',compact('name'));
    }
    public function testmonialIndex(){
        $name = 'testimonial';
        return view('frontend.testmonials.pages.home',compact('name'));

    }

    public function about()
    {
        $name = 'About';
        return view('frontend.pages.about',compact('name'));
    } 

    public function contact()
    {
        $name = 'Contact';
        return view('frontend.pages.contact',compact('name'));
    } 

    public function status()
    {
        $name = 'Application_Status';
        return view('frontend.pages.status',compact('name'));
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
