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
    ]);

    $testResult = Test_Result::where('patient_id', $validatedData['patient_id'])
        ->where('test_carriedout', $validatedData['test_carriedout'])
        ->first();

    if ($testResult) {
        $testResult->test_result = $validatedData['test_result'];
        $testResult->save();

        return redirect()->route('results')->with('success', 'Test result inserted successfully!');
    }

    return response()->json(['message' => 'Test result not found'], 404);
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
     */
    public function show(Test_Result $test_Result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test_Result $test_Result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test_Result $test_Result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test_Result $test_Result)
    {
        //
    }
}
