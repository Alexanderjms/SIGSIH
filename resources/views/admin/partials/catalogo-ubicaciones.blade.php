<div x-data="{ 
    isModalOpenUbicacion: false, 
    isEditModalOpenUbicacion: false, 
    isDeleteModalOpenUbicacion: false, 
    itemToEdit: null, 
    itemToDelete: null, 
    searchUbicacion: '' 
}">
    <x-admin.tabla-crud :titulo="'Gestión de Ubicaciones'">
        <x-slot name="filtros">
            <div class="flex flex-wrap gap-2 items-center">
                <input type="text" x-model="searchUbicacion" placeholder="Buscar ubicación..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select class="border rounded px-3 py-2 text-sm">
                    <option value="">Tipo</option>
                    <option value="ciudad">Ciudad</option>
                    <option value="departamento">Departamento</option>
                    <option value="pais">País</option>
                </select>
            </div>
        </x-slot>
        <x-slot name="boton">
            <button @click="isModalOpenUbicacion = true"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar Ubicación</button>
        </x-slot>
        <div class="overflow-x-auto w-full">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Tipo</th>
                        <th class="py-2 px-4 text-left">Ubicación Padre</th>
                        <th class="py-2 px-4 text-left">Código</th>
                        <th class="py-2 px-4 text-left">Activo</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Honduras</td>
                        <td class="py-2 px-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">País</span></td>
                        <td class="py-2 px-4">-</td>
                        <td class="py-2 px-4">HN</td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">Francisco Morazán</td>
                        <td class="py-2 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded">Departamento</span></td>
                        <td class="py-2 px-4">Honduras</td>
                        <td class="py-2 px-4">FM</td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">3</td>
                        <td class="py-2 px-4">Tegucigalpa</td>
                        <td class="py-2 px-4"><span class="bg-purple-100 text-purple-800 px-2 py-1 rounded">Ciudad</span></td>
                        <td class="py-2 px-4">Francisco Morazán</td>
                        <td class="py-2 px-4">TGU</td>
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
