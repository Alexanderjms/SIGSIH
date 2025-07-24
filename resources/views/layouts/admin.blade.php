<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/sidebar.js'])
    @livewireStyles
</head>
<body class="bg-gray-900 min-h-screen flex flex-col">
    <div class="flex flex-1 min-h-0">
        @include('partials.admin-sidebar')
        <main class="flex-1 p-6 overflow-auto bg-white text-gray-900">
            @hasSection('page-header')
                <div class="bg-white p-4 rounded shadow mb-6">
                    @yield('page-header')
                </div>
            @endif
            <div class="bg-white p-6 rounded-lg shadow">
                @yield('content')
            </div>
        </main>
    </div>
    @livewireScripts
</body>
</html>
