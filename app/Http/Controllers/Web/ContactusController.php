<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\contactRequest;

use App\Models\MessageDB;               


class ContactusController extends \App\Http\Controllers\Controller
{

    public function submit(contactRequest $request){
    
        $message = new MessageDB();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->save();
        return redirect()->route('contact')->with('success_message','Message Successfully sent! Thank you!');

    }

}
