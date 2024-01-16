

<!DOCTYPE html>
<html>
<head>
    <title>Test Result Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
         /* General table styling */
    table {
        font-size: 12px; /* Adjust for overall font size */
        border-collapse: collapse;
    }

    .thead-text {
        font-family: 'Calibri', sans-serif;
        font-weight: semibold;
        font-size: 12px;
        text-align: center;
    }

    .td-text {
        font-family: 'Courier New', Courier, monospace;
        font-size: 12px;
        text-align: center;
    }

   




      
    </style>
</head>
<body class="p-8 relative">
   

    <div class="logo">   
    <img src="{{ public_path('head.png') }}" alt="Logo" alt="Logo" style="width:100%; height: auto; ">
      
    </div>
    
    <br>
    <br>
   
    <div class="container-fluid mb-2">
    <h2 class="fw-bold mb-3">Patient Information</h2>

    <div class="row">
        <div class="col-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="thead-text">Patient ID</th>
                        <th scope="col" class="thead-text">Name</th>
                        <th scope="col" class="thead-text">Sex</th>
                        <th scope="col" class="thead-text">Age</th>
                        <th scope="col" class="thead-text">Contact</th>
                        <th scope="col" class="thead-text">Test Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-text">{{ $patient->id }}</td>
                        <td class="td-text">{{ $patient->name }}</td>
                        <td class="td-text">{{ $patient->sex }}</td>
                        <td class="td-text">{{ $patient->age }} {{ $patient->agecount }}</td>
                        <td class="td-text">{{ $patient->contact }}</td>
                        <td class="td-text">{{ $patient->test_date }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



 <div class="container-fluid ">
    <h2 class="text-xl font-semibold mb-1">Test Results</h2>
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
            <td class="px-4 py-1" style="font-family: 'Courier Sans', monospace;">{{ $testResult->test_carriedout }}</td>
            <td class="px-4 py-1" style="font-family: 'Courier Sans', monospace;">{{ $testResult->test_result }}</td>
            <td class="px-4 py-1" style="font-family: 'Courier Sans', monospace;">{{ $testResult->comment }}</td>
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
