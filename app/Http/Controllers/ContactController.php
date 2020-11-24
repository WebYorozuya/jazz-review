<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'text'     => 'required',
        ]);
        $input = $request->all();
        unset($input['_token']);
        Mail::to('jazzreview.team@gmail.com')->send(new ContactMail('contact.mail', 'お問い合わせを受信しました', $input));
        return redirect('/');
    }
}
