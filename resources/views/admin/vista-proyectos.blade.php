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
       <div class="bg-transparent items-center justify-center flex">
        <button class="flex items-center gap-2 px-6 py-2 border-2 border-emerald-500 rounded-md text-emerald-500 nunito-bold text-sm hover:bg-emerald-500 hover:text-white transition-colors duration-300 w-full min-w-[170px] justify-center">
            <i class="fas fa-file-pdf"></i>
            Generar PDF
        </button>
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
        <div class="bg-white rounded-lg shadow p-6">
            <table class="min-w-full text-sm border-collapse border border-gray-600">
                <thead class="bg-gray-100 nunito-bold">
                    <tr>
                        <th class="py-2 px-4 text-left border border-gray-600">Nombre</th>
                        <th class="py-2 px-4 text-left border border-gray-600">Fecha</th>
                        <th class="py-2 px-4 text-left border border-gray-600">Monto</th>
                        <th class="py-2 px-4 text-left border border-gray-600">Categoría</th>
                        <th class="py-2 px-4 text-left border border-gray-600">Descripción</th>
                        <th class="py-2 px-4 text-left border border-gray-600">Movimiento</th>
                    </tr>
                </thead>
                <tbody class="nunito-regular">
                    <tr class="bg-emerald-300">
                        <td class="py-2 px-4 border border-gray-600">Pago inicial</td>
                        <td class="py-2 px-4 border border-gray-600">2025-07-20</td>
                        <td class="py-2 px-4 border border-gray-600">L. 15,000.00</td>
                        <td class="py-2 px-4 border border-gray-600">Ingreso</td>
                        <td class="py-2 px-4 border border-gray-600">Primer pago del Proyecto Alpha</td>
                        <td class="py-2 px-4 border border-gray-600">Ingreso</td>
                    </tr>
                    <tr class="bg-slate-400">
                        <td class="py-2 px-4 border border-gray-600">Compra de software</td>
                        <td class="py-2 px-4 border border-gray-600">2025-07-22</td>
                        <td class="py-2 px-4 border border-gray-600">L. 5,500.00</td>
                        <td class="py-2 px-4 border border-gray-600">Gasto</td>
                        <td class="py-2 px-4 border border-gray-600">Licencias de software de desarrollo</td>
                        <td class="py-2 px-4 border border-gray-600">Gasto</td>
                    </tr>
                    <tr class="bg-emerald-300">
                        <td class="py-2 px-4 border border-gray-600">Segundo pago</td>
                        <td class="py-2 px-4 border border-gray-600">2025-07-25</td>
                        <td class="py-2 px-4 border border-gray-600">L. 14,230.00</td>
                        <td class="py-2 px-4 border border-gray-600">Ingreso</td>
                        <td class="py-2 px-4 border border-gray-600">Segundo pago del Proyecto Beta</td>
                        <td class="py-2 px-4 border border-gray-600">Ingreso</td>
                    </tr>
                     <tr class="bg-slate-400">
                        <td class="py-2 px-4 border border-gray-600">Alquiler de oficina</td>
                        <td class="py-2 px-4 border border-gray-600">2025-07-26</td>
                        <td class="py-2 px-4 border border-gray-600">L. 10,483.00</td>
                        <td class="py-2 px-4 border border-gray-600">Gasto</td>
                        <td class="py-2 px-4 border border-gray-600">Pago de alquiler mensual</td>
                        <td class="py-2 px-4 border border-gray-600">Gasto</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
