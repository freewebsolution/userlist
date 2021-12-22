<?php

namespace App\services;

use App\Models\Mailing;
use Spatie\Newsletter\NewsletterFacade as NewsLetter;

class MyNewsletterService
{
    public function execute(Mailing $email):string{
        if(!$email->email){
            throw new \ErrorException('Email is empty');
        }
        if(Newsletter::isSubscribed($email->email)){
            throw new \ErrorException('The email '.$email->email.' is already subscribed!');
        }

        NewsLetter::subscribe($email->email);
        return 'Email '.$email->email . ' successfull subscribed!';
    }
    public function delete(Mailing $email){
        NewsLetter::delete($email->email);
        return 'Email '.$email->email . ' successfull deleted!';
    }

}
