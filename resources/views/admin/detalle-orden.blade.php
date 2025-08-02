@extends('layouts.admin')

@section('content')
<div>
    <h2 class="text-2xl nunito-bold mb-4">Detalle de Orden de Servicio</h2>
    <div class="bg-white p-6 rounded shadow">
        <p><strong>ID Orden:</strong> {{ $id ?? '1' }}</p>
        <p><strong>ID Solicitud:</strong> 1001</p>
        <p><strong>ID Técnico:</strong> T-001</p>
        <p><strong>Fecha Recepción:</strong> 2025-07-01</p>
        <p><strong>Fecha Inicio:</strong> 2025-07-02</p>
        <p><strong>Fecha Finalización:</strong> 2025-07-05</p>
        <p><strong>Observaciones:</strong> Sin observaciones</p>
        <p><strong>Diagnóstico Técnico:</strong> Diagnóstico técnico ejemplo</p>
        <p><strong>Diagnóstico Cliente:</strong> Diagnóstico cliente ejemplo</p>
        <p><strong>Calificación Servicio:</strong> 5</p>
        <p><strong>ID Cotización:</strong> C-001</p>

        <!-- Botón Generar PDF (no sale al imprimir) -->
        <div class="mt-6 flex gap-4">
            <a href="{{ route('admin.gestion-ordenes') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Volver</a>
            <button type="button" onclick="window.print()"
                class="no-print bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold shadow">
                Generar PDF
            </button>
        </div>
    </div>
</div>

<!-- Agrega esto para ocultar el botón al imprimir -->
<style>
    @media print {
        .no-print {
            display: none !important;
        }

        body {
            background: #fff !important;
        }
    }
</style>
@endsection