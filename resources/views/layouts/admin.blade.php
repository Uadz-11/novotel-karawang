<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novotel Karawang - Dashboard Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @include('layouts.navigation')

    <div class="max-w-7xl mx-auto mt-6 p-6 bg-white shadow rounded">
        @yield('content')
    </div>

</body>
</html>
