<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Session extends Controller
{
    function login (Request $req ){
        $data = $req->input();
        $req->session()->put('user', $data['username']);
        return redirect('sessionlist');
        
    }
}
