<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Test_Result;
use App\Models\Patient;
use App\Mail\SendPdfEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class PdfController extends Controller
{
    public function SendMailPdf($patientId)
    {
        // Eager load relationships for efficient querying
        $patient = Patient::with('test_result')->findOrFail($patientId);

        // Prepare data for the view
        $data = [
            'title' => 'Test Result Report',
            'testResults' => $patient->test_result,
            'patient' => $patient,
        ];

        // Generate and send the PDF directly, avoiding file saving
        $pdf = PDF::loadView('email', $data);
        Mail::to('alienyuyen@gmail.com')->send(new SendPdfEmail($pdf->output(), $patient->name . '_' . $patient->id . '_testResults.pdf'));

        return 'Email sent with PDF attachment to ' . $patient->email . '.';
    }

    public function generateAndDisplayPdf($patientId)
    {
        // Eager load relationships
        $patient = Patient::with('test_result')->findOrFail($patientId);
          // Retrieve test results
       $result = $patient->test_result;

        // Prepare data
        $data = [
            'title' => 'Test Result Report',
            'testResults' => $patient->test_result,
            'patient' => $patient,
            
        ];

        // Generate and stream the PDF directly
        $pdf = PDF::loadView('pdf', $data);
        return $pdf->stream();
    }
}
