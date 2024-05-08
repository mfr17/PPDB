<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-DGw22UZu.css') }}">
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    <x-navbar></x-navbar>
    @yield('pengumuman')
    <main>
        @yield('main')
    </main>
    @yield('tentang')
    @yield('kontak')
    <x-footer></x-footer>
</body>

</html>
