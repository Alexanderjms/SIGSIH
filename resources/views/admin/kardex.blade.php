@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Kardex</h1>
    <div class="bg-white rounded shadow p-4">
        <input type="text" placeholder="Buscar movimiento..." class="border rounded px-3 py-2 mb-4 w-full">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">#</th>
                    <th class="py-2 px-4 border-b">Producto</th>
                    <th class="py-2 px-4 border-b">Fecha</th>
                    <th class="py-2 px-4 border-b">Tipo</th>
                    <th class="py-2 px-4 border-b">Cantidad</th>
                    <th class="py-2 px-4 border-b">Saldo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">1</td>
                    <td class="py-2 px-4 border-b">Producto Ejemplo</td>
                    <td class="py-2 px-4 border-b">2025-07-26</td>
                    <td class="py-2 px-4 border-b">Entrada</td>
                    <td class="py-2 px-4 border-b">10</td>
                    <td class="py-2 px-4 border-b">60</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
