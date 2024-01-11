<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTest_ResultRequest;
use App\Http\Requests\UpdateTest_ResultRequest;
use App\Models\Test_Result;
use App\Models\Patient;
use Illuminate\Http\Request;

class TestResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Test_Result::all();

        // Pass the fetched patients data to the view
        return view('testresults', ['patients'=>$patients]);
    }

    public function saveTestResult(Request $request, $patient_id)
{
    $validatedData = $request->validate([
        'test_result' => 'required',        
        'var' => 'nullable',
        'comment' => 'nullable',
    ]);

    $testResultData = [

        'test_result' => $validatedData['test_result'],
        'var' => $validatedData['var'] ?? null,
        'comment' => $validatedData['comment'] ?? null,
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

   

    /**
     * Store a newly created resource in storage.
     */
    public function clinicianDashBoard()
{
    $patients = Test_Result::whereNotNull('test_result')
        ->orderBy('result_date', 'desc')
        ->take(20)
        ->get();

    return view('clinicianregister', ['patients'=>$patients]);
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
            $testResults = Test_Result::whereNotNull('test_result')->get();
    
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
    
}
