<div x-data="{ 
    isModalOpenEstadoCalendario: false, 
    isEditModalOpenEstadoCalendario: false, 
    isDeleteModalOpenEstadoCalendario: false, 
    itemToEdit: null, 
    itemToDelete: null, 
    searchEstadoCalendario: '' 
}">
    <x-admin.tabla-crud :titulo="'Gestión de Estados del Calendario'">
        <x-slot name="filtros">
            <div class="flex flex-wrap gap-2 items-center">
                <input type="text" x-model="searchEstadoCalendario" placeholder="Buscar estado..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            </div>
        </x-slot>
        <x-slot name="boton">
            <button @click="isModalOpenEstadoCalendario = true"
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
                        <th class="py-2 px-4 text-left">Icono</th>
                        <th class="py-2 px-4 text-left">Activo</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Programado</td>
                        <td class="py-2 px-4">Evento programado</td>
                        <td class="py-2 px-4"><span class="inline-block w-4 h-4 rounded bg-blue-400"></span></td>
                        <td class="py-2 px-4"><i class="fas fa-calendar-plus text-blue-600"></i></td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">En Curso</td>
                        <td class="py-2 px-4">Evento en progreso</td>
                        <td class="py-2 px-4"><span class="inline-block w-4 h-4 rounded bg-yellow-400"></span></td>
                        <td class="py-2 px-4"><i class="fas fa-play text-yellow-600"></i></td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">3</td>
                        <td class="py-2 px-4">Completado</td>
                        <td class="py-2 px-4">Evento finalizado</td>
                        <td class="py-2 px-4"><span class="inline-block w-4 h-4 rounded bg-green-400"></span></td>
                        <td class="py-2 px-4"><i class="fas fa-check text-green-600"></i></td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">4</td>
                        <td class="py-2 px-4">Cancelado</td>
                        <td class="py-2 px-4">Evento cancelado</td>
                        <td class="py-2 px-4"><span class="inline-block w-4 h-4 rounded bg-red-400"></span></td>
                        <td class="py-2 px-4"><i class="fas fa-times text-red-600"></i></td>
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
