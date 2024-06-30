<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>MonalizaBezRamy</title>
</head>

<body class="bg-gray-400">
    <nav>
        <ul class="flex justify-between p-3">
            <li>
                <a href="{{ route('post.index') }}">Monaliza</a>
            </li>
            @foreach (['wierszem_pisane' => 'Wierszem Pisane', 'scenariusze_pisane_życiem' => 'Scenariusze Pisane Życiem', 'z_medycznego_punktu_widzenia' => 'Z Medycznego Punktu Widzenia', 'taniec' => 'Taniec'] as $key => $value)
                <li>
                    <a href="{{ route('post.index', ['type' => $key]) }}">{{ $value }}</a>
                </li>
            @endforeach
        </ul>
    </nav>
    <div class="container mx-auto max-w-2xl px-2">
        {{ $slot }}
    </div>
</body>

</html>
