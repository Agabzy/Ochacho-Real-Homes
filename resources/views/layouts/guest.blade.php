<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>


        <script>
            document.getElementById('phone_number').addEventListener('input', function(e) {
           let value = e.target.value.replace(/\D/g, ''); // Remove non-numeric characters
           let formattedValue = '';

           // Format the phone number as "XXXX XXX XXXX"
           if (value.length >= 5) {
               formattedValue = value.slice(0, 4) + ' ' + value.slice(4, 7) + ' ' + value.slice(7, 11);
           } else if (value.length >= 4) {
               formattedValue = value.slice(0, 4) + ' ' + value.slice(4, 7);
           } else {
               formattedValue = value;
           }

           // Set the formatted value back into the input field
           e.target.value = formattedValue;
       });
       </script>
    </body>
</html>
