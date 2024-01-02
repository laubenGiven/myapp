<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <title>{{ config('app.name', 'Friecca Pharmacy') }}</title> -->
        <title> Friecca Pharmacy Laboratory System </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        <style>
  /* Custom CSS for Flex Gap */
  .flex-gap > * + * {
    margin-top: 0.5rem; /* Adjust this value as needed */
    margin-left: 0.5rem; /* Adjust this value as needed */
  }
</style>
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
    // JavaScript to fade out the success message after 5 seconds
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 5000); // 5000 milliseconds = 5 seconds
   </script>
   <script>
    document.addEventListener('DOMContentLoaded', function () {
        const saveResultBtns = document.querySelectorAll('.save-result-btn');
        saveResultBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const patientId = this.getAttribute('data-patient-id');
                const testCarriedOut = this.getAttribute('data-test-carriedout');
                const input = document.querySelector(`input[data-patient-id="${patientId}"][data-test-carriedout="${testCarriedOut}"]`);
                const testResult = input.value;

                fetch('/save-test-result', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        patient_id: patientId,
                        test_carriedout: testCarriedOut,
                        test_result: testResult
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Handle success or error response here
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>
    </body>
</html>
