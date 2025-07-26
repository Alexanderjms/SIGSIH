@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Productos</h1>
    <div class="bg-white rounded shadow p-4">
        <input type="text" placeholder="Buscar producto..." class="border rounded px-3 py-2 mb-4 w-full">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">#</th>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Categoría</th>
                    <th class="py-2 px-4 border-b">Precio</th>
                    <th class="py-2 px-4 border-b">Stock</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">1</td>
                    <td class="py-2 px-4 border-b">Producto Ejemplo</td>
                    <td class="py-2 px-4 border-b">General</td>
                    <td class="py-2 px-4 border-b">$100.00</td>
                    <td class="py-2 px-4 border-b">50</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
