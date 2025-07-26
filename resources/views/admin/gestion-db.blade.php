@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Gestión de Base de Datos</h1>
    <div class="bg-white rounded shadow p-4">
        <input type="text" placeholder="Buscar acción..." class="border rounded px-3 py-2 mb-4 w-full">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">#</th>
                    <th class="py-2 px-4 border-b">Acción</th>
                    <th class="py-2 px-4 border-b">Usuario</th>
                    <th class="py-2 px-4 border-b">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">1</td>
                    <td class="py-2 px-4 border-b">Respaldo realizado</td>
                    <td class="py-2 px-4 border-b">Admin</td>
                    <td class="py-2 px-4 border-b">2025-07-26 12:00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
