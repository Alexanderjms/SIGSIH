@extends('layouts.admin')


@section('content')

<div x-data="{
        tab: 'tipo_persona',
        isModalOpenPersonas: false, isEditModalOpenPersonas: false, isDeleteModalOpenPersonas: false,
        isModalOpenTipoPersona: false, isEditModalOpenTipoPersona: false, isDeleteModalOpenTipoPersona: false,
        isModalOpenGenero: false, isEditModalOpenGenero: false, isDeleteModalOpenGenero: false,
        isModalOpenPerfil: false, isEditModalOpenPerfil: false, isDeleteModalOpenPerfil: false,
        itemToEdit: null, itemToDelete: null
    }">
    <ul class="flex border-b nunito-bold">
        <li @click="tab='Personas'"
            :class="tab==='Personas' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
            class="mr-6 pb-2">Personas</li>

        <li @click="tab='tipo_persona'"
            :class="tab==='tipo_persona' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
            class="mr-6 pb-2">Tipo de persona</li>

        <li @click="tab='genero'"
            :class="tab==='genero' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
            class="mr-6 pb-2">Género</li>
        <li @click="tab='perfil'"
            :class="tab==='perfil' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
            class="mr-6 pb-2">Perfil</li>
    </ul>

    <div class="mt-6">
        <!-- TAB: Personas -->
        <div x-show="tab === 'Personas'">
            <div class="overflow-x-auto w-full">
                <x-admin.tabla-crud :titulo="'Gestión de Personas'">
                    <x-slot name="filtros">
                        @include('partials.filtros-generales', [
                        'searchModel' => 'searchPersonas',
                        'filtrosSelect' => [
                        'tipo_persona' => ['label' => 'Tipo de Persona', 'options' => ['Empleado', 'Cliente']],
                        'genero' => ['label' => 'Género', 'options' => ['Masculino', 'Femenino']]
                        ],
                        'ordenarOptions' => [
                        'primer_nombre' => 'Primer Nombre',
                        'segundo_nombre' => 'Segundo Nombre',
                        'primer_apellido' => 'Primer Apellido',
                        'segundo_apellido' => 'Segundo Apellido',
                        'dni' => 'DNI',
                        'cargo' => 'Cargo',
                        'tipo_persona' => 'Tipo de Persona',
                        'genero' => 'Género',
                        'perfil' => 'Perfil',
                        'usuario' => 'Usuario'
                        ]
                        ])
                    </x-slot>
                    <x-slot name="boton">
                        <button @click="isModalOpenPersonas = true"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar
                            persona</button>
                    </x-slot>
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 text-left">Id Persona</th>
                                <th class="py-2 px-4 text-left">Primer Nombre</th>
                                <th class="py-2 px-4 text-left">Segundo Nombre</th>
                                <th class="py-2 px-4 text-left">Primer Apellido</th>
                                <th class="py-2 px-4 text-left">Segundo Apellido</th>
                                <th class="py-2 px-4 text-left">DNI</th>
                                <th class="py-2 px-4 text-left">Cargo</th>
                                <th class="py-2 px-4 text-left">Tipo de Persona</th>
                                <th class="py-2 px-4 text-left">Género</th>
                                <th class="py-2 px-4 text-left">Perfil</th>
                                <th class="py-2 px-4 text-left">Usuario</th>
                                <th class="py-2 px-4 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2 px-4">001</td>
                                <td class="py-2 px-4">Juan</td>
                                <td class="py-2 px-4">Carlos</td>
                                <td class="py-2 px-4">Pérez</td>
                                <td class="py-2 px-4">Gómez</td>
                                <td class="py-2 px-4">12345678</td>
                                <td class="py-2 px-4">Analista</td>
                                <td class="py-2 px-4">Administrador</td>
                                <td class="py-2 px-4">Masculino</td>
                                <td class="py-2 px-4">Administrador</td>
                                <td class="py-2 px-4">jgomez</td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="#"
                                        @click="isEditModalOpenPersonas = true; itemToEdit = { id: '001', primer_nombre: 'Juan', segundo_nombre: 'Carlos', primer_apellido: 'Pérez', segundo_apellido: 'Gómez', dni: '12345678', cargo: 'Analista', tipo_persona: 'Administrador', genero: 'Masculino', perfil: 'Administrador', usuario: 'jgomez' }"
                                        class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                    <a href="#"
                                        @click="isDeleteModalOpenPersonas = true; itemToDelete = { id: '001', nombre: 'Juan Carlos Pérez Gómez' }"
                                        class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </x-admin.tabla-crud>
            </div>
            <!-- Modal Agregar Persona -->
            <x-admin.form-modal modalName="isModalOpenPersonas" title="Agregar Persona" submitLabel="Guardar"
                maxWidth="max-w-2xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Primer Nombre</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Juan" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Segundo Nombre</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Carlos" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Primer Apellido</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Pérez" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Segundo Apellido</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Gómez" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">DNI</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: 12345678" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Cargo</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Analista" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Tipo de Persona</label>
                        <select class="w-full border rounded px-3 py-2">
                            <option>Empleado</option>
                            <option>Cliente</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Género</label>
                        <select class="w-full border rounded px-3 py-2">
                            <option>Masculino</option>
                            <option>Femenino</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Perfil</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Administrador" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Usuario</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: jgomez" />
                    </div>
                </div>
            </x-admin.form-modal>

            <!-- Modal Editar Persona -->
            <x-admin.edit-modal modalName="isEditModalOpenPersonas" title="Editar Persona" itemToEdit="itemToEdit"
                maxWidth="max-w-2xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Primer Nombre</label>
                        <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.primer_nombre" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Segundo Nombre</label>
                        <input type="text" class="w-full border rounded px-3 py-2"
                            :value="itemToEdit?.segundo_nombre" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Primer Apellido</label>
                        <input type="text" class="w-full border rounded px-3 py-2"
                            :value="itemToEdit?.primer_apellido" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Segundo Apellido</label>
                        <input type="text" class="w-full border rounded px-3 py-2"
                            :value="itemToEdit?.segundo_apellido" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">DNI</label>
                        <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.dni" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Cargo</label>
                        <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.cargo" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Tipo de Persona</label>
                        <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.tipo_persona" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Género</label>
                        <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.genero" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Perfil</label>
                        <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.perfil" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Usuario</label>
                        <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.usuario" />
                    </div>
                </div>
            </x-admin.edit-modal>

            <!-- Modal Eliminar Persona -->
            <x-admin.confirmation-modal modalName="isDeleteModalOpenPersonas" itemToDelete="itemToDelete"
                message="¿Estás seguro de que deseas eliminar esta persona?" />
        </div>

        <!-- TAB: Tipo de persona -->
        <div x-show="tab === 'tipo_persona'">
            <x-admin.tabla-crud :titulo="'Gestión de Tipos de Persona'">
                <x-slot name="filtros">
                    @include('partials.filtros-generales', [
                    'searchModel' => 'searchTipoPersona',
                    'ordenarOptions' => [
                    'id_tipo_persona_pk' => 'ID Tipo Persona',
                    'nombre_tipo_persona' => 'Nombre Tipo Persona',
                    'descripcion' => 'Descripción'
                    ]
                    ])
                </x-slot>
                <x-slot name="boton">
                    <button @click="isModalOpenTipoPersona = true"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar
                        tipo</button>
                </x-slot>
                <div class="w-full max-w-full overflow-x-auto relative block">

                    <table class="table-auto text-sm w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 text-left">ID Tipo Persona</th>
                                <th class="py-2 px-4 text-left">Nombre Tipo Persona</th>
                                <th class="py-2 px-4 text-left">Descripción</th>
                                <th class="py-2 px-4 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2 px-4">1</td>
                                <td class="py-2 px-4">Tecnico</td>
                                <td class="py-2 px-4">Persona que trabaja en la empresa</td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="#"
                                        @click="isEditModalOpenTipoPersona = true; itemToEdit = {id: 1, nombre: 'Empleado', descripcion: 'Persona que trabaja en la empresa'}"
                                        class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                    <a href="#"
                                        @click="isDeleteModalOpenTipoPersona = true; itemToDelete = {id: 1, nombre: 'Empleado'}"
                                        class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-admin.tabla-crud>


            <!-- Modales tipo persona -->
            <x-admin.form-modal modalName="isModalOpenTipoPersona" title="Agregar Tipo de Persona" submitLabel="Guardar"
                maxWidth="max-w-md">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Nombre Tipo Persona</label>
                    <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Empleado" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Descripción</label>
                    <input type="text" class="w-full border rounded px-3 py-2"
                        placeholder="Ej: Persona que trabaja en la empresa" />
                </div>
            </x-admin.form-modal>
            <x-admin.edit-modal modalName="isEditModalOpenTipoPersona" title="Editar Tipo de Persona"
                itemToEdit="itemToEdit" maxWidth="max-w-md">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Nombre Tipo Persona</label>
                    <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.nombre" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Descripción</label>
                    <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.descripcion" />
                </div>
            </x-admin.edit-modal>
            <x-admin.confirmation-modal modalName="isDeleteModalOpenTipoPersona" itemToDelete="itemToDelete"
                message="¿Estás seguro de que deseas eliminar este tipo de persona?" />
        </div>

        <!-- TAB: Género -->
        <div x-show="tab === 'genero'">
            <x-admin.tabla-crud :titulo="'Gestión de Géneros'">
                <x-slot name="filtros">
                    @include('partials.filtros-generales', [
                    'searchModel' => 'searchGenero',
                    'ordenarOptions' => [
                    'genero' => 'Género'
                    ]
                    ])
                </x-slot>
                <x-slot name="boton">
                    <button @click="isModalOpenGenero = true"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar
                        género</button>
                </x-slot>
                <div class="overflow-x-auto w-full">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 text-left">Id Género</th>
                                <th class="py-2 px-4 text-left">Género</th>
                                <th class="py-2 px-4 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2 px-4">1</td>
                                <td class="py-2 px-4">Masculino</td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="#"
                                        @click="isEditModalOpenGenero = true; itemToEdit = {genero: 'Masculino'}"
                                        class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                    <a href="#"
                                        @click="isDeleteModalOpenGenero = true; itemToDelete = {genero: 'Masculino'}"
                                        class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-4">2</td>
                                <td class="py-2 px-4">Femenino</td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="#" @click="isEditModalOpenGenero = true; itemToEdit = {genero: 'Femenino'}"
                                        class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                    <a href="#"
                                        @click="isDeleteModalOpenGenero = true; itemToDelete = {genero: 'Femenino'}"
                                        class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-admin.tabla-crud>
            <!-- Modales género -->
            <x-admin.form-modal modalName="isModalOpenGenero" title="Agregar Género" submitLabel="Guardar"
                maxWidth="max-w-md">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Género</label>
                    <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Masculino" />
                </div>
            </x-admin.form-modal>
            <x-admin.edit-modal modalName="isEditModalOpenGenero" title="Editar Género" itemToEdit="itemToEdit"
                maxWidth="max-w-md">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Género</label>
                    <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.genero" />
                </div>
            </x-admin.edit-modal>
            <x-admin.confirmation-modal modalName="isDeleteModalOpenGenero" itemToDelete="itemToDelete"
                message="¿Estás seguro de que deseas eliminar este género?" />
        </div>

        <!-- TAB: Perfil -->
        <div x-show="tab === 'perfil'">
            <x-admin.tabla-crud :titulo="'Gestión de Perfiles'">
                <x-slot name="filtros">
                    @include('partials.filtros-generales', [
                    'searchModel' => 'searchPerfil',
                    'ordenarOptions' => [
                    'perfil' => 'Perfil'
                    ]
                    ])
                </x-slot>
                <x-slot name="boton">
                    <button @click="isModalOpenPerfil = true"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar
                        perfil</button>
                </x-slot>
                <div class="overflow-x-auto w-full">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 text-left">Id Perfil</th>
                                <th class="py-2 px-4 text-left">Nombre de Perfil</th>
                                <th class="py-2 px-4 text-left">Descripción del Perfil</th>
                                <th class="py-2 px-4 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2 px-4">1</td>
                                <td class="py-2 px-4">Administrador</td>
                                <td class="py-2 px-4">Acceso total al sistema</td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="#"
                                        @click="isEditModalOpenPerfil = true; itemToEdit = {perfil: 'Administrador'}"
                                        class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                    <a href="#"
                                        @click="isDeleteModalOpenPerfil = true; itemToDelete = {perfil: 'Administrador'}"
                                        class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-4">2</td>
                                <td class="py-2 px-4">Técnico</td>
                                <td class="py-2 px-4">Acceso limitado al sistema</td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="#" @click="isEditModalOpenPerfil = true; itemToEdit = {perfil: 'Técnico'}"
                                        class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                    <a href="#"
                                        @click="isDeleteModalOpenPerfil = true; itemToDelete = {perfil: 'Técnico'}"
                                        class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-admin.tabla-crud>
            <!-- Modales perfil -->
            <x-admin.form-modal modalName="isModalOpenPerfil" title="Agregar Perfil" submitLabel="Guardar"
                maxWidth="max-w-md">

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Nombre del Perfil</label>
                    <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Administrador" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Descripción del Perfil</label>
                    <textarea class="w-full border rounded px-3 py-2"
                        placeholder="Ej: Acceso total al sistema"></textarea>
                </div>
            </x-admin.form-modal>
            <x-admin.edit-modal modalName="isEditModalOpenPerfil" title="Editar Perfil" itemToEdit="itemToEdit"
                maxWidth="max-w-md">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Perfil</label>
                    <input type="text" class="w-full border rounded px-3 py-2" :value="itemToEdit?.perfil" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Descripción</label>
                    <textarea class="w-full border rounded px-3 py-2" :value="itemToEdit?.descripcion"></textarea>
                </div>
            </x-admin.edit-modal>
            <x-admin.confirmation-modal modalName="isDeleteModalOpenPerfil" itemToDelete="itemToDelete"
                message="¿Estás seguro de que deseas eliminar este perfil?" />
        </div>
    </div>
</div>
</div>

@endsection