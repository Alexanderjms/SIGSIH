<div x-data="{ 
    isModalOpenCategoria: false, 
    isEditModalOpenCategoria: false, 
    isDeleteModalOpenCategoria: false, 
    itemToEdit: null, 
    itemToDelete: null, 
    searchCategoria: '' 
}">
    <x-admin.tabla-crud :titulo="'Gestión de Categorías de Ingresos y Gastos'">
        <x-slot name="filtros">
            <div class="flex flex-wrap gap-2 items-center">
                <input type="text" x-model="searchCategoria" placeholder="Buscar categoría..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select class="border rounded px-3 py-2 text-sm">
                    <option value="">Tipo</option>
                    <option value="ingreso">Ingreso</option>
                    <option value="gasto">Gasto</option>
                </select>
            </div>
        </x-slot>
        <x-slot name="boton">
            <button @click="isModalOpenCategoria = true"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar Categoría</button>
        </x-slot>
        <div class="overflow-x-auto w-full">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Tipo</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Activo</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Ventas</td>
                        <td class="py-2 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded">Ingreso</span></td>
                        <td class="py-2 px-4">Ingresos por ventas de productos</td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">Servicios</td>
                        <td class="py-2 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded">Ingreso</span></td>
                        <td class="py-2 px-4">Ingresos por servicios prestados</td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">3</td>
                        <td class="py-2 px-4">Gastos Operativos</td>
                        <td class="py-2 px-4"><span class="bg-red-100 text-red-800 px-2 py-1 rounded">Gasto</span></td>
                        <td class="py-2 px-4">Gastos operativos del negocio</td>
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
