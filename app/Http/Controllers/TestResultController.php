<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTest_ResultRequest;
use App\Http\Requests\UpdateTest_ResultRequest;
use App\Models\Test_Result;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TestResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve records where test_carriedout is not null and sort in descending order
        $patients = Test_Result::whereNotNull('test_carriedout')->orderBy('patient_id', 'desc')->get();
    
        // Pass the fetched patients data to the view
        return view('testresults', ['patients' => $patients]);
    }
    

    public function clinicianindex()
    {
        // Retrieve records where test_carriedout is not null
        $patients = Test_Result::whereNotNull('test_carriedout')->orderBy('patient_id', 'desc')->get();
    
        // Pass the fetched patients data to the view
        return view('clinicianview', ['patients' => $patients]);
    }
    

    public function saveTestResult(Request $request, $patient_id)
{
    $validatedData = $request->validate([
        'image_upload' => 'nullable',
        'test_result' => 'required', 
        'flag' => 'nullable',
        'range' => 'nullable',    
        'var' => 'nullable',
        'comment' => 'nullable',
        'units' => 'nullable',
    ]);

    $testResultData = [
        'image_upload' => $validatedData['image_upload'] ?? null,
        'test_result' => $validatedData['test_result'],
        'flag' => $validatedData['flag'],
        'range' => $validatedData['range'],
        'var' => $validatedData['var'] ?? null,
        'comment' => $validatedData['comment'] ?? null,
        'units' => $validatedData['units'],
    ];

    // Find or create the test result record
    Test_Result::updateOrCreate(
        [
            'id' => $patient_id,
            
        ],
        $testResultData
    );

    return redirect()->route('results')->with('success', 'Test result inserted/updated successfully!');
}


    /**
     * Show the form for creating a new resource.
     */
    public function clinicianShow()
    {
        

        // Pass the fetched patients data to the view
        return view('clinicianlogin');


    }
    public function patientDashBoard()
    {
        try {
            // Fetch the logged-in patient's information
            $patient = Auth::user();

            // Fetch the test results for the specific patient
            $testResults = Test_Result::where('user_id', $patient->id)
                ->whereNotNull('test_result')
                ->orderBy('result_date', 'desc')
                ->take(20)
                ->get();

            return view('patientview', ['testResult' => $testResults]);
        } catch (\Exception $e) {
            return redirect()->route('patientdash')->with('error', 'An error occurred.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function clinicianDashBoard()
    {
        $results = Test_Result::query()            
            ->orderByDesc('result_date')
            ->take(20)           
            ->get();
    
        return view('clinicianregister', ['patients' => $results]);
    }
    
    

    /**
     * Display the specified resource.
     * /
     * 
     * 
     * */
     public function show()
        {
            // Retrieve all test results
            $testResults = Test_Result::whereNotNull('test_result')->orderBy('patient_id', 'desc')->get();
    
            return view('send&printpatient', ['patients' => $testResults]);
        }
    

    public function filterpatient($patient_id)
    {
       // Retrieve test results where test_result is not null, sorted by patient_id in descending order
       $testResults = Test_Result::whereNotNull('test_result')
       ->orderBy('patient_id', 'desc')
       ->get();

        return view('test_results.show', ['testResults' => $testResults]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($patient_id)
    {
        // Retrieve test result for the given patient_id and test_carriedout
        $testResult = Test_Result::where('id', $patient_id)
           
            ->first();
    
        if ($testResult) {
            return view('editpatient', ['patient' => $testResult]); // Change 'patients' to 'testResult'
        } else {
            return redirect()->route('results')->with('error', 'Test result not found');
        }
    }
    
    
    
    public function update(Request $request, $patient_id)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required',
            'name' => 'required',
            'test_carriedout' => 'required',
            'test_result' => 'required',
            'flag' => 'nullable',
            'range' => 'nullable',
            'units' => 'nullable',  
            'comment' => 'nullable',
            'preview' => 'nullable',
        ]);
    
        $testResult = Test_Result::where('id', $patient_id)         
            ->first();
    
        if ($testResult) {
            $testResult->fill($validatedData)->save();
    
            return redirect()->route('results')->with('success', 'Test result updated successfully!');
        }
    
        return redirect()->route('results')->with('error', 'Test result not found');
    }
    
    
    public function destroy($patient_id)
    {
        $testResult = Test_Result::where('id', $patient_id)           
            ->first();
    
        if ($testResult) {
            $testResult->delete();
    
            return redirect()->route('results')->with('success', 'Test result deleted successfully!');
        }
    
        return redirect()->route('results')->with('error', 'Test result not found');
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit2($patient_id)
    {
        // Retrieve test result for the given patient_id and test_carriedout
        $testResult = Test_Result::where('id', $patient_id)
           
            ->first();
    
        if ($testResult) {
            return view('editpatient', ['patient' => $testResult]); // Change 'patients' to 'testResult'
        } else {
            return redirect()->route('patient.results')->with('error', 'Test result not found');
        }
    }
    
    
    
    public function update2(Request $request, $patient_id)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required',
            'name' => 'required',
            'test_carriedout' => 'required',
            
        ]);
    
        $testResult = Test_Result::where('id', $patient_id)         
            ->first();
    
        if ($testResult) {
            $testResult->fill($validatedData)->save();
    
            return redirect()->route('patient.results')->with('success', 'Test result updated successfully!');
        }
    
        return redirect()->route('patient.results')->with('error', 'Test result not found');
    }
    
    
    public function erasePatient($patient_id)
    {
        $testResult = Test_Result::where('id', $patient_id)           
            ->first();
    
        if ($testResult) {
            $testResult->delete();
    
            return redirect()->route('patient.results')->with('success', 'Test result deleted successfully!');
        }
    
        return redirect()->route('patient.results')->with('error', 'Test result not found');
    }
    
}
