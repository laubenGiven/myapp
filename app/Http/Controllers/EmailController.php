<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendPdfEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendPdfEmail($patientId)
    {
        // Send an email with the PDF attached
        Mail::to('recipient@example.com')->send(new SendPdfEmail($patientId));
        
        return redirect()->back()->with('success', 'Email with PDF sent successfully!');
    }
}
