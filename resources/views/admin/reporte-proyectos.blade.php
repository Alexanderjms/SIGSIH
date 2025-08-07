@extends('layouts.reporte')

@section('title', 'Reporte de Proyectos')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="Proyectos" :logoSize="96" />

            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Proyectos</h2>

            <!-- Tabla de datos -->
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Nombre</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha Inicial</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha Fin Estimada</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha Fin Real</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Descripción</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Actividades</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Orden de Servicio</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo de datos, reemplazar por datos reales -->
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Proyecto Alpha</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-01-15</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-30</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-29</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Implementación inicial del sistema</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">5 tareas</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">OS-00123</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Finalizado</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Proyecto Beta</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-02-01</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-08-20</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">-</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Planificación y diseño preliminar</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">3 tareas</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">OS-00124</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">En Proceso</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Resumen simple -->
            <div class="mt-6 p-4 bg-gray-50 rounded">
                <div class="flex justify-center gap-8 text-sm">
                    <div class="text-center">
                        <span class="nunito-bold text-gray-700">Total proyectos: </span>
                        <span class="nunito-regular">2</span>
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