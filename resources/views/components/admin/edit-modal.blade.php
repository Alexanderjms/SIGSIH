@props([
    'modalName',
    'title',
    'submitLabel' => 'Guardar Cambios',
    'itemToEdit',
    'maxWidth' => 'max-w-2xl'
])

<x-admin.form-modal 
    :modalName="$modalName" 
    :title="$title" 
    :submitLabel="$submitLabel"
    :maxWidth="$maxWidth">
    <div x-show="{{ $itemToEdit }}" class="space-y-4">
        {{ $slot }}
    </div>
</x-admin.form-modal>
