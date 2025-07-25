<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/global.css', 'resources/js/sidebar.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.plugin(collapse)
        });

        function collapse(Alpine) {
            Alpine.directive('collapse', (el, {
                expression
            }, {
                effect,
                evaluateLater
            }) => {
                let duration = 200;
                el.style.height = '0px';
                el.style.overflow = 'hidden';
                el.style.transitionProperty = 'height';
                el.style.transitionDuration = `${duration}ms`;
                el.style.transitionTimingFunction = 'ease-in-out';

                effect(() => {
                    let show = evaluateLater(expression);
                    show(value => {
                        if (value) {
                            el.style.height = el.scrollHeight + 'px';
                        } else {
                            el.style.height = '0px';
                        }
                    });
                });
            });
        }
    </script>
    @livewireStyles
</head>

<body class="bg-gray-900 min-h-screen flex flex-col" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen min-h-0">
        @include('partials.admin-sidebar')

        <main class="flex-1 p-6 overflow-y-auto h-screen bg-white text-gray-900">
            @include('partials.admin-header')
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