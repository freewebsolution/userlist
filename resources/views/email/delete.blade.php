@extends('master')
@section('title','Delete user from newsletter')
@section('content')
<div class="container mx-auto">
    <p class="text-muted text-center">
        Oh No! {{$email->email}} ci dispiace che ci lasci!
    </p>
    <form method="post" action="{{action([\App\Http\Controllers\MailingController::class,'destroy'],$email->id)}}">
       @csrf
        <button class="btn btn-dark">Unsubscribe</button>
    </form>
</div>
@endsection
