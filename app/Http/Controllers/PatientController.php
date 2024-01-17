<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Constructor remains empty if not used
    }

  

    public function index(Request $request)
    {
        $validated = $request->validate([
            'email_or_surname' => 'required',
            'telephone_number' => 'required',
        ]);
    
        // Concisely fetch the patient with eager loading
        $patientResults = Patient::where(function ($query) use ($validated) {
            $query->where('email', $validated['email_or_surname'])
                  ->orWhere('name', $validated['email_or_surname']);
        })->where('contact', $validated['telephone_number'])
          ->with('test_result')
          ->firstOrFail();
    
        return view('patientview', ['patients' => $patientResults]);
    }
    

    

    public function search(Request $request)
    { 
      $searchQuery = $request->input('search');
 
       
      // Perform search on patients and eager load related test_results
      $patients = Test_Result::where('name', 'like', '%' . $searchQuery . '%')
      ->orWhere('patient_id', 'like', '%' . $searchQuery . '%')      
      ->get();

        return view('cliniciansearch',['patients'=>$patients]);
    }

    public function loginClinician(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Get the user with the role 'clinician' from the database
        $clinician = User::where('email', $request->input('email'))
            ->where('role', 'clinician')
            ->first();

        // Check if the user was found and validate the password
        if ($clinician && Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed, redirect to clinician view
            return redirect()->route('cliniciandash');
        }

        // If authentication fails, redirect back with an error message
        return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
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
