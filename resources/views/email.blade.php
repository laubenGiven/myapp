

<!DOCTYPE html>
<html>
<head>
    <title>Test Result Report</title>


    <style>
        /* Styles for form input fields */
        input[type="text"],
        textarea {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.5rem;
            width: 100%;
            margin-bottom: 0.5rem;
        }

        /* Styles for stamp */
        .stamp {
    position: absolute;
    background-image: url("{{ public_path('stamp.png') }}");
    background-size: cover;
    background-repeat: no-repeat;
    width: 378px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: red;
    text-align: center;
    /* Remove padding to align text properly */
}

.date {
    position: absolute;
    top:4rem; /* Position in the middle vertically */
    left: 50%;     
    transform: translate(-50%, -50%); /* Center the text precisely */
    font-size: 1.5rem; /* Adjust font size as needed */
    font-weight: bold; /* Make the text bold if desired */
}
.lab-address {
    position: absolute;
    top: 0;
    right: 0;
    text-align: right;
    padding: 1rem;
    font-size: 14px;
}

/* Additional styling for clarity and visual appeal */
.lab-address p {
    margin: 0;  /* Remove default paragraph margins */
}

      
    </style>
</head>
<body class="p-8 relative">
    <h3 class="text-3xl font-bold mb-4"> Test Result Report</h3>

    <div class="lab-address">
    <p style="font-weight: semi-bold; font-size: 18px;">Friecca Clinical Laboratory,</p>

        <p>Wandegeya plot 160 Haji Musa Kasule Rd, </p>
        
        <p>0778-826812/0756308580,</p>
        <p>0772-590940/0701-590940,</p>
        <p>friecapharmacyltd@gmail.com</p>
</div>

    <div class="logo">   
    <img src="{{ public_path('logo.jpeg') }}" alt="Logo" class="img-fluid rounded-circle" alt="Logo" style="width: 100px; height: 100px; border-radius: 50%;">
      
    </div>
    
    <br>
    <br>
   
    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-2">Patient Information</h2>
        <form class="space-y-4">
            <div>
                <label for="patient_id" class="block font-semibold">Patient Id:</label>
                <input id="patient_id" type="text" value="{{ $patient->id }}" disabled>
            </div>
            <div>
                <label for="name" class="block font-semibold">Name:</label>
                <input id="name" type="text" value="{{ $patient->name }}" disabled>
            </div>
            <div>
                <label for="age" class="block font-semibold">Age:</label>
                <input id="age" type="text" value="{{ $patient->age }} {{ $patient->agecount }}" disabled>
            </div>
        </form>
    </div>

    <div>
    <h2 class="text-xl font-semibold mb-2">Test Results</h2>
    @if($testResults && !$testResults->isEmpty())
        @foreach($testResults->whereNotNull('test_result') as $testResult)
            <form class="space-y-4">
                <div>
                    <label for="test_carriedout" class="block font-semibold">Test Carried Out:</label>
                    <input id="test_carriedout" type="text" value="{{ $testResult->test_carriedout }}" disabled>
                </div>
                <div>
                    <label for="test_result" class="block font-semibold">Test Result:</label>
                    <input id="test_result" type="text" value="{{ $testResult->test_result }}" disabled>
                </div>
                <div>
                    <label for="comment" class="block font-semibold">Comment:</label>
                    <textarea id="comment" disabled>{{ $testResult->comment }}</textarea>
                </div>
            </form>
        @endforeach
    @else
        <p>No test results found.</p>
    @endif
</div>
   <br>
   <div class="stamp">
    <p class="date">{{ now()->format('Y-m-d') }}</p>
</div>


  
</body>
</html>
