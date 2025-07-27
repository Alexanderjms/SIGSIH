<div class="bg-white rounded-lg shadow p-6 mb-8">
    <div
        class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b border-gray-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ $titulo }}
        </h2>
        <div class="flex flex-col sm:flex-row gap-2 flex-1 md:ml-6 justify-start">
            {{ $filtros }}
        </div>
        @isset($boton)
        <div class="ml-auto">
            {{ $boton }}
        </div>
        @endisset
    </div>
    <div>
        {{ $slot }}
    </div>
</div>