@extends('layouts.admin')

@section('page-header')
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <!-- Widget: Usuarios -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition-colors">
        <i class="fas fa-users fa-2x text-blue-500 mb-2"></i>
        <div class="text-2xl font-bold">50</div>
        <div class="text-gray-500">Usuarios registrados</div>
    </div>
    <!-- Widget: Empresas -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition-colors">
        <i class="fas fa-building fa-2x text-green-500 mb-2"></i>
        <div class="text-2xl font-bold">20</div>
        <div class="text-gray-500">Empresas activas</div>
    </div>
    <!-- Widget: Órdenes de Servicio -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition-colors">
        <i class="fas fa-file-alt fa-2x text-indigo-500 mb-2"></i>
        <div class="text-2xl font-bold">30</div>
        <div class="text-gray-500">Órdenes de servicio</div>
    </div>
    <!-- Widget: Cotizaciones -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition-colors">
        <i class="fas fa-file-invoice-dollar fa-2x text-pink-500 mb-2"></i>
        <div class="text-2xl font-bold">32</div>
        <div class="text-gray-500">Cotizaciones</div>
    </div>
</div>

<!-- Gráficos -->
<div x-data x-init="
    // Esperar a que el DOM esté listo y renderizar los gráficos
    setTimeout(function() {
        if (window.Chart) {
            const ordenesChartEl = document.getElementById('ordenesChart');
            if (ordenesChartEl) {
                new Chart(ordenesChartEl.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Abiertas', 'En Proceso', 'Cerradas'],
                        datasets: [{
                            data: [20, 18, 16],
                            backgroundColor: ['#6366f1', '#f59e42', '#22c55e']
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { position: 'bottom' } }
                    }
                });
            }
            const cotizacionesChartEl = document.getElementById('cotizacionesChart');
            if (cotizacionesChartEl) {
                new Chart(cotizacionesChartEl.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
                        datasets: [{
                            label: 'Cotizaciones',
                            data: [3, 4, 5, 6, 4, 5, 5],
                            borderColor: '#ec4899',
                            backgroundColor: 'rgba(236,72,153,0.1)',
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { display: false } }
                    }
                });
            }
        }
    }, 100);
" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6 transition-colors">
        <h3 class="text-lg font-bold mb-4">Órdenes por estado</h3>
        <canvas id="ordenesChart" height="120"></canvas>
    </div>
    <div class="bg-white rounded-lg shadow p-6 transition-colors">
        <h3 class="text-lg font-bold mb-4">Cotizaciones por mes</h3>
        <canvas id="cotizacionesChart" height="120"></canvas>
    </div>
</div>

<!-- Tabla de actividad reciente -->
<div class="bg-white rounded-lg shadow p-6 mb-8 transition-colors">
    <h3 class="text-lg font-bold mb-4">Actividad reciente</h3>
    <table class="min-w-full text-sm">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 text-left">Usuario</th>
                <th class="py-2 px-4 text-left">Acción</th>
                <th class="py-2 px-4 text-left">Fecha</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4">Juan Pérez</td>
                <td class="py-2 px-4">Creó una orden de servicio</td>
                <td class="py-2 px-4">2025-07-30 10:12</td>
            </tr>
            <tr>
                <td class="py-2 px-4">Ana López</td>
                <td class="py-2 px-4">Generó una cotización</td>
                <td class="py-2 px-4">2025-07-29 15:45</td>
            </tr>
            <tr>
                <td class="py-2 px-4">Carlos Ruiz</td>
                <td class="py-2 px-4">Cerró una orden de servicio</td>
                <td class="py-2 px-4">2025-07-28 17:30</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Accesos rápidos -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <a href="#"
        class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg p-4 flex flex-col items-center transition">
        <i class="fas fa-file-alt fa-lg mb-2"></i>
        <span>Nueva orden de servicio</span>
    </a>
    <a href="#" class="bg-pink-500 hover:bg-pink-600 text-white rounded-lg p-4 flex flex-col items-center transition">
        <i class="fas fa-file-invoice-dollar fa-lg mb-2"></i>
        <span>Nueva cotización</span>
    </a>
    <a href="#" class="bg-green-500 hover:bg-green-600 text-white rounded-lg p-4 flex flex-col items-center transition">
        <i class="fas fa-building fa-lg mb-2"></i>
        <span>Nueva empresa</span>
    </a>
    <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-4 flex flex-col items-center transition">
        <i class="fas fa-users fa-lg mb-2"></i>
        <span>Nuevo usuario</span>
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection