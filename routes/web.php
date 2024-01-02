<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TestResultController;
use Illuminate\Http\Request;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route for storing patient data
    Route::post('/dashboard/store', [PatientController::class, 'store'])->name('dashboard.store');
    
    Route::get('/results', [TestResultController::class,'index'])->name('results');

    Route::get('/results', [TestResultController::class,'show'])->name('sendresults');
    Route::post('/save-test-result', [TestResultController::class, 'saveTestResult'])->name('save-test-result');

    Route::get('/charges', function () {
        return view('testcharges');
    })->name('charges');

});
