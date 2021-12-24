<?php

namespace App\services;

use App\Models\Mailing;
use Illuminate\Support\Facades\Validator;

class MailSendServiceDto
{
    public $mail;
    public $from;
    public $subject;

    public function __construct(Mailing $mail, string $from, string $subject)
    {
        $this->mail = $mail;
        $this->from = $from;
        $this->subject = $subject;
        $this->validate();


    }

    public static function create(Mailing $mail, string $from, string $subject): self
    {
        return new self($mail, $from, $subject);
    }

    public function validate(): void
    {
        $fields = [
            'email' => $this->mail,
            'from' => $this->from,
            'subject'=>$this->subject,
        ];

        $rules = [
            'email' => 'required|unique:mailings,email',
            'from' => 'required|min:5',
            'subject' => 'required|min:5'
        ];
        Validator::make($fields, $rules);
    }
}
