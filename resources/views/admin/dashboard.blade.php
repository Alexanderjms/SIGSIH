@extends('layouts.admin')

@section('page-header')
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Widget: Usuarios -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition-colors">
        <i class="fas fa-users fa-2x text-blue-500 mb-2"></i>
        <div class="text-2xl font-bold">1,245</div>
        <div class="text-gray-500">Usuarios registrados</div>
    </div>
    <!-- Widget: Empresas -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition-colors">
        <i class="fas fa-building fa-2x text-green-500 mb-2"></i>
        <div class="text-2xl font-bold">87</div>
        <div class="text-gray-500">Empresas activas</div>
    </div>
    <!-- Widget: Tickets -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition-colors">
        <i class="fas fa-ticket-alt fa-2x text-yellow-500 mb-2"></i>
        <div class="text-2xl font-bold">312</div>
        <div class="text-gray-500">Tickets abiertos</div>
    </div>
</div>

<!-- Gráficos -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6 transition-colors">
        <h3 class="text-lg font-bold mb-4">Usuarios por mes</h3>
        <canvas id="usersChart" height="120"></canvas>
    </div>
    <div class="bg-white rounded-lg shadow p-6 transition-colors">
        <h3 class="text-lg font-bold mb-4">Tickets por estado</h3>
        <canvas id="ticketsChart" height="120"></canvas>
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
                <td class="py-2 px-4">Creó una empresa</td>
                <td class="py-2 px-4">2025-07-24 09:12</td>
            </tr>
            <tr>
                <td class="py-2 px-4">Ana López</td>
                <td class="py-2 px-4">Cerró un ticket</td>
                <td class="py-2 px-4">2025-07-24 08:45</td>
            </tr>
            <tr>
                <td class="py-2 px-4">Carlos Ruiz</td>
                <td class="py-2 px-4">Actualizó su perfil</td>
                <td class="py-2 px-4">2025-07-23 17:30</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Accesos rápidos -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-4 flex flex-col items-center transition">
        <i class="fas fa-user-plus fa-lg mb-2"></i>
        <span>Nuevo usuario</span>
    </a>
    <a href="#" class="bg-green-500 hover:bg-green-600 text-white rounded-lg p-4 flex flex-col items-center transition">
        <i class="fas fa-building fa-lg mb-2"></i>
        <span>Nueva empresa</span>
    </a>
    <a href="#"
        class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg p-4 flex flex-col items-center transition">
        <i class="fas fa-ticket-alt fa-lg mb-2"></i>
        <span>Nuevo ticket</span>
    </a>
    <a href="#"
        class="bg-purple-500 hover:bg-purple-600 text-white rounded-lg p-4 flex flex-col items-center transition">
        <i class="fas fa-chart-bar fa-lg mb-2"></i>
        <span>Ver reportes</span>
    </a>
</div>

<!-- Script para los gráficos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const usersChart = document.getElementById('usersChart').getContext('2d');
    new Chart(usersChart, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Usuarios',
                data: [120, 150, 180, 200, 250, 300, 350],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59,130,246,0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    const ticketsChart = document.getElementById('ticketsChart').getContext('2d');
    new Chart(ticketsChart, {
        type: 'doughnut',
        data: {
            labels: ['Abiertos', 'En Proceso', 'Cerrados'],
            datasets: [{
                data: [120, 80, 112],
                backgroundColor: ['#f59e42', '#3b82f6', '#22c55e']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection