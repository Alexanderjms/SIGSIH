@props([
    'href',
    'active' => false
])

<a href="{{ $href }}"
   @click.prevent="$store.navigation.navigate('{{ $href }}')"
   {{ $attributes->merge(['class' => "sidebar-link flex items-center gap-2 py-2 px-4 rounded transition-colors " . ($active ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400')]) }}>
   {{ $slot }}
</a>
