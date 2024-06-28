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
    <div class="container mx-auto max-w-2xl px-2">
        {{ $slot }}
    </div>
</body>

</html>
