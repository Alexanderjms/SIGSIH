<div x-data="{ 
    isModalOpenEstadoTicket: false, 
    isEditModalOpenEstadoTicket: false, 
    isDeleteModalOpenEstadoTicket: false, 
    itemToEdit: null, 
    itemToDelete: null, 
    searchEstadoTicket: '' 
}">
    <x-admin.tabla-crud :titulo="'Gestión de Estados de Tickets'">
        <x-slot name="filtros">
            <div class="flex flex-wrap gap-2 items-center">
                <input type="text" x-model="searchEstadoTicket" placeholder="Buscar estado..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select class="border rounded px-3 py-2 text-sm">
                    <option value="">Prioridad</option>
                    <option value="baja">Baja</option>
                    <option value="media">Media</option>
                    <option value="alta">Alta</option>
                    <option value="critica">Crítica</option>
                </select>
            </div>
        </x-slot>
        <x-slot name="boton">
            <button @click="isModalOpenEstadoTicket = true"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar Estado</button>
        </x-slot>
        <div class="overflow-x-auto w-full">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Estado</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Color</th>
                        <th class="py-2 px-4 text-left">Es Final</th>
                        <th class="py-2 px-4 text-left">Activo</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Abierto</td>
                        <td class="py-2 px-4">Ticket recién creado</td>
                        <td class="py-2 px-4"><span class="inline-block w-4 h-4 rounded bg-blue-400"></span></td>
                        <td class="py-2 px-4"><span class="text-red-600">No</span></td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">En Progreso</td>
                        <td class="py-2 px-4">Ticket siendo trabajado</td>
                        <td class="py-2 px-4"><span class="inline-block w-4 h-4 rounded bg-yellow-400"></span></td>
                        <td class="py-2 px-4"><span class="text-red-600">No</span></td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">3</td>
                        <td class="py-2 px-4">Resuelto</td>
                        <td class="py-2 px-4">Ticket resuelto exitosamente</td>
                        <td class="py-2 px-4"><span class="inline-block w-4 h-4 rounded bg-green-400"></span></td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-admin.tabla-crud>
</div>
