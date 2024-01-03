<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */

     public function __construct()
     {
        
     }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
     public function store(Request $request)
     {
         // Get all input data from the request
         $validatedData = $request->all();
     
         // Create a new patient instance
         $patient = new Patient([
             'name' => $validatedData['name'],
             'email' => $validatedData['email'],
             'contact' => $validatedData['contact'],
             'sex' => $validatedData['sex'],
             'age' => $validatedData['age'],
             'agecount' => $validatedData['agecount'],
            //  'test_date' => $validatedData['test_date'],
         ]);
     
         // Save the patient to the database
         $patient->save();
     
         // Save each test required as a separate row associated with the patient
         foreach ($validatedData['testRequired'] ?? [] as $test) {
             $patient->test_result()->create([
                 'name'=>$validatedData['name'],
                 'test_carriedout' => $test,
                //  'result_date' => $validatedData['test_date'],

                 
             ]);
         }
     
         // Redirect or return a response as needed
         return redirect()->route('results')->with('success', 'Patient and test results created successfully!');
     }
     
   







    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
