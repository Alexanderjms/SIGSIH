<div x-data="{
    tab: 'movimientos',
    // Modales de movimientos
    isModalOpen: false,
    isEditModalOpen: false,
    movimientoToEdit: {id_kardex_pk: '', id_producto_fk: '', id_tipo_movimiento_fk: '', cantidad: '', fecha_movimiento: '', motivo: '', id_tecnico_fk: ''},
    isDeleteModalOpen: false,
    movimientoToDelete: {id_kardex_pk: '', id_producto_fk: ''},
    // Modales de tipo de movimiento
    isTipoModalOpen: false,
    isTipoEditModalOpen: false,
    tipoToEdit: {id_tipo_movimiento_pk: '', nombre_tipo_movimiento: '', descipcion_tipo_movimiento: ''},
    isTipoDeleteModalOpen: false,
    tipoToDelete: {id_tipo_movimiento_pk: '', nombre_tipo_movimiento: ''},
    filtroNombre: ''
}">
    <div class="border-b border-gray-200 mb-4">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <a href="#" @click.prevent="tab = 'movimientos'" :class="tab === 'movimientos' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Movimientos</a>
            <a href="#" @click.prevent="tab = 'tipos'" :class="tab === 'tipos' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Tipo de Movimiento</a>
        </nav>
    </div>
    <div x-show="tab === 'movimientos'">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">Kardex</h2>
            </x-slot>
            <x-slot name="filtros">
                <input type="text" placeholder="Buscar movimiento..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                    <option value="">Todos los productos</option>
                    <option>Producto Ejemplo</option>
                    <option>Producto 2</option>
                </select>
                <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                    <option value="">Todos los tipos</option>
                    <option>Entrada</option>
                    <option>Salida</option>
                </select>
            </x-slot>
            <x-slot name="boton">
                <button @click="isModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo movimiento</button>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID Kardex</th>
                            <th class="py-2 px-4 text-left">ID Producto</th>
                            <th class="py-2 px-4 text-left">ID Tipo Movimiento</th>
                            <th class="py-2 px-4 text-left">Cantidad</th>
                            <th class="py-2 px-4 text-left">Fecha Movimiento</th>
                            <th class="py-2 px-4 text-left">Motivo</th>
                            <th class="py-2 px-4 text-left">ID Técnico</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">101</td>
                            <td class="py-2 px-4">2</td>
                            <td class="py-2 px-4">10</td>
                            <td class="py-2 px-4">2025-07-26</td>
                            <td class="py-2 px-4">Inventario inicial</td>
                            <td class="py-2 px-4">5</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditModalOpen = true; movimientoToEdit = {id_kardex_pk: 1, id_producto_fk: 101, id_tipo_movimiento_fk: 2, cantidad: 10, fecha_movimiento: '2025-07-26', motivo: 'Inventario inicial', id_tecnico_fk: 5}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteModalOpen = true; movimientoToDelete = {id_kardex_pk: 1, id_producto_fk: 101}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <!-- Más movimientos aquí -->
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>
        <!-- Modal Nuevo Movimiento -->
        <div x-show="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-bold mb-4">Nuevo Movimiento</h3>
                <form>
                    <input type="number" placeholder="ID Producto" class="border rounded px-3 py-2 mb-2 w-full" />
                    <input type="number" placeholder="ID Tipo Movimiento" class="border rounded px-3 py-2 mb-2 w-full" />
                    <input type="number" placeholder="Cantidad" class="border rounded px-3 py-2 mb-2 w-full" />
                    <input type="date" placeholder="Fecha Movimiento" class="border rounded px-3 py-2 mb-2 w-full" />
                    <input type="text" placeholder="Motivo" class="border rounded px-3 py-2 mb-2 w-full" />
                    <input type="number" placeholder="ID Técnico" class="border rounded px-3 py-2 mb-2 w-full" />
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" @click="isModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Editar Movimiento -->
        <div x-show="isEditModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-bold mb-4">Editar Movimiento</h3>
                <form>
                    <input type="number" x-model="movimientoToEdit.id_producto_fk" placeholder="ID Producto" class="border rounded px-3 py-2 mb-2 w-full" />
                    <input type="number" x-model="movimientoToEdit.id_tipo_movimiento_fk" placeholder="ID Tipo Movimiento" class="border rounded px-3 py-2 mb-2 w-full" />
                    <input type="number" x-model="movimientoToEdit.cantidad" placeholder="Cantidad" class="border rounded px-3 py-2 mb-2 w-full" />
                    <input type="date" x-model="movimientoToEdit.fecha_movimiento" placeholder="Fecha Movimiento" class="border rounded px-3 py-2 mb-2 w-full" />
                    <input type="text" x-model="movimientoToEdit.motivo" placeholder="Motivo" class="border rounded px-3 py-2 mb-2 w-full" />
                    <input type="number" x-model="movimientoToEdit.id_tecnico_fk" placeholder="ID Técnico" class="border rounded px-3 py-2 mb-2 w-full" />
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" @click="isEditModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Eliminar Movimiento -->
        <div x-show="isDeleteModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-bold mb-4">Eliminar Movimiento</h3>
                <p>¿Seguro que deseas eliminar el movimiento con ID Kardex <span class="font-bold" x-text="movimientoToDelete.id_kardex_pk"></span>?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" @click="isDeleteModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button type="button" class="px-4 py-2 bg-red-600 text-white rounded">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <div x-show="tab === 'tipos'">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl text-gray-800 nunito-bold">Tipo de Movimiento</h2>
                <button @click="isTipoModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold">Nuevo tipo</button>
            </div>
            <div class="flex flex-wrap gap-2 items-center mb-4">
                <input type="text" x-model="filtroNombre" placeholder="Buscar por nombre..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID Tipo Movimiento</th>
                            <th class="py-2 px-4 text-left">Nombre</th>
                            <th class="py-2 px-4 text-left">Descripción</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="tipo in [{id_tipo_movimiento_pk: 1, nombre_tipo_movimiento: 'Entrada', descipcion_tipo_movimiento: 'Movimiento de ingreso de productos'}]" :key="tipo.id_tipo_movimiento_pk">
                            <tr class="border-b nunito-regular" x-show="!filtroNombre || tipo.nombre_tipo_movimiento.toLowerCase().includes(filtroNombre.toLowerCase())">
                                <td class="py-2 px-4" x-text="tipo.id_tipo_movimiento_pk"></td>
                                <td class="py-2 px-4" x-text="tipo.nombre_tipo_movimiento"></td>
                                <td class="py-2 px-4" x-text="tipo.descipcion_tipo_movimiento"></td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="#" @click="isTipoEditModalOpen = true; tipoToEdit = {...tipo}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                    <a href="#" @click="isTipoDeleteModalOpen = true; tipoToDelete = {...tipo}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </template>
                        <!-- Más tipos aquí -->
                    </tbody>
                </table>
            </div>

            <!-- Modal Nuevo Tipo de Movimiento -->
            <x-admin.form-modal modalName="isTipoModalOpen" title="Nuevo Tipo de Movimiento" submitLabel="Guardar" maxWidth="max-w-md">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Nombre</label>
                    <input type="text" class="w-full border rounded px-3 py-2" placeholder="Nombre del tipo" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Descripción</label>
                    <textarea class="w-full border rounded px-3 py-2" placeholder="Descripción"></textarea>
                </div>
            </x-admin.form-modal>

            <!-- Modal Editar Tipo de Movimiento -->
            <x-admin.edit-modal modalName="isTipoEditModalOpen" title="Editar Tipo de Movimiento" itemToEdit="tipoToEdit" maxWidth="max-w-md">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Nombre</label>
                    <input type="text" x-model="tipoToEdit.nombre_tipo_movimiento" class="w-full border rounded px-3 py-2" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Descripción</label>
                    <textarea x-model="tipoToEdit.descipcion_tipo_movimiento" class="w-full border rounded px-3 py-2"></textarea>
                </div>
            </x-admin.edit-modal>

            <!-- Modal Eliminar Tipo de Movimiento -->
            <x-admin.confirmation-modal modalName="isTipoDeleteModalOpen" itemToDelete="tipoToDelete" message="¿Seguro que deseas eliminar este tipo de movimiento?" />
        </div>
    </div>

    <!-- Modal Nuevo Movimiento -->
    <div x-show="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Nuevo Movimiento</h3>
            <form>
                <input type="number" placeholder="ID Producto" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="number" placeholder="ID Tipo Movimiento" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="number" placeholder="Cantidad" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="date" placeholder="Fecha Movimiento" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="text" placeholder="Motivo" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="number" placeholder="ID Técnico" class="border rounded px-3 py-2 mb-2 w-full" />
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" @click="isModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Editar Movimiento -->
    <div x-show="isEditModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Editar Movimiento</h3>
            <form>
                <input type="number" x-model="movimientoToEdit.id_producto_fk" placeholder="ID Producto" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="number" x-model="movimientoToEdit.id_tipo_movimiento_fk" placeholder="ID Tipo Movimiento" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="number" x-model="movimientoToEdit.cantidad" placeholder="Cantidad" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="date" x-model="movimientoToEdit.fecha_movimiento" placeholder="Fecha Movimiento" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="text" x-model="movimientoToEdit.motivo" placeholder="Motivo" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="number" x-model="movimientoToEdit.id_tecnico_fk" placeholder="ID Técnico" class="border rounded px-3 py-2 mb-2 w-full" />
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" @click="isEditModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Eliminar Movimiento -->
    <div x-show="isDeleteModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Eliminar Movimiento</h3>
            <p>¿Seguro que deseas eliminar el movimiento con ID Kardex <span class="font-bold" x-text="movimientoToDelete.id_kardex_pk"></span>?</p>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" @click="isDeleteModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded">Eliminar</button>
            </div>
        </div>
    </div>
</div>
