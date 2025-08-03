@extends('layouts.admin')


@section('content')
<div
    x-data="{ 
        isModalOpen: false, 
        isEditUserModalOpen: false, 
        isDeleteUserModalOpen: false, 
        userToEdit: null, 
        userToDelete: null,
        search: '',
        filtroPerfil: '',
        ordenarPor: ''
    }">
    <!-- REFERENCIA A LA TABLA -->
    <x-admin.tabla-crud :titulo="'Lista de Usuarios'">
        <x-slot name="filtros">
            @include('partials.filtros-generales', [
            'searchModel' => 'search',
            'filtrosSelect' => [
            'filtroPerfil' => [
            'label' => 'perfiles',
            'options' => ['Técnico', 'Admin', 'Cliente']
            ]
            ],
            'ordenarOptions' => [
            'nombre' => 'Nombre de Usuario',
            'usuario' => 'Usuario',
            'correo electrónico' => 'Correo Electrónico',
            'estado' => 'Estado',
            ]
            ])
        </x-slot>

        <x-slot name="boton">
            <button @click="isModalOpen = true"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar
                usuario</button>
        </x-slot>

        <!-- Tabla estática -->
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 text-left">Nombre de Usuario</th>
                    <th class="py-2 px-4 text-left">Usuario</th>
                    <th class="py-2 px-4 text-left">Correo Electrónico</th>
                    <th class="py-2 px-4 text-left">Estado</th>
                    <th class="py-2 px-4 text-left">Creado por</th>
                    <th class="py-2 px-4 text-left">Fecha de creación</th>
                    <th class="py-2 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4">Juan Pérez</td>
                    <td class="py-2 px-4">jperez</td>
                    <td class="py-2 px-4">juan.perez@example.com</td>
                    <td class="py-2 px-4">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded">Activo</span>
                    </td>
                    <td class="py-2 px-4">admin</td>
                    <td class="py-2 px-4">2025-07-30 10:00:00</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="#"
                            @click="isEditUserModalOpen = true; userToEdit = {nombre: 'Juan Pérez', usuario: 'jperez', correo: 'juan.perez@example.com', estado: 'Activo'}"
                            class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                        <a href="#" @click="isDeleteUserModalOpen = true; userToDelete = {nombre: 'Juan Pérez'}"
                            class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4">Ana López</td>
                    <td class="py-2 px-4">alopez</td>
                    <td class="py-2 px-4">ana.lopez@example.com</td>
                    <td class="py-2 px-4">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded">Activo</span>
                    </td>
                    <td class="py-2 px-4">soporte</td>
                    <td class="py-2 px-4">2025-07-25 09:30:00</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="#"
                            @click="isEditUserModalOpen = true; userToEdit = {nombre: 'Ana López', usuario: 'alopez', correo: 'ana.lopez@example.com', estado: 'Activo'}"
                            class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                        <a href="#" @click="isDeleteUserModalOpen = true; userToDelete = {nombre: 'Ana López'}"
                            class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4">Carlos Ruiz</td>
                    <td class="py-2 px-4">cruiz</td>
                    <td class="py-2 px-4">carlos.ruiz@example.com</td>
                    <td class="py-2 px-4">
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded">Inactivo</span>
                    </td>
                    <td class="py-2 px-4">admin</td>
                    <td class="py-2 px-4">2025-07-20 08:15:00</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="#"
                            @click="isEditUserModalOpen = true; userToEdit = {nombre: 'Carlos Ruiz', usuario: 'cruiz', correo: 'carlos.ruiz@example.com', estado: 'Inactivo'}"
                            class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                        <a href="#" @click="isDeleteUserModalOpen = true; userToDelete = {nombre: 'Carlos Ruiz'}"
                            class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4">María Torres</td>
                    <td class="py-2 px-4">mtorres</td>
                    <td class="py-2 px-4">maria.torres@example.com</td>
                    <td class="py-2 px-4">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded">Activo</span>
                    </td>
                    <td class="py-2 px-4">admin</td>
                    <td class="py-2 px-4">2025-07-18 11:45:00</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="#"
                            @click="isEditUserModalOpen = true; userToEdit = {nombre: 'María Torres', usuario: 'mtorres', correo: 'maria.torres@example.com', estado: 'Activo'}"
                            class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                        <a href="#" @click="isDeleteUserModalOpen = true; userToDelete = {nombre: 'María Torres'}"
                            class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4">Pedro Gómez</td>
                    <td class="py-2 px-4">pgomez</td>
                    <td class="py-2 px-4">pedro.gomez@example.com</td>
                    <td class="py-2 px-4">
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded">Inactivo</span>
                    </td>
                    <td class="py-2 px-4">soporte</td>
                    <td class="py-2 px-4">2025-07-15 14:20:00</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="#"
                            @click="isEditUserModalOpen = true; userToEdit = {nombre: 'Pedro Gómez', usuario: 'pgomez', correo: 'pedro.gomez@example.com', estado: 'Inactivo'}"
                            class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                        <a href="#" @click="isDeleteUserModalOpen = true; userToDelete = {nombre: 'Pedro Gómez'}"
                            class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4">Lucía Fernández</td>
                    <td class="py-2 px-4">lfernandez</td>
                    <td class="py-2 px-4">lucia.fernandez@example.com</td>
                    <td class="py-2 px-4">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded">Activo</span>
                    </td>
                    <td class="py-2 px-4">admin</td>
                    <td class="py-2 px-4">2025-07-10 16:05:00</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="#"
                            @click="isEditUserModalOpen = true; userToEdit = {nombre: 'Lucía Fernández', usuario: 'lfernandez', correo: 'lucia.fernandez@example.com', estado: 'Activo'}"
                            class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                        <a href="#" @click="isDeleteUserModalOpen = true; userToDelete = {nombre: 'Lucía Fernández'}"
                            class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </x-admin.tabla-crud>
    <!-- Modal Agregar Usuario -->
    <x-admin.form-modal modalName="isModalOpen" title="Agregar Usuario" submitLabel="Agregar Usuario"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
                <input type="text" id="usuario" name="usuario"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="correo" name="correo"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select id="estado" name="estado"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option>Activo</option>
                    <option>Inactivo</option>
                </select>
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Usuario -->
    <x-admin.edit-modal modalName="isEditUserModalOpen" title="Editar Usuario" itemToEdit="userToEdit"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="edit_nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="edit_nombre" name="edit_nombre" :value="userToEdit?.nombre"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
                <input type="text" id="edit_usuario" name="edit_usuario" :value="userToEdit?.usuario"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="edit_correo" name="edit_correo" :value="userToEdit?.correo"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select id="edit_estado" name="edit_estado"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option :selected="userToEdit?.estado === 'Activo'">Activo</option>
                    <option :selected="userToEdit?.estado === 'Inactivo'">Inactivo</option>
                </select>
            </div>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Confirmar Eliminación Usuario -->
    <x-admin.confirmation-modal modalName="isDeleteUserModalOpen" itemToDelete="userToDelete"
        message="¿Estás seguro de que quieres eliminar el usuario?" />
</div>
@endsection