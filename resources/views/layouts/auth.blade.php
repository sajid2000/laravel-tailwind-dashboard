<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>

<body>
    <div class="flex justify-center items-center bg-gray-800 min-h-screen" style="background-image: url({{ asset('img/auth-bg.png') }});">
        {{ $slot }}
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
