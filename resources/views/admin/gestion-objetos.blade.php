@extends('layouts.admin')

@section('content')
<div x-data="{
    tab: 'objetos',
    isModalOpen: false,
    isEditModalOpen: false,
    isDeleteModalOpen: false,
    isTipoModalOpen: false,
    isTipoEditModalOpen: false,
    isTipoDeleteModalOpen: false,
    objetoToEdit: null,
    objetoToDelete: null,
    tipoToEdit: null,
    tipoToDelete: null
}">
    <div class="mb-6">
        <nav class="flex gap-2 border-b">
            <button @click="tab = 'objetos'"
                :class="tab === 'objetos' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600'"
                class="px-4 py-2 focus:outline-none">Gestión de Objetos</button>
            <button @click="tab = 'tipos'"
                :class="tab === 'tipos' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600'"
                class="px-4 py-2 focus:outline-none">Tipos de Objetos</button>
        </nav>
    </div>
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
                <button @click="isModalOpen = true"
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
                        {nombre: 'Objeto A', descripcion: 'Descripción de objeto A', tipo: 'Tipo 1', creado_por: 'admin', fecha: '2025-07-30'},
                        {nombre: 'Objeto B', descripcion: 'Descripción de objeto B', tipo: 'Tipo 2', creado_por: 'admin', fecha: '2025-07-29'}
                    ]" :key="objeto.nombre">
                        <tr>
                            <td class="py-2 px-4" x-text="objeto.nombre"></td>
                            <td class="py-2 px-4" x-text="objeto.descripcion"></td>
                            <td class="py-2 px-4" x-text="objeto.tipo"></td>
                            <td class="py-2 px-4" x-text="objeto.creado_por"></td>
                            <td class="py-2 px-4" x-text="objeto.fecha"></td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" @click="isEditModalOpen = true; objetoToEdit = objeto"
                                    class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="isDeleteModalOpen = true; objetoToDelete = objeto"
                                    class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </x-admin.tabla-crud>
        <!-- Modal Agregar Objeto -->
        <x-admin.form-modal modalName="isModalOpen" title="Agregar Objeto" submitLabel="Guardar Objeto"
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
        <x-admin.edit-modal modalName="isEditModalOpen" title="Editar Objeto" itemToEdit="objetoToEdit"
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
        <x-admin.confirmation-modal modalName="isDeleteModalOpen" itemToDelete="objetoToDelete"
            message="¿Estás seguro de que quieres eliminar el objeto?" />
    </div>
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
                    {nombre: 'Tipo 1', descripcion: 'Descripción tipo 1'},
                    {nombre: 'Tipo 2', descripcion: 'Descripción tipo 2'}
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

        <!-- Modales -->
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

</div>
@endsection