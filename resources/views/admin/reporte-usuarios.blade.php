@extends('layouts.reporte')

@section('title', 'Reporte de Usuarios')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="Usuarios" :logoSize="96" />
            
            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Usuarios</h2>
            
            <!-- Tabla de datos -->
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Nombre</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Usuario</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Correo</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Estado</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha Creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">001</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Juan Pérez</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">jperez</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">juan.perez@example.com</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">30/07/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">002</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Ana López</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">alopez</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">ana.lopez@example.com</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">25/07/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">003</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Carlos Ruiz</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">cruiz</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">carlos.ruiz@example.com</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-red-700 nunito-bold">Inactivo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">20/07/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">004</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">María Torres</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">mtorres</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">maria.torres@example.com</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">18/07/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">005</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Pedro Gómez</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">pgomez</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">pedro.gomez@example.com</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-red-700 nunito-bold">Inactivo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">15/07/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">006</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Lucía Fernández</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">lfernandez</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">lucia.fernandez@example.com</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">10/07/2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Resumen simple -->
            <div class="mt-6 p-4 bg-gray-50 rounded">
                <div class="flex justify-center gap-8 text-sm">
                    <div class="text-center">
                        <span class="nunito-bold text-gray-700">Total: </span>
                        <span class="nunito-regular">6 usuarios</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-green-700">Activos: </span>
                        <span class="nunito-regular">4</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-red-700">Inactivos: </span>
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
@endsection
