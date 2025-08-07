@extends('layouts.reporte')

@section('title', 'Reporte de Facturas')

@section('content')
<div class="min-h-screen bg-white p-6 flex justify-center items-start">
    <div class="w-full max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <!-- Header del reporte -->
            <x-admin.reportes-header :fecha="$fecha" :modulo="$modulo" titulo="FACTURAS" :logoSize="96" />
            <!-- Título del reporte -->
            <h2 class="text-xl nunito-bold text-gray-800 mb-6 text-center">Listado de Facturas</h2>
            <!-- Tabla de Facturas -->
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">No. Factura</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Cliente</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Fecha</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Subtotal</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">ISV (15%)</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Total</th>
                            <th class="border border-gray-300 py-2 px-3 text-left nunito-bold text-gray-700">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">FAC-001-2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Banco Atlántida</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">01/08/2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 13,043.48</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 1,956.52</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 15,000.00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Pagada</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">FAC-002-2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">BAC Credomatic</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">03/08/2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 19,565.22</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 2,934.78</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 22,500.00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Pendiente</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">FAC-003-2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Ficohsa</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">05/08/2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 16,304.35</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 2,445.65</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 18,750.00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Anulada</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">FAC-004-2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Banco de Occidente</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">07/08/2025</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 10,695.65</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 1,604.35</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">L. 12,300.00</td>
                            <td class="border border-gray-300 py-2 px-3 nunito-regular">Pagada</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Detalle de Servicios por Factura -->
            <div class="mb-8">
                <h3 class="text-lg nunito-bold text-gray-800 mb-4 text-center">Detalle de Servicios Facturados</h3>
                
                <!-- Factura FAC-001-2025 -->
                <div class="mb-6 border rounded-lg p-4">
                    <h4 class="nunito-bold text-gray-700 mb-3">FAC-001-2025 - Banco Atlántida</h4>
                    <table class="w-full border-collapse border border-gray-300 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="border border-gray-300 py-1 px-2 text-left nunito-bold">Descripción</th>
                                <th class="border border-gray-300 py-1 px-2 text-left nunito-bold">Cantidad</th>
                                <th class="border border-gray-300 py-1 px-2 text-left nunito-bold">Precio Unit.</th>
                                <th class="border border-gray-300 py-1 px-2 text-left nunito-bold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">Mantenimiento Servidor</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">1</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">L. 8,000.00</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">L. 8,000.00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">Soporte Técnico (Horas)</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">12</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">L. 420.29</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">L. 5,043.48</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Factura FAC-002-2025 -->
                <div class="mb-6 border rounded-lg p-4">
                    <h4 class="nunito-bold text-gray-700 mb-3">FAC-002-2025 - BAC Credomatic</h4>
                    <table class="w-full border-collapse border border-gray-300 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="border border-gray-300 py-1 px-2 text-left nunito-bold">Descripción</th>
                                <th class="border border-gray-300 py-1 px-2 text-left nunito-bold">Cantidad</th>
                                <th class="border border-gray-300 py-1 px-2 text-left nunito-bold">Precio Unit.</th>
                                <th class="border border-gray-300 py-1 px-2 text-left nunito-bold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">Implementación Sistema</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">1</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">L. 15,000.00</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">L. 15,000.00</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">Capacitación Personal</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">8</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">L. 570.65</td>
                                <td class="border border-gray-300 py-1 px-2 nunito-regular">L. 4,565.22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Resumen de Facturas -->
            <div class="mt-6 p-4 bg-gray-50 rounded">
                <h3 class="text-lg nunito-bold text-gray-800 mb-3 text-center">Resumen de Facturación</h3>
                <div class="flex justify-center gap-8 text-sm">
                    <div class="text-center">
                        <span class="nunito-bold text-gray-700">Total Facturas: </span>
                        <span class="nunito-regular">4</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-green-700">Pagadas: </span>
                        <span class="nunito-regular">L. 27,300.00</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-yellow-700">Pendientes: </span>
                        <span class="nunito-regular">L. 22,500.00</span>
                    </div>
                    <div class="text-center">
                        <span class="nunito-bold text-red-700">Anuladas: </span>
                        <span class="nunito-regular">L. 18,750.00</span>
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
