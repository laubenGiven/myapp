<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;  // Import the PDF library
use App\Models\Test_Result;
use App\Models\Patient;
use App\Mail\SendPdfEmail;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Mail;
use Illuminate\Support\Facades\Storage;  // Import for file storage

class EmailController extends Controller
{    
    public function sendPdfEmail($patientId)
    {
        // Eager load relationships
        $patient = Patient::with('test_result')->findOrFail($patientId);
    
        $data = [
            'subject' => 'Friecca Clinic Test Result Report',
            'patient' => $patient,
            'testResults' => $patient->test_result,
        ];
    
        // Generate PDF directly
        $pdf = PDF::loadView('email', $data);
        $pdfContent = $pdf->output();
    
        // Send email with PDF attachment
        Mail::to($patient->email)->send(new SendPdfEmail($data, $pdfContent, $patient->name . '_' . $patient->id . '_testResults.pdf'));
    
        return redirect()->back()->with('success', 'Email with PDF sent successfully!');
    }

}
