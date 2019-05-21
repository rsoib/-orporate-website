<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class ContactController extends SiteController
{
    //

     public function __construct(){

        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->bar ='left';
 
        $this->template = env('THEME').".contacts.contacts";
       

    }

    public function index()
    {	

    	
    	$content = view(env('THEME').'.contacts.contact_content')->render();
    	$this->vars = array_add($this->vars,'content',$content);

    	$this->contentLeftBar = view(env('THEME').'.contacts.contact_bar')->render();
    	

    	return $this->renderOutput();
    }


    public function store(Request $request){


    	 if ($request->isMethod('post')) 
        {
            $messages = 
            [
                'required' => 'Поле :attribute обязательно к запольнению!',
                'email' => 'Напишите правильный :attribute адрес'
            ];

            $this->validate($request,
                [
                    'name' => 'required|max:255',
                    'email' => 'required|email',
                    'text' => 'required',
                ], $messages);

            $data = $request->all();
             
            $result = Mail::send(env('THEME').'.email.email',['data'=>$data], function($message) use ($data) 
            {
                $mail_admin = env('MAIL_USERNAME');

                $message->from($mail_admin,$data['name']);
                $message->to('rsoib1996@gmail.com')->subject('Question');

            }); 

            return redirect()->route('contacts')->with('status','Email is Send');
        }
    }
}
