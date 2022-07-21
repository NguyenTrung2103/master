<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Session extends Controller
{
    public function login(Request $req)
    {
        $data = $req->input();
        $req->session()->put('user', $data);
        $data = Session::all();

        return redirect('sessionlist');
    }

    public function contact()
    {
        return view('/sendmail');
    }

    public function postcontact(Request $req)
    {
        Mail::send('/sendmail', [
            'email' => $req->email,
            'content' => $req->content,
        ], function ($mail) {
            $mail->to('trungnq2103@gmail.com');
            $mail->from('trungnq2103@gmail.com');
            $mail->subject();
        });
    }
}
