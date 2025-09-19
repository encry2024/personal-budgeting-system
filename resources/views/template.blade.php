<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personal Budgeting System</title>

        <link rel="stylesheet" href="{{ asset('src/output.css') }}">
    </head>
    <body class="dark:bg-gray-800">
        <div class="">
            @yield('content')
        </div>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('script')
    </body>
</html>
