<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test Results') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-3">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
        @if (session('success'))
         <div id="successAlert" class="alert alert-success">
          {{ session('success') }}
           </div>
        @endif

            <div class="bg-white border-b border-gray-200 p-2 lg:p-2 container-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Test Carried Out</th>
                            <th scope="col">Image upload</th>                           
                         
                            
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($patients->whereNull('test_result') as $patient)
                            <tr >
                                <td>{{ $patient->patient_id }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->test_carriedout }}</td>
                               
                                <td>
    <form method="POST" action="{{ route('save-test-result', ['patient_id' => $patient->id]) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
        <input type="hidden" name="test_carriedout" value="{{ $patient->test_carriedout }}">
        <div class="flex gap-1 items-center">
            <input type="file" name="result_image" accept="image/*" class="w-100">
            <input type="text" name="test_result" placeholder="Test Result" class="w-100">
            <label for="flag" class="text-gray-700">Flag</label>
            <select name="flag" class="w-150">
                <option value="" selected></option>
                <option value="N">N</option>
                <option value="L">L</option>
                <option value="H">H</option>
            </select>
            <input type="text" name="ranges" placeholder="Range" class="w-100">
            <input type="text" name="comment" placeholder="Comment" class="w-100">
            <select name="var" class="w-150">
                <option value="" selected>Preview</option>
                <option value="verified">Verified</option>
                <option value="not_verified">Not Verified</option>
            </select>
            <button type="submit" class="btn btn-info">
                <i class="fa-solid fa-check-circle"></i> Save
            </button>
        </div>
    </form>
</td>


                              
                                <td class="flex">
                                    <!-- <a href="{{ route('patient.edit', ['patient_id' => $patient->id]) }}" class="btn btn-primary me-2">
                                        <i class="fa-solid fa-pencil "></i> Edit
                                    </a> -->
                                    <form action="{{ route('patient.delete', ['patient_id' => $patient->id]) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-info">
                            <i class="fa-solid fa-trash "></i> Delete
                        </button>
                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <br>
            
            <h1 style="text-align: center; font-size: 2.5em; font-weight: bold;">Patient Test Result Information View</h1>

           




            <div  class="bg-white border-b border-gray-200 p-6 lg:p-8>

            <div class="bg-white border-b border-gray-200 p-2 lg:p-2">
            <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Patient ID</th>
            <th scope="col">Patient Name</th>
            <th scope="col">Test Carried Out</th>
            <th scope="col">Test Results</th>
            <th scope="col">Comment</th>
            <th scope="col">Preview</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients->whereNotNull('test_result') as $patient)
            <tr>
                <!-- Display patient details -->
                <td>{{ $patient->patient_id }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->test_carriedout }}</td>
                <td>{{ $patient->test_result }}</td>
                <td>{{ $patient->comment }}</td>
                <td>{{ $patient->preview }}</td>
                <td class="flex">
                    <!-- Edit button -->
                    <a href="{{ route('patient.edit', ['patient_id' => $patient->id]) }}" class="btn btn-primary me-2">
                        <i class="fa-solid fa-pencil "></i> Edit
                    </a>

                    <!-- Delete form -->
                    <form action="{{ route('patient.delete', ['patient_id' => $patient->id]) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-info">
                            <i class="fa-solid fa-trash "></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

            </div>

              
            </div>
        </div >

      </div>
</x-app-layout>
