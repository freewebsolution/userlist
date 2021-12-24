<?php

namespace App\services;

use App\Models\Mailing;
use Spatie\Newsletter\NewsletterFacade as NewsLetter;

class MyNewsletterService
{
    public function __construct(MailSendService $service){
        $this->mailsendService = $service;
    }
    public function execute(MyNewsletterServiceDto $dto):string{
        if(!$dto->mail->email){
            throw new \ErrorException('Email is empty');
        }
        if(Newsletter::isSubscribed($dto->mail->email)){
            throw new \ErrorException('The email '.$dto->mail->email.' is already subscribed!');
        }

        NewsLetter::subscribe($dto->mail->email);
        $this->mailsendService->send($dto->mail);
        return 'Email '.$dto->mail->email . ' successfull subscribed!';
    }
    public function delete(Mailing $email){
        NewsLetter::delete($email->email);
        return 'Email '.$email->email . ' successfull deleted!';
    }

}
