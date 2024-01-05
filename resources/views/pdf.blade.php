<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .lab-address {
            position: absolute;
            top: 0;
            right: 0;
            text-align: right;
            padding: 1rem;
            font-size: 14px;

            .stamp {
            position: absolute;
            bottom: 20px;
            right: 20px;
            text-align: center;
        }

        .stamp img {
            width: 100px; /* Adjust image width as needed */
            height: auto;
        }

        .stamp p {
            margin-top: 5px;
            font-size: 12px;
        }    
        }
    </style>
</head>
<body class="p-8 relative">
    <h1 class="text-3xl font-bold mb-4">{{ $title }}</h1>

    <div class="lab-address">
        <p>Friecca Clinical Laboratory,</p>
        <p>Wandegeya plot 160 Haji Musa Kasule Rd,</p>
        <p>0778-826812/0756308580,</p>
        <p>0772-590940/0701-590940,</p>
        <p>friecapharmacyltd@gmail.com</p>
    </div>

    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-2">Patient Information</h2>
        <form class="space-y-4">
            <div>
                <label class="block font-semibold">Patient ID:</label>
                <input type="text" value="{{ $patient->patient_id }}" disabled class="border border-gray-300 px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-semibold">Name:</label>
                <input type="text" value="{{ $patient->name }}" disabled class="border border-gray-300 px-3 py-2 w-full" />
            </div>
            <!-- Add other patient information fields as needed -->
        </form>
    </div>

    <div>
        <h2 class="text-xl font-semibold mb-2">Test Results</h2>
        @foreach($testResults as $testResult)
            <form class="space-y-4">
                <div>
                    <label class="block font-semibold">Test Carried Out:</label>
                    <input type="text" value="{{ $testResult->test_carriedout }}" disabled class="border border-gray-300 px-3 py-2 w-full" />
                </div>
                <div>
                    <label class="block font-semibold">Test Result:</label>
                    <input type="text" value="{{ $testResult->test_result }}" disabled class="border border-gray-300 px-3 py-2 w-full" />
                </div>
                <div>
                    <label class="block font-semibold">Comment:</label>
                    <textarea disabled class="border border-gray-300 px-3 py-2 w-full">{{ $testResult->comment }}</textarea>
                </div>
                <!-- You can add other fields related to the test result here -->
            </form>
        @endforeach
    </div>
    <div class="stamp">
        <img src="path_to_stamp_image.png" alt="Stamp">
        <p>{{ now()->format('Y-m-d') }}</p>
    </div>

</body>
</html>
