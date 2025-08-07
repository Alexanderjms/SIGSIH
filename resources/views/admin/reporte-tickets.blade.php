
@extends('layouts.reporte')

@section('title', 'Reporte de Tickets')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="TICKETS" :logoSize="96" />
            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Tickets</h2>
            <!-- Tabla de Tickets -->
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Cliente</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Empresa Ejemplo S.A.</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">26/07/2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Pendiente</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Bac Credomatic</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">27/07/2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">En proceso</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">3</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Ficohsa</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">28/07/2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Finalizado</td>
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
