@extends('layouts.reporte')

@section('title', 'Reporte Genérico')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo ?? 'GENERAL'" titulo="REPORTE GENÉRICO" :logoSize="96" />
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Este es un reporte genérico de ejemplo.</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Campo</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Cotización</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">{{ $cotizacion ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Módulo</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">{{ $modulo ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Fecha</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">{{ $fecha ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
