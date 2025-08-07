@extends('layouts.reporte')

@section('title', 'Reporte de Configuración de Accesos')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="CONFIGURACION DE ACCESOS AL SISTEMA"
                :logoSize="96" />


            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Configuración Completa de Accesos al Sistema
            </h2>

            <!-- Resumen General -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
                    <div class="text-2xl nunito-bold text-blue-700 mb-2">4</div>
                    <div class="text-sm nunito-bold text-blue-600">ROLES TOTALES</div>
                </div>
                <div class="bg-green-50 border border-green-200 rounded-lg p-4 text-center">
                    <div class="text-2xl nunito-bold text-green-700 mb-2">4</div>
                    <div class="text-sm nunito-bold text-green-600">OBJETOS DEL SISTEMA</div>
                </div>
                <div class="bg-orange-50 border border-orange-200 rounded-lg p-4 text-center">
                    <div class="text-2xl nunito-bold text-orange-700 mb-2">4</div>
                    <div class="text-sm nunito-bold text-orange-600">USUARIOS CON ROLES</div>
                </div>
            </div>

            <!-- Sección 1: Gestión de Roles y Permisos -->
            <div class="mb-6">
                <h3 class="text-lg nunito-bold text-gray-800 mb-3">1. GESTIÓN DE ROLES Y PERMISOS</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ROL
                                </th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">
                                    DESCRIPCIÓN</th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">
                                    PERMISOS</th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">OBJETO
                                </th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">CREADO
                                    POR</th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">FECHA
                                    CREACIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Administrador</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Acceso total a todas las
                                    pantallas</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Crear, Editar, Eliminar, Ver
                                </td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Dashboard</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-30 10:00:00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Soporte</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Gestión de tickets y
                                    reportes</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Ver, Editar, Crear</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Tickets</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-29 09:30:00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Supervisor</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Supervisión de reportes y
                                    facturación</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Ver, Editar</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Reportes</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-28 08:15:00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Cliente</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Solo lectura de sus tickets
                                    y facturas</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Ver</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Facturación</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-27 08:15:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sección 2: Lista de Roles -->
            <div class="mb-6">
                <h3 class="text-lg nunito-bold text-gray-800 mb-3">2. LISTA DE ROLES</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ROL
                                </th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">
                                    DESCRIPCIÓN</th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">CREADO
                                    POR</th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">FECHA
                                    DE CREACIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Administrador</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Acceso total a todas las
                                    pantallas</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-30 10:00:00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Soporte</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Gestión de tickets y
                                    reportes</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-29 09:30:00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Supervisor</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Supervisión de reportes y
                                    facturación</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-28 08:15:00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Cliente</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Solo lectura de sus tickets
                                    y facturas</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-27 08:15:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sección 3: Asignación de Roles a Usuarios -->
            <div class="mb-6">
                <h3 class="text-lg nunito-bold text-gray-800 mb-3">3. ASIGNACIÓN DE ROLES A USUARIOS</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">USUARIO
                                </th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ROL
                                    ASIGNADO</th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">CREADO
                                    POR</th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">FECHA
                                    DE CREACIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">juan.perez</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Administrador</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-30 10:00:00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">ana.lopez</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Soporte</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-29 09:30:00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">carlos.mendez</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Supervisor</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-28 08:15:00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">cliente1</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Cliente</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-27 08:15:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sección 4: Objetos del Sistema -->
            <div class="mb-6">
                <h3 class="text-lg nunito-bold text-gray-800 mb-3">4. OBJETOS DEL SISTEMA</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">NOMBRE
                                </th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">
                                    DESCRIPCIÓN</th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">TIPO
                                </th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">CREADO
                                    POR</th>
                                <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">FECHA
                                    CREACIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Dashboard</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Pantalla principal con
                                    resumen del sistema</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">General</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-30</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Tickets</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Pantalla para gestión y
                                    seguimiento de tickets</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Operativa</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-29</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Reportes</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Pantalla para generación y
                                    consulta de reportes</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Analítica</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-28</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Facturación</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Pantalla para gestión de
                                    facturas y pagos</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">Financiera</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">admin</td>
                                <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-27</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Resumen Final -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mt-6">
                <h3 class="text-lg nunito-bold text-gray-800 mb-3">RESUMEN EJECUTIVO</h3>
                <div class="text-sm nunito-regular text-gray-700 space-y-2">
                    <p><strong>Total de elementos configurados:</strong></p>
                    <ul class="list-disc list-inside ml-4 space-y-1">
                        <li><strong>4 Roles</strong> definidos con diferentes niveles de acceso (Administrador, Soporte,
                            Supervisor, Cliente)</li>
                        <li><strong>4 Objetos del sistema</strong> categorizados por funcionalidad</li>
                        <li><strong>4 Usuarios</strong> con roles asignados activos</li>
                    </ul>
                    <p class="mt-3"><strong>Distribución de permisos:</strong> El sistema cuenta con una estructura de
                        permisos granular que permite control específico sobre las funcionalidades disponibles para cada
                        rol, garantizando la seguridad y el acceso apropiado según el nivel de responsabilidad del
                        usuario.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection