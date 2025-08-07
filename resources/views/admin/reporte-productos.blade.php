@extends('layouts.reporte')

@section('title', 'Reporte de Productos')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="Productos" :logoSize="96" />

            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Productos</h2>

            <!-- Botón de generar PDF -->


            <!-- Tabla de datos -->
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Nombre</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Categoría</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Precio</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo de datos, reemplazar por datos reales -->
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">001</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Laptop HP 15</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Computadoras</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 18,000.00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">10</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">002</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Mouse Logitech</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Accesorios</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 350.00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">25</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">003</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Router TP-Link</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Redes</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 1,200.00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">0</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">004</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Impresora Epson</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Impresoras</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 4,500.00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">5</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Resumen simple -->
            <div class="mt-6 p-4 bg-gray-50 rounded">
                <div class="flex justify-center gap-8 text-sm">
                    <div class="text-center">
                        <span class="nunito-bold text-gray-700">Total: </span>
                        <span class="nunito-regular">4 productos</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-green-700">En stock: </span>
                        <span class="nunito-regular">3</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-red-700">Agotados: </span>
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