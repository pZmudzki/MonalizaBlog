<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

    <div class="container mx-auto max-w-2xl px-2 mt-20">
        {{ $slot }}
    </div>
</body>

</html>
