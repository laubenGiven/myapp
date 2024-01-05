<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Test_Result;
use App\Models\Patient;
use App\Mail\SendPdfEmail;
use Illuminate\Support\Facades\Mail;

class PdfController extends Controller
{
    public function generatePdf($patientId)
    {
        // Retrieve test results data from the Test_Result model for the selected patient
        $testResults = Test_Result::where('patient_id', $patientId)
            ->select('patient_id', 'name', 'test_carriedout', 'test_result', 'comment', 'preview', 'result_date')
            ->get();

        // Retrieve patient data from the Patient model for the selected patient
        $patient = Patient::find($patientId);
        
        if (!$patient) {
            return 'Patient not found.';
        }

        // Prepare data to pass to the view
        $data = [
            'title' => 'Patient Results and Information',
            'testResults' => $testResults,
            'patient' => $patient,
            // Add more data if needed
        ];

        // Pass the data to the view file (pdf.blade.php)
        $pdf = PDF::loadView('pdf', $data);

        // Save the generated PDF with the patient's name and ID
        $pdfFileName = $patient->name . '_' . $patient->id . '_testResults.pdf';
        $pdfPath = storage_path('app/public/' . $pdfFileName);
        $pdf->save($pdfPath);

        // Send the PDF as an email to the patient
        Mail::to($patient->email)->send(new SendPdfEmail($pdfPath, $pdfFileName));

        return 'Email sent with PDF attachment to ' . $patient->email . '.';
    }
}
