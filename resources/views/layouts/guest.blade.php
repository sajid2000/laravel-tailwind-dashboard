<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" ></script>
    </head>
    <body x-data="data()" x-bind:class="{ 'theme-dark': dark }" class="leading-normal">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="bg-gray-900 text-red-600">{{ $error }}</div>
            @endforeach
        @endif
        @include('front.partials.navbar')
        {{ $slot }}
        @include('front.partials.footer')
        <script>
            function data() {
                function getThemeFromLocalStorage() {
                    if (window.localStorage.getItem('dark')) {
                        return JSON.parse(window.localStorage.getItem('dark'));
                    }

                    return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                }

                function setThemeToLocalStorage(theme) {
                    window.localStorage.setItem('dark', theme);
                }

                return {
                    dark: getThemeFromLocalStorage(),
                    toggleTheme() {
                        this.dark = !this.dark;
                        setThemeToLocalStorage(this.dark);
                    },
                };
            }

            /* Make dynamic date appear */
            (function () {
                if (document.getElementById("get-current-year")) {
                    document.getElementById(
                        "get-current-year"
                    ).innerHTML = new Date().getFullYear();
                }
            })();
            /* Function for opning navbar on mobile */
            function toggleNavbar(collapseID) {
                document.getElementById(collapseID).classList.toggle("hidden");
                document.getElementById(collapseID).classList.toggle("block");
            }
        </script>
    </body>
</html>
