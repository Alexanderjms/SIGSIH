@extends('layouts.admin')

@section('content')
<div x-data="{ 
    tab: 'facturas',
    isFacturaModalOpen: false, 
    isEditFacturaModalOpen: false, 
    facturaToEdit: null, 
    isDeleteFacturaModalOpen: false, 
    facturaToDelete: null,
    isDetalleModalOpen: false,
    isEditDetalleModalOpen: false,
    detalleToEdit: null,
    isDeleteDetalleModalOpen: false,
    detalleToDelete: null,
    isServicioModalOpen: false,
    isEditServicioModalOpen: false,
    servicioToEdit: null,
    isDeleteServicioModalOpen: false,
    servicioToDelete: null,
    isEstadoFacturaModalOpen: false,
    isEditEstadoFacturaModalOpen: false,
    estadoFacturaToEdit: null,
    isDeleteEstadoFacturaModalOpen: false,
    estadoFacturaToDelete: null
}" class="p-6">
    {{-- Pestañas --}}


    <div class="mb-6">
        <ul class="flex border-b nunito-bold">
            <li @click="tab='facturas'"
                :class="tab==='facturas' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
                class="mr-6 pb-2">Facturas</li>
            <li @click="tab='detalle'"
                :class="tab==='detalle' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
                class="mr-6 pb-2">Detalle de Factura</li>
            <li @click="tab='servicio'"
                :class="tab==='servicio' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
                class="mr-6 pb-2">Servicios</li>
            <li @click="tab='estado_factura'"
                :class="tab==='estado_factura' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
                class="pb-2">Estado de Factura</li>
        </ul>
    </div>

    {{-- TAB: FACTURAS --}}
    <div x-show="tab==='facturas'" class="overflow-x-auto">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">Facturas</h2>
            </x-slot>
            <x-slot name="filtros">
                <div class="flex gap-2">
                    <input type="text" placeholder="Buscar factura..."
                        class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                    <div class="flex items-center gap-2">
                        <div class="flex rounded border overflow-hidden text-sm">
                            <span class="bg-white px-3 py-2 border-r">Desde:</span>
                            <input type="date" class="px-3 py-2 outline-none" />
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="flex rounded border overflow-hidden text-sm">
                            <span class="bg-white px-3 py-2 border-r">Hasta:</span>
                            <input type="date" class="px-3 py-2 outline-none" />
                        </div>
                    </div>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap flex items-center gap-2">
                        <i class="fas fa-filter"></i>
                        Filtrar
                    </button>
                </div>
            </x-slot>
            <x-slot name="boton">
                <button @click="isFacturaModalOpen = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nueva
                    Factura</button>
            </x-slot>
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 nunito-bold">
                    <tr>
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Número</th>
                        <th class="py-2 px-4 text-left">Fecha</th>
                        <th class="py-2 px-4 text-left">OC</th>
                        <th class="py-2 px-4 text-left">Subtotal</th>
                        <th class="py-2 px-4 text-left">Total</th>
                        <th class="py-2 px-4 text-left">Total Letras</th>
                        <th class="py-2 px-4 text-left">Estado Factura</th>
                        <th class="py-2 px-4 text-left">CAI</th>
                        <th class="py-2 px-4 text-left">Cliente</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">0001</td>
                        <td class="py-2 px-4">2025-07-30</td>
                        <td class="py-2 px-4">OC-12345</td>
                        <td class="py-2 px-4">5000</td>
                        <td class="py-2 px-4">5500</td>
                        <td class="py-2 px-4">Cinco mil quinientos lempiras</td>
                        <td class="py-2 px-4">
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded">Pagada</span>
                        </td>
                        <td class="py-2 px-4">CAI-987654321</td>
                        <td class="py-2 px-4">BAC credomatic</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="{{ route('admin.formato-factura') }}" target="_blank"
                                class="inline-flex items-center justify-center text-xs w-24 h-9 rounded bg-emerald-500 text-white hover:bg-emerald-600 duration-300 mr-2">
                                <i class="fas fa-eye mr-1"></i> Ver detalles
                            </a>
                            <a href="#"
                                @click.prevent="isEditFacturaModalOpen = true; facturaToEdit = {id: 1, numero: '0001', fecha: '2025-07-30', oc: 'OC-12345', subtotal: 5000, total: 5500, total_letras: 'Cinco mil quinientos lempiras', estado_factura: 'Pagada', cai: 'CAI-987654321', cliente: 'BAC credomatic'}"
                                class="inline-flex items-center justify-center text-blue-500 hover:text-blue-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" @click.prevent="isDeleteFacturaModalOpen = true; facturaToDelete = {id: 1}"
                                class="inline-flex items-center justify-center text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">0002</td>
                        <td class="py-2 px-4">2025-07-31</td>
                        <td class="py-2 px-4">OC-54321</td>
                        <td class="py-2 px-4">6000</td>
                        <td class="py-2 px-4">6500</td>
                        <td class="py-2 px-4">Seis mil quinientos lempiras</td>
                        <td class="py-2 px-4">
                            <span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded">Pendiente</span>
                        </td>
                        <td class="py-2 px-4">CAI-123456789</td>
                        <td class="py-2 px-4">Bancafe</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="{{ route('admin.formato-factura') }}" target="_blank"
                                class="inline-flex items-center justify-center text-xs w-24 h-9 rounded bg-emerald-500 text-white hover:bg-emerald-600 duration-300 mr-2">
                                <i class="fas fa-eye mr-1"></i> Ver detalles
                            </a>
                            <a href="#"
                                @click.prevent="isEditFacturaModalOpen = true; facturaToEdit = {id: 2, numero: '0002', fecha: '2025-07-31', oc: 'OC-54321', subtotal: 6000, total: 6500, total_letras: 'Seis mil quinientos lempiras', estado_factura: 'Pendiente', cai: 'CAI-123456789', cliente: 'Bancafe'}"
                                class="inline-flex items-center justify-center text-blue-500 hover:text-blue-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" @click.prevent="isDeleteFacturaModalOpen = true; facturaToDelete = {id: 2}"
                                class="inline-flex items-center justify-center text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </x-admin.tabla-crud>
    </div>

    <!-- Modales Factura -->
    <!-- Modal Nuevo Factura -->
    <x-admin.form-modal modalName="isFacturaModalOpen" title="Nueva Factura" submitLabel="Guardar Factura"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="numero_factura" class="block text-sm font-medium text-gray-700">Número</label>
                <input type="text" id="numero_factura" name="numero_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha_factura" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="fecha_factura" name="fecha_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="oc_factura" class="block text-sm font-medium text-gray-700">OC</label>
                <input type="text" id="oc_factura" name="oc_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="subtotal_factura" class="block text-sm font-medium text-gray-700">Subtotal</label>
                <input type="number" id="subtotal_factura" name="subtotal_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="total_factura" class="block text-sm font-medium text-gray-700">Total</label>
                <input type="number" id="total_factura" name="total_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="total_letras_factura" class="block text-sm font-medium text-gray-700">Total Letras</label>
                <input type="text" id="total_letras_factura" name="total_letras_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="estado_factura_id" class="block text-sm font-medium text-gray-700">Estado Factura</label>
                <select id="estado_factura_id" name="estado_factura_id"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option value="">Seleccione un estado</option>
                    <option value="1">Pagada</option>
                    <option value="2">Pendiente</option>
                    <option value="3">Cancelada</option>
                </select>
            </div>
            <div>
                <label for="cai_factura" class="block text-sm font-medium text-gray-700">CAI</label>
                <input type="text" id="cai_factura" name="cai_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                <select id="cliente_id" name="cliente_id"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option value="">Seleccione un cliente</option>
                    <option value="1">Bac Credomatic</option>
                    <option value="2">Bancafe</option>
                </select>
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Factura -->
    <x-admin.edit-modal modalName="isEditFacturaModalOpen" title="Editar Factura" itemToEdit="facturaToEdit"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="edit_numero_factura" class="block text-sm font-medium text-gray-700">Número</label>
                <input type="text" id="edit_numero_factura" name="edit_numero_factura" :value="facturaToEdit.numero"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_fecha_factura" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="edit_fecha_factura" name="edit_fecha_factura" :value="facturaToEdit.fecha"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_oc_factura" class="block text-sm font-medium text-gray-700">OC</label>
                <input type="text" id="edit_oc_factura" name="edit_oc_factura" :value="facturaToEdit.oc"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_subtotal_factura" class="block text-sm font-medium text-gray-700">Subtotal</label>
                <input type="number" id="edit_subtotal_factura" name="edit_subtotal_factura"
                    :value="facturaToEdit.subtotal"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_total_factura" class="block text-sm font-medium text-gray-700">Total</label>
                <input type="number" id="edit_total_factura" name="edit_total_factura" :value="facturaToEdit.total"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_total_letras_factura" class="block text-sm font-medium text-gray-700">Total
                    Letras</label>
                <input type="text" id="edit_total_letras_factura" name="edit_total_letras_factura"
                    :value="facturaToEdit.total_letras"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_estado_factura_id" class="block text-sm font-medium text-gray-700">Estado
                    Factura</label>
                <select id="edit_estado_factura_id" name="edit_estado_factura_id"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option value="">Seleccione un estado</option>
                    <option value="1" :selected="facturaToEdit.estado_factura === 'Pagada'">Pagada</option>
                    <option value="2" :selected="facturaToEdit.estado_factura === 'Pendiente'">Pendiente</option>
                    <option value="3" :selected="facturaToEdit.estado_factura === 'Cancelada'">Cancelada</option>
                </select>
            </div>
            <div>
                <label for="edit_cai_factura" class="block text-sm font-medium text-gray-700">CAI</label>
                <input type="text" id="edit_cai_factura" name="edit_cai_factura" :value="facturaToEdit.cai"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_cliente_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                <select id="edit_cliente_id" name="edit_cliente_id"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option value="">Seleccione un cliente</option>
                    <option value="1" :selected="facturaToEdit.cliente === 'Bac Creomatic'">Bac Creomatic</option>
                    <option value="2" :selected="facturaToEdit.cliente === 'Bancafe'">Bancafe</option>
                </select>
            </div>
        </div>
    </x-admin.edit-modal>

    <x-admin.confirmation-modal modalName="isDeleteFacturaModalOpen" itemToDelete="facturaToDelete"
        message="¿Estás seguro de que quieres eliminar la factura?" />


    <!-- Modal Nuevo Detalle Factura -->
    <x-admin.form-modal modalName="isDetalleModalOpen" title="Nuevo Detalle Factura" submitLabel="Guardar Detalle"
        maxWidth="max-w-xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="id_factura" class="block text-sm font-medium text-gray-700">ID Factura</label>
                <input type="text" id="id_factura" name="id_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="id_servicio" class="block text-sm font-medium text-gray-700">ID Servicio</label>
                <input type="text" id="id_servicio" name="id_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha_servicio" class="block text-sm font-medium text-gray-700">Fecha Servicio</label>
                <input type="date" id="fecha_servicio" name="fecha_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="horas" class="block text-sm font-medium text-gray-700">Horas</label>
                <input type="number" id="horas" name="horas"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="descuento" class="block text-sm font-medium text-gray-700">Descuento</label>
                <input type="number" id="descuento" name="descuento"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Detalle Factura -->
    <x-admin.edit-modal modalName="isEditDetalleModalOpen" title="Editar Detalle Factura" itemToEdit="detalleToEdit"
        maxWidth="max-w-xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="edit_id_factura" class="block text-sm font-medium text-gray-700">ID Factura</label>
                <input type="text" id="edit_id_factura" name="edit_id_factura" :value="detalleToEdit.id_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_id_servicio" class="block text-sm font-medium text-gray-700">ID Servicio</label>
                <input type="text" id="edit_id_servicio" name="edit_id_servicio" :value="detalleToEdit.id_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_fecha_servicio" class="block text-sm font-medium text-gray-700">Fecha Servicio</label>
                <input type="date" id="edit_fecha_servicio" name="edit_fecha_servicio"
                    :value="detalleToEdit.fecha_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_horas" class="block text-sm font-medium text-gray-700">Horas</label>
                <input type="number" id="edit_horas" name="edit_horas" :value="detalleToEdit.horas"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_descuento" class="block text-sm font-medium text-gray-700">Descuento</label>
                <input type="number" id="edit_descuento" name="edit_descuento" :value="detalleToEdit.descuento"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Confirmar Eliminación Detalle Factura -->
    <x-admin.confirmation-modal modalName="isDeleteDetalleModalOpen" itemToDelete="detalleToDelete"
        message="¿Estás seguro de que quieres eliminar el detalle de factura?" />

    {{-- TAB: SERVICIO --}}
    <div x-show="tab==='servicio'" class="overflow-x-auto">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">Servicios</h2>
            </x-slot>
            <x-slot name="filtros">
                <input type="text" placeholder="Buscar servicio..."
                    class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            </x-slot>
            <x-slot name="boton">
                <button @click="isServicioModalOpen = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo
                    Servicio</button>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID</th>
                            <th class="py-2 px-4 text-left">Nombre Servicio</th>
                            <th class="py-2 px-4 text-left">Tarifa</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">SVC-01</td>
                            <td class="py-2 px-4">Consultoría</td>
                            <td class="py-2 px-4">1500</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#"
                                    @click.prevent="isEditServicioModalOpen = true; servicioToEdit = {id: 'SVC-01', nombre: 'Consultoría', tarifa: 1500}"
                                    class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#"
                                    @click.prevent="isDeleteServicioModalOpen = true; servicioToDelete = {id: 'SVC-01'}"
                                    class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>
    </div>
    <!-- Modal Nuevo Servicio -->
    <x-admin.form-modal modalName="isServicioModalOpen" title="Nuevo Servicio" submitLabel="Guardar Servicio"
        maxWidth="max-w-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="id_servicio_nuevo" class="block text-sm font-medium text-gray-700">ID</label>
                <input type="text" id="id_servicio_nuevo" name="id_servicio_nuevo"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="nombre_servicio" class="block text-sm font-medium text-gray-700">Nombre Servicio</label>
                <input type="text" id="nombre_servicio" name="nombre_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="tarifa" class="block text-sm font-medium text-gray-700">Tarifa</label>
                <input type="number" id="tarifa" name="tarifa"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Servicio -->
    <x-admin.edit-modal modalName="isEditServicioModalOpen" title="Editar Servicio" itemToEdit="servicioToEdit"
        maxWidth="max-w-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="edit_id_servicio" class="block text-sm font-medium text-gray-700">ID</label>
                <input type="text" id="edit_id_servicio" name="edit_id_servicio" :value="servicioToEdit.id"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_nombre_servicio" class="block text-sm font-medium text-gray-700">Nombre
                    Servicio</label>
                <input type="text" id="edit_nombre_servicio" name="edit_nombre_servicio" :value="servicioToEdit.nombre"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_tarifa" class="block text-sm font-medium text-gray-700">Tarifa</label>
                <input type="number" id="edit_tarifa" name="edit_tarifa" :value="servicioToEdit.tarifa"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Confirmar Eliminación Servicio -->
    <x-admin.confirmation-modal modalName="isDeleteServicioModalOpen" itemToDelete="servicioToDelete"
        message="¿Estás seguro de que quieres eliminar el servicio?" />
    <div x-show="tab==='detalle'" class="overflow-x-auto">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">Detalle Factura</h2>
            </x-slot>
            <x-slot name="filtros">
                <input type="text" placeholder="Buscar detalle..."
                    class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            </x-slot>
            <x-slot name="boton">
                <button @click="isDetalleModalOpen = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo
                    Detalle</button>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID Detalle</th>
                            <th class="py-2 px-4 text-left">ID Factura</th>
                            <th class="py-2 px-4 text-left">ID Servicio</th>
                            <th class="py-2 px-4 text-left">Fecha Servicio</th>
                            <th class="py-2 px-4 text-left">Horas</th>
                            <th class="py-2 px-4 text-left">Descuento</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">0001</td>
                            <td class="py-2 px-4">SVC-01</td>
                            <td class="py-2 px-4">2025-07-26</td>
                            <td class="py-2 px-4">8</td>
                            <td class="py-2 px-4">0</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#"
                                    @click.prevent="isEditDetalleModalOpen = true; detalleToEdit = {id_detalle: 1, id_factura: '0001', id_servicio: 'SVC-01', fecha_servicio: '2025-07-26', horas: 8, descuento: 0}"
                                    class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#"
                                    @click.prevent="isDeleteDetalleModalOpen = true; detalleToDelete = {id_detalle: 1}"
                                    class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>
    </div>


    {{-- TAB: ESTADO FACTURA --}}
    <div x-show="tab==='estado_factura'" class="overflow-x-auto">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">Estado Factura</h2>
            </x-slot>
            <x-slot name="filtros">
                <input type="text" placeholder="Buscar estado..."
                    class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            </x-slot>
            <x-slot name="boton">
                <button @click="isEstadoFacturaModalOpen = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo
                    Estado</button>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID</th>
                            <th class="py-2 px-4 text-left">Nombre Estado</th>
                            <th class="py-2 px-4 text-left">Descripción</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">Pagada</td>
                            <td class="py-2 px-4">Factura completamente pagada</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#"
                                    @click.prevent="isEditEstadoFacturaModalOpen = true; estadoFacturaToEdit = {id: 1, nombre: 'Pagada', descripcion: 'Factura completamente pagada'}"
                                    class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#"
                                    @click.prevent="isDeleteEstadoFacturaModalOpen = true; estadoFacturaToDelete = {id: 1}"
                                    class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>
    </div>

    <!-- Modal Nuevo Estado Factura -->
    <x-admin.form-modal modalName="isEstadoFacturaModalOpen" title="Nuevo Estado Factura" submitLabel="Guardar Estado"
        maxWidth="max-w-md">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="nombre_estado_factura" class="block text-sm font-medium text-gray-700">Nombre Estado</label>
                <input type="text" id="nombre_estado_factura" name="nombre_estado_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="descripcion_estado_factura"
                    class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" id="descripcion_estado_factura" name="descripcion_estado_factura"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Estado Factura -->
    <x-admin.edit-modal modalName="isEditEstadoFacturaModalOpen" title="Editar Estado Factura"
        itemToEdit="estadoFacturaToEdit" maxWidth="max-w-md">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="edit_nombre_estado_factura" class="block text-sm font-medium text-gray-700">Nombre
                    Estado</label>
                <input type="text" id="edit_nombre_estado_factura" name="edit_nombre_estado_factura"
                    :value="estadoFacturaToEdit.nombre"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_descripcion_estado_factura"
                    class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" id="edit_descripcion_estado_factura" name="edit_descripcion_estado_factura"
                    :value="estadoFacturaToEdit.descripcion"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Confirmar Eliminación Estado Factura -->
    <x-admin.confirmation-modal modalName="isDeleteEstadoFacturaModalOpen" itemToDelete="estadoFacturaToDelete"
        message="¿Estás seguro de que quieres eliminar el estado de factura?" />
</div>
@endsection