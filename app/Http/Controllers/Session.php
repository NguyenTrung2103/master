<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class Session extends Controller
{
    function login (Request $req ){
        $data = $req->input();
        $req->session()->put('user', $data['username']);
        return redirect('sessionlist');
        
    }

    public function contact(){
        return view('/sendmail');
    }
    public function postcontact(Request $req){
        Mail::send('sendmail',[
            'email' => $req->email,
            'content' => $req->content,
        ], function($mail) use($req){
            $mail->to($req->email);
            $mail->from('trungnq2103@gmail.com');
            $mail->subject();
        });
    }
}
