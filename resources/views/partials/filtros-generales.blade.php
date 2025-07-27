@props([
'searchModel' => 'search',
'filtrosSelect' => [], // clave => ['label' => 'Texto bonito', 'options' => [...] ]
'ordenarOptions' => [], // ['campo' => 'Nombre bonito']
])

<input type="text" x-model="{{ $searchModel }}" placeholder="Buscar..."
    class="border rounded px-3 py-2 text-sm w-full sm:w-48" />

@foreach ($filtrosSelect as $variable => $data)
<select x-model="{{ $variable }}" class="border rounded px-3 py-2 text-sm w-full sm:w-40">
    <option value="">{{ 'Todos los ' . strtolower($data['label']) }}</option>
    @foreach ($data['options'] as $opcion)
    <option value="{{ $opcion }}">{{ $opcion }}</option>
    @endforeach
</select>
@endforeach

<select x-model="ordenarPor" class="border rounded px-3 py-2 text-sm w-full sm:w-44">
    @foreach ($ordenarOptions as $valor => $texto)
    <option value="{{ $valor }}">Ordenar por {{ $texto }}</option>
    @endforeach
</select>