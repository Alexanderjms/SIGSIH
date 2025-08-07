@extends('layouts.reporte')

@section('title', 'Reporte de Parámetros')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="PARÁMETROS" :logoSize="96" />
            
            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Parámetros del Sistema</h2>
            
            <!-- Tabla de datos -->
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Categoría</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Parámetro</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Valor</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Descripción</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Estado</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Última Modificación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Sistema</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">TIEMPO_SESION</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">3600</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Tiempo de sesión en segundos</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">05/08/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Notificaciones</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">EMAIL_SERVIDOR</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">smtp.gmail.com</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Servidor SMTP para envío de correos</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">03/08/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Notificaciones</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">EMAIL_PUERTO</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">587</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Puerto SMTP para envío de correos</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">03/08/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Seguridad</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">INTENTOS_LOGIN</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">5</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Máximo de intentos de inicio de sesión</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">01/08/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Seguridad</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">BLOQUEO_TIEMPO</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">900</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Tiempo de bloqueo en segundos</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">01/08/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Archivos</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">MAX_UPLOAD_SIZE</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">10485760</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Tamaño máximo de archivo en bytes (10MB)</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">30/07/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Archivos</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">TIPOS_PERMITIDOS</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">pdf,doc,docx,jpg,png</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Tipos de archivo permitidos</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-green-700 nunito-bold">Activo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">30/07/2025</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Mantenimiento</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">MODO_MANTENIMIENTO</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">false</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Activar/desactivar modo mantenimiento</td>
                            <td class="border border-gray-300 py-2 px-3 text-center">
                                <span class="text-red-700 nunito-bold">Inactivo</span>
                            </td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">25/07/2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Resumen simple -->
            <div class="mt-6 p-4 bg-gray-50 rounded">
                <div class="flex justify-center gap-8 text-sm">
                    <div class="text-center">
                        <span class="nunito-bold text-gray-700">Total: </span>
                        <span class="nunito-regular">8 parámetros</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-green-700">Activos: </span>
                        <span class="nunito-regular">7</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-red-700">Inactivos: </span>
                        <span class="nunito-regular">1</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-blue-700">Categorías: </span>
                        <span class="nunito-regular">5</span>
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
