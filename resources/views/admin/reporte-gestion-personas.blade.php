@extends('layouts.reporte')

@section('title', 'Reporte de Gestión de Personas')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-7xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="GESTION DE PERSONAS" :logoSize="96" />
            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Personas Registradas</h2>
            <!-- Tabla de Gestión de Personas -->
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Primer Nombre</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Segundo Nombre</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Primer Apellido</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Segundo Apellido</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">DNI</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Cargo</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Tipo</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Género</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Perfil</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">001</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Juan</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Carlos</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Pérez</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Gómez</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">12345678</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Analista</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Administrador</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Masculino</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Administrador</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">jgomez</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">002</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">María</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Elena</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">López</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Martínez</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">87654321</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Gerente</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Empleado</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Femenino</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Gerencia</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">mlopez</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">003</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Roberto</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">José</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Hernández</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Silva</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">11223344</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Desarrollador</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Empleado</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Masculino</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Técnico</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">rhernandez</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">004</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Ana</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Sofía</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Rodríguez</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Torres</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">55667788</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Contadora</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Empleado</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Femenino</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Finanzas</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">arodriguez</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">005</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Luis</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Alberto</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">García</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Mendoza</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">99887766</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Consultor</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Cliente</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Masculino</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Cliente</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">lgarcia</td>
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
