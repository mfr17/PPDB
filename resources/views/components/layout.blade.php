<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar></x-navbar>
    <main>
        {{ $slot }}
    </main>
</body>

</html>