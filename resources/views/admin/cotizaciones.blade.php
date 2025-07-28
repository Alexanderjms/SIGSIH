@extends('layouts.admin')

@section('content')
    <x-admin.tabla-crud titulo="Cotizaciones">
        <x-slot:filtros>
            <div class="flex-1 relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                        <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                    </svg>
                </span>
                <input placeholder="Buscar cotización"
                    class="appearance-none rounded-md border border-gray-300 block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:border-blue-500 focus:outline-none" />
            </div>
        </x-slot:filtros>

        <x-slot:boton>
            <button
              class="text-sm w-32 h-12 rounded bg-emerald-500 text-white hover:bg-emerald-600 duration-300"
            >
              <i class="fas fa-plus"></i> Generar Cotización
            </button>
        </x-slot:boton>

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="nunito-bold">
                    <tr>
                        <th class="px-4 py-3 text-left bg-white">ID</th>
                        <th class="px-4 py-3 text-left bg-white">ID Cliente</th>
                        <th class="px-4 py-3 text-left bg-white">Fecha Cotización</th>
                        <th class="px-4 py-3 text-left bg-white">Válida Hasta</th>
                        <th class="px-4 py-3 text-left bg-white">Subtotal</th>
                        <th class="px-4 py-3 text-left bg-white">Total</th>
                        <th class="px-4 py-3 text-left bg-white">Acciones</th>
                    </tr>
                </thead>
                <tbody class="nunito-regular">
                    <tr>
                        <td class="px-4 py-3 border-t border-gray-200">1</td>
                        <td class="px-4 py-3 border-t border-gray-200">CLI-1234</td>
                        <td class="px-4 py-3 border-t border-gray-200">2025-07-28</td>
                        <td class="px-4 py-3 border-t border-gray-200">2025-08-28</td>
                        <td class="px-4 py-3 border-t border-gray-200">$10,500.00</td>
                        <td class="px-4 py-3 border-t border-gray-200">$12,180.00</td>
                        <td class="px-4 py-3 border-t border-gray-200">
                            <button
                              class="text-xs w-20 h-9 rounded bg-emerald-500 text-white hover:bg-emerald-600 duration-300 mr-2"
                            >
                              <i class="fas fa-eye"></i> Ver detalles
                            </button>
                            <a href="#" class="text-blue-500 hover:text-blue-700 mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-3 border-t border-gray-200">2</td>
                        <td class="px-4 py-3 border-t border-gray-200">CLI-5678</td>
                        <td class="px-4 py-3 border-t border-gray-200">2025-07-26</td>
                        <td class="px-4 py-3 border-t border-gray-200">2025-08-26</td>
                        <td class="px-4 py-3 border-t border-gray-200">$8,750.00</td>
                        <td class="px-4 py-3 border-t border-gray-200">$10,150.00</td>
                        <td class="px-4 py-3 border-t border-gray-200">
                            <button
                              class="text-xs w-20 h-9 rounded bg-emerald-500 text-white hover:bg-emerald-600 duration-300 mr-2"
                            >
                              <i class="fas fa-eye"></i> Ver detalles
                            </button>
                            <a href="#" class="text-blue-500 hover:text-blue-700 mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-admin.tabla-crud>

    <style>
        table tbody td {
            font-size: 0.875rem;
        }
    </style>

@endsection