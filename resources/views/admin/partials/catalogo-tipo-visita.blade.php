<div x-data="{ 
    isModalOpenTipoVisita: false, 
    isEditModalOpenTipoVisita: false, 
    isDeleteModalOpenTipoVisita: false, 
    itemToEdit: null, 
    itemToDelete: null, 
    searchTipoVisita: '' 
}">
    <x-admin.tabla-crud :titulo="'Gestión de Tipos de Visita'">
        <x-slot name="filtros">
            <div class="flex flex-wrap gap-2 items-center">
                <input type="text" x-model="searchTipoVisita" placeholder="Buscar tipo de visita..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select class="border rounded px-3 py-2 text-sm">
                    <option value="">Duración</option>
                    <option value="corta">Corta (< 2 horas)</option>
                    <option value="media">Media (2-4 horas)</option>
                    <option value="larga">Larga (> 4 horas)</option>
                </select>
            </div>
        </x-slot>
        <x-slot name="boton">
            <button @click="isModalOpenTipoVisita = true"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar Tipo de Visita</button>
        </x-slot>
        <div class="overflow-x-auto w-full">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Tipo</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Duración Estimada</th>
                        <th class="py-2 px-4 text-left">Requiere Cita</th>
                        <th class="py-2 px-4 text-left">Activo</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Consulta</td>
                        <td class="py-2 px-4">Consulta general de información</td>
                        <td class="py-2 px-4">30 minutos</td>
                        <td class="py-2 px-4"><span class="text-red-600">No</span></td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">Reunión</td>
                        <td class="py-2 px-4">Reunión formal de negocios</td>
                        <td class="py-2 px-4">1-2 horas</td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">3</td>
                        <td class="py-2 px-4">Soporte Técnico</td>
                        <td class="py-2 px-4">Visita de soporte técnico especializado</td>
                        <td class="py-2 px-4">2-4 horas</td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">4</td>
                        <td class="py-2 px-4">Instalación</td>
                        <td class="py-2 px-4">Instalación de equipos o software</td>
                        <td class="py-2 px-4">3-6 horas</td>
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
