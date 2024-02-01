<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Template using Tailwind CSS</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap"
        rel="stylesheet">

    @stack('styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="min-h-screen bg-[#ecf0f5] p-4 pt-20 sm:ml-64">
        @yield('content')
    </div>

    <script>
        function decrement(inputId) {
            updateCounter(inputId, -1);
        }

        function increment(inputId) {
            updateCounter(inputId, 1);
        }

        function updateCounter(inputId, step) {
            const inputElement = $(`#${inputId}`);
            if (inputElement.length) {
                currentValue = Math.max((parseInt(inputElement.val()) || minValue) + step, parseInt(inputElement.attr(
                    'data-counter-min')) || 1);
                inputElement.val(currentValue).trigger('change');
            }
        }
    </script>
    @stack('scripts')
</body>

</html>
