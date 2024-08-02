<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
        ]);

        if ($this->isOnline()) {
            $mail_Data = [
                'recipient' => '22211tt4044@mail.tdc.edu.vn',
                'fromEmail' => $request->email,
                'fromName' => $request->name,
                'body' => $request->message,
            ];
            Mail::send('email-template',$mail_Data,function($message) use ($mail_Data){
                $message->to($mail_Data['recipient'])
                ->from($mail_Data['fromEmail'],$mail_Data['fromName']);
            });
            return redirect()->back()->withInput()->with('success','Email sent successfully');
        } else {
            return redirect()->back()->withInput()->with('error','Check your Internet connection');
        }
    }

    public function isOnline($site = "http://www.youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}
