<div x-data="{ 
    isModalOpenEstadoProyecto: false, 
    isEditModalOpenEstadoProyecto: false, 
    isDeleteModalOpenEstadoProyecto: false, 
    itemToEdit: null, 
    itemToDelete: null, 
    searchEstadoProyecto: '' 
}">
    <x-admin.tabla-crud :titulo="'Gestión de Estados de Proyecto'">
        <x-slot name="filtros">
            <div class="flex flex-wrap gap-2 items-center">
                <input type="text" x-model="searchEstadoProyecto" placeholder="Buscar estado..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            </div>
        </x-slot>
        <x-slot name="boton">
            <button @click="isModalOpenEstadoProyecto = true"
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
                        <th class="py-2 px-4 text-left">Porcentaje</th>
                        <th class="py-2 px-4 text-left">Activo</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Planificación</td>
                        <td class="py-2 px-4">Proyecto en fase de planificación</td>
                        <td class="py-2 px-4"><span class="inline-block w-4 h-4 rounded bg-blue-400"></span></td>
                        <td class="py-2 px-4">10%</td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">En Desarrollo</td>
                        <td class="py-2 px-4">Proyecto en desarrollo activo</td>
                        <td class="py-2 px-4"><span class="inline-block w-4 h-4 rounded bg-yellow-400"></span></td>
                        <td class="py-2 px-4">50%</td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">3</td>
                        <td class="py-2 px-4">Completado</td>
                        <td class="py-2 px-4">Proyecto finalizado exitosamente</td>
                        <td class="py-2 px-4"><span class="inline-block w-4 h-4 rounded bg-green-400"></span></td>
                        <td class="py-2 px-4">100%</td>
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
