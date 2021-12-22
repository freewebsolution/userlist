<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailFormRequest;
use App\Mail\FunnyEmail;
use App\Models\Mailing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Nette\Schema\ValidationException;
use PHPUnit\Exception;

class MailingController extends Controller
{
    public function create(){
        return view('email.create');
    }

    public function store(MailFormRequest $request){
        try{
            $email = new Mailing(array(
                'email'=>$request->get('email')
            ));
            $email->save();
            Mail::to($email->email)->send(new FunnyEmail());
            $msg = 'Grazie '.$email->email . ' '.' per esseti iscritto alla nostra newsletter';
            return redirect()->back()->with('status',$msg);
        }catch (ValidationException $e){
            $msg = $e->getErrors();
            return redirect()->back()->with('errors',$msg);
        }catch(Exception $e){
            $msg = $e->getMessage();
            return redirect()->back()->with('errors',$msg);

        }

    }
}
