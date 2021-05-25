<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class EmailController extends Controller
{
    public function contact()
    {
        return view('welcome');
    
    }
    public function contactSubmit(Request $request)
    {
        Mail::send('emails.TestMail',[
            'name'  => $request->name,
            'email'  => $request->email,
            'msg'  => $request->msg
             ],function($mail) use($request){
            $mail->from(env('MAIL_FROM_ADDRESS'),$request->name);
            $mail->to("mkserrano1996@gmail.com")->subject('Contact me');
            
        }); 
        
        return redirect('#contact')->with('message', 'Success!');
    }
}
