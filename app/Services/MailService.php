<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\InformUserProfile;

class MailService
{
    public function sendUserProfile($user, $attachment = null)
    {
        Mail::to($user['email'])->send(new InformUserProfile($user, $attachment));
    }
}
