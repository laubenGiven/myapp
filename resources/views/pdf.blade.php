

<!DOCTYPE html>
<html>
<head>
    <title>Test Result Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
         /* General table styling */
    table {
        font-size: 20px; /* Adjust for overall font size */
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border: none;
        text-align: left;
        width:40px;
    }

    /* Header styling */
    .thead-text {
        font-family: "Open Sans", sans-serif; /* Professional-looking font */
        font-weight: 500; /* Slightly bolder for emphasis */
        font-size: 18px; /* Slightly larger size for headers */
        color: #333; /* Darker text for headers */
    }

    /* Input styling */
    .disabled-input {
        background-color: #f5f5f5; /* Lighter background for disabled inputs */
        border-color: none; /* Match table border color */
        font-family: "Courier Sans", monospace; /* Fixed-width font for inputs */
        font-size: 14px; /* Slightly smaller font size for inputs */
    }
        .stamp {
    position:absolute;
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
    position:absolute;
    top:6rem; /* Position in the middle vertically */
    left: 50%;     
    transform: translate(-50%, -50%); /* Center the text precisely */
    font-size: 1.5rem; /* Adjust font size as needed */
    font-weight: bold; /* Make the text bold if desired */
}



      
    </style>
</head>
<body class="p-8 relative">
   

    <div class="logo">   
    <img src="{{ public_path('head.png') }}" alt="Logo" alt="Logo" style="width:100%; height: auto; ">
      
    </div>
    
    <br>
    <br>
   
    <div class="container-fluid mb-5">
    <h2 class="fw-bold mb-4">Patient Information</h2>

    <div class="row">
        <div class="col-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="thead-text  px-6 py-2">Patient Id</th>
                        <th scope="col" class="thead-text px-6 py-2">Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-text"><input id="patient_id" type="text" class="form-control disabled-input" value="{{ $patient->id }}" disabled style="border-radius: 10px; width:200px"></td>
                        <td class="td-text"><input id="name" type="text" class="form-control disabled-input " value="{{ $patient->name }}" disabled style="border-radius: 10px; width:300px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="thead-text px-4 py-2">Sex</th>
                        <th scope="col" class="thead-text px-4 py-2">Age</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-text"><input id="sex" type="text" class="form-control disabled-input" value="{{ $patient->sex }}" disabled style="border-radius: 10px; width:200px"></td>
                        <td class="td-text"><input id="age" type="text" class="form-control disabled-input" value="{{ $patient->age }} {{ $patient->agecount }}" disabled style="border-radius: 10px; width:300px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="thead-text px-4 py-2">Contact</th>
                        <th scope="col" class="thead-text px-4 py-2">Test Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-text"><input id="phone" type="text" class="form-control disabled-input" value="{{ $patient->contact }}" disabled   style="border-radius: 10px; width:200px"></td>
                        <td class="td-text"><input id="date" type="text" class="form-control disabled-input" value="{{ $patient->test_date }}" disabled  style="border-radius: 10px; width:300px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


 <div class="container-fluid mt-4">
    <h2 class="text-xl font-extrabold mb-2">Test Results</h2>
    @if($testResults && !$testResults->isEmpty())
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
            <thead class="thead-dark" style="font-family: Calibri;">
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
   <br>
   <br
   <div class="stamp">
    <p class="date">{{ now()->format('Y-m-d') }}</p>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
</body>
</html>
