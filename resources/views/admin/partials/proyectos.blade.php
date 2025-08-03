{{-- Pestañas --}}
<div x-data="{ 
    tab: 'proyectos', 
    minIngresoMonto: '', 
    maxIngresoMonto: '', 
    minGastoMonto: '', 
    maxGastoMonto: '', 
    isModalOpen: false, 
    isCategoriaModalOpen: false, 
    isEditCategoriaModalOpen: false, 
    categoriaToEdit: { id: '', tipo: '', nombre: '' }, 
    isIngresoModalOpen: false, 
    isGastoModalOpen: false, 
    isEditIngresoModalOpen: false, 
    isEditGastoModalOpen: false, 
    ingresoToEdit: { id: '', proyecto: '', nombre: '', fecha: '', monto: '', categoria: '', descripcion: '' }, 
    gastoToEdit: { id: '', proyecto: '', nombre: '', fecha: '', monto: '', categoria: '', descripcion: '' }, 
    isDeleteProjectModalOpen: false, 
    projectToDelete: null, 
    isDeleteCategoriaModalOpen: false, 
    categoriaToDelete: null, 
    isDeleteIngresoModalOpen: false, 
    ingresoToDelete: null, 
    isDeleteGastoModalOpen: false, 
    gastoToDelete: null, 
    isEditProjectModalOpen: false, 
    projectToEdit: { id: '', nombre: '', fecha_inicio: '', fecha_estimada_fin: '', fecha_fin: '', descripcion: '', actividades: '', orden_servicio: '', estado: '' }, 
    isEstadoModalOpen: false, 
    isEditEstadoModalOpen: false, 
    isDeleteEstadoModalOpen: false, 
    estadoToEdit: { id: '', nombre: '', descripcion: '' }, 
    estadoToDelete: null 
}">
    <ul class="flex border-b nunito-bold">
        <li @click="tab='proyectos'" :class="tab==='proyectos' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Proyectos</li>
        <li @click="tab='categorias'" :class="tab==='categorias' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Categorías</li>
        <li @click="tab='movimientos'" :class="tab==='movimientos' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Movimientos</li>
        <li @click="tab='estados'" :class="tab==='estados' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="pb-2">Estados</li>
    </ul>
    
    <div x-show="tab==='proyectos'" class="overflow-x-auto">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">Proyectos</h2>
            </x-slot>
            <x-slot name="filtros">
                <input type="text" placeholder="Buscar proyecto..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                    <option class="nunito-bold" value="">Todos los estados</option>
                    <option class="nunito-bold">En Proceso</option>
                    <option class="nunito-bold">Finalizado</option>
                    <option class="nunito-bold">Pendiente</option>
                    <option class="nunito-bold">Cancelado</option>
                </select>
            </x-slot>
            <x-slot name="boton">
                <button @click="isModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo proyecto</button>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID</th>
                            <th class="py-2 px-4 text-left">Nombre</th>
                            <th class="py-2 px-4 text-left">Fecha Inicial</th>
                            <th class="py-2 px-4 text-left">Fecha Fin Estimada</th>
                            <th class="py-2 px-4 text-left">Fecha Fin Real</th>
                            <th class="py-2 px-4 text-left">Descripción</th>
                            <th class="py-2 px-4 text-left">Actividades</th>
                            <th class="py-2 px-4 text-left">Orden de Servicio</th>
                            <th class="py-2 px-4 text-left">Estado</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">Proyecto Alpha</td>
                            <td class="py-2 px-4">2025-01-15</td>
                            <td class="py-2 px-4">2025-07-30</td>
                            <td class="py-2 px-4">2025-07-29</td>
                            <td class="py-2 px-4">Implementación inicial del sistema</td>
                            <td class="py-2 px-4">5 tareas</td>
                            <td class="py-2 px-4">OS-00123</td>
                            <td class="py-2 px-4">
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded">Finalizado</span>
                            </td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditProjectModalOpen = true; projectToEdit = {id: 1, nombre: 'Proyecto Alpha', fecha_inicio: '2025-01-15', fecha_estimada_fin: '2025-07-30', fecha_fin: '2025-07-29', descripcion: 'Implementación inicial del sistema', actividades: '5 tareas', orden_servicio: 'OS-00123', estado: 'Finalizado'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteProjectModalOpen = true; projectToDelete = {id: 1, nombre: 'Proyecto Alpha'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">2</td>
                            <td class="py-2 px-4">Proyecto Beta</td>
                            <td class="py-2 px-4">2025-02-01</td>
                            <td class="py-2 px-4">2025-08-20</td>
                            <td class="py-2 px-4">-</td>
                            <td class="py-2 px-4">Planificación y diseño preliminar</td>
                            <td class="py-2 px-4">3 tareas</td>
                            <td class="py-2 px-4">OS-00124</td>
                            <td class="py-2 px-4">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded">En Proceso</span>
                            </td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditProjectModalOpen = true; projectToEdit = {id: 2, nombre: 'Proyecto Beta', fecha_inicio: '2025-02-01', fecha_estimada_fin: '2025-08-20', fecha_fin: '', descripcion: 'Planificación y diseño preliminar', actividades: '3 tareas', orden_servicio: 'OS-00124', estado: 'En Proceso'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteProjectModalOpen = true; projectToDelete = {id: 2, nombre: 'Proyecto Beta'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>
    </div>

    <div x-show="tab==='categorias'" class="overflow-x-auto">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">Categorías</h2>
            </x-slot>
            <x-slot name="filtros">
                <input type="text" placeholder="Buscar categoría..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                    <option class="nunito-bold" value="">Todos los tipos</option>
                    <option class="nunito-bold">Ingreso</option>
                    <option class="nunito-bold">Gasto</option>
                </select>
            </x-slot>
            <x-slot name="boton">
                <button @click="isCategoriaModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar categoría</button>
            </x-slot>
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 nunito-bold">
                    <tr>
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Tipo</th>
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Ingreso</td>
                        <td class="py-2 px-4">Salarios</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditCategoriaModalOpen = true; categoriaToEdit = {id: 1, tipo: 'Ingreso', nombre: 'Salarios'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteCategoriaModalOpen = true; categoriaToDelete = {id: 1, nombre: 'Salarios'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">Gasto</td>
                        <td class="py-2 px-4">Alquiler</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditCategoriaModalOpen = true; categoriaToEdit = {id: 2, tipo: 'Gasto', nombre: 'Alquiler'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteCategoriaModalOpen = true; categoriaToDelete = {id: 2, nombre: 'Alquiler'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </x-admin.tabla-crud>
    </div>

    <div x-show="tab==='movimientos'" class="space-y-6">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h3 class="text-2xl text-gray-800 mb-4 border-b pb-4 nunito-bold">Ingresos</h3>
            </x-slot>
            <x-slot name="filtros">
                <div class="flex flex-wrap gap-2">
                    <input type="text" placeholder="Buscar ingreso..." class="border rounded px-3 py-2 text-sm w-full sm:w-40" />
                    <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                        <option class="nunito-bold" value="">Todos los proyectos</option>
                        <option class="nunito-bold">Proyecto Alpha</option>
                        <option class="nunito-bold">Proyecto Beta</option>
                        <option class="nunito-bold">Proyecto BAC</option>
                    </select>
                    <div class="flex items-center gap-2">
                        <input type="number" x-model="minIngresoMonto" placeholder="Monto mín." class="border rounded px-3 py-2 text-sm w-28" />
                        <span class="text-gray-500">-</span>
                        <input type="number" x-model="maxIngresoMonto" placeholder="Monto máx." class="border rounded px-3 py-2 text-sm w-28" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="boton">
                <button @click="isIngresoModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar Ingreso</button>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID</th>
                            <th class="py-2 px-4 text-left">Proyecto</th>
                            <th class="py-2 px-4 text-left">Nombre</th>
                            <th class="py-2 px-4 text-left">Fecha</th>
                            <th class="py-2 px-4 text-left">Monto</th>
                            <th class="py-2 px-4 text-left">Categoría</th>
                            <th class="py-2 px-4 text-left">Descripción</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">Proyecto BAC</td>
                            <td class="py-2 px-4">Pago inicial</td>
                            <td class="py-2 px-4">2025-07-20</td>
                            <td class="py-2 px-4">L. 15,000.00</td>
                            <td class="py-2 px-4">Salarios</td>
                            <td class="py-2 px-4">Primer pago del Proyecto BAC</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditIngresoModalOpen = true; ingresoToEdit = {id: 1, proyecto: 'Proyecto BAC', nombre: 'Pago inicial', fecha: '2025-07-20', monto: '15000.00', categoria: 'Salarios', descripcion: 'Primer pago del Proyecto BAC'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteIngresoModalOpen = true; ingresoToDelete = {id: 1, nombre: 'Pago inicial'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>

        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h3 class="text-2xl text-gray-800 mb-4 border-b pb-4 nunito-bold">Gastos</h3>
            </x-slot>
            <x-slot name="filtros">
                <div class="flex flex-wrap gap-2">
                    <input type="text" placeholder="Buscar gasto..." class="border rounded px-3 py-2 text-sm w-full sm:w-40" />
                    <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                        <option class="nunito-bold" value="">Todos los proyectos</option>
                        <option class="nunito-bold">Proyecto Alpha</option>
                        <option class="nunito-bold">Proyecto Beta</option>
                        <option class="nunito-bold">Proyecto BAC</option>
                    </select>
                    <div class="flex items-center gap-2">
                        <input type="number" x-model="minGastoMonto" placeholder="Monto mín." class="border rounded px-3 py-2 text-sm w-28" />
                        <span class="text-gray-500">-</span>
                        <input type="number" x-model="maxGastoMonto" placeholder="Monto máx." class="border rounded px-3 py-2 text-sm w-28" />
                    </div>
                </div>
            </x-slot>
            <x-slot name="boton">
                <button @click="isGastoModalOpen = true" class="bg-red-800 hover:bg-red-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar Gasto</button>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID</th>
                            <th class="py-2 px-4 text-left">Proyecto</th>
                            <th class="py-2 px-4 text-left">Nombre</th>
                            <th class="py-2 px-4 text-left">Fecha</th>
                            <th class="py-2 px-4 text-left">Monto</th>
                            <th class="py-2 px-4 text-left">Categoría</th>
                            <th class="py-2 px-4 text-left">Descripción</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">Proyecto BAC</td>
                            <td class="py-2 px-4">Compra de software</td>
                            <td class="py-2 px-4">2025-07-22</td>
                            <td class="py-2 px-4">L. 5,500.00</td>
                            <td class="py-2 px-4">Licencias</td>
                            <td class="py-2 px-4">Licencias de software de desarrollo</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditGastoModalOpen = true; gastoToEdit = {id: 1, proyecto: 'Proyecto BAC', nombre: 'Compra de software', fecha: '2025-07-22', monto: '5500.00', categoria: 'Licencias', descripcion: 'Licencias de software de desarrollo'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteGastoModalOpen = true; gastoToDelete = {id: 1, nombre: 'Compra de software'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.tabla-crud>
    </div>

    <div x-show="tab==='estados'" class="overflow-x-auto">
        <x-admin.tabla-crud>
            <x-slot name="titulo">
                <h2 class="text-2xl text-gray-800 nunito-bold">Estados de Proyecto</h2>
            </x-slot>
            <x-slot name="filtros">
                <input type="text" placeholder="Buscar estado..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            </x-slot>
            <x-slot name="boton">
                <button @click="isEstadoModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo Estado</button>
            </x-slot>
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 nunito-bold">
                    <tr>
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Nombre</th> 
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">En Proceso</td>
                        <td class="py-2 px-4">El proyecto se encuentra actualmente en desarrollo</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditEstadoModalOpen = true; estadoToEdit = {id: 1, nombre: 'En Proceso', descripcion: 'El proyecto se encuentra actualmente en desarrollo'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteEstadoModalOpen = true; estadoToDelete = {id: 1, nombre: 'En Proceso'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </x-admin.tabla-crud>
    </div>

    <!-- Modal Nuevo Proyecto -->
    <x-admin.form-modal 
        modalName="isModalOpen" 
        title="Nuevo Proyecto" 
        submitLabel="Guardar Proyecto"
        maxWidth="max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha Inicial del Proyecto</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha_estimada_fin" class="block text-sm font-medium text-gray-700">Fecha Estimada de Finalización</label>
                <input type="date" id="fecha_estimada_fin" name="fecha_estimada_fin"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de Finalización</label>
                <input type="date" id="fecha_fin" name="fecha_fin"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
            <div>
                <label for="actividades" class="block text-sm font-medium text-gray-700">Actividades</label>
                <input type="text" id="actividades" name="actividades"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="orden_servicio" class="block text-sm font-medium text-gray-700">Orden de Servicio</label>
                <input type="text" id="orden_servicio" name="orden_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="estado_proyecto" class="block text-sm font-medium text-gray-700">Estado de Proyecto</label>
                <select id="estado_proyecto" name="estado_proyecto"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option>En Proceso</option>
                    <option>Finalizado</option>
                    <option>Pendiente</option>
                    <option>Cancelado</option>
                </select>
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Nueva Categoría -->
    <x-admin.form-modal 
        modalName="isCategoriaModalOpen" 
        title="Nueva Categoría" 
        submitLabel="Guardar Categoría">
        <div>
            <label for="tipo_categoria" class="block text-sm font-medium text-gray-700">Tipo de Categoría</label>
            <select id="tipo_categoria" name="tipo_categoria"
                class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                <option>Ingreso</option>
                <option>Gasto</option>
            </select>
        </div>
        <div>
            <label for="nombre_categoria" class="block text-sm font-medium text-gray-700">Nombre de la Categoría</label>
            <input type="text" id="nombre_categoria" name="nombre_categoria"
                class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Categoría -->
    <x-admin.edit-modal 
        modalName="isEditCategoriaModalOpen" 
        title="Editar Categoría" 
        itemToEdit="categoriaToEdit">
        <div>
            <label for="edit_nombre_categoria" class="block text-sm font-medium text-gray-700">Nombre de la Categoría</label>
            <input type="text" id="edit_nombre_categoria" name="edit_nombre_categoria" :value="categoriaToEdit.nombre"
                class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
        <div>
            <label for="edit_tipo_categoria" class="block text-sm font-medium text-gray-700">Tipo de Categoría</label>
            <select id="edit_tipo_categoria" name="edit_tipo_categoria" 
                class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                <option :selected="categoriaToEdit.tipo === 'Ingreso'">Ingreso</option>
                <option :selected="categoriaToEdit.tipo === 'Gasto'">Gasto</option>
            </select>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Editar Ingreso -->
    <x-admin.edit-modal 
        modalName="isEditIngresoModalOpen" 
        title="Editar Ingreso" 
        itemToEdit="ingresoToEdit"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="edit_ingreso_proyecto" class="block text-sm font-medium text-gray-700">Proyecto</label>
                <select id="edit_ingreso_proyecto" name="edit_ingreso_proyecto" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option :selected="ingresoToEdit.proyecto === 'Proyecto Alpha'">Proyecto Alpha</option>
                    <option :selected="ingresoToEdit.proyecto === 'Proyecto Beta'">Proyecto Beta</option>
                    <option :selected="ingresoToEdit.proyecto === 'Proyecto BAC'">Proyecto BAC</option>
                </select>
            </div>
            <div>
                <label for="edit_ingreso_nombre" class="block text-sm font-medium text-gray-700">Nombre del Ingreso</label>
                <input type="text" id="edit_ingreso_nombre" name="edit_ingreso_nombre" :value="ingresoToEdit.nombre" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_ingreso_fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="edit_ingreso_fecha" name="edit_ingreso_fecha" :value="ingresoToEdit.fecha" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_ingreso_monto" class="block text-sm font-medium text-gray-700">Monto</label>
                <input type="number" id="edit_ingreso_monto" name="edit_ingreso_monto" :value="ingresoToEdit.monto" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="edit_ingreso_categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select id="edit_ingreso_categoria" name="edit_ingreso_categoria" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option :selected="ingresoToEdit.categoria === 'Salarios'">Salarios</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="edit_ingreso_descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="edit_ingreso_descripcion" name="edit_ingreso_descripcion" rows="3" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2" x-text="ingresoToEdit.descripcion"></textarea>
            </div>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Editar Gasto -->
    <x-admin.edit-modal 
        modalName="isEditGastoModalOpen" 
        title="Editar Gasto" 
        itemToEdit="gastoToEdit"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="edit_gasto_proyecto" class="block text-sm font-medium text-gray-700">Proyecto</label>
                <select id="edit_gasto_proyecto" name="edit_gasto_proyecto" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option :selected="gastoToEdit.proyecto === 'Proyecto Alpha'">Proyecto Alpha</option>
                    <option :selected="gastoToEdit.proyecto === 'Proyecto Beta'">Proyecto Beta</option>
                    <option :selected="gastoToEdit.proyecto === 'Proyecto BAC'">Proyecto BAC</option>
                </select>
            </div>
            <div>
                <label for="edit_gasto_nombre" class="block text-sm font-medium text-gray-700">Nombre del Gasto</label>
                <input type="text" id="edit_gasto_nombre" name="edit_gasto_nombre" :value="gastoToEdit.nombre" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_gasto_fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="edit_gasto_fecha" name="edit_gasto_fecha" :value="gastoToEdit.fecha" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_gasto_monto" class="block text-sm font-medium text-gray-700">Monto</label>
                <input type="number" id="edit_gasto_monto" name="edit_gasto_monto" :value="gastoToEdit.monto" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="edit_gasto_categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select id="edit_gasto_categoria" name="edit_gasto_categoria" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option :selected="gastoToEdit.categoria === 'Alquiler'">Alquiler</option>
                    <option :selected="gastoToEdit.categoria === 'Licencias'">Licencias</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="edit_gasto_descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="edit_gasto_descripcion" name="edit_gasto_descripcion" rows="3" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2" x-text="gastoToEdit.descripcion"></textarea>
            </div>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Nuevo Ingreso -->
    <x-admin.form-modal 
        modalName="isIngresoModalOpen" 
        title="Nuevo Ingreso" 
        submitLabel="Guardar Ingreso"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="ingreso_proyecto" class="block text-sm font-medium text-gray-700">Proyecto</label>
                <select id="ingreso_proyecto" name="ingreso_proyecto" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option>Proyecto Alpha</option>
                    <option>Proyecto Beta</option>
                    <option>Proyecto BAC</option>
                </select>
            </div>
            <div>
                <label for="ingreso_nombre" class="block text-sm font-medium text-gray-700">Nombre del Ingreso</label>
                <input type="text" id="ingreso_nombre" name="ingreso_nombre" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="ingreso_fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="ingreso_fecha" name="ingreso_fecha" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="ingreso_monto" class="block text-sm font-medium text-gray-700">Monto</label>
                <input type="number" id="ingreso_monto" name="ingreso_monto" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="ingreso_categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select id="ingreso_categoria" name="ingreso_categoria" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option>Salarios</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="ingreso_descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="ingreso_descripcion" name="ingreso_descripcion" rows="3" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Nuevo Gasto -->
    <x-admin.form-modal 
        modalName="isGastoModalOpen" 
        title="Nuevo Gasto" 
        submitLabel="Guardar Gasto"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="gasto_proyecto" class="block text-sm font-medium text-gray-700">Proyecto</label>
                <select id="gasto_proyecto" name="gasto_proyecto" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option>Proyecto Alpha</option>
                    <option>Proyecto Beta</option>
                    <option>Proyecto BAC</option>
                </select>
            </div>
            <div>
                <label for="gasto_nombre" class="block text-sm font-medium text-gray-700">Nombre del Gasto</label>
                <input type="text" id="gasto_nombre" name="gasto_nombre" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="gasto_fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="gasto_fecha" name="gasto_fecha" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="gasto_monto" class="block text-sm font-medium text-gray-700">Monto</label>
                <input type="number" id="gasto_monto" name="gasto_monto" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="gasto_categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select id="gasto_categoria" name="gasto_categoria" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option>Alquiler</option>
                    <option>Licencias</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="gasto_descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="gasto_descripcion" name="gasto_descripcion" rows="3" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Confirmar Eliminación Proyecto -->
    <x-admin.confirmation-modal
        modalName="isDeleteProjectModalOpen"
        itemToDelete="projectToDelete"
        message="¿Estás seguro de que quieres eliminar el proyecto"
    />

    <!-- Modal Confirmar Eliminación Categoría -->
    <x-admin.confirmation-modal
        modalName="isDeleteCategoriaModalOpen"
        itemToDelete="categoriaToDelete"
        message="¿Estás seguro de que quieres eliminar la categoría"
    />

    <!-- Modal Confirmar Eliminación Ingreso -->
    <x-admin.confirmation-modal
        modalName="isDeleteIngresoModalOpen"
        itemToDelete="ingresoToDelete"
        message="¿Estás seguro de que quieres eliminar el ingreso"
    />

    <!-- Modal Confirmar Eliminación Gasto -->
    <x-admin.confirmation-modal
        modalName="isDeleteGastoModalOpen"
        itemToDelete="gastoToDelete"
        message="¿Estás seguro de que quieres eliminar el gasto"
    />

    <!-- Modal Editar Proyecto -->
    <x-admin.edit-modal 
        modalName="isEditProjectModalOpen" 
        title="Editar Proyecto" 
        itemToEdit="projectToEdit"
        maxWidth="max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="edit_nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="edit_nombre" name="edit_nombre" :value="projectToEdit.nombre"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha Inicial del Proyecto</label>
                <input type="date" id="edit_fecha_inicio" name="edit_fecha_inicio" :value="projectToEdit.fecha_inicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_fecha_estimada_fin" class="block text-sm font-medium text-gray-700">Fecha Estimada de Finalización</label>
                <input type="date" id="edit_fecha_estimada_fin" name="edit_fecha_estimada_fin" :value="projectToEdit.fecha_estimada_fin"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de Finalización</label>
                <input type="date" id="edit_fecha_fin" name="edit_fecha_fin" :value="projectToEdit.fecha_fin"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="edit_descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="edit_descripcion" name="edit_descripcion" rows="3" x-text="projectToEdit.descripcion"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
            <div>
                <label for="edit_actividades" class="block text-sm font-medium text-gray-700">Actividades</label>
                <input type="text" id="edit_actividades" name="edit_actividades" :value="projectToEdit.actividades"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_orden_servicio" class="block text-sm font-medium text-gray-700">Orden de Servicio</label>
                <input type="text" id="edit_orden_servicio" name="edit_orden_servicio" :value="projectToEdit.orden_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_estado_proyecto" class="block text-sm font-medium text-gray-700">Estado de Proyecto</label>
                <select id="edit_estado_proyecto" name="edit_estado_proyecto"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option :selected="projectToEdit.estado === 'En Proceso'">En Proceso</option>
                    <option :selected="projectToEdit.estado === 'Finalizado'">Finalizado</option>
                    <option :selected="projectToEdit.estado === 'Pendiente'">Pendiente</option>
                    <option :selected="projectToEdit.estado === 'Cancelado'">Cancelado</option>
                </select>
            </div>
        </div>
    </x-admin.edit-modal>

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
        message="¿Estás seguro de que quieres eliminar el estado"
    />
</div>
