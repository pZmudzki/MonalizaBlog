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
    <header class="p-3 flex items-center justify-between">
        <h1 class="text-2xl">
            <a href="{{ route('post.index') }}">MonalizaBezRamy</a>
        </h1>
        @if (auth()->user())
            <div class="flex gap-4">
                <a href="{{ route('post.create') }}" class="bg-gray-200 p-2">Utwórz post</a>
                <form action="{{ route('auth.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-300 p-2">Wyloguj</button>
                </form>
            </div>
        @endif
    </header>
    <nav>
        <ul class="flex justify-between p-3">
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
