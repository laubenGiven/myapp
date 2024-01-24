<x-guest-layout>

<div class="container-fluid">
    <div class="row">
      <div class="col-md-12 bg-primary text-white py-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <!-- Logo Image -->
          <div>
          <img src="{{ Vite::asset('resources/images/logo.jpeg') }}" class="img-fluid rounded-circle" alt="Logo" style="width: 70px; height: 70px; border-radius: 50%;">
          </div>
          <div class="ml-2">
    <h1 class="text-xl font-bold mb-2">
        Welcome 
        @auth <!-- Check if the user is logged in -->
            {{ auth()->user()->name }} <!-- Display the logged-in user's name -->
        @endauth
        , To Clinician Dashboard
    </h1>

    <div class="flex space-x-4">
    <span>
        <x-nav-link href="{{ route('cliniciandash') }}" :active="request()->routeIs('cliniciandash')" class="text-xg font-extrabold px-4 py-1 border-b-2 border-transparent hover:border-blue-500 transition-all">
            {{ __('Dashboard') }}
        </x-nav-link>
    </span>
    
    <span>
        <x-nav-link href="{{ route('patient.register') }}" :active="request()->routeIs('patient.register')" class="text-xg font-extrabold px-4 py-1 border-b-2 border-transparent hover:border-blue-500 transition-all">
            {{ __('Patient Registration') }}
        </x-nav-link>
    </span>

    
    <span>
        <x-nav-link href="{{ route('patient.results') }}" :active="request()->routeIs('patient.results')" class="text-xg font-extrabold px-4 py-1 border-b-2 border-transparent hover:border-blue-500 transition-all">
            {{ __('Patient View') }}
        </x-nav-link>
    </span>
    <span>
        <x-nav-link href="{{ route('clinician.charges') }}" :active="request()->routeIs('clinician.charges')" class="text-xg font-extrabold px-4 py-1 border-b-2 border-transparent hover:border-blue-500 transition-all">
            {{ __('Test Charges') }}
        </x-nav-link>
    </span>
</div>

</div>


        </div>

        <!-- Logout Button -->
        <div>
        @auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <i class="fa-solid fa-user-tie fa-lg"></i> <button type="submit">Logout</button>
    </form>
@endauth

        </div>

      </div>
    </div>
    <br>
   
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-3">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-3">
        @if (session('success'))
         <div id="successAlert" class="alert alert-success">
          {{ session('success') }}
           </div>
        @endif

            <div class="bg-white border-b border-gray-200 p-1 lg:p-1 container-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Test Carried Out</th>                                                
                                                    
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($patients->whereNull('test_result') as $patient)
                            <tr >
                                <td>{{ $patient->patient_id }}</td>
                                <td>{{ $patient->sname }} <span> {{ $patient->lname }}</span></td>
                                <td>{{ $patient->test_carriedout }}</td>
                              
                                <td class="flex">
                                    <a href="" class="btn btn-primary me-2">
                                        <i class="fa-solid fa-pencil "></i> Edit
                                    </a>
                                    <form action="" method="POST" class="delete-form ">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-info bg-red-900">
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

            <div class="bg-white border-b border-gray-200 p-1 lg:p-1">
            <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Patient ID</th>
            <th scope="col">Patient Name</th>
            <th scope="col">Test Carried Out</th>            
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients->whereNotNull('test_result') as $patient)
            <tr>
                <!-- Display patient details -->
                <td>{{ $patient->patient_id }}</td>
                <td>{{ $patient->sname }} <span> {{ $patient->lname }}</span></td>
                <td>{{ $patient->test_carriedout }}</td>
               
                <td class="flex">
                    <!-- Edit button -->
                    <a href="#" class="btn btn-primary me-2">
                        <i class="fa-solid fa-pencil "></i> Edit
                    </a>

                    <!-- Delete form -->
                    <form action="" method="POST" class="delete-form">
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

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    
   

    
</div>



    
    



</x-guest-layout>
