<?php


namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Validation\Rule;
use App\Mail\InformUserProfile;

class MailService
{
    public function sendUserProfile($user)
    {
        $mail = $user['email'];
        Mail::to($mail)->send(new InformUserProfile($user));
    }

}