@props([
    'href' => '#',
    'active' => false,
    'viewName'
])

@php
    // Construir la URL real basada en el viewName
    $realHref = $href === '#' ? route('admin.' . $viewName) : $href;
    
    // Determinar si este enlace está activo
    $isActive = $active || App\Helpers\SpaHelper::isActive($viewName);
@endphp

<a href="{{ $realHref }}"
   @click.prevent="$store.navigation.navigate('{{ $realHref }}', '{{ $viewName }}')"
   {{ $attributes->merge(['class' => "sidebar-link flex items-center gap-2 py-2 px-4 rounded transition-colors " . ($isActive ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400')]) }}>
   {{ $slot }}
</a>
