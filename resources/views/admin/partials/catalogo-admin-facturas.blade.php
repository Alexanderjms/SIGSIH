<div x-data="{ 
    isModalOpenAdminFactura: false, 
    isEditModalOpenAdminFactura: false, 
    isDeleteModalOpenAdminFactura: false, 
    itemToEdit: null, 
    itemToDelete: null, 
    searchAdminFactura: '' 
}">
    <x-admin.tabla-crud :titulo="'Administración de Facturas'">
        <x-slot name="filtros">
            <div class="flex flex-wrap gap-2 items-center">
                <input type="text" x-model="searchAdminFactura" placeholder="Buscar configuración..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select class="border rounded px-3 py-2 text-sm">
                    <option value="">Tipo</option>
                    <option value="impuesto">Impuesto</option>
                    <option value="formato">Formato</option>
                    <option value="numeracion">Numeración</option>
                </select>
            </div>
        </x-slot>
        <x-slot name="boton">
            <button @click="isModalOpenAdminFactura = true"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar Configuración</button>
        </x-slot>
        <div class="overflow-x-auto w-full">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Tipo</th>
                        <th class="py-2 px-4 text-left">Valor</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Activo</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">ISV</td>
                        <td class="py-2 px-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">Impuesto</span></td>
                        <td class="py-2 px-4">15%</td>
                        <td class="py-2 px-4">Impuesto sobre ventas</td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">Numeración Automática</td>
                        <td class="py-2 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded">Numeración</span></td>
                        <td class="py-2 px-4">Activo</td>
                        <td class="py-2 px-4">Numeración automática de facturas</td>
                        <td class="py-2 px-4"><span class="text-green-600">Sí</span></td>
                        <td class="py-2 px-4">
                            <button class="text-blue-600 hover:text-blue-800 mr-2">Editar</button>
                            <button class="text-red-600 hover:text-red-800">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">3</td>
                        <td class="py-2 px-4">Formato Estándar</td>
                        <td class="py-2 px-4"><span class="bg-purple-100 text-purple-800 px-2 py-1 rounded">Formato</span></td>
                        <td class="py-2 px-4">A4</td>
                        <td class="py-2 px-4">Formato de factura estándar</td>
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
