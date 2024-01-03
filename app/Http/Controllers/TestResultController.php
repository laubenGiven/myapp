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

    public function saveTestResult(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'test_result' => 'required',
            'test_carriedout' => 'required',
            'var' => 'nullable',
            'comment' => 'nullable', // Assuming 'comment' field is optional
        ]);
    
        // Prepare the input data
        $data = [
            'patient_id' => $validatedData['patient_id'],
            'test_carriedout' => $validatedData['test_carriedout'],
        ];
    
        // Find or create the test result record
        $testResult = Test_Result::updateOrCreate(
            $data,
            [
                'test_result' => $validatedData['test_result'],
                'var' => $validatedData['var'] ?? null,
                'comment' => $validatedData['comment'] ?? null,
            ]
        );
    
        return redirect()->route('results')->with('success', 'Test result inserted successfully!');
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
        //
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
    public function edit($patient_id, $test_carriedout)
    {
        // Retrieve test result for the given patient_id and test_carriedout
        $testResult = Test_Result::where('patient_id', $patient_id)
            ->where('test_carriedout', $test_carriedout)
            ->first();
    
        if ($testResult) {
            return view('editpatient', ['patients' => $testResult]);
        } else {
            return redirect()->route('results')->with('error', 'Test result not found');
        }
    }
    
    
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required',
            'test_result' => 'required',
            'test_carriedout' => 'required',
            'name' => 'required',
            'comment' => 'required',
            'contact' => 'required',
        ]);
    
        $testResult = Test_Result::where('patient_id', $validatedData['patient_id'])
            ->where('test_carriedout', $validatedData['test_carriedout'])
            ->first();
    
        if ($testResult) {
            $testResult->test_result = $validatedData['test_result'];
            $testResult->save();
    
            return redirect()->route('results')->with('success', 'Test result updated successfully!');
        } else {
            return redirect()->route('results')->with('error', 'Test result not found');
        }
    }
    
    public function destroy($patient_id)
    {
        $testResult = Test_Result::where('patient_id', $patient_id)->first();
    
        if ($testResult) {
            $testResult->delete();
    
            return redirect()->route('results')->with('success', 'Test result deleted successfully!');
        } else {
            return redirect()->route('results')->with('error', 'Test result not found');
        }
    }
    
}
