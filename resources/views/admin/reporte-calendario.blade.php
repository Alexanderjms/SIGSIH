@extends('layouts.reporte')

@section('title', 'Reporte de Calendario')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="CALENDARIO" :logoSize="96" />
            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Eventos del Calendario</h2>
            <!-- Tabla de Calendario -->
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Título</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha/Hora</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Agencia</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Mantenimiento Servidor Principal</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">10/08/2025 09:00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Agencia Central</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Programado</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Capacitación Personal Técnico</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">15/08/2025 14:00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Agencia Norte</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Confirmado</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">3</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Revisión Equipos de Seguridad</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">20/08/2025 08:30</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Agencia Sur</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Completado</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">4</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Instalación Nuevo Software</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">25/08/2025 10:00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Agencia Central</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Pendiente</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">5</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Reunión Mensual de Evaluación</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">30/08/2025 16:00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Agencia Central</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Programado</td>
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
