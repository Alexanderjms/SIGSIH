@props([
'texto' => 'Agregar',
'ruta' => '#',
'onclick' => null,
])

<a href="{{ $ruta }}" @if ($onclick) onclick="{{ $onclick }}" @endif
    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold transition whitespace-nowrap">
    {{ $texto }}
</a>