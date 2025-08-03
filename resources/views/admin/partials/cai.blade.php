<div x-data="{ 
    tab: 'cai', 
    isModalOpen: false, 
    isEditModalOpen: false, 
    itemToEdit: {id: '', codigo: '', rango_inicio: '', rango_fin: '', fecha_limite: '', estado_cai: ''}, 
    isDeleteModalOpen: false, 
    itemToDelete: {id: ''}, 
    isEstadoModalOpen: false, 
    isEditEstadoModalOpen: false, 
    estadoToEdit: {id: '', nombre: '', descripcion: ''}, 
    isDeleteEstadoModalOpen: false, 
    estadoToDelete: {id: ''} 
}">
    <ul class="flex border-b nunito-bold">
        <li @click="tab='cai'" :class="tab==='cai' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">CAI</li>
        <li @click="tab='estado_cai'" :class="tab==='estado_cai' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Estados CAI</li>
    </ul>

    {{-- TAB: CAI --}}
    <div x-show="tab==='cai'" class="overflow-x-auto">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">CAI</h2>
            </x-slot>
            <x-slot name="filtros">
                <input type="text" placeholder="Buscar CAI..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            </x-slot>
            <x-slot name="boton">
                <button @click="isModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo CAI</button>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID</th>
                            <th class="py-2 px-4 text-left">Código</th>
                            <th class="py-2 px-4 text-left">Rango Inicio</th>
                            <th class="py-2 px-4 text-left">Rango Fin</th>
                            <th class="py-2 px-4 text-left">Fecha Límite</th>
                            <th class="py-2 px-4 text-left">Estado CAI</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">ABC123</td>
                            <td class="py-2 px-4"> 000-001-01-00000001</td>
                            <td class="py-2 px-4">000-001-01-000000200</td>
                            <td class="py-2 px-4">2025-12-31</td>
                            <td class="py-2 px-4">Activo</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click.prevent="isEditModalOpen = true; itemToEdit = {id: 1, codigo: 'ABC123456789', rango_inicio: '0001', rango_fin: '1000', fecha_limite: '2025-12-31', estado_cai: 'Activo'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#" @click.prevent="isDeleteModalOpen = true; itemToDelete = {id: 1}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>
    </div>

    {{-- TAB: Estado CAI --}}
    <div x-show="tab==='estado_cai'" class="overflow-x-auto">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">Estado CAI</h2>
            </x-slot>
            <x-slot name="filtros">
                <input type="text" placeholder="Buscar estado CAI..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            </x-slot>
            <x-slot name="boton">
                <button @click="isEstadoModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo Estado CAI</button>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID</th>
                            <th class="py-2 px-4 text-left">Nombre Estado CAI</th>
                            <th class="py-2 px-4 text-left">Descripción Estado CAI</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">Activo</td>
                            <td class="py-2 px-4">Estado activo para el CAI</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click.prevent="isEditEstadoModalOpen = true; estadoToEdit = {id: 1, nombre: 'Activo', descripcion: 'Estado activo para el CAI'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#" @click.prevent="isDeleteEstadoModalOpen = true; estadoToDelete = {id: 1}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>
    </div>

    {{-- Modales --}}
    <x-admin.form-modal 
        modalName="isModalOpen" 
        title="Nuevo CAI" 
        submitLabel="Guardar CAI"
        maxWidth="max-w-md">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
                <input type="text" id="codigo" name="codigo" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="rango_inicio" class="block text-sm font-medium text-gray-700">Rango Inicio</label>
                <input type="text" id="rango_inicio" name="rango_inicio" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="rango_fin" class="block text-sm font-medium text-gray-700">Rango Fin</label>
                <input type="text" id="rango_fin" name="rango_fin" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha_limite" class="block text-sm font-medium text-gray-700">Fecha Límite</label>
                <input type="date" id="fecha_limite" name="fecha_limite" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="estado_cai" class="block text-sm font-medium text-gray-700">Estado CAI</label>
                <select id="estado_cai" name="estado_cai" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
        </div>
    </x-admin.form-modal>

    <x-admin.edit-modal 
        modalName="isEditModalOpen" 
        title="Editar CAI" 
        itemToEdit="itemToEdit"
        maxWidth="max-w-md">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="edit_codigo" class="block text-sm font-medium text-gray-700">Código</label>
                <input type="text" id="edit_codigo" name="edit_codigo" :value="itemToEdit.codigo" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_rango_inicio" class="block text-sm font-medium text-gray-700">Rango Inicio</label>
                <input type="text" id="edit_rango_inicio" name="edit_rango_inicio" :value="itemToEdit.rango_inicio" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_rango_fin" class="block text-sm font-medium text-gray-700">Rango Fin</label>
                <input type="text" id="edit_rango_fin" name="edit_rango_fin" :value="itemToEdit.rango_fin" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_fecha_limite" class="block text-sm font-medium text-gray-700">Fecha Límite</label>
                <input type="date" id="edit_fecha_limite" name="edit_fecha_limite" :value="itemToEdit.fecha_limite" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_estado_cai" class="block text-sm font-medium text-gray-700">Estado CAI</label>
                <select id="edit_estado_cai" name="edit_estado_cai" :value="itemToEdit.estado_cai" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
        </div>
    </x-admin.edit-modal>

    {{-- Modales Estado CAI --}}
    <x-admin.form-modal 
        modalName="isEstadoModalOpen" 
        title="Nuevo Estado CAI" 
        submitLabel="Guardar Estado CAI"
        maxWidth="max-w-md">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="nombre_estado" class="block text-sm font-medium text-gray-700">Nombre Estado CAI</label>
                <input type="text" id="nombre_estado" name="nombre_estado" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="descripcion_estado" class="block text-sm font-medium text-gray-700">Descripción Estado CAI</label>
                <textarea id="descripcion_estado" name="descripcion_estado" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
        </div>
    </x-admin.form-modal>

    <x-admin.edit-modal 
        modalName="isEditEstadoModalOpen" 
        title="Editar Estado CAI" 
        itemToEdit="estadoToEdit"
        maxWidth="max-w-md">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="edit_nombre_estado" class="block text-sm font-medium text-gray-700">Nombre Estado CAI</label>
                <input type="text" id="edit_nombre_estado" name="edit_nombre_estado" :value="estadoToEdit.nombre" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_descripcion_estado" class="block text-sm font-medium text-gray-700">Descripción Estado CAI</label>
                <textarea id="edit_descripcion_estado" name="edit_descripcion_estado" :value="estadoToEdit.descripcion" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
        </div>
    </x-admin.edit-modal>

    <x-admin.confirmation-modal
        modalName="isDeleteModalOpen"
        itemToDelete="itemToDelete"
        message="¿Estás seguro de que quieres eliminar este CAI?"
    />

    <x-admin.confirmation-modal
        modalName="isDeleteEstadoModalOpen"
        itemToDelete="estadoToDelete"
        message="¿Estás seguro de que quieres eliminar este estado CAI?"
    />
</div>
