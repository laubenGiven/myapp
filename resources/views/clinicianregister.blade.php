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
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Search Patient</a>
            <form action="{{ route('search') }}" method="GET" class="d-flex">
                <input name="search" class="form-control me-2" type="search" placeholder="Search by SurName ">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h2> Patient Information</h2>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped">
    <thead>
        <tr>
            <th>Patient Id</th>
            <th>SurName</th> 
            <th>LastName</th> 
            <th> Age </th>          
            <th>Test Carried Out</th>
            <th>Test Results</th> 
            <th> Flag</th> 
            <th>  Ref. Range</th> 
            <th>Units</th> 

            <th> Comments</th>
        </tr>
    </thead>
    <tbody>
                @foreach($patients->whereNotNull('test_result') as $patient)
                            <tr >
                                <td>{{ $patient->patient_id }}</td>
                                <td>{{ $patient->sname }} </td>
                                <td>{{ $patient->lname }}</td>
                                <td>{{ $patient->age }} <span>{{ $patient->agecount }}</span></td>                                                       
                                <td>{{ $patient->test_carriedout }}</td>

                                <td>{{ $patient->test_result }}</td>
                                <td>{{ $patient->flag }}</td>
                                <td>{{ $patient->range}}</td>
                                <td>{{ $patient->units}}</td>
                                <td>{{ $patient->comment }}</td>                 
                                   
                                
                            </tr>
                        @endforeach
                </tbody>
</table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   

</x-guest-layout>
