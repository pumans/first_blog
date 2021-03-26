<?php

namespace App\Http\Controllers;

use App\Mail_subskriber;
use Illuminate\Http\Request;

class MailSubscriberController extends Controller
{
    public function __invoke (Request $request){
        $subskriber = new Mail_subskriber();
        $subskriber->email = $request->input('email');
        $subskriber->status = 1;
        $subskriber->save();
        return view('mail_subscribed');
    }
}
