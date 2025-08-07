<div x-data="{ 
    isEstadoModalOpen: false, 
    isEditEstadoModalOpen: false, 
    isDeleteEstadoModalOpen: false, 
    estadoToEdit: { id: '', nombre: '', descripcion: '' }, 
    estadoToDelete: null,
    searchEstadoProyecto: '' 
}">
    <x-admin.tabla-crud :titulo="'Gestión de Estados de Proyecto'">
        <x-slot name="filtros">
            <div class="flex flex-wrap gap-2 items-center">
                <input type="text" x-model="searchEstadoProyecto" placeholder="Buscar estado..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            </div>
        </x-slot>
        <x-slot name="boton">
            <button @click="isEstadoModalOpen = true"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo Estado</button>
        </x-slot>
        <div class="overflow-x-auto w-full">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100 nunito-bold">
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Nombre</th> 
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Planificación</td>
                        <td class="py-2 px-4">Proyecto en fase de planificación</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditEstadoModalOpen = true; estadoToEdit = {id: 1, nombre: 'Planificación', descripcion: 'Proyecto en fase de planificación'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteEstadoModalOpen = true; estadoToDelete = {id: 1, nombre: 'Planificación'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">En Proceso</td>
                        <td class="py-2 px-4">El proyecto se encuentra actualmente en desarrollo</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditEstadoModalOpen = true; estadoToEdit = {id: 2, nombre: 'En Proceso', descripcion: 'El proyecto se encuentra actualmente en desarrollo'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteEstadoModalOpen = true; estadoToDelete = {id: 2, nombre: 'En Proceso'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">3</td>
                        <td class="py-2 px-4">Completado</td>
                        <td class="py-2 px-4">Proyecto finalizado exitosamente</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditEstadoModalOpen = true; estadoToEdit = {id: 3, nombre: 'Completado', descripcion: 'Proyecto finalizado exitosamente'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteEstadoModalOpen = true; estadoToDelete = {id: 3, nombre: 'Completado'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">4</td>
                        <td class="py-2 px-4">Cancelado</td>
                        <td class="py-2 px-4">Proyecto cancelado por el cliente</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditEstadoModalOpen = true; estadoToEdit = {id: 4, nombre: 'Cancelado', descripcion: 'Proyecto cancelado por el cliente'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteEstadoModalOpen = true; estadoToDelete = {id: 4, nombre: 'Cancelado'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-admin.tabla-crud>

    <!-- Modal Nuevo Estado -->
    <x-admin.form-modal 
        modalName="isEstadoModalOpen" 
        title="Nuevo Estado" 
        submitLabel="Guardar Estado">
        <div class="space-y-4">
            <div>
                <label for="nombre_estado" class="block text-sm font-medium text-gray-700">Nombre del Estado</label>
                <input type="text" id="nombre_estado" name="nombre_estado"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="descripcion_estado" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="descripcion_estado" name="descripcion_estado" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Estado -->
    <x-admin.edit-modal 
        modalName="isEditEstadoModalOpen" 
        title="Editar Estado" 
        itemToEdit="estadoToEdit">
        <div>
            <label for="edit_nombre_estado" class="block text-sm font-medium text-gray-700">Nombre del Estado</label>
            <input type="text" id="edit_nombre_estado" name="edit_nombre_estado" :value="estadoToEdit.nombre"
                class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
        <div class="mt-4">
            <label for="edit_descripcion_estado" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="edit_descripcion_estado" name="edit_descripcion_estado" rows="3" 
                class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2" 
                x-text="estadoToEdit.descripcion"></textarea>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Confirmar Eliminación Estado -->
    <x-admin.confirmation-modal
        modalName="isDeleteEstadoModalOpen"
        itemToDelete="estadoToDelete"
        message="¿Estás seguro de que quieres eliminar el estado?"
    />
</div>
