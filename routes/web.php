<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TestResultController;
use App\Http\Controllers\PdfController;
use Illuminate\Http\Request;
use App\Http\Controllers\EmailController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

 Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
        })->middleware(['auth', 'throttle:6,1'])->name('verification.send');





Route::get('/', function () {
    return view('welcome');
});


Route::get('/patientloginshow', function () {
    return view('patientlogin');
})->name('patientloginshow');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [PatientController::class,'logout'])->name('logout');
});


Route::post('/loginpatient', [PatientController::class, 'index'])->name('patientlogin');


Route::middleware(['auth', 'checkrole:patient'])->group(function () {
    Route::get('/patientcharges', function () {
        return view('patienttestcharges');
    })->name('patient.charges');
      
    Route::get('/patientDashBoard', [TestResultController::class, 'patientDashBoard'])->name('patientdash');
    Route::get('patient/downloadprint-pdf/{patient_id}', [PdfController::class, 'generateAndDisplayPdf'])->name('downloadprint.pdf');
   
});

Route::get('/clinicianloginshow',[TestResultController::class,'clinicianshow'])->name('clinician');
Route::post('/clinicianlogin', [PatientController::class,'loginClinician'])->name('loginClinician');



Route::middleware(['auth', 'checkrole:clinician'])->group(function () {
     // Routes accessible only to clinicians  
     Route::get('/patientlogin', function () {
        return view('clinicianpatientregister');
    })->name('patient.register');
    Route::get('/testcharges', function () {
        return view('cliniciantestcharges');
    })->name('clinician.charges');

    Route::get('/clinician-patient-results', [TestResultController::class,'clinicianindex'])->name('patient.results');

     Route::post('/clinicianpatient/store', [PatientController::class, 'clinicianstore'])->name('patient.store');  
     Route::get('sendresults/generateprint-pdf/{patient_id}', [PdfController::class, 'generateAndDisplayPdf'])->name('generateprint2.pdf');
     Route::get('/clinicianDashBoard',[TestResultController::class,'clinicianDashBoard'])->name('cliniciandash');
     Route::get('/search/', [PatientController::class, 'search'])->name('search');

     Route::get('/patient/edit/{patient_id}', [TestResultController::class,'edit2'])->name('patientclinician.edit');
     Route::post('/patient/update/{patient_id}/', [TestResultController::class,'update2'])->name('patientclinician.update');
 
     Route::delete('/testresult/delete/{patient_id}', [TestResultController::class, 'erasePatient'])->name('clinicianPatient.delete');


   
});





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'checkrole:technician',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route for storing patient data
    Route::post('/patient/store', [PatientController::class, 'store'])->name('dashboard.store');
    
    Route::get('/results', [TestResultController::class,'index'])->name('results');

    Route::get('/sendresults', [TestResultController::class,'show'])->name('sendresults');

    Route::get('/patient/{patient_id}/edit', [TestResultController::class,'edit'])->name('patient.edit');
    Route::post('/patient/{patient_id}/update', [TestResultController::class,'update'])->name('patient.update');
    Route::delete('/testresult/{patient_id}/delete', [TestResultController::class, 'destroy'])->name('patient.delete');
   


    Route::post('/save-test-result{patient_id}/save', [TestResultController::class, 'saveTestResult'])->name('save-test-result');

    Route::get('/chargesTemplate', function () {
        return view('testcharges');
    })->name('charges');  

Route::get('sendresults/via-emailpdf/{patient_id}', [EmailController::class, 'sendPdfEmail'])->name('sendemail.pdf');

Route::get('sendresults/generateprint-pdf/{patient_id}', [PdfController::class, 'generateAndDisplayPdf'])->name('generateprint.pdf');

});
