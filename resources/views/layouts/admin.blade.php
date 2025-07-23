<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    @include('partials.admin-header')
    <div class="flex flex-1">
        @include('partials.admin-sidebar')
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
    @include('partials.admin-footer')
    @livewireScripts
</body>
</html>
