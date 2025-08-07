@extends('layouts.reporte')

@section('title', 'Reporte de Empresas')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="EMPRESAS" :logoSize="96" />

            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Empresas Cliente</h2>

            <!-- Tabla de Empresas Cliente -->
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha Registro</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Nombre Empresa</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Dirección</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Oficina</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2025-08-03</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Empresa Ejemplo</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Av. Principal 123</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Oficina Central</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Empresas Registradas</h2>
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Nombre Empresa</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Descripción</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Empresa Registrada 1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Desc 1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Activo</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Empresa Registrada 2</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Desc 2</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Inactivo</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Oficinas de Empresa</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ID Oficina</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Nombre Oficina</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">1</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Oficina Central</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">2</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Sucursal Norte</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">3</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Sucursal Sur</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
