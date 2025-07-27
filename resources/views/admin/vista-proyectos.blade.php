@extends('layouts.admin')

@section('content')

<div class="container mx-auto space-y-6">
    {{-- Header con navegación de proyecto y botón de nuevo proyecto --}}
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <button class="p-2 rounded hover:bg-gray-200"><i class="fas fa-chevron-left"></i></button>
            <h2 class="text-xl nunito-bold">Proyecto BAC</h2>
            <button class="p-2 rounded hover:bg-gray-200"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
    {{-- Tarjetas de estadísticas --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 nunito-bold">
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm text-gray-500">Ingresos</p>
            <p class="text-lg font-semibold">L. 29,230.00</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm text-gray-500">Gastos</p>
            <p class="text-lg font-semibold">L. 15,983.00</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm text-gray-500">Balance</p>
            <p class="text-lg font-semibold">L. 13,247.00</p>
        </div>
    </div>

    {{-- Tabla de Movimientos --}}
    <div class="overflow-x-auto mt-6">
        <div class="rounded-xl bg-white shadow-sm">
            <table class="min-w-full border-collapse border border-black">
                <thead class="bg-blue-200 text-blue-500 nunito-bold">
                    <tr>
                        <th class="border border-gray-500 px-4 py-3 text-left tracking-wider">Nombre</th>
                        <th class="border border-gray-500 px-4 py-3 text-left tracking-wider">Fecha</th>
                        <th class="border border-gray-500 px-4 py-3 text-left tracking-wider">Monto</th>
                        <th class="border border-gray-500 px-4 py-3 text-left tracking-wider">Categoría</th>
                        <th class="border border-gray-500 px-4 py-3 text-left tracking-wider">Descripción</th>
                        <th class="border border-gray-500 px-4 py-3 text-left tracking-wider">Movimiento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-blue-100 text-sm text-black nunito-regular">
                        <td class="border border-gray-500 px-4 py-3">Pago inicial</td>
                        <td class="border border-gray-500 px-4 py-3">2025-07-20</td>
                        <td class="border border-gray-500 px-4 py-3">L. 15,000.00</td>
                        <td class="border border-gray-500 px-4 py-3">Ingreso</td>
                        <td class="border border-gray-500 px-4 py-3">Primer pago del Proyecto Alpha</td>
                        <td class="border border-gray-500 px-4 py-3">Ingreso</td>
                    </tr>
                    <tr class="bg-red-400 text-sm text-black nunito-regular">
                        <td class="border border-gray-500 px-4 py-3">Compra de software</td>
                        <td class="border border-gray-500 px-4 py-3">2025-07-22</td>
                        <td class="border border-gray-500 px-4 py-3">L. 5,500.00</td>
                        <td class="border border-gray-500 px-4 py-3">Gasto</td>
                        <td class="border border-gray-500 px-4 py-3">Licencias de software de desarrollo</td>
                        <td class="border border-gray-500 px-4 py-3">Gasto</td>
                    </tr>
                    <tr class="bg-blue-100 text-sm text-black nunito-regular">
                        <td class="border border-gray-500 px-4 py-3">Segundo pago</td>
                        <td class="border border-gray-500 px-4 py-3">2025-07-25</td>
                        <td class="border border-gray-500 px-4 py-3">L. 14,230.00</td>
                        <td class="border border-gray-500 px-4 py-3">Ingreso</td>
                        <td class="border border-gray-500 px-4 py-3">Segundo pago del Proyecto Beta</td>
                        <td class="border border-gray-500 px-4 py-3">Ingreso</td>
                    </tr>
                     <tr class="bg-red-400 text-sm text-black nunito-regular">
                        <td class="border border-gray-500 px-4 py-3">Alquiler de oficina</td>
                        <td class="border border-gray-500 px-4 py-3">2025-07-26</td>
                        <td class="border border-gray-500 px-4 py-3">L. 10,483.00</td>
                        <td class="border border-gray-500 px-4 py-3">Gasto</td>
                        <td class="border border-gray-500 px-4 py-3">Pago de alquiler mensual</td>
                        <td class="border border-gray-500 px-4 py-3">Gasto</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
