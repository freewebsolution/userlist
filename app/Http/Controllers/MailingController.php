<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailFormRequest;
use App\Http\Requests\ShowRequest;
use App\Models\Mailing;
use App\services\MyNewsletterService;
use App\services\MyNewsletterServiceDto;
use Nette\Schema\ValidationException;
use PHPUnit\Exception;


class MailingController extends Controller
{
    private $newsLetterService;

    public function __construct(MyNewsletterService $service){
        $this->newsLetterService= $service;
    }
    public function create(){
        return view('email.create');
    }

    public function store(MailFormRequest $request){
        try{
            $email = new Mailing(array(
                'email'=>$request->get('email')
            ));
            $email->save();
            $msg = 'Grazie '.$email->email . ' '.' per esseti iscritto alla nostra newsletter';
            $dto = MyNewsletterServiceDto::create($email);
            $this->newsLetterService->execute($dto);
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
        $this->newsLetterService->delete($email);
        $email->delete();
        return redirect('/')->with('status','Email '.$email->email.' has been deleted');
    }
}
