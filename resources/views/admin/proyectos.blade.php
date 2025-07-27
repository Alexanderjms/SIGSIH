@extends('layouts.admin')

@section('content')
<div class="container mx-auto space-y-6">
    {{-- Header con navegación de proyecto y botón de nuevo proyecto --}}
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <button class="p-2 rounded hover:bg-gray-200"><i class="fas fa-chevron-left"></i></button>
            <h2 class="text-xl nunito-bold">Proyecto Beta</h2>
            <button class="p-2 rounded hover:bg-gray-200"><i class="fas fa-chevron-right"></i></button>
        </div>
        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 nunito-bold">Nuevo proyecto</a>
    </div>
    {{-- Tarjetas de estadísticas --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 nunito-bold">
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm text-gray-500">Ingresos</p>
            <p class="text-lg font-semibold">$0</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm text-gray-500">Gastos</p>
            <p class="text-lg font-semibold">$0</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm text-gray-500">Balance</p>
            <p class="text-lg font-semibold">$0</p>
        </div>
    </div>
    {{-- Pestañas --}}
    <div x-data="{ tab: 'proyectos' }">
        <ul class="flex border-b nunito-bold">
            <li @click="tab='proyectos'" :class="tab==='proyectos' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Proyectos</li>
            <li @click="tab='categorias'" :class="tab==='categorias' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Categorías</li>
            <li @click="tab='movimientos'" :class="tab==='movimientos' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="pb-2">Movimientos</li>
        </ul>
        <div x-show="tab==='proyectos'" class="overflow-x-auto">
    <div class="rounded-xl bg-white shadow-sm mt-6">
        <table class="min-w-full border-collapse border border-blue-200">
            <thead class="bg-blue-100 text-blue-500 nunito-bold">
                <tr>
                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">ID</th>
                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Nombre</th>
                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Fecha Inicial del Proyecto</th>
                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Fecha Estimada de Finalización</th>
                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Fecha de Finalización</th>
                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Descripción</th>
                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Actividades</th>
                    <th class="border border-blue-200 px-4 py-3 text-right tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-sm text-black nunito-regular">
                    <td class="border border-blue-200 px-4 py-3">1</td>
                    <td class="border border-blue-200 px-4 py-3">Proyecto Alpha</td>
                    <td class="border border-blue-200 px-4 py-3">2025-01-15</td>
                    <td class="border border-blue-200 px-4 py-3">2025-07-30</td>
                    <td class="border border-blue-200 px-4 py-3">2025-07-29</td>
                    <td class="border border-blue-200 px-4 py-3">Implementación inicial del sistema</td>
                    <td class="border border-blue-200 px-4 py-3">5 tareas</td>
                    <td class="border border-blue-200 px-4 py-3 text-center text-sm space-x-4">
                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                        <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                    </td>

                </tr>
                <tr class="text-sm text-black nunito-regular">
                    <td class="border border-blue-200 px-4 py-3">2</td>
                    <td class="border border-blue-200 px-4 py-3">Proyecto Beta</td>
                    <td class="border border-blue-200 px-4 py-3">2025-02-01</td>
                    <td class="border border-blue-200 px-4 py-3">2025-08-20</td>
                    <td class="border border-blue-200 px-4 py-3">-</td>
                    <td class="border border-blue-200 px-4 py-3">Planificación y diseño preliminar</td>
                    <td class="border border-blue-200 px-4 py-3">3 tareas</td>
                    <td class="border border-blue-200 px-4 py-3 text-center text-sm space-x-4">
                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                        <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</div>

        <div x-show="tab==='categorias'" class="p-4">
            <p>No hay categorías disponibles.</p>
        </div>
        <div x-show="tab==='movimientos'" class="p-4">
            <p>No hay movimientos registrados.</p>
        </div>
    </div>
</div>
@endsection
