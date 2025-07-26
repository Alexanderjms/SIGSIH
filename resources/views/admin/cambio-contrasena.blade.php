@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Cambio de contraseña</h1>
    <div class="bg-white rounded shadow p-4 max-w-md mx-auto">
        <form>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Contraseña actual</label>
                <input type="password" class="border rounded px-3 py-2 w-full" placeholder="Contraseña actual">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nueva contraseña</label>
                <input type="password" class="border rounded px-3 py-2 w-full" placeholder="Nueva contraseña">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Confirmar nueva contraseña</label>
                <input type="password" class="border rounded px-3 py-2 w-full" placeholder="Confirmar nueva contraseña">
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Guardar cambios</button>
        </form>
    </div>
</div>
@endsection
