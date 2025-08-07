@extends('layouts.reporte')

@section('title', 'Reporte de Bitácora')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="BITACORA" :logoSize="96" />
            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Registro de Eventos del Sistema</h2>
            <!-- Tabla de Bitácora -->
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha Evento</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Usuario</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Objeto</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Acción</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Descripción</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Creado por</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-08-07 10:00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">usuarios</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Login</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Inicio de sesión exitoso</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-08-07 09:30</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">soporte</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">roles</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Insertar</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Creación de nuevo rol</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">soporte</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">3</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-08-06 15:45</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">facturas</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Actualizar</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Modificación de factura #0001</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">4</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-08-06 14:20</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">soporte</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">tickets</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Eliminar</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Eliminación de ticket #TK-001</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">soporte</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">5</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-08-05 11:15</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">empresas</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Insertar</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Registro de nueva empresa</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
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
