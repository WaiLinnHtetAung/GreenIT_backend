<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Mail\consultationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request) {
        $data = $request->input('_value');

        $mailData = [
            'firstName' => $data['firstName'],
            'lastName'  => $data['lastName'],
            'company'   => $data['company'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],
            'subject'   => $data['subject'],
            'message'   => $data['message'],
        ];

        Mail::to('info@greenitmm.com')->send(new consultationEmail($mailData));

        return response()->json(['msg' => 'Message is send successfully']);
    }
}
