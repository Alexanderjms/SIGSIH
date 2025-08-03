<div
    x-data="{ 
        tab: 'ordenes', 
        isModalOpen: false, 
        isEditModalOpen: false, 
        ordenToEdit: {
            id: null,
            id_solicitud: '',
            id_tecnico: '',
            fecha_recepcion: '',
            fecha_inicio: '',
            fecha_finalizacion: '',
            observaciones: '',
            diagnostico_tecnico: '',
            diagnostico_cliente: '',
            calificacion_servicio: '',
            id_cotizacion: ''
        }, 
        isDeleteModalOpen: false, 
        ordenToDelete: null 
    }">
    <ul class="flex border-b nunito-bold">
        <li @click="tab='ordenes'"
            :class="tab==='ordenes' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
            class="mr-6 pb-2">Gestión Órdenes de Servicio</li>
    </ul>
    
    <div x-show="tab==='ordenes'" class="overflow-x-auto">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">Lista de Órdenes de Servicio</h2>
            </x-slot>
            <x-slot name="filtros">
                <input type="text" placeholder="Buscar orden..."
                    class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                    <option class="nunito-bold" value="">Todos los técnicos</option>
                    <option class="nunito-bold">Técnico 1</option>
                    <option class="nunito-bold">Técnico 2</option>
                </select>
            </x-slot>
            <x-slot name="boton">
                <button @click="isModalOpen = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nueva
                    Orden</button>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID Orden</th>
                            <th class="py-2 px-4 text-left">ID Solicitud</th>
                            <th class="py-2 px-4 text-left">ID Técnico</th>
                            <th class="py-2 px-4 text-left">Fecha Recepción</th>
                            <th class="py-2 px-4 text-left">Fecha Inicio</th>
                            <th class="py-2 px-4 text-left">Fecha Finalización</th>
                            <th class="py-2 px-4 text-left">Observaciones</th>
                            <th class="py-2 px-4 text-left">Diagnóstico Técnico</th>
                            <th class="py-2 px-4 text-left">Diagnóstico Cliente</th>
                            <th class="py-2 px-4 text-left">Calificación Servicio</th>
                            <th class="py-2 px-4 text-left">ID Cotización</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">1001</td>
                            <td class="py-2 px-4">T-001</td>
                            <td class="py-2 px-4">2025-07-01</td>
                            <td class="py-2 px-4">2025-07-02</td>
                            <td class="py-2 px-4">2025-07-05</td>
                            <td class="py-2 px-4">Sin observaciones</td>
                            <td class="py-2 px-4">Diagnóstico técnico ejemplo</td>
                            <td class="py-2 px-4">Diagnóstico cliente ejemplo</td>
                            <td class="py-2 px-4">5</td>
                            <td class="py-2 px-4">C-001</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="{{ route('admin.detalle-orden') }}" target="_blank"
                                    class="inline-flex items-center justify-center text-xs w-24 h-9 rounded bg-emerald-500 text-white hover:bg-emerald-600 duration-300 mr-2">
                                    <i class="fas fa-eye mr-1"></i> Ver detalles
                                </a>
                                <a href="#" @click="isEditModalOpen = true; ordenToEdit = {
                                    id: 1,
                                    id_solicitud: '1001',
                                    id_tecnico: 'T-001',
                                    fecha_recepcion: '2025-07-01',
                                    fecha_inicio: '2025-07-02',
                                    fecha_finalizacion: '2025-07-05',
                                    observaciones: 'Sin observaciones',
                                    diagnostico_tecnico: 'Diagnóstico técnico ejemplo',
                                    diagnostico_cliente: 'Diagnóstico cliente ejemplo',
                                    calificacion_servicio: 5,
                                    id_cotizacion: 'C-001'
                                }"
                                    class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteModalOpen = true; ordenToDelete = {id: 1}"
                                    class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>
    </div>

    <!-- Modal Nueva Orden -->
    <x-admin.form-modal modalName="isModalOpen" title="Nueva Orden" submitLabel="Guardar Orden" maxWidth="max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="id_solicitud" class="block text-sm font-medium text-gray-700">ID Solicitud</label>
                <input type="text" id="id_solicitud" name="id_solicitud"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="id_tecnico" class="block text-sm font-medium text-gray-700">ID Técnico</label>
                <input type="text" id="id_tecnico" name="id_tecnico"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha_recepcion" class="block text-sm font-medium text-gray-700">Fecha Recepción</label>
                <input type="date" id="fecha_recepcion" name="fecha_recepcion"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha Inicio</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha_finalizacion" class="block text-sm font-medium text-gray-700">Fecha
                    Finalización</label>
                <input type="date" id="fecha_finalizacion" name="fecha_finalizacion"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                <textarea id="observaciones" name="observaciones" rows="2"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
            <div class="col-span-2">
                <label for="diagnostico_tecnico" class="block text-sm font-medium text-gray-700">Diagnóstico del
                    Técnico</label>
                <textarea id="diagnostico_tecnico" name="diagnostico_tecnico" rows="2"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
            <div class="col-span-2">
                <label for="diagnostico_cliente" class="block text-sm font-medium text-gray-700">Diagnóstico del
                    Cliente</label>
                <textarea id="diagnostico_cliente" name="diagnostico_cliente" rows="2"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
            <div>
                <label for="calificacion_servicio" class="block text-sm font-medium text-gray-700">Calificación del
                    Servicio</label>
                <input type="number" id="calificacion_servicio" name="calificacion_servicio" min="1" max="5"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="id_cotizacion" class="block text-sm font-medium text-gray-700">ID Cotización</label>
                <input type="text" id="id_cotizacion" name="id_cotizacion"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Orden -->
    <x-admin.edit-modal modalName="isEditModalOpen" title="Editar Orden" itemToEdit="ordenToEdit" maxWidth="max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="edit_id_solicitud" class="block text-sm font-medium text-gray-700">ID Solicitud</label>
                <input type="text" id="edit_id_solicitud" name="edit_id_solicitud" x-model="ordenToEdit.id_solicitud"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_id_tecnico" class="block text-sm font-medium text-gray-700">ID Técnico</label>
                <input type="text" id="edit_id_tecnico" name="edit_id_tecnico" x-model="ordenToEdit.id_tecnico"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_fecha_recepcion" class="block text-sm font-medium text-gray-700">Fecha
                    Recepción</label>
                <input type="date" id="edit_fecha_recepcion" name="edit_fecha_recepcion"
                    x-model="ordenToEdit.fecha_recepcion"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha Inicio</label>
                <input type="date" id="edit_fecha_inicio" name="edit_fecha_inicio" x-model="ordenToEdit.fecha_inicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_fecha_finalizacion" class="block text-sm font-medium text-gray-700">Fecha
                    Finalización</label>
                <input type="date" id="edit_fecha_finalizacion" name="edit_fecha_finalizacion"
                    x-model="ordenToEdit.fecha_finalizacion"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="edit_observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                <textarea id="edit_observaciones" name="edit_observaciones" rows="2" x-model="ordenToEdit.observaciones"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
            <div class="col-span-2">
                <label for="edit_diagnostico_tecnico" class="block text-sm font-medium text-gray-700">Diagnóstico del
                    Técnico</label>
                <textarea id="edit_diagnostico_tecnico" name="edit_diagnostico_tecnico" rows="2"
                    x-model="ordenToEdit.diagnostico_tecnico"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
            <div class="col-span-2">
                <label for="edit_diagnostico_cliente" class="block text-sm font-medium text-gray-700">Diagnóstico del
                    Cliente</label>
                <textarea id="edit_diagnostico_cliente" name="edit_diagnostico_cliente" rows="2"
                    x-model="ordenToEdit.diagnostico_cliente"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
            <div>
                <label for="edit_calificacion_servicio" class="block text-sm font-medium text-gray-700">Calificación del
                    Servicio</label>
                <input type="number" id="edit_calificacion_servicio" name="edit_calificacion_servicio" min="1" max="5"
                    x-model="ordenToEdit.calificacion_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_id_cotizacion" class="block text-sm font-medium text-gray-700">ID Cotización</label>
                <input type="text" id="edit_id_cotizacion" name="edit_id_cotizacion" x-model="ordenToEdit.id_cotizacion"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Confirmar Eliminación Orden -->
    <x-admin.confirmation-modal modalName="isDeleteModalOpen" itemToDelete="ordenToDelete"
        message="¿Estás seguro de que quieres eliminar la orden?" />
</div>
