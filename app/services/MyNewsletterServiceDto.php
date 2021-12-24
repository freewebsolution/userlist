<?php

namespace App\services;

use App\Models\Mailing;
use Illuminate\Support\Facades\Validator;

class MyNewsletterServiceDto
{
    public $mail;

    public function __construct(Mailing $mail)
    {
        $this->mail = $mail;
        $this->validate();
    }

    public static function create(Mailing $mail): self
    {
        return new self($mail);
    }

    public function validate(): void
    {
        $fields = [
            'email' => $this->mail,
        ];

        $rules = [
            'email' => 'required|unique:mailings,email',
        ];
        Validator::make($fields, $rules)->validate();
    }
}
