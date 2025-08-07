@extends('layouts.reporte')

@section('title', 'Reporte de Solicitudes')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="SOLICITUDES" :logoSize="96" />

            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Solicitudes</h2>
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Cliente</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">N° Solicitud ACF</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">N° Solicitud Cliente</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Descripción</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha Creación</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">CLI-001</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">ACF-2025-001</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">SOL-001</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Problema con equipo de red</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-07-01</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Abierta</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Contactos</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Tipo Contacto</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Valor Contacto</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID Persona</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Email</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">contacto@empresa.com</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">PER-001</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
