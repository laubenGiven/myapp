<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test Results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Your Blade View File -->
@if (session('success'))
    <div id="successMessage" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif            

<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x class="block h-auto w-auto" />

   
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">patientID</th>
            <th scope="col">patient Name</th>
            <th scope="col">Test Carriedout</th>
            <th scope="col">Test Results</th>
            <th scope="col">comments</th>
            <th scope="col">Preview</th>

            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
          <tr class="table-default">
            <td>{{$patient->patient_id}}</td>
            <td>{{$patient->name}}</td>
            <td>{{$patient->test_carriedout}}</td>

@if($patient->test_result)
    <td>{{$patient->test_result}}</td>
@else
<td>
<form method="POST" action="{{ route('save-test-result') }}">
    @csrf
    <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
    <input type="hidden" name="test_carriedout" value="{{ $patient->test_carriedout }}">
    <div style="display: flex;">
        <input type="text" name="test_result" placeholder="Enter test result here"
               class="test-result-input mt-1 block border-gray-300 rounded-md shadow-sm
               focus:border-indigo-500 focus:ring-indigo-500" style="margin-right: 10px;">
        <input type="text" name="comment" placeholder="Enter comment"
               class="test-result-input mt-1 block border-gray-300 rounded-md shadow-sm
               focus:border-indigo-500 focus:ring-indigo-500" style="margin-right: 10px;">
        <select name="var" class="test-result-input mt-1 block border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" style="margin-right: 10px;">
            <option value="verified">Verified</option>
            <option value="not_verified">Not Verified</option>
        </select>
        <button type="submit" class="btn" style="height: 38px;">
            <i class="fa-solid fa-check-circle fa-lg"></i> Save
        </button>
    </div>
</form>

</td>

@endif

           <td>
           <button 
                type="button" class="btn btn-primary" href="{{ route('patient.edit')}}"><i class="fa-solid fa-pencil fa-lg"></i> Edit
            </button>
          
            <button 
                type="button" class="btn btn-Danger" href="{{ route('patient.delete')}}"><i class="fa-solid fa-trash fa-lg"></i> delete
            </button>
        </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    
    <div>
        
</div>
            </div>
        </div>
    </div>
</x-app-layout>
