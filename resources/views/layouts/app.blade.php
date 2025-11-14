<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?? config('app.name') }}</title>

    {{-- livewire styling --}}
    @livewireStyles()
</head>

{{-- Anti inspect --}}
{{-- <body oncontextmenu="return false"> --}}

<body>

    {{-- navigation bar --}}
    <x-navigation.navigation-menu />

    {{ $slot }}

    @include('home.footer')

    {{-- livewire scripts --}}
    @livewireScripts()
</body>

</html>
