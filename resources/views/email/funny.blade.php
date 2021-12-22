@component('mail::message')
# Introduction

Grazie per esserti registrato alla nostra newsLetter.

@component('mail::button', ['url' => 'https://www.freewebsolution.it'])
    UnsubScribe
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
