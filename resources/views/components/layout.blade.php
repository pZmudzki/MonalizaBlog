<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
    @vite('resources/css/navbar.css')
    @vite('resources/js/app.js')
    <title>MonalizaBezRamy</title>
</head>

<body class="bg-gray-900">
    <x-navbar :links="[
        'taniec' => 'Taniec',
        'wierszem_pisane' => 'Wierszem Pisane',
        'scenariusze_pisane_życiem' => 'Scenariusze Pisane Życiem',
        'z_medycznego_punktu_widzenia' => 'Z Medycznego Punktu Widzenia',
    ]" />


    <div class="mx-auto mt-20">
        @if (session('success'))
            <div role="alert" class="border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
                <p class="font-bold">Sukces!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div role="alert" class="my-4 border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
                <p class="font-bold">Błąd!</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        {{ $slot }}
    </div>
</body>

</html>
