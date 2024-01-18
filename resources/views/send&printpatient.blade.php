<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Send  via Email and Print Patient Results') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
         <div id="successAlert" class="alert alert-success">
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
            <th scope="col">Test Date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
          <tr class="table-default">
            <td>{{$patient->patient_id}}</td>
            <td>{{$patient->sname}} <span> {{$patient->lname}}</span> </td>
            <td>{{$patient->test_carriedout}}</td>
            <td>{{$patient->test_result}}</td>
            <td>{{$patient->result_date}}</td>

            <td>
            <a href="{{ route('sendemail.pdf', ['patient_id' => $patient->patient_id]) }}" class="btn btn-primary">
                   <i class="fa-solid fa-envelope-circle-check"></i> Send PDF via Email
                </a>
             </td>
            <td>             
                
                 <a href="{{ route('generateprint.pdf', ['patient_id' => $patient->patient_id]) }}" class="btn btn-success">
                      <i class="fa-solid fa-print fa-lg"></i> Download To Print
                  </a>
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
</x-app-layout>