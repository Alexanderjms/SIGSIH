@extends('layouts.admin')

@section('page-header')
@endsection

@section('content')
<div x-data="{
        tab: 'gestion',
        isModalOpen: false,
        isEditRoleModalOpen: false,
        isDeleteRoleModalOpen: false,
        roleToEdit: null,
        roleToDelete: null
    }">

    <!-- Tabs -->
    <div class="flex border-b mb-6">
        <button @click="tab = 'gestion'"
            :class="tab === 'gestion' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700'"
            class="px-4 py-2 font-semibold focus:outline-none">Gestión de Roles y Permisos</button>
        <button @click="tab = 'crear'"
            :class="tab === 'crear' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700'"
            class="px-4 py-2 font-semibold focus:outline-none">Crear Rol</button>
        <button @click="tab = 'asignar'"
            :class="tab === 'asignar' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700'"
            class="px-4 py-2 font-semibold focus:outline-none">Asignar a Usuarios</button>
    </div>

    <!-- TAB: Gestión -->
    <div x-show="tab === 'gestion'">
        <x-admin.tabla-crud :titulo="'Gestión de Roles y Permisos'">
            <x-slot name="filtros">
                @include('partials.filtros-generales', [
                'searchModel' => 'search',
                'ordenarOptions' => [
                'rol' => 'Rol',
                'descripcion_rol' => 'Descripción'
                ]
                ])
            </x-slot>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">Rol</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Permisos</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="role in [
                        {rol: 'Administrador', descripcion_rol: 'Acceso total al sistema', permisos: ['Crear', 'Editar', 'Eliminar', 'Ver']},
                        {rol: 'Técnico', descripcion_rol: 'Gestión de tickets', permisos: ['Ver', 'Editar']},
                        {rol: 'Cliente', descripcion_rol: 'Solo lectura de sus tickets', permisos: ['Ver']}
                    ]" :key="role.rol">
                        <tr>
                            <td class="py-2 px-4" x-text="role.rol"></td>
                            <td class="py-2 px-4" x-text="role.descripcion_rol"></td>
                            <td class="py-2 px-4" x-text="role.permisos.join(', ')"></td>
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

        <!-- Modales -->
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
                <label class="block text-sm font-medium mb-1">Permisos</label>
                <div class="flex flex-wrap gap-2 mt-1">
                    <label class="flex items-center gap-1"><input type="checkbox" value="Crear"
                            x-model="roleToEdit.permisos"> Crear</label>
                    <label class="flex items-center gap-1"><input type="checkbox" value="Editar"
                            x-model="roleToEdit.permisos"> Editar</label>
                    <label class="flex items-center gap-1"><input type="checkbox" value="Eliminar"
                            x-model="roleToEdit.permisos"> Eliminar</label>
                    <label class="flex items-center gap-1"><input type="checkbox" value="Ver"
                            x-model="roleToEdit.permisos"> Ver</label>
                </div>
            </div>
        </x-admin.edit-modal>

        <x-admin.confirmation-modal modalName="isDeleteRoleModalOpen" itemToDelete="roleToDelete"
            message="¿Estás seguro de que quieres eliminar el rol?" />
    </div>

    <!-- TAB: Crear Rol (CRUD) -->
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
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="role in [
                        {rol: 'Administrador', descripcion_rol: 'Acceso total al sistema'},
                        {rol: 'Técnico', descripcion_rol: 'Gestión de tickets'},
                        {rol: 'Cliente', descripcion_rol: 'Solo lectura de sus tickets'}
                    ]" :key="role.rol">
                        <tr>
                            <td class="py-2 px-4" x-text="role.rol"></td>
                            <td class="py-2 px-4" x-text="role.descripcion_rol"></td>
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

    <!-- TAB: Asignar Rol a Usuario -->
    <div x-show="tab === 'asignar'">
        <x-admin.tabla-crud :titulo="'Asignación de Roles a Usuarios'">
            <x-slot name="filtros">
                <div class="flex flex-wrap gap-4 mb-4 items-center">
                    <input type="text" class="border rounded px-3 py-2 flex-1 min-w-[200px]" placeholder="Buscar usuario..." />
                    <select class="border rounded px-3 py-2">
                        <option value="">Todos los roles</option>
                        <option>Administrador</option>
                        <option>Supervisor</option>
                        <option>Cliente</option>
                    </select>
                </div>
            </x-slot>
            <x-slot name="boton">
                <button @click="isModalOpen = true" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Asignar Rol</button>
            </x-slot>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">Usuario</th>
                        <th class="py-2 px-4 text-left">Rol</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="asignacion in [
                        {usuario: 'juan.perez', rol: 'Administrador'},
                        {usuario: 'ana.lopez', rol: 'Supervisor'},
                        {usuario: 'admin', rol: 'Cliente'}
                    ]" :key="asignacion.usuario + '-' + asignacion.rol">
                        <tr>
                            <td class="py-2 px-4" x-text="asignacion.usuario"></td>
                            <td class="py-2 px-4" x-text="asignacion.rol"></td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditRoleModalOpen = true; roleToEdit = asignacion" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteRoleModalOpen = true; roleToDelete = asignacion" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </x-admin.tabla-crud>
        <!-- Modal Asignar Rol -->
        <x-admin.form-modal modalName="isModalOpen" title="Asignar Rol a Usuario" submitLabel="Asignar Rol" maxWidth="max-w-md">
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
        <x-admin.edit-modal modalName="isEditRoleModalOpen" title="Editar Asignación" itemToEdit="roleToEdit" maxWidth="max-w-md">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Usuario</label>
                <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100" :value="roleToEdit?.usuario" readonly />
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
        <x-admin.confirmation-modal modalName="isDeleteRoleModalOpen" itemToDelete="roleToDelete" message="¿Estás seguro de que quieres eliminar la asignación?" />
    </div>
</div>

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
@endsection