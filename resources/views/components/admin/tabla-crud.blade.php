<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow p-6 mb-8']) }}>
    <div
        class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b border-gray-200 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 w-full">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ $titulo }}
        </h2>
        <div class="flex flex-col sm:flex-row flex-wrap gap-2 flex-1 lg:ml-6">
            {{ $filtros }}
        </div>
        <div class="w-full lg:w-auto">
            {{ $boton }}
        </div>
    </div>
    <div>
        {{ $slot }}
    </div>
</div>