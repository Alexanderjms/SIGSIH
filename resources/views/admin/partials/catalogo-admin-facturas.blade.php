<div x-data="{ 
    isEstadoFacturaModalOpen: false,
    isEditEstadoFacturaModalOpen: false,
    estadoFacturaToEdit: {id: '', nombre: '', descripcion: ''},
    isDeleteEstadoFacturaModalOpen: false,
    estadoFacturaToDelete: {id: ''}
}" class="overflow-x-auto w-full">
    <div class="bg-white rounded-lg shadow p-6 mt-6 w-full">
        <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4 w-full">
            <h2 class="text-2xl text-gray-800 nunito-bold">Estados de Factura</h2>
            <button @click="isEstadoFacturaModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo Estado</button>
        </div>
        <table class="min-w-full text-sm w-full">
            <thead class="bg-gray-100 nunito-bold">
                <tr>
                    <th class="py-2 px-4 text-left">ID</th>
                    <th class="py-2 px-4 text-left">Nombre Estado</th>
                    <th class="py-2 px-4 text-left">Descripción</th>
                    <th class="py-2 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b nunito-regular">
                    <td class="py-2 px-4">1</td>
                    <td class="py-2 px-4">Pagada</td>
                    <td class="py-2 px-4">Factura completamente pagada</td>
                    <td class="py-2 px-4 flex gap-2">
                        <button @click="isEditEstadoFacturaModalOpen = true; estadoFacturaToEdit = {id: 1, nombre: 'Pagada', descripcion: 'Factura completamente pagada'}" class="text-blue-500 hover:text-blue-700" title="Editar">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button @click="isDeleteEstadoFacturaModalOpen = true; estadoFacturaToDelete = {id: 1}" class="text-red-500 hover:text-red-700" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr class="border-b nunito-regular">
                    <td class="py-2 px-4">2</td>
                    <td class="py-2 px-4">Pendiente</td>
                    <td class="py-2 px-4">Factura pendiente de pago</td>
                    <td class="py-2 px-4 flex gap-2">
                        <button @click="isEditEstadoFacturaModalOpen = true; estadoFacturaToEdit = {id: 2, nombre: 'Pendiente', descripcion: 'Factura pendiente de pago'}" class="text-blue-500 hover:text-blue-700" title="Editar">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button @click="isDeleteEstadoFacturaModalOpen = true; estadoFacturaToDelete = {id: 2}" class="text-red-500 hover:text-red-700" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr class="border-b nunito-regular">
                    <td class="py-2 px-4">3</td>
                    <td class="py-2 px-4">Cancelada</td>
                    <td class="py-2 px-4">Factura cancelada</td>
                    <td class="py-2 px-4 flex gap-2">
                        <button @click="isEditEstadoFacturaModalOpen = true; estadoFacturaToEdit = {id: 3, nombre: 'Cancelada', descripcion: 'Factura cancelada'}" class="text-blue-500 hover:text-blue-700" title="Editar">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button @click="isDeleteEstadoFacturaModalOpen = true; estadoFacturaToDelete = {id: 3}" class="text-red-500 hover:text-red-700" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal Nuevo Estado Factura -->
    <x-admin.form-modal modalName="isEstadoFacturaModalOpen" title="Nuevo Estado Factura" submitLabel="Guardar Estado">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre Estado</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Ej: En Proceso">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="3" placeholder="Descripción del estado de la factura"></textarea>
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Estado Factura -->
    <x-admin.edit-modal modalName="isEditEstadoFacturaModalOpen" title="Editar Estado Factura" itemToEdit="estadoFacturaToEdit">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">ID Estado</label>
                <input type="text" class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-lg" x-bind:value="estadoFacturaToEdit?.id" readonly>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre Estado</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" x-bind:value="estadoFacturaToEdit?.nombre">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="3" x-text="estadoFacturaToEdit?.descripcion"></textarea>
            </div>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Eliminar Estado Factura -->
    <x-admin.confirmation-modal modalName="isDeleteEstadoFacturaModalOpen" itemToDelete="estadoFacturaToDelete" message="¿Está seguro que desea eliminar este estado de factura? Esta acción no se puede deshacer." />
</div>
