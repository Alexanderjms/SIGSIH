<div x-data="{
        isCreateModalOpen: false,
        isEditModalOpen: false,
        isDeleteModalOpen: false,
        parametroToEdit: null,
        parametroToDelete: null
    }">

    <div class="w-full">
        <x-admin.tabla-crud :titulo="'Gestión de Parámetros'">
            <x-slot name="filtros">
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 mb-4 w-full">
                    <input type="text" placeholder="Buscar parámetro..."
                        class="border rounded px-3 py-2 text-sm w-full sm:w-56" />
                    <select class="border rounded px-3 py-2 text-sm w-full sm:w-44">
                        <option value="">Usuario (todos)</option>
                        <option>admin</option>
                        <option>soporte</option>
                    </select>
                    <select class="border rounded px-3 py-2 text-sm w-full sm:w-44">
                        <option value="">Creador (todos)</option>
                        <option>admin</option>
                        <option>soporte</option>
                    </select>
                    <select class="border rounded px-3 py-2 text-sm w-full sm:w-44">
                        <option value="">Ordenar por</option>
                        <option>Parámetro</option>
                        <option>Valor</option>
                        <option>Fecha creación</option>
                    </select>
                    <div class="flex flex-col gap-2 w-full sm:w-auto">
                        <button @click="isCreateModalOpen = true"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">
                            Agregar parámetro
                        </button>
                        <a href="/admin/reportes-header?modulo=Parametros&fecha={{ now()->format('d-M-Y') }}" target="_blank"
                           class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap flex items-center gap-2">
                            <i class="fas fa-file-alt"></i> Generar Reporte
                        </a>
                    </div>
                </div>
            </x-slot>

            <!-- Responsive tabla: tarjetas en móvil, tabla en >=sm -->
            <div class="block sm:hidden space-y-4">
                <template x-for="parametro in [
                    {parametro: 'Tiempo de sesión', valor: '30', usuario: 'admin', creado_por: 'admin', fecha: '2025-07-31'},
                    {parametro: 'Longitud mínima clave', valor: '8', usuario: 'admin', creado_por: 'soporte', fecha: '2025-07-25'}
                ]" :key="parametro.parametro">
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col gap-2 border border-gray-200">
                        <div class="flex justify-between">
                            <span class="font-bold text-blue-700">Parámetro:</span>
                            <span x-text="parametro.parametro"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-bold text-blue-700">Valor:</span>
                            <span x-text="parametro.valor"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-bold text-blue-700">Usuario:</span>
                            <span x-text="parametro.usuario"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-bold text-blue-700">Creado por:</span>
                            <span x-text="parametro.creado_por"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-bold text-blue-700">Fecha creación:</span>
                            <span x-text="parametro.fecha"></span>
                        </div>
                        <div class="flex gap-2 pt-2">
                            <button @click="isEditModalOpen = true; parametroToEdit = parametro"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white rounded px-3 py-1 flex items-center justify-center gap-1">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                            <button @click="isDeleteModalOpen = true; parametroToDelete = parametro"
                                class="flex-1 bg-red-600 hover:bg-red-700 text-white rounded px-3 py-1 flex items-center justify-center gap-1">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </div>
                    </div>
                </template>
            </div>
            <div class="hidden sm:block overflow-x-auto">
                <table class="min-w-full text-xs md:text-sm whitespace-nowrap">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 text-left">Parámetro</th>
                            <th class="py-2 px-4 text-left">Valor</th>
                            <th class="py-2 px-4 text-left">Usuario</th>
                            <th class="py-2 px-4 text-left">Creado por</th>
                            <th class="py-2 px-4 text-left">Fecha creación</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="parametro in [
                            {parametro: 'Tiempo de sesión', valor: '30', usuario: 'admin', creado_por: 'admin', fecha: '2025-07-31'},
                            {parametro: 'Longitud mínima clave', valor: '8', usuario: 'admin', creado_por: 'soporte', fecha: '2025-07-25'}
                        ]" :key="parametro.parametro">
                            <tr class="border-b">
                                <td class="py-2 px-4" x-text="parametro.parametro"></td>
                                <td class="py-2 px-4" x-text="parametro.valor"></td>
                                <td class="py-2 px-4" x-text="parametro.usuario"></td>
                                <td class="py-2 px-4" x-text="parametro.creado_por"></td>
                                <td class="py-2 px-4" x-text="parametro.fecha"></td>
                                <td class="py-2 px-2 flex gap-2">
                                    <a href="#" @click="isEditModalOpen = true; parametroToEdit = parametro"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" @click="isDeleteModalOpen = true; parametroToDelete = parametro"
                                        class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>
    </div>

    <!-- Modal Agregar Parámetro -->
    <x-admin.form-modal modalName="isCreateModalOpen" title="Agregar Parámetro" submitLabel="Guardar"
        maxWidth="max-w-xl">
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Parámetro</label>
            <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Tiempo de sesión" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Valor</label>
            <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: 30" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Usuario</label>
            <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: admin" />
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Parámetro -->
    <x-admin.edit-modal modalName="isEditModalOpen" title="Editar Parámetro" itemToEdit="parametroToEdit"
        maxWidth="max-w-xl">
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Parámetro</label>
            <input type="text" class="w-full border rounded px-3 py-2" :value="parametroToEdit?.parametro" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Valor</label>
            <input type="text" class="w-full border rounded px-3 py-2" :value="parametroToEdit?.valor" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Usuario</label>
            <input type="text" class="w-full border rounded px-3 py-2" :value="parametroToEdit?.usuario" />
        </div>
    </x-admin.edit-modal>

    <!-- Modal Confirmar Eliminación -->
    <x-admin.confirmation-modal modalName="isDeleteModalOpen" itemToDelete="parametroToDelete"
        message="¿Estás seguro de que deseas eliminar este parámetro?" />
</div>
