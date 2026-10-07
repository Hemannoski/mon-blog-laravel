<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(): View{
        return view('contact');
    }

    public function send(Request $request){

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10'
        ]);

        Mail::to(config('mail.from.address'))->send(new ContactMail($validateData));

        return back()->with('success', 'Votre mail a bien été envoyé, nous vous rémercions');



    }
}
