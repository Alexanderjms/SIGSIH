@extends('layouts.admin')

@section('page-header')
    <h1 class="text-2xl font-bold text-gray-800">Dashboard Principal</h1>
@endsection

@section('content')
    <!-- 📊 INDICADORES PRINCIPALES -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-chart-bar mr-2"></i>
            Indicadores Principales
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total de usuarios -->
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-gray-600">Total Usuarios</h3>
                        <p class="text-3xl font-bold text-blue-600">847</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <i class="fas fa-users text-blue-500 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total de empresas -->
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-gray-600">Empresas Activas</h3>
                        <p class="text-3xl font-bold text-green-600">156</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <i class="fas fa-building text-green-500 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total de órdenes de servicio -->
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-gray-600">Órdenes de Servicio</h3>
                        <p class="text-3xl font-bold text-purple-600">1,247</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full">
                        <i class="fas fa-clipboard-list text-purple-500 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total de cotizaciones -->
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-gray-600">Cotizaciones</h3>
                        <p class="text-3xl font-bold text-indigo-600">892</p>
                    </div>
                    <div class="p-3 bg-indigo-100 rounded-full">
                        <i class="fas fa-file-invoice-dollar text-indigo-500 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Proyectos activos/finalizados -->
            <div class="bg-gradient-to-br from-teal-50 to-teal-100 p-6 rounded-xl shadow-lg border border-teal-200 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-teal-200 rounded-full -translate-y-10 translate-x-10 opacity-20"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-teal-700 uppercase tracking-wide">Proyectos</h3>
                        <div class="p-2 bg-teal-500 rounded-lg shadow-md">
                            <i class="fas fa-project-diagram text-white text-lg"></i>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="bg-white rounded-lg p-3 shadow-sm">
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-teal-600">234</span>
                                <span class="text-xs font-medium text-teal-600 bg-teal-100 px-2 py-1 rounded-full">ACTIVOS</span>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg p-3 shadow-sm">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-gray-600">187</span>
                                <span class="text-xs font-medium text-gray-600 bg-gray-100 px-2 py-1 rounded-full">FINALIZADOS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tickets abiertos/cerrados -->
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-xl shadow-lg border border-orange-200 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-orange-200 rounded-full -translate-y-8 translate-x-8 opacity-30"></div>
                <div class="absolute bottom-0 left-0 w-12 h-12 bg-orange-300 rounded-full translate-y-6 -translate-x-6 opacity-20"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-orange-700 uppercase tracking-wide">Tickets</h3>
                        <div class="p-2 bg-orange-500 rounded-lg shadow-md">
                            <i class="fas fa-ticket-alt text-white text-lg"></i>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="text-center bg-white rounded-lg p-3 shadow-sm">
                            <div class="text-2xl font-bold text-orange-600 mb-1">45</div>
                            <div class="text-xs font-medium text-orange-600 uppercase">Abiertos</div>
                            <div class="w-full bg-orange-200 rounded-full h-1 mt-2">
                                <div class="bg-orange-500 h-1 rounded-full" style="width: 13%"></div>
                            </div>
                        </div>
                        <div class="text-center bg-white rounded-lg p-3 shadow-sm">
                            <div class="text-2xl font-bold text-gray-600 mb-1">312</div>
                            <div class="text-xs font-medium text-gray-600 uppercase">Cerrados</div>
                            <div class="w-full bg-gray-200 rounded-full h-1 mt-2">
                                <div class="bg-gray-500 h-1 rounded-full" style="width: 87%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Productos en inventario -->
            <div class="bg-gradient-to-br from-green-100 to-green-300 p-6 rounded-xl shadow-lg border border-emerald-200 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-24 h-24 bg-green-700 rounded-full -translate-y-12 -translate-x-12 opacity-25"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-emerald-900 uppercase tracking-wide">Inventario</h3>
                        <div class="p-2 bg-green-500 rounded-lg shadow-md">
                            <i class="fas fa-boxes text-white text-lg"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg p-4 shadow-sm">
                        <div class="flex items-end justify-between mb-2">
                            <span class="text-3xl font-bold text-green-600">3,567</span>
                            <div class="text-right">
                                <div class="text-xs text-gray-500 uppercase">Total productos</div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-3 border-t border-gray-600">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reportes generados -->
            <div class="bg-gradient-to-br from-pink-50 to-rose-100 p-6 rounded-xl shadow-lg border border-pink-200 relative overflow-hidden">
                <div class="absolute bottom-0 right-0 w-20 h-20 bg-pink-200 rounded-full translate-y-10 translate-x-10 opacity-25"></div>
                <div class="absolute top-0 left-1/2 w-8 h-8 bg-pink-300 rounded-full -translate-y-4 opacity-30"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-pink-700 uppercase tracking-wide">Reportes</h3>
                        <div class="p-2 bg-pink-500 rounded-lg shadow-md">
                            <i class="fas fa-chart-line text-white text-lg"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg p-4 shadow-sm">
                        <div class="text-center mb-3">
                            <span class="text-4xl font-bold text-pink-600">1,024</span>
                            <p class="text-xs text-gray-500 uppercase mt-1">Generados</p>
                        </div>
                        <div class="flex items-center justify-center space-x-2 pt-3 border-t border-pink-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 🚀 ACCESOS RÁPIDOS -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-rocket mr-2"></i>
            Accesos Rápidos
        </h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <a href="#" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 text-center">
                <div class="p-3 bg-blue-100 rounded-full w-12 h-12 mx-auto mb-2 flex items-center justify-center">
                    <i class="fas fa-plus text-blue-500"></i>
                </div>
                <p class="text-sm font-medium text-gray-700">Nueva Orden</p>
            </a>
            
            <a href="#" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 text-center">
                <div class="p-3 bg-green-100 rounded-full w-12 h-12 mx-auto mb-2 flex items-center justify-center">
                    <i class="fas fa-file-invoice text-green-500"></i>
                </div>
                <p class="text-sm font-medium text-gray-700">Nueva Cotización</p>
            </a>
            
            <a href="#" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 text-center">
                <div class="p-3 bg-purple-100 rounded-full w-12 h-12 mx-auto mb-2 flex items-center justify-center">
                    <i class="fas fa-project-diagram text-purple-500"></i>
                </div>
                <p class="text-sm font-medium text-gray-700">Nuevo Proyecto</p>
            </a>
            
            <a href="#" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 text-center">
                <div class="p-3 bg-orange-100 rounded-full w-12 h-12 mx-auto mb-2 flex items-center justify-center">
                    <i class="fas fa-box-open text-orange-500"></i>
                </div>
                <p class="text-sm font-medium text-gray-700">Agregar Producto</p>
            </a>
            
            <a href="#" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 text-center">
                <div class="p-3 bg-indigo-100 rounded-full w-12 h-12 mx-auto mb-2 flex items-center justify-center">
                    <i class="fas fa-chart-bar text-indigo-500"></i>
                </div>
                <p class="text-sm font-medium text-gray-700">Nuevo Reporte</p>
            </a>
            
            <a href="#" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 text-center">
                <div class="p-3 bg-teal-100 rounded-full w-12 h-12 mx-auto mb-2 flex items-center justify-center">
                    <i class="fas fa-user-plus text-teal-500"></i>
                </div>
                <p class="text-sm font-medium text-gray-700">Nuevo Usuario</p>
            </a>
        </div>
    </div>
@endsection