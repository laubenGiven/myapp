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
            <h1>Welcome   @if(Auth::check()) <!-- Check if the user is logged in -->
        {{ Auth::user()->name }} <!-- Display the logged-in user's name -->
    @endif,To Clinician Dashboard</h1>
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
                <input name="search" class="form-control me-2" type="search" placeholder="Search by Name or ID">
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
            <th>Name</th>            
            <th>Test Carried Out</th>
            <th>Test Results</th>
            <th>Comment</th>
            <th>Test Date</th>
        </tr>
    </thead>
    <tbody>
                @foreach($patients->whereNotNull('test_result') as $patient )
                            <tr >
                                <td>{{ $patient->patient_id }}</td>
                                <td>{{ $patient->sname }}</td>                               
                                <td>{{ $patient->test_carriedout }}</td>
                                <td>{{ $patient->test_result }}</td>
                                <td>{{ $patient->comment }}</td>
                                <td>{{ $patient->result_date }}</td>                         
                                   
                                
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
  <br>
  <br>
  <br> 

</x-guest-layout>
