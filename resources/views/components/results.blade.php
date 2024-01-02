<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x class="block h-12 w-auto" />

   
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">patientID</th>
            <th scope="col">patient Name</th>
            <th scope="col">Test Carriedout</th>
            <th scope="col">Test Results</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
          <tr class="table-default">
            <td>{{$patient->id}}</td>
            <td>{{$patient->name}}</td>
            <td>{{$patient->test_required}}</td>
            <td> <input type="text" placeholder="enter test result here" id="patientName" name="name" class="mt-1 block  border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></td>
            <td>
            <button 
                type="button" class="btn btn-primary" href="route{ }"><i class="fa-solid fa-check"></i>
            </button>
            <button 
                type="button" class="btn btn-Danger" href="route{ }"><i class="fa-solid fa-trash fa-lg"></i>
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