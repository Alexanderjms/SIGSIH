@extends('layouts.reporte')

@section('title', 'Reporte de Movimientos (Kardex)')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="Kardex" :logoSize="96" />
            
            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Movimientos</h2>
            
            <!-- Tabla de datos -->
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID Kardex</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID Producto</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Tipo Movimiento</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Cantidad</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha Movimiento</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Motivo</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID Técnico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo de datos, reemplazar por datos reales -->
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">101</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Entrada</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">10</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-26</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Inventario inicial</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">5</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">102</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Salida</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">3</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-08-01</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Venta</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">4</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Resumen simple -->
            <div class="mt-6 p-4 bg-gray-50 rounded">
                <div class="flex justify-center gap-8 text-sm">
                    <div class="text-center">
                        <span class="nunito-bold text-gray-700">Total movimientos: </span>
                        <span class="nunito-regular">2</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-green-700">Entradas: </span>
                        <span class="nunito-regular">1</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-red-700">Salidas: </span>
                        <span class="nunito-regular">1</span>
                    </div>
                </div>
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
<!-- Estilos para impresión -->
<style>
    @media print {
        .no-print {
            display: none !important;
        }
        body {
            background: white !important;
        }
        .shadow-sm {
            box-shadow: none !important;
        }
        table {
            page-break-inside: auto;
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
    }
    @page {
        size: landscape;
        margin: 1cm;
    }
</style>
@endsection
