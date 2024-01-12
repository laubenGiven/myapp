

<!DOCTYPE html>
<html>
<head>
    <title>Test Result Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    height: 195px;
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
   

    <div class="logo">   
    <img src="{{ public_path('head.png') }}" alt="Logo" alt="Logo" style="width:100%; height: auto; ">
      
    </div>
    
    <br>
    <br>
   
    <div class="mb-8">
    <h2 class="text-xl font-semibold mb-2">Patient Information</h2>
    <form class="row g-3">
        <div class="col-md-6">
            <label for="patient_id" class="form-label font-semibold">Patient Id:</label>
            <input id="patient_id" type="text" class="form-control" value="{{ $patient->id }}" disabled>
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label font-semibold">Name:</label>
            <input id="name" type="text" class="form-control" value="{{ $patient->name }}" disabled>
        </div>
        <div class="col-md-6">
            <label for="sex" class="form-label font-semibold">Sex:</label>
            <input id="sex" type="text" class="form-control" value="{{ $patient->sex }}" disabled>
        </div>


        <div class="col-md-6">
            <label for="age" class="form-label font-semibold">Age:</label>
            <input id="age" type="text" class="form-control" value="{{ $patient->age }} {{ $patient->agecount }}" disabled>
        </div>

        <div class="col-md-6">
            <label for="phone" class="form-label font-semibold">Contact:</label>
            <input id="phone" type="text" class="form-control" value="{{ $patient->contact }}" disabled>
        </div>
        <div class="col-md-6">
            <label for="date" class="form-label font-semibold">Test Date:</label>
            <input id="date" type="text" class="form-control" value="{{ $patient->test_date }}" disabled>
        </div>
        

    </form>
</div>


    <div class="container mt-4">
    <h2 class="text-xl font-semibold mb-2">Test Results</h2>
    @if($testResults && !$testResults->isEmpty())
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="px-4 py-2">Test Carried Out</th>
                        <th scope="col" class="px-4 py-2">Test Result</th>
                        <th scope="col" class="px-4 py-2">Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testResults->whereNotNull('test_result') as $testResult)
                        <tr>
                            <td class="px-4 py-2">{{ $testResult->test_carriedout }}</td>
                            <td class="px-4 py-2">{{ $testResult->test_result }}</td>
                            <td class="px-4 py-2">{{ $testResult->comment }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="alert alert-info">No test results found.</p>
    @endif
</div>


   <br>
   <div class="stamp">
    <p class="date">{{ now()->format('Y-m-d') }}</p>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
</body>
</html>
