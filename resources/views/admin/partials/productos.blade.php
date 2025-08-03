<div x-data="{ isModalOpen: false, isEditModalOpen: false, productoToEdit: {id: '', nombre: '', categoria: '', precio: '', stock: ''}, isDeleteModalOpen: false, productoToDelete: {id: '', nombre: ''} }">
    <div x-data="{ tab: 'productos' }">
        <div class="border-b border-gray-200 mb-4">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <a href="#" @click.prevent="tab = 'productos'" :class="tab === 'productos' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Productos</a>
                <a href="#" @click.prevent="tab = 'tipos'" :class="tab === 'tipos' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Tipo de Producto</a>
            </nav>
        </div>
        <div x-show="tab === 'productos'">
            <x-admin.tabla-crud>
                <x-slot name="titulo">
                    <h2 class="text-2xl text-gray-800 nunito-bold">Productos</h2>
                </x-slot>
                <x-slot name="filtros">
                    <div class="flex flex-wrap gap-2 items-center">
                        <input type="text" placeholder="Buscar por nombre..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                        <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                        <option value="">Todas las categorías</option>
                        <option>Computadoras</option>
                        <option>Accesorios</option>
                        <option>Redes</option>
                        <option>Impresoras</option>
                        <option>Software</option>
                        <option>Componentes</option>
                        <option>Licencias</option>
                        </select>
                        <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                            <option value="">Stock</option>
                            <option value="disponible">Disponible</option>
                            <option value="agotado">Agotado</option>
                        </select>
                    </div>
                </x-slot>
                <x-slot name="boton">
                    <button @click="isModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo producto</button>
                </x-slot>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 nunito-bold">
                            <tr>
                                <th class="py-2 px-4 text-left">ID</th>
                                <th class="py-2 px-4 text-left">Nombre</th>
                                <th class="py-2 px-4 text-left">Categoría</th>
                                <th class="py-2 px-4 text-left">Precio</th>
                                <th class="py-2 px-4 text-left">Stock</th>
                                <th class="py-2 px-4 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b nunito-regular">
                                <td class="py-2 px-4">1</td>
                                <td class="py-2 px-4">Producto Ejemplo</td>
                                <td class="py-2 px-4">General</td>
                                <td class="py-2 px-4">L.250.00</td>
                                <td class="py-2 px-4">50</td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="#" @click="isEditModalOpen = true; productoToEdit = {id: 1, nombre: 'Producto Ejemplo', categoria: 'General', precio: 100.00, stock: 50}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                    <a href="#" @click="isDeleteModalOpen = true; productoToDelete = {id: 1, nombre: 'Producto Ejemplo'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Más productos aquí -->
                        </tbody>
                    </table>
                </div>
            </x-admin.tabla-crud>
        </div>
        <div x-show="tab === 'tipos'" x-data="{ isTipoModalOpen: false, isTipoEditModalOpen: false, tipoToEdit: {id_tipo_producto_pk: '', nombre_tipo_producto: '', descripcion_tipo_producto: ''}, isTipoDeleteModalOpen: false, tipoToDelete: {id_tipo_producto_pk: '', nombre_tipo_producto: ''}, filtroNombre: '' }">
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl text-gray-800 nunito-bold">Tipo de Producto</h2>
                    <button @click="isTipoModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold">Nuevo tipo</button>
                </div>
                <div class="flex flex-wrap gap-2 items-center mb-4">
                    <input type="text" x-model="filtroNombre" placeholder="Buscar por nombre..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 nunito-bold">
                            <tr>
                                <th class="py-2 px-4 text-left">ID Tipo Producto</th>
                                <th class="py-2 px-4 text-left">Nombre</th>
                                <th class="py-2 px-4 text-left">Descripción</th>
                                <th class="py-2 px-4 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="tipo in [{id_tipo_producto_pk: 1, nombre_tipo_producto: 'Hardware', descripcion_tipo_producto: 'Dispositivos físicos como computadoras, impresoras, etc.'}]"
                                :key="tipo.id_tipo_producto_pk">
                                <tr class="border-b nunito-regular" x-show="!filtroNombre || tipo.nombre_tipo_producto.toLowerCase().includes(filtroNombre.toLowerCase())">
                                    <td class="py-2 px-4" x-text="tipo.id_tipo_producto_pk"></td>
                                    <td class="py-2 px-4" x-text="tipo.nombre_tipo_producto"></td>
                                    <td class="py-2 px-4" x-text="tipo.descripcion_tipo_producto"></td>
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

                <!-- Modal Nuevo Tipo de Producto -->
                <x-admin.form-modal modalName="isTipoModalOpen" title="Nuevo Tipo de Producto" submitLabel="Guardar" maxWidth="max-w-md">
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nombre</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Nombre del tipo" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Descripción</label>
                        <textarea class="w-full border rounded px-3 py-2" placeholder="Descripción"></textarea>
                    </div>
                </x-admin.form-modal>

                <!-- Modal Editar Tipo de Producto -->
                <x-admin.edit-modal modalName="isTipoEditModalOpen" title="Editar Tipo de Producto" itemToEdit="tipoToEdit" maxWidth="max-w-md">
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nombre</label>
                        <input type="text" x-model="tipoToEdit.nombre_tipo_producto" class="w-full border rounded px-3 py-2" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Descripción</label>
                        <textarea x-model="tipoToEdit.descripcion_tipo_producto" class="w-full border rounded px-3 py-2"></textarea>
                    </div>
                </x-admin.edit-modal>

                <!-- Modal Eliminar Tipo de Producto -->
                <x-admin.confirmation-modal modalName="isTipoDeleteModalOpen" itemToDelete="tipoToDelete" message="¿Seguro que deseas eliminar este tipo de producto?" />
            </div>
        </div>
    </div>

    <!-- Modal Nuevo Producto -->
    <x-admin.form-modal modalName="isModalOpen" title="Nuevo Producto" submitLabel="Guardar" maxWidth="max-w-md">
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nombre</label>
            <input type="text" class="w-full border rounded px-3 py-2" placeholder="Nombre" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Categoría</label>
            <select class="w-full border rounded px-3 py-2">
                <option>Computadoras</option>
                <option>Accesorios</option>
                <option>Redes</option>
                <option>Impresoras</option>
                <option>Software</option>
                <option>Componentes</option>
                <option>Licencias</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Precio</label>
            <input type="number" class="w-full border rounded px-3 py-2" placeholder="Precio" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Stock</label>
            <input type="number" class="w-full border rounded px-3 py-2" placeholder="Stock" />
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Producto -->
    <x-admin.edit-modal modalName="isEditModalOpen" title="Editar Producto" itemToEdit="productoToEdit" maxWidth="max-w-md">
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nombre</label>
            <input type="text" x-model="productoToEdit.nombre" class="w-full border rounded px-3 py-2" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Categoría</label>
            <select x-model="productoToEdit.categoria" class="w-full border rounded px-3 py-2">
                <option>Computadoras</option>
                <option>Accesorios</option>
                <option>Redes</option>
                <option>Impresoras</option>
                <option>Software</option>
                <option>Componentes</option>
                <option>Licencias</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Precio</label>
            <input type="number" x-model="productoToEdit.precio" class="w-full border rounded px-3 py-2" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Stock</label>
            <input type="number" x-model="productoToEdit.stock" class="w-full border rounded px-3 py-2" />
        </div>
    </x-admin.edit-modal>

    <!-- Modal Eliminar Producto -->
    <x-admin.confirmation-modal modalName="isDeleteModalOpen" itemToDelete="productoToDelete" message="¿Seguro que deseas eliminar este producto?" />
</div>
