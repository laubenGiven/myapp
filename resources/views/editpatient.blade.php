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
                            <form action="{{ route('patient.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="patient_id" value="{{$patient->patient_id}}">
                                <input type="hidden" name="name" value="{{$patient->name}}">
                                <input type="hidden" name="test_carriedout" value="{{$patient->test_carriedout}}">
                                <input type="hidden" name="test_result" value="{{$patient->test_result}}">
                                <input type="hidden" name="comment" value="{{$patient->comment}}">
                                <input type="hidden" name="contact" value="{{$patient->contact}}">
                                <button type="submit" class="btn btn-primary"> Update Record </button>
                                <a href="{{ route('results')}}" class="btn btn-secondary">Cancel</a>           
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
