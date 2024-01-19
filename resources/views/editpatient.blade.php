<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Patient Record') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('success'))
            <div id="successMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card bg-light mb-3">
                        <div class="card-header"> 
                            <i class="fa-solid fa-user-pen fa-lg"></i> Edit User Record 
                        </div>
                        <div class="card-body">
                        <form action="{{ route('patient.update', ['patient_id' => $patient->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="patient_id">Patient ID:</label>
        <input type="text" name="patient_id" id="patient_id" value="{{ $patient->patient_id }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $patient->sname }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="test_carriedout">Test Carried Out:</label>
        <input type="text" name="test_carriedout" id="test_carriedout" value="{{ $patient->test_carriedout }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="test_result">Test Result:</label>
        <input type="text" name="test_result" id="test_result" value="{{ $patient->test_result }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="flag">Flag:</label>
        <input type="text" name="flag" id="flag" value="{{ $patient->flag }}" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="range"> Range:</label>
        <input type="text" name="range" id="range" value="{{ $patient->range }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="units">SI Units:</label>
        <input type="text" name="units" id="units" value="{{ $patient->units }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="comment">Comment:</label>
        <input type="text" name="comment" id="comment" value="{{ $patient->comment }}" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="preview">Preview:</label>
        <input type="text" name="preview" id="preview" value="{{ $patient->contact }}" class="form-control">
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
    <button type="submit" class="btn btn-primary"> Update Record </button>
    <a href="{{ route('results') }}" class="btn btn-secondary">Cancel</a>  
</div>
   
</form>

                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
