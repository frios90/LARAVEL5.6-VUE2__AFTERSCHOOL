<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\WwuMail;

use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function __construct()
    {

    }

    public function contactMail (Request $request)
    {
        if ( !$request->input('name') ||
            !$request->input('correo') ||
            !$request->input('phone') ||
            !$request->input('country') ||
            !$request->input('location') ||
            !$request->input('message')) {
                return response('no-send', 200);
        } else {
          $data = [
            'name' => $request->input('name'),
            'mail' => $request->input('correo'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
            'country' => $request->input('country'),
            'location' => $request->input('location')
        ];
        Mail::to('paulagarcialorca@gmail.com')
        ->cc('paulagarcialorca@virtualafterschool.cl')
        ->send(new ContactMail($data));
        return response('send', 200);
        //   Mail::to('francisco.rios.castillo2@gmail.com')
        //       ->send(new ContactMail($data));
        //       return response('send', 200);

        }
        return 'pasa';
    }

    public function wwuMail (Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'rut' => 'required',
            'prof' => 'required',
            'esp' => 'required',
            'time' => 'required',
            'mail' => 'required',
            'tel' => 'required',
        ]);
        $data = [
            'name' => $request->input('name'),
            'rut' => $request->input('rut'),
            'prof' => $request->input('prof'),
            'esp' => $request->input('esp'),
            'time' => $request->input('time'),
            'mail' => $request->input('mail'),
            'tel' => $request->input('tel'),
        ];
        // Mail::to('francisco.rios.castillo2@gmail.com')
        //     ->send(new WwuMail($data));
        Mail::to('paulagarcialorca@gmail.com')
        ->cc('paulagarcialorca@virtualafterschool.cl')
        ->send(new WwuMail($data));
        return response()->json('send');
    }
}
