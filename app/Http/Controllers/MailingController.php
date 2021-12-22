<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailFormRequest;
use App\Http\Requests\ShowRequest;
use App\Mail\FunnyEmail;
use App\Models\Mailing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Nette\Schema\ValidationException;
use PHPUnit\Exception;
use Spatie\Newsletter\NewsletterFacade as NewsLetter;


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
            Mail::to($email->email)->send(new FunnyEmail($email));
            Newsletter::subscribe($email->email);
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

    public function show(int $id ,ShowRequest $request){
        $email = Mailing::whereId($id)->firstOrFail();
        return view('email.delete',compact('email'));
    }

    public function destroy(int $id, ShowRequest $request){
        $email = Mailing::whereId($id)->firstOrFail();
        NewsLetter::delete($email->email);
        $email->delete();
        return redirect('/')->with('status','Email '.$email->email.' has been deleted');
    }
}
