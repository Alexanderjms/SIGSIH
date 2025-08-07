@extends('layouts.reporte')

@section('title', 'Reporte de CAI')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="CAI" :logoSize="96" />
            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de CAI Registrados</h2>
            <!-- Tabla de CAI -->
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">CAI</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Rango Inicial</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Rango Final</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha Autorización</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha Vencimiento</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">CAI-987654321</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">0001-000-01-00000001</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">0001-000-01-00001000</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-01</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-12-31</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Activo</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">CAI-123456789</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">0002-000-01-00001001</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">0002-000-01-00002000</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-01-01</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-06-30</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Vencido</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Botones de acción -->
            <div class="mt-6 flex justify-center gap-4 no-print">
                <button onclick="window.print()" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg nunito-bold transition">
                    <i class="fas fa-print mr-2"></i>Imprimir
                </button>
                <button onclick="window.close()" 
                        class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg nunito-bold transition">
                    <i class="fas fa-times mr-2"></i>Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
