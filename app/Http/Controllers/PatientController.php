<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Models\Test_Result;




class PatientController extends Controller
{
   
  

    public function __construct()
    {
        
    }

    public function logout()
{
    Auth::logout();

    // Redirect to the home page or any other desired page after logout
    return redirect('/');
}
  

    public function index(Request $request)
    {
        $validated = $request->validate([
            'email_or_surname' => 'required',
            'telephone_number' => 'required',
        ]);

        // Check if the input is an email
        $isEmail = filter_var($validated['email_or_surname'], FILTER_VALIDATE_EMAIL);

        // Define the credentials array based on whether it's an email or surname
        $credentials = [
            $isEmail ? 'email' : 'name' => $validated['email_or_surname'],
            'password' => $validated['telephone_number'],
        ];

        // Authenticate the user
        if (Auth::attempt($credentials)) {
            // Redirect to the patient's dashboard
            return redirect()->route('patientdash', ['patient_id' => Auth::id()]);
        }

        // If authentication fails, redirect back with an error message
        return back()->withInput()->withErrors(['email_or_surname' => 'Invalid credentials']);
    }

   

    public function search(Request $request)
    { 
      $searchQuery = $request->input('search');
 
       
      // Perform search on patients and eager load related test_results
      $patients = Test_Result::where('sname', 'like', '%' . $searchQuery . '%')
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
        // Validate the request data
        $validatedData = $request->validate([
            'sname' => 'required',
            'lname' => 'required',
            'email' => 'email',
            'contact' => 'required',
            'sex' => 'required',
            'age' => 'required|integer',
            'agecount' => 'required',
            'testRequired' => 'sometimes|array',
        ]);
    
        // Create a new User instance
        $user = User::create([
            'name' => $validatedData['sname'],
            'role' => 'patient',
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['contact']),
        ]);
    
        // Get the ID of the newly created user
        $userId = $user->id; // This is the ID you need for the patient record
    
        // Create a new Patient instance associated with the User
        $patient = new Patient([
           'user_id' => $userId, // Set the user_id for the patient 
            'sname' => $validatedData['sname'],
            'lname' => $validatedData['lname'],
            'email' => $validatedData['email'],
            'contact' => $validatedData['contact'],
            'sex' => $validatedData['sex'],
            'age' => $validatedData['age'],
            'agecount' => $validatedData['agecount'],
            // 'test_date' => $validatedData['test_date'],
        ]);
        // Save the patient to the database
        $patient->save();
    
        // Save each test required as a separate row associated with the patient
        foreach ($validatedData['testRequired'] ?? [] as $test) {
            $patient->test_result()->create([  
                'user_id' => $userId,            
                'sname' => $validatedData['sname'],
                'lname' => $validatedData['lname'],
                'age' => $validatedData['age'],
                'agecount' => $validatedData['agecount'],
                'test_carriedout' => $test,
            ]);
        }
    
        // Redirect or return a response as needed
        return redirect()->route('results')->with('success', 'Patient and test results created successfully!');
    }
    
     


    public function clinicianstore(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'sname' => 'required',
            'lname' => 'required',
            'email' => 'email',
            'contact' => 'required',
            'sex' => 'required',
            'age' => 'required|integer',
            'agecount' => 'required',
            'testRequired' => 'sometimes|array',
        ]);
    
        // Create a new User instance
        $user = User::create([
            'name' => $validatedData['sname'],
            'role' => 'patient',
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['contact']),
        ]);
    
        // Get the ID of the newly created user
        $userId = $user->id; // This is the ID you need for the patient record
    
        // Create a new Patient instance associated with the User
        $patient = new Patient([
           'user_id' => $userId, // Set the user_id for the patient 
            'sname' => $validatedData['sname'],
            'lname' => $validatedData['lname'],
            'email' => $validatedData['email'],
            'contact' => $validatedData['contact'],
            'sex' => $validatedData['sex'],
            'age' => $validatedData['age'],
            'agecount' => $validatedData['agecount'],
            // 'test_date' => $validatedData['test_date'],
        ]);
        // Save the patient to the database
        $patient->save();
    
        // Save each test required as a separate row associated with the patient
        foreach ($validatedData['testRequired'] ?? [] as $test) {
            $patient->test_result()->create([  
                'user_id' => $userId,            
                'sname' => $validatedData['sname'],
                'lname' => $validatedData['lname'],
                'age' => $validatedData['age'],
                'agecount' => $validatedData['agecount'],
                'test_carriedout' => $test,
            ]);
        }
    
        // Redirect or return a response as needed
        return redirect()->route('patient.results')->with('success', 'Patient and test results created successfully!');
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
