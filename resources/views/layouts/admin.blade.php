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

<body :class="{ 'theme-dark': dark }" x-data="data()">
    <x-alert />
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('admin.partials.sidebar')
        <div class="flex flex-col flex-1 w-full overflow-hidden">
            @include('admin.partials.header')
            <main class="h-full overflow-y-auto bg-gray-100 dark:bg-gray-900">
                <div class="container p-6 mx-auto min-h-screen">
                    {{ $slot }}
                </div>
                @include('admin.partials.footer')
            </main>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        var flatpickrConfig = {
            dateTimePicker: {
                enableTime: true,
                dateFormat: '{{ config('dateFormat.date_format') . ' ' . config('dateFormat.time_format') }}',
            },
            datePicker: {
                dateFormat: '{{ config('dateFormat.date_format') }}',
            },
        };
        function selectSubmit (e) {
            e.target.closest('form').submit();
        }
        function deleteSelected($dispatch, url, ids) {
            axios.post(url, {_method: 'DELETE', ids})
                .then(({data}) => {
                    $dispatch('notice', {type: 'success', text: data.success_message})
                })
                .catch(error => {
                    console.error(error);
                    $dispatch('notice', {type: 'error', text: 'Something is wrong!'})
                });
        }
        function data() {
            function getThemeFromLocalStorage() {
                // if user already changed the theme, use it
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }

                // else return their preferences
                return (
                    !!window.matchMedia &&
                    window.matchMedia('(prefers-color-scheme: dark)').matches
                )
            }

            function setThemeToLocalStorage(value) {
                window.localStorage.setItem('dark', value)
            }


            return {
                dark: getThemeFromLocalStorage(),
                toggleTheme() {
                    this.dark = !this.dark
                    setThemeToLocalStorage(this.dark)
                },
                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false
                },
                isPagesMenuOpen: false,
                togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen
                },
                // Modal
                isModalOpen: false,
                trapCleanup: null,
                openModal() {
                    this.isModalOpen = true
                    this.trapCleanup = focusTrap(document.querySelector('#modal'))
                },
                closeModal() {
                    this.isModalOpen = false
                    this.trapCleanup()
                },
            }
        }
    </script>
</body>

</html>
