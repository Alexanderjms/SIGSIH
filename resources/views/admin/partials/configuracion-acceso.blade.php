<div x-data="{
    tab: 'gestion',
    // Modales roles y permisos
    isModalOpen: false,
    isEditRoleModalOpen: false,
    isDeleteRoleModalOpen: false,
    roleToEdit: {rol: '', descripcion_rol: '', permisos: [], objeto: '', usuario: '', creado_por: '', fecha_creacion: ''},
    roleToDelete: {rol: '', descripcion_rol: '', permisos: [], objeto: '', usuario: '', creado_por: '', fecha_creacion: ''},
    // Modales objetos
    isObjetoModalOpen: false,
    isEditObjetoModalOpen: false,
    isDeleteObjetoModalOpen: false,
    objetoToEdit: {nombre: '', descripcion: '', tipo: '', creado_por: '', fecha: ''},
    objetoToDelete: {nombre: '', descripcion: '', tipo: '', creado_por: '', fecha: ''},
    // Modales tipos de objetos
    isTipoModalOpen: false,
    isTipoEditModalOpen: false,
    isTipoDeleteModalOpen: false,
    tipoToEdit: {nombre: '', descripcion: ''},
    tipoToDelete: {nombre: '', descripcion: ''},
    // Variables para filtros-generales
    search: '',
    searchObjetos: '',
    searchTipos: '',
    ordenarPor: ''
}">
    <!-- Tabs -->
    <div class="flex border-b mb-6 flex-wrap gap-2">
        <button @click="tab = 'gestion'"
            :class="tab === 'gestion' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700'"
            class="px-4 py-2 font-semibold focus:outline-none">Gestión de Roles y Permisos</button>
        <button @click="tab = 'crear'"
            :class="tab === 'crear' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700'"
            class="px-4 py-2 font-semibold focus:outline-none">Roles</button>

        <button @click="tab = 'asignar'"
            :class="tab === 'asignar' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700'"
            class="px-4 py-2 font-semibold focus:outline-none">Asignar a Usuarios</button>

        <button @click="tab = 'objetos'"
            :class="tab === 'objetos' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700'"
            class="px-4 py-2 font-semibold focus:outline-none">Objetos</button>
        <button @click="tab = 'tipos'"
            :class="tab === 'tipos' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700'"
            class="px-4 py-2 font-semibold focus:outline-none">Tipos de Objetos</button>
    </div>

    <!-- TAB: Gestión de Roles y Permisos -->
    <div x-show="tab === 'gestion'">
        <x-admin.tabla-crud :titulo="'Gestión de Permisos'">
            <x-slot name="filtros">
                @include('partials.filtros-generales', [
                'searchModel' => 'search',
                'ordenarOptions' => [
                'rol' => 'Rol',
                'descripcion_rol' => 'Descripción'
                ]
                ])
            </x-slot>
            <x-slot name="boton">
                <a href="/admin/reportes-header?modulo=configuracion-acceso&fecha={{ now()->format('d-M-Y') }}"
                    target="_blank"
                    class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap flex items-center gap-2">
                    <i class="fas fa-file-alt"></i> Generar Reporte
                </a>
            </x-slot>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">Rol</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Permisos</th>
                        <th class="py-2 px-4 text-left">Objeto</th>
                        <th class="py-2 px-4 text-left">Creado por</th>
                        <th class="py-2 px-4 text-left">Fecha creación</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="role in [
                        {rol: 'Administrador', descripcion_rol: 'Acceso total a todas las pantallas', permisos: ['Crear', 'Editar', 'Eliminar', 'Ver'], objeto: 'Dashboard', creado_por: 'admin', fecha_creacion: '2025-07-30 10:00:00'},
                        {rol: 'Soporte', descripcion_rol: 'Gestión de tickets y reportes', permisos: ['Ver', 'Editar', 'Crear'], objeto: 'Tickets', creado_por: 'admin', fecha_creacion: '2025-07-29 09:30:00'},
                        {rol: 'Supervisor', descripcion_rol: 'Supervisión de reportes y facturación', permisos: ['Ver', 'Editar'], objeto: 'Reportes', creado_por: 'admin', fecha_creacion: '2025-07-28 08:15:00'},
                        {rol: 'Cliente', descripcion_rol: 'Solo lectura de sus tickets y facturas', permisos: ['Ver'], objeto: 'Facturación', creado_por: 'admin', fecha_creacion: '2025-07-27 08:15:00'}
                    ]" :key="role.rol">
                        <tr>
                            <td class="py-2 px-4" x-text="role.rol"></td>
                            <td class="py-2 px-4" x-text="role.descripcion_rol"></td>
                            <td class="py-2 px-4" x-text="role.permisos.join(', ')"></td>
                            <td class="py-2 px-4" x-text="role.objeto"></td>
                            <td class="py-2 px-4" x-text="role.creado_por"></td>
                            <td class="py-2 px-4" x-text="role.fecha_creacion"></td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditRoleModalOpen = true; roleToEdit = role"
                                    class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteRoleModalOpen = true; roleToDelete = role"
                                    class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Permisos disponibles -->
            <div class="bg-white rounded-lg shadow p-6 transition-colors overflow-x-auto mt-6">
                <h2 class="text-lg font-semibold mb-4">Permisos disponibles</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-gray-100 rounded p-3 flex items-center gap-2">
                        <i class="fas fa-plus text-blue-500"></i><span>Crear</span>
                    </div>
                    <div class="bg-gray-100 rounded p-3 flex items-center gap-2">
                        <i class="fas fa-edit text-yellow-500"></i><span>Editar</span>
                    </div>
                    <div class="bg-gray-100 rounded p-3 flex items-center gap-2">
                        <i class="fas fa-trash text-red-500"></i><span>Eliminar</span>
                    </div>
                    <div class="bg-gray-100 rounded p-3 flex items-center gap-2">
                        <i class="fas fa-eye text-green-500"></i><span>Ver</span>
                    </div>
                </div>
            </div>
        </x-admin.tabla-crud>
        <!-- Modales gestión -->
        <x-admin.edit-modal modalName="isEditRoleModalOpen" title="Editar Permisos del Rol" itemToEdit="roleToEdit"
            maxWidth="max-w-xl">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Rol</label>
                <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100" :value="roleToEdit?.rol"
                    readonly />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Descripción</label>
                <textarea class="w-full border rounded px-3 py-2 bg-gray-100" :value="roleToEdit?.descripcion_rol"
                    readonly x-text="roleToEdit?.descripcion_rol"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Objeto</label>
                <select class="w-full border rounded px-3 py-2" x-model="roleToEdit.objeto">
                    <option>Sistema</option>
                    <option>Tickets</option>
                    <option>Reportes</option>
                    <option>Facturación</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Permisos</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-2">
                    <button type="button"
                        :class="roleToEdit?.permisos?.includes('Crear') ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-700'"
                        class="flex items-center gap-2 rounded px-3 py-2 shadow transition-colors focus:outline-none"
                        @click="roleToEdit.permisos = roleToEdit?.permisos?.includes('Crear') ? roleToEdit.permisos.filter(p => p !== 'Crear') : [...(roleToEdit?.permisos || []), 'Crear']">
                        <i class="fas fa-plus"></i> Crear
                    </button>
                    <button type="button"
                        :class="roleToEdit?.permisos?.includes('Editar') ? 'bg-yellow-500 text-white' : 'bg-gray-100 text-gray-700'"
                        class="flex items-center gap-2 rounded px-3 py-2 shadow transition-colors focus:outline-none"
                        @click="roleToEdit.permisos = roleToEdit?.permisos?.includes('Editar') ? roleToEdit.permisos.filter(p => p !== 'Editar') : [...(roleToEdit?.permisos || []), 'Editar']">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                    <button type="button"
                        :class="roleToEdit?.permisos?.includes('Eliminar') ? 'bg-red-500 text-white' : 'bg-gray-100 text-gray-700'"
                        class="flex items-center gap-2 rounded px-3 py-2 shadow transition-colors focus:outline-none"
                        @click="roleToEdit.permisos = roleToEdit?.permisos?.includes('Eliminar') ? roleToEdit.permisos.filter(p => p !== 'Eliminar') : [...(roleToEdit?.permisos || []), 'Eliminar']">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                    <button type="button"
                        :class="roleToEdit?.permisos?.includes('Ver') ? 'bg-green-500 text-white' : 'bg-gray-100 text-gray-700'"
                        class="flex items-center gap-2 rounded px-3 py-2 shadow transition-colors focus:outline-none"
                        @click="roleToEdit.permisos = roleToEdit?.permisos?.includes('Ver') ? roleToEdit.permisos.filter(p => p !== 'Ver') : [...(roleToEdit?.permisos || []), 'Ver']">
                        <i class="fas fa-eye"></i> Ver
                    </button>
                </div>
            </div>
        </x-admin.edit-modal>
        <x-admin.confirmation-modal modalName="isDeleteRoleModalOpen" itemToDelete="roleToDelete"
            message="¿Estás seguro de que quieres eliminar el rol?" />
    </div>

    <!-- TAB: Lista de Roles -->
    <div x-show="tab === 'crear'">
        <x-admin.tabla-crud :titulo="'Lista de Roles'">
            <x-slot name="filtros">
                <div class="flex flex-wrap gap-4 mb-4 items-center">
                    <input type="text" class="border rounded px-3 py-2 flex-1 min-w-[200px]"
                        placeholder="Buscar rol..." />
                    <select class="border rounded px-3 py-2">
                        <option value="">Todos los roles</option>
                        <option>Administrador</option>
                        <option>Técnico</option>
                        <option>Cliente</option>
                    </select>
                    <select class="border rounded px-3 py-2">
                        <option value="">Ordenar por</option>
                        <option value="rol">Rol</option>
                        <option value="descripcion_rol">Descripción</option>
                    </select>
                </div>
            </x-slot>
            <x-slot name="boton">
                <button @click="isModalOpen = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar
                    rol</button>
            </x-slot>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">Rol</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Creado por</th>
                        <th class="py-2 px-4 text-left">Fecha de creación</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="role in [
                        {rol: 'Administrador', descripcion_rol: 'Acceso total a todas las pantallas', creado_por: 'admin', fecha_creacion: '2025-07-30 10:00:00'},
                        {rol: 'Soporte', descripcion_rol: 'Gestión de tickets y reportes', creado_por: 'admin', fecha_creacion: '2025-07-29 09:30:00'},
                        {rol: 'Supervisor', descripcion_rol: 'Supervisión de reportes y facturación', creado_por: 'admin', fecha_creacion: '2025-07-28 08:15:00'},
                        {rol: 'Cliente', descripcion_rol: 'Solo lectura de sus tickets y facturas', creado_por: 'admin', fecha_creacion: '2025-07-27 08:15:00'}
                    ]" :key="role.rol">
                        <tr>
                            <td class="py-2 px-4" x-text="role.rol"></td>
                            <td class="py-2 px-4" x-text="role.descripcion_rol"></td>
                            <td class="py-2 px-4" x-text="role.creado_por"></td>
                            <td class="py-2 px-4" x-text="role.fecha_creacion"></td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditRoleModalOpen = true; roleToEdit = role"
                                    class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteRoleModalOpen = true; roleToDelete = role"
                                    class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </x-admin.tabla-crud>
        <!-- Modal Agregar Rol -->
        <x-admin.form-modal modalName="isModalOpen" title="Agregar Rol" submitLabel="Guardar Rol" maxWidth="max-w-xl">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Rol</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Supervisor" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Descripción</label>
                <textarea class="w-full border rounded px-3 py-2"
                    placeholder="Describe el propósito del rol..."></textarea>
            </div>
        </x-admin.form-modal>
        <!-- Modal Editar y Eliminar -->
        <x-admin.edit-modal modalName="isEditRoleModalOpen" title="Editar Rol" itemToEdit="roleToEdit"
            maxWidth="max-w-xl">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Rol</label>
                <input type="text" class="w-full border rounded px-3 py-2" :value="roleToEdit?.rol" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Descripción</label>
                <textarea class="w-full border rounded px-3 py-2" x-text="roleToEdit?.descripcion_rol"></textarea>
            </div>
        </x-admin.edit-modal>
        <x-admin.confirmation-modal modalName="isDeleteRoleModalOpen" itemToDelete="roleToDelete"
            message="¿Estás seguro de que quieres eliminar el rol?" />
    </div>

    <!-- TAB: Objetos -->
    <div x-show="tab === 'objetos'">
        <x-admin.tabla-crud :titulo="'Gestión de Objetos'">
            <x-slot name="filtros">
                <div class="flex flex-wrap gap-4 mb-4 items-center">
                    <input type="text" class="border rounded px-3 py-2 flex-1 min-w-[200px]"
                        placeholder="Buscar objeto..." />
                    <select class="border rounded px-3 py-2">
                        <option value="">Todos los tipos</option>
                        <option>Tipo 1</option>
                        <option>Tipo 2</option>
                    </select>
                </div>
            </x-slot>
            <x-slot name="boton">
                <button @click="isObjetoModalOpen = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar
                    objeto</button>
            </x-slot>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Tipo</th>
                        <th class="py-2 px-4 text-left">Creado por</th>
                        <th class="py-2 px-4 text-left">Fecha creación</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="objeto in [
                        {nombre: 'Dashboard', descripcion: 'Pantalla principal con resumen del sistema', tipo: 'General', creado_por: 'admin', fecha: '2025-07-30'},
                        {nombre: 'Tickets', descripcion: 'Pantalla para gestión y seguimiento de tickets', tipo: 'Operativa', creado_por: 'admin', fecha: '2025-07-29'},
                        {nombre: 'Reportes', descripcion: 'Pantalla para generación y consulta de reportes', tipo: 'Analítica', creado_por: 'admin', fecha: '2025-07-28'},
                        {nombre: 'Facturación', descripcion: 'Pantalla para gestión de facturas y pagos', tipo: 'Financiera', creado_por: 'admin', fecha: '2025-07-27'}
                    ]" :key="objeto.nombre">
                        <tr>
                            <td class="py-2 px-4" x-text="objeto.nombre"></td>
                            <td class="py-2 px-4" x-text="objeto.descripcion"></td>
                            <td class="py-2 px-4" x-text="objeto.tipo"></td>
                            <td class="py-2 px-4" x-text="objeto.creado_por"></td>
                            <td class="py-2 px-4" x-text="objeto.fecha"></td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditObjetoModalOpen = true; objetoToEdit = objeto"
                                    class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteObjetoModalOpen = true; objetoToDelete = objeto"
                                    class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </x-admin.tabla-crud>
        <!-- Modal Agregar Objeto -->
        <x-admin.form-modal modalName="isObjetoModalOpen" title="Agregar Objeto" submitLabel="Guardar Objeto"
            maxWidth="max-w-xl">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nombre</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Objeto X" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Descripción</label>
                <textarea class="w-full border rounded px-3 py-2" placeholder="Describe el objeto..."></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Tipo</label>
                <select class="w-full border rounded px-3 py-2">
                    <option>Tipo 1</option>
                    <option>Tipo 2</option>
                </select>
            </div>
        </x-admin.form-modal>
        <!-- Modal Editar Objeto -->
        <x-admin.edit-modal modalName="isEditObjetoModalOpen" title="Editar Objeto" itemToEdit="objetoToEdit"
            maxWidth="max-w-xl">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nombre</label>
                <input type="text" class="w-full border rounded px-3 py-2" :value="objetoToEdit?.nombre" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Descripción</label>
                <textarea class="w-full border rounded px-3 py-2" x-text="objetoToEdit?.descripcion"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Tipo</label>
                <select class="w-full border rounded px-3 py-2" x-model="objetoToEdit.tipo">
                    <option>Tipo 1</option>
                    <option>Tipo 2</option>
                </select>
            </div>
        </x-admin.edit-modal>
        <x-admin.confirmation-modal modalName="isDeleteObjetoModalOpen" itemToDelete="objetoToDelete"
            message="¿Estás seguro de que quieres eliminar el objeto?" />
    </div>

    <!-- TAB: Tipos de Objetos -->
    <div x-show="tab === 'tipos'">
        <x-admin.tabla-crud :titulo="'Tipos de Objetos'">
            <x-slot name="filtros">
                @include('partials.filtros-generales', [
                'searchModel' => 'search',
                'ordenarOptions' => [
                'nombre' => 'Nombre',
                'descripcion' => 'Descripción'
                ]
                ])
            </x-slot>
            <x-slot name="boton">
                <button @click="isTipoModalOpen = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">
                    Agregar tipo
                </button>
            </x-slot>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="tipo in [
                        {nombre: 'General', descripcion: 'Pantallas de resumen y navegación principal'},
                        {nombre: 'Operativa', descripcion: 'Pantallas para gestión de procesos y tickets'},
                        {nombre: 'Analítica', descripcion: 'Pantallas para reportes y análisis de datos'},
                        {nombre: 'Financiera', descripcion: 'Pantallas para facturación y pagos'}
                    ]" :key="tipo.nombre">
                        <tr>
                            <td class="py-2 px-4" x-text="tipo.nombre"></td>
                            <td class="py-2 px-4" x-text="tipo.descripcion"></td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isTipoEditModalOpen = true; tipoToEdit = tipo"
                                    class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isTipoDeleteModalOpen = true; tipoToDelete = tipo"
                                    class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </x-admin.tabla-crud>
        <!-- Modales Tipos -->
        <x-admin.form-modal modalName="isTipoModalOpen" title="Agregar Tipo de Objeto" submitLabel="Guardar Tipo"
            maxWidth="max-w-xl">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nombre</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Tipo X" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Descripción</label>
                <textarea class="w-full border rounded px-3 py-2" placeholder="Describe el tipo..."></textarea>
            </div>
        </x-admin.form-modal>
        <x-admin.edit-modal modalName="isTipoEditModalOpen" title="Editar Tipo de Objeto" itemToEdit="tipoToEdit"
            maxWidth="max-w-xl">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nombre</label>
                <input type="text" class="w-full border rounded px-3 py-2" :value="tipoToEdit?.nombre" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Descripción</label>
                <textarea class="w-full border rounded px-3 py-2" x-text="tipoToEdit?.descripcion"></textarea>
            </div>
        </x-admin.edit-modal>
        <x-admin.confirmation-modal modalName="isTipoDeleteModalOpen" itemToDelete="tipoToDelete"
            message="¿Estás seguro de que quieres eliminar el tipo de objeto?" />
    </div>

    <!-- TAB: Asignar Rol a Usuario -->
    <div x-show="tab === 'asignar'">
        <x-admin.tabla-crud :titulo="'Asignación de Roles a Usuarios'">
            <x-slot name="filtros">
                <div class="flex flex-wrap gap-4 mb-4 items-center">
                    <input type="text" class="border rounded px-3 py-2 flex-1 min-w-[200px]"
                        placeholder="Buscar usuario..." />
                    <select class="border rounded px-3 py-2">
                        <option value="">Todos los roles</option>
                        <option>Administrador</option>
                        <option>Supervisor</option>
                        <option>Cliente</option>
                    </select>
                </div>
            </x-slot>
            <x-slot name="boton">
                <button @click="isModalOpen = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Asignar
                    Rol</button>
            </x-slot>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">Usuario</th>
                        <th class="py-2 px-4 text-left">Rol</th>
                        <th class="py-2 px-4 text-left">Creado por</th>
                        <th class="py-2 px-4 text-left">Fecha de creación</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="asignacion in [
                        {usuario: 'juan.perez', rol: 'Administrador', creado_por: 'admin', fecha_creacion: '2025-07-30 10:00:00'},
                        {usuario: 'ana.lopez', rol: 'Soporte', creado_por: 'admin', fecha_creacion: '2025-07-29 09:30:00'},
                        {usuario: 'carlos.mendez', rol: 'Supervisor', creado_por: 'admin', fecha_creacion: '2025-07-28 08:15:00'},
                        {usuario: 'cliente1', rol: 'Cliente', creado_por: 'admin', fecha_creacion: '2025-07-27 08:15:00'}
                    ]" :key="asignacion.usuario + '-' + asignacion.rol">
                        <tr>
                            <td class="py-2 px-4" x-text="asignacion.usuario"></td>
                            <td class="py-2 px-4" x-text="asignacion.rol"></td>
                            <td class="py-2 px-4" x-text="asignacion.creado_por"></td>
                            <td class="py-2 px-4" x-text="asignacion.fecha_creacion"></td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditRoleModalOpen = true; roleToEdit = asignacion"
                                    class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteRoleModalOpen = true; roleToDelete = asignacion"
                                    class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </x-admin.tabla-crud>
        <!-- Modal Asignar Rol -->
        <x-admin.form-modal modalName="isModalOpen" title="Asignar Rol a Usuario" submitLabel="Asignar Rol"
            maxWidth="max-w-md">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Usuario</label>
                <select class="w-full border rounded px-3 py-2">
                    <option>juan.perez</option>
                    <option>ana.lopez</option>
                    <option>admin</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Rol</label>
                <select class="w-full border rounded px-3 py-2">
                    <option>Administrador</option>
                    <option>Supervisor</option>
                    <option>Cliente</option>
                </select>
            </div>
        </x-admin.form-modal>
        <!-- Modal Editar Asignación -->
        <x-admin.edit-modal modalName="isEditRoleModalOpen" title="Editar Asignación" itemToEdit="roleToEdit"
            maxWidth="max-w-md">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Usuario</label>
                <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100" :value="roleToEdit?.usuario"
                    readonly />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Rol</label>
                <select class="w-full border rounded px-3 py-2" x-model="roleToEdit.rol">
                    <option>Administrador</option>
                    <option>Supervisor</option>
                    <option>Cliente</option>
                </select>
            </div>
        </x-admin.edit-modal>
        <x-admin.confirmation-modal modalName="isDeleteRoleModalOpen" itemToDelete="roleToDelete"
            message="¿Estás seguro de que quieres eliminar la asignación?" />
    </div>
</div>