<?php

namespace App\services;

use App\Mail\FunnyEmail;
use App\Models\Mailing;
use Illuminate\Support\Facades\Mail;

class MailSendService
{
    public function send(Mailing $email){

        Mail::to($email->email)->send(new FunnyEmail($email));
    }
}
