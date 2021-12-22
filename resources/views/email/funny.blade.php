<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mailing list</title>
</head>
<body>
<h2>Lucio Ticali</h2>
<div>
    <p> Welocome to Mailing list: {{$email->email}}</p>
    <p>
        <a href="{{action([\App\Http\Controllers\MailingController::class,'show'],$email->id)}}">
            Unsubscribe
        </a>
    </p>
</div>
</body>
</html>



{{ config('app.name') }}

